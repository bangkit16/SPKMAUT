<?php

namespace App\Controllers;

use App\Models\AlternatifModel;
use App\Models\EvaluasiModel;
use App\Models\KriteriaModel;

class Alternatif extends BaseController
{
    public function __construct()
    {
        $this->evaluasiModel        = new EvaluasiModel();
        $this->kriteriaModel        = new KriteriaModel();
        $this->alternatifModel      = new AlternatifModel();
    }
    public function tambahAlternatif()
    {
        $krit = $this->kriteriaModel->findAll();
        $data = ['krit' => $krit];
        return view('tambahAlternatif', $data);
    }
    public function addAlt()
    {
        $alt = $this->alternatifModel;
        $krit = $this->kriteriaModel->findAll();
        $alternatif = $this->request->getVar('alt');
        $nilai = $this->request->getVar('nilai');
        $this->alternatifModel->insert([
            'alt' =>  $alternatif
        ]);
        $idAlt = $alt->getInsertID();
        for ($i = 0; $i < count($krit); $i++) {
            $this->evaluasiModel->save([
                'id_alt' =>  $idAlt,
                'id_krit' => $krit[$i]['id_kriteria'],
                'nilai' => $nilai[$i]
            ]);
        }
        return redirect()->to(base_url());
    }
    public function hapusAlt($id)
    {
        $this->alternatifModel->delete([$id]);
        $this->evaluasiModel->where('id_alt', $id)->delete();

        return redirect()->to(base_url());
    }
    public function editAlt($id)
    {
        $krit = $this->kriteriaModel->findColumn('krit');
        $idkrit = $this->kriteriaModel->findColumn('id_kriteria');
        $nilai = $this->evaluasiModel->where('id_alt', $id)->select('nilai')->get()->getResultArray();
        for ($i = 0; $i < count($nilai); $i++) {
            $nilai[$i]['krit'] = $krit[$i];
            $nilai[$i]['id_krit'] = $idkrit[$i];
        }
        // dd($krite['nilai'][2]['nilai']);
        $alt = $this->alternatifModel->find($id);
        $data = [

            'nilai' => $nilai,
            'id' => $id,
            'alt' => $alt['alt']
        ];
        return view('editAlternatif', $data);
    }
    public function updateAlt()
    {
        $alt = $this->alternatifModel;
        $alternatif = $this->request->getVar('alt');
        $id = $this->request->getVar('id');
        $nilai = $this->request->getVar('nilai');
        $idkrit = $this->request->getVar('id_krit');
        $alt->save([
            'id_alternatif' => $id,
            'alt' =>  $alternatif
        ]);
        // dd($idkrit);
        for ($i = 0; $i < count($nilai); $i++) {
            $this->evaluasiModel->where('id_alt', $id)->where('id_krit', $idkrit[$i])->set(['nilai' => $nilai[$i]])->update();
        }
        return redirect()->to(base_url());
    }
}
