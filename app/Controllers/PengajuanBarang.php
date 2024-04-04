<?php

namespace App\Controllers;

use App\Models\PengajuanModel;
use App\Models\UserModel;
use CodeIgniter\RESTful\ResourceController;

class PengajuanBarang extends BaseController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    private $modelpengajuan;
    private $title = 'Pengajuan Barang';


    public function __construct()
    {
        $this->modelpengajuan = new PengajuanModel();
    }



    public function index()
    {
        $pengajuan = $this->modelpengajuan->select('*')->join('tb_status_pengajuan', 'tb_pengajuan_barang.id_status_pengajuan = tb_status_pengajuan.id_status_pengajuan')->findAll();

        $data = [
            'title' => $this->title,
            'pengajuan' => $pengajuan
        ];

        return view('pengajuanview/list/index', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        return redirect()->to('pengajuanview/list');
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        $data = [
            'title' => $this->title
        ];

        return view('pengajuanview/list/new', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $dataGambar = $this->request->getFile('gambar');
        $fileName = '';
        if ($dataGambar->getError() == 4) {
            $this->alert->set('warning', 'Warning', 'Harus ada file yang diupload');
            return redirect()->to('pengajuanview/list/new');
        }
        $fileName = $dataGambar->getRandomName();

        $data = [
            'keterangan_barang' => $this->request->getVar('keterangan_barang'),
            'nama_pengaju' => $this->request->getVar('nama_pengaju'),
            'id_status_pengajuan' => 1,
            'gambar' => $fileName,
            'tanggal' => $this->request->getVar('tanggal')
        ];

        $dataGambar->move('assets/upload', $fileName);


        // dd($data);

        $res = $this->modelpengajuan->save($data);
        if ($res) {
            $this->alert->set('success', 'Success', 'Add Success');
        } else {
            $this->alert->set('warning', 'Warning', 'Add Failed');
        }
        return redirect()->to('pengajuanview/list');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $result = $this->modelpengajuan->find($id);
        if (!$result) {
            $this->alert->set('warning', 'Warning', 'NOT VALID');
            return redirect()->to('pengajuanview/list');
        }

        $data = [
            'title' => $this->title,
            'pengajuan' => $result
        ];

        return view('pengajuanview/list/edit', $data);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $data = [
            'id_pengajuan' => $this->request->getVar('id_pengajuan'),
            'keterangan_barang' => $this->request->getVar('keterangan_barang'),
            'nama_pengaju' => $this->request->getVar('nama_pengaju'),
            'id_status_pengajuan' => $this->request->getVar('id_status_pengajuan'),
            'tanggal' => $this->request->getVar('tanggal')
        ];

        if (session()->get('id_role') == 1) {
            $data = [
                'id_status_pengajuan' => htmlspecialchars($this->request->getVar('id_status_pengajuan'))
            ];
        }

        $res = $this->modelpengajuan->update($id, $data);

        if ($res) {
            $this->alert->set('success', 'Success', 'Update Success');
        } else {
            $this->alert->set('warning', 'Warning', 'Update Failed');
        }
        return redirect()->to('pengajuanview/list');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}
