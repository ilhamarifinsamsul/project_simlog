<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\BarangkModel;
use App\Models\SatuanModel;
use CodeIgniter\RESTful\ResourceController;

class Satuan extends BaseController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    private $modelsatuan;
    private $modelbarang;
    private $title = 'Satuan Logistik';

    public function __construct()
    {
        $this->modelsatuan = new SatuanModel();
        $this->modelbarang = new BarangModel();
    }

    public function index()
    {
        $data = [
            'title' => $this->title,
            'satuan' => $this->modelsatuan->findAll()
        ];

        return view('barangview/satuan/index', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        return redirect()->to('barangview/satuan');
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
        return view('barangview/satuan/new', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $data = [
            'nama_satuan' => $this->request->getVar('nama_satuan')
        ];

        $res = $this->modelsatuan->save($data);
        if ($res) {
            $this->alert->set('success', 'Success', 'Add Success');
        } else {
            $this->alert->set('warning', 'Warning', 'Add Failed');
        }
        return redirect()->to('barangview/satuan');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $result = $this->modelsatuan->find($id);
        if (!$result) {
            $this->alert->set('warning', 'Warning', 'NOT VALID');
            return redirect()->to('barangview/satuan');
        }

        $data = [
            'title' => $this->title,
            'satuan' => $result
        ];
        return view('barangview/satuan/edit', $data);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $data = [
            'nama_satuan' => $this->request->getVar('nama_satuan')
        ];

        $res = $this->modelsatuan->update($id, $data);
        if ($res) {
            $this->alert->set('success', 'Success', 'Update Success');
        } else {
            $this->alert->set('warning', 'Warning', 'Update Failed');
        }
        return redirect()->to('barangview/satuan');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $result = $this->modelsatuan->find($id);
        if (!$result) {
            $this->alert->set('warning', 'Warning', 'NOT VALID');
            return redirect()->to('barangview/satuan');
        }

        $res = $this->modelsatuan->delete($id);
        if ($res) {
            $this->alert->set('success', 'Success', 'Delete Success');
        } else {
            $this->alert->set('warning', 'Warning', 'Delete Failed');
        }
        return redirect()->to('barangview/satuan');
    }
}
