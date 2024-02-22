<?php

namespace App\Controllers;

use App\Models\AlternatifModel;
use App\Models\EvaluasiModel;
use App\Models\KriteriaModel;


class Home extends BaseController
{

    public function __construct()
    {
        $this->evaluasiModel        = new EvaluasiModel();
        $this->kriteriaModel        = new KriteriaModel();
        $this->alternatifModel      = new AlternatifModel();
    }
    public function index(): string
    {

        $alt = $this->alternatifModel->findAll();
        $krit = $this->kriteriaModel->findAll();
        $eval = $this->evaluasiModel->findAll();
        $val = $this->alternatifModel->findAll();
        $u = [];
        foreach ($val as $v) {
            $_1 = $this->evaluasiModel->where('id_alt', $v['id_alternatif'])->select('id_krit')->get()->getResultArray();
            $id = 0;
            $tes2 = [];
            foreach ($_1 as $q) {
                $tes2[$id] = $this->evaluasiModel->where(['id_alt' => $v['id_alternatif'], 'id_krit' => $q])->select('nilai')->get()->getResultArray();
                $id++;
            };
            $v['krit'] = $tes2;
            $u[$v['id_alternatif']] = $v;
        }
        $data = [
            'alt' => $alt,
            'krit' => $krit,
            'eval' => $eval,
            'val' => $u
        ];

        return view('home', $data);
    }
    public function apaitu()
    {
        return view('apaitu');
    }
    public function kenapa()
    {
        return view('kenapa');
    }
    public function kelompok()
    {
        return view('kelompok');
    }
}
