<?php

namespace App\Controllers;

use App\Models\AlternatifModel;
use App\Models\EvaluasiModel;
use App\Models\KriteriaModel;


class Perhitungan extends BaseController
{
    public $normal = [];

    public function __construct()
    {
        $this->evaluasiModel        = new EvaluasiModel();
        $this->kriteriaModel        = new KriteriaModel();
        $this->alternatifModel      = new AlternatifModel();
    }
    function normalisasiMatrix()
    {
        $eval = $this->evaluasiModel->findAll();
        $krit = $this->kriteriaModel->findAll();
        $minMaxValues = [];
        $normal = [];
        foreach ($krit as $k) {
            $min = min($this->evaluasiModel->where('id_krit', $k['id_kriteria'])->select('nilai')->get()->getResultArray());
            $max = max($this->evaluasiModel->where('id_krit', $k['id_kriteria'])->select('nilai')->get()->getResultArray());
            $minMaxValues[$k['id_kriteria']] = [
                'min' => $min['nilai'],
                'max' => $max['nilai'],
            ];
        }
        foreach ($eval as $e) {
            $n = ($e['nilai'] - $minMaxValues[$e['id_krit']]['min']) / ($minMaxValues[$e['id_krit']]['max'] - $minMaxValues[$e['id_krit']]['min']);
            $normal[$e['id_evaluasi']] = [
                'id_alt' => $e['id_alt'],
                'id_krit' => $e['id_krit'],
                'nilai' => $n,
                'min' => $minMaxValues[$e['id_krit']]['min'],
                'max' => $minMaxValues[$e['id_krit']]['max'],
            ];
        };
        return $normal;
    }
    public function normalXbobot()
    {
        $normal = $this->normalisasiMatrix();
        $kriteria = $this->kriteriaModel->select(['id_kriteria', 'bobot'])->get()->getResultArray();
        $bobot = [];
        foreach ($kriteria as $kr) {
            $bobot[$kr['id_kriteria']] = $kr['bobot'];
        };

        $kali = [];
        $i = 0;
        foreach ($normal as $nor) {
            $k = $nor['nilai'] * $bobot[$nor['id_krit']];
            // d($nor['id_evalu']);
            $kali[$i] = [
                'id_alt' =>  $nor['id_alt'],
                'id_krit' =>  $nor['id_krit'],
                'bobot' =>  $bobot[$nor['id_krit']],
                'nilai' =>  $k,
            ];
            $i++;
        };
        return $kali;
    }
    public function totalHasil()
    {
        $hasil = $this->normalXbobot();
        $total = [];
        foreach ($hasil as $h) {
            $total[$h['id_alt']] = [
                'id_alt' => $h['id_alt'],
                'total' => 0
            ];
        }
        foreach ($total as $t) {
            $to = 0;
            foreach ($hasil as $ha) {
                if ($t['id_alt'] == $ha['id_alt']) {
                    $to += $ha['nilai'];
                }
            }
            $t['total'] = $to;
            $total[$t['id_alt']] = [
                'total' => $t['total'],
                'id_alt' => $t['id_alt'],
            ];
        }
        return $total;
    }
    public function rangking()
    {
        $total = $this->totalHasil();
        arsort($total);
        return $total;
    }

    public function normalisasi()
    {
        $krit = $this->kriteriaModel->findAll();
        $alt = $this->alternatifModel->findAll();
        $normal = $this->normalisasiMatrix();
        $u = [];
        foreach ($alt as $a) {
            $nor = [];
            foreach ($normal as $n) {
                if ($a['id_alternatif'] == $n['id_alt']) {
                    $nor[$n['id_krit']] = [
                        'nilai' =>  $n['nilai'],
                    ];
                }
            }
            $u[$a['id_alternatif']] = [
                'id_alt' => $a['id_alternatif'],
                'alt' => $a['alt'],
                'krit' => $nor,
            ];
        }
        $data = [
            'alt' => $alt,
            'krit' => $krit,
            'normal' => $u,
        ];
        return view('normalisasi', $data);
    }
    public function perkalian()
    {
        $krit = $this->kriteriaModel->findAll();
        $alt = $this->alternatifModel->findAll();
        $normalbobot = $this->normalXbobot();
        $total = $this->totalHasil();
        // dd($total);
        $u = [];
        foreach ($alt as $a) {
            $nor = [];
            foreach ($normalbobot as $n) {
                if ($a['id_alternatif'] == $n['id_alt']) {
                    $nor[$n['id_krit']] = [
                        'nilai' =>  $n['nilai'],
                    ];
                }
            }
            $u[$a['id_alternatif']] = [
                'id_alt' => $a['id_alternatif'],
                'alt' => $a['alt'],
                'krit' => $nor,
                'total' => $total[$a['id_alternatif']]['total']
            ];
        }
        $data = [
            'alt' => $alt,
            'krit' => $krit,
            'kali' => $u,
        ];
        return view('perkalian', $data);
    }
    public function perangkingan()
    {
        // $alt = $this->alternatifModel->findAll();
        // dd($alt[0]['id_alternatif']);
        $rank =  $this->rangking();
        $u = [];
        // foreach($alt as $a){
        //     $u[$rank[$a['id_alternatif']]] = [
        //         'alt' => $a['alt'],
        //         'total' => $rank[$a['id_alternatif']]['total'],
        //     ];
        // }
        // dd($u);
        foreach ($rank as $r) {
            $alt = $this->alternatifModel->where('id_alternatif', $r['id_alt'])->select('alt')->get()->getResultArray();
            $u[$r['id_alt']] = [
                'id_alt' => $r['id_alt'],
                'alt' => $alt[0]['alt'],
                'total' => $r['total'],
            ];
        }
        // d($u);
        $data = [
            'rank' => $u
        ];
        return view('perangkingan', $data);
    }
}
