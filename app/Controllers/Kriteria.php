<?php

namespace App\Controllers;

use App\Models\AlternatifModel;
use App\Models\EvaluasiModel;
use App\Models\KriteriaModel;

class Kriteria extends BaseController
{
    public function __construct()
    {
        $this->evaluasiModel        = new EvaluasiModel();
        $this->kriteriaModel        = new KriteriaModel();
        $this->alternatifModel      = new AlternatifModel();
    }
    public function tambahKriteria()
    {
        $alt = $this->alternatifModel->findAll();
        $data = ['alt' => $alt];
        return view('tambahKriteria', $data);
    }
    public function addKrit()
    {
        $krit = $this->kriteriaModel;
        $alt = $this->alternatifModel->findAll();
        $namakrit = $this->request->getVar('krit');
        $jenis = $this->request->getVar('jenis');
        $bobot = (float) $this->request->getVar('bobot');
        $nilai = $this->request->getVar('nilai');
        $this->kriteriaModel->insert([
            'krit' =>  $namakrit,
            'bobot' => $bobot,
            'jenis' => $jenis
        ]);
        $idkrit = $krit->getInsertID();
        for ($i = 0; $i < count($alt); $i++) {
            $this->evaluasiModel->save([
                'id_krit' =>  $idkrit,
                'id_alt' => $alt[$i]['id_alternatif'],
                'nilai' => $nilai[$i]
            ]);
        }
        return redirect()->to(base_url());
    }
    public function hapusKrit($id)
    {
        $this->kriteriaModel->delete([$id]);
        $this->evaluasiModel->where('id_krit', $id)->delete();

        return redirect()->to(base_url());
    }
    public function editKrit($id)
    {
        $alt = $this->alternatifModel->findColumn('alt');
        $idalt = $this->alternatifModel->findColumn('id_alternatif');
        $nilai = $this->evaluasiModel->where('id_krit', $id)->select('nilai')->get()->getResultArray();
        for ($i = 0; $i < count($nilai); $i++) {
            $nilai[$i]['alt'] = $alt[$i];
            $nilai[$i]['id_alt'] = $idalt[$i];
        }
        // dd($krite['nilai'][2]['nilai']);
        $krit = $this->kriteriaModel->find($id);
        $data = [

            'nilai' => $nilai,
            'id' => $id,
            'krit' => $krit['krit'],
            'bobot' => $krit['bobot'],
            'jenis' => $krit['jenis']
        ];
        return view('editKriteria', $data);
    }
    public function updateKrit()
    {
        $krit = $this->kriteriaModel;
        $kriteria = $this->request->getVar('krit');
        $bobot = $this->request->getVar('bobot');
        $id = $this->request->getVar('id');
        $nilai = $this->request->getVar('nilai');
        $idalt = $this->request->getVar('id_alt');
        $jenis = $this->request->getVar('jenis');
        $krit->save([
            'id_kriteria' => $id,
            'krit' =>  $kriteria,
            'bobot' => $bobot,
            'jenis' => $jenis,
        ]);
        // dd($idkrit);
        for ($i = 0; $i < count($nilai); $i++) {
            $this->evaluasiModel->where('id_krit', $id)->where('id_alt', $idalt[$i])->set(['nilai' => $nilai[$i]])->update();
        }
        return redirect()->to(base_url());
    }   
}
