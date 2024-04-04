<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\KategoriLogistikModel;
use App\Models\BarangkModel;
use CodeIgniter\RESTful\ResourceController;

class KategoriLogistik extends BaseController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    private $modelkategorilogistik;
    private $modelbarang;
    private $title = 'Kategori Barang';
    public function __construct()
    {
        $this->modelkategorilogistik = new KategoriLogistikModel();
        $this->modelbarang = new BarangModel();
    }


    public function index()
    {
        $data = [
            'title' => $this->title,
            'kategori' => $this->modelkategorilogistik->findAll()
        ];

        return view('barangview/kategori/index', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        return redirect()->to('barangview/kategori');
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

        return view('barangview/kategori/new', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $data = [
            'nama_kategori' => $this->request->getVar('nama_kategori')
        ];

        $res = $this->modelkategorilogistik->save($data);
        if ($res) {
            $this->alert->set('success', 'Success', 'Add Success');
        } else {
            $this->alert->set('warning', 'Warning', 'Add Failed');
        }
        return redirect()->to('barangview/kategori');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $result = $this->modelkategorilogistik->find($id);
        if (!$result) {
            $this->alert->set('warning', 'Warning', 'NOT VALID');
            return redirect()->to('barangview/kategori');
        }

        $data = [
            'title' => $this->title,
            'kategori' => $result
        ];

        return view('barangview/kategori/edit', $data);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $data = [
            'nama_kategori' => $this->request->getVar('nama_kategori')
        ];

        $res = $this->modelkategorilogistik->update($id, $data);
        if ($res) {
            $this->alert->set('success', 'Success', 'Update Success');
        } else {
            $this->alert->set('warning', 'Warning', 'Update Failed');
        }
        return redirect()->to('barangview/kategori');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $result = $this->modelkategorilogistik->find($id);
        if (!$result) {
            $this->alert->set('warning', 'Warning', 'NOT VALID');
            return redirect()->to('barangview/kategori');
        }
        $res = $this->modelkategorilogistik->delete($id);
        if ($res) {
            $this->alert->set('success', 'Success', 'Delete Success');
        } else {
            $this->alert->set('warning', 'Warning', 'Delete Failed');
        }
        return redirect()->to('barangview/kategori');
    }
}
