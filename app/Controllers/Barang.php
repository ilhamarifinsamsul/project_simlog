<?php

namespace App\Controllers;

use App\Models\KategoriLogistikModel;
use App\Models\BarangModel;
use App\Models\SatuanModel;
use CodeIgniter\RESTful\ResourceController;

class Barang extends BaseController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    private $modelbarang;
    private $modelkategorilogistik;
    private $modelsatuan;
    private $title = 'Barang';

    public function __construct()
    {
        $this->modelbarang = new BarangModel();
        $this->modelkategorilogistik = new KategoriLogistikModel();
        $this->modelsatuan = new SatuanModel();
    }

    public function index()
    {
        $barang = $this->modelbarang->select('tb_barang.*')->select('nama_barang')->select('nama_kategori')->select('nama_satuan')->join('tb_kategori', 'tb_barang.id_kategori = tb_kategori.id_kategori')->join('tb_satuan', 'tb_barang.id_satuan = tb_satuan.id_satuan')->orderBy('id_barang', 'DESC')->findAll();

        $data = [
            'title' => $this->title,
            'logistik' => $barang
        ];

        return view('barangview/list/index', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        return redirect()->to('barangview/list');
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        session();
        $data = [
            'title' => $this->title,
            'barang' => $this->modelbarang->findAll(),
            'kategori' => $this->modelkategorilogistik->findAll(),
            'satuan' => $this->modelsatuan->findAll(),
            'validation' => \Config\Services::validation()
        ];

        return view('barangview/list/new', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        // validasi input
        if (!$this->validate(
            [
                'nama_barang' => [
                    'rules' => 'required|is_unique[tb_barang.nama_barang]',
                    'errors' => [
                        'required' => '{field} barang harus diisi.',
                        'is_unique' => '{field} nama barang sudah terdaftar'
                    ]
                ]
            ]
        )) {
            $validation = \Config\Services::validation();
            if ($validation) {
                $this->alert->set('warning', 'Warning', 'Nama barang sudah terdaftar');
            }

            // dd($validation);
            // return redirect()->to('barangview/list/new')->withInput()->with('validation', $validation);
            return redirect()->to('barangview/list/new')->withInput();
        }

        $data = [
            'nama_barang' => $this->request->getVar('nama_barang'),
            'id_kategori' => htmlspecialchars($this->request->getVar('id_kategori'), true),
            'stok' => $this->request->getVar('stok'),
            'id_satuan' => htmlspecialchars($this->request->getVar('id_satuan'), true),
            'kondisi' => $this->request->getVar('kondisi')
        ];

        $res = $this->modelbarang->save($data);
        if ($res) {
            $this->alert->set('success', 'Success', 'Add Success');
        } else {
            $this->alert->set('warning', 'Warning', 'Add Failed');
        }

        return redirect()->to('barangview/list');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $result = $this->modelbarang->find($id);
        if (!$result) {
            $this->alert->set('warning', 'Warning', 'NOT VALID');
            return redirect()->to('barangview/list');
        }

        $data = [
            'title' => $this->title,
            'kategori' => $this->modelkategorilogistik->findAll(),
            'satuan' => $this->modelsatuan->findAll(),
            'logistik' => $result
        ];

        return view('barangview/list/edit', $data);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $data = [
            'nama_barang' => $this->request->getVar('nama_barang'),
            'id_kategori' => $this->request->getVar('id_kategori'),
            'stok' => $this->request->getVar('stok'),
            'id_satuan' => $this->request->getVar('id_satuan'),
            'kondisi' => $this->request->getVar('kondisi')
        ];
        $res = $this->modelbarang->update($id, $data);
        if ($res) {
            $this->alert->set('success', 'Success', 'Update Success');
        } else {
            $this->alert->set('warning', 'Warning', 'Update Failed');
        }
        return redirect()->to('barangview/list');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $result = $this->modelbarang->find($id);
        if (!$result) {
            $this->alert->set('warning', 'Warning', 'NOT VALID');
            return redirect()->to('barangview/list');
        }

        $res = $this->modelbarang->delete($id);
        if ($res) {
            $this->alert->set('success', 'Success', 'Delete Success');
        } else {
            $this->alert->set('warning', 'Warning', 'Delete Failed');
        }
        return redirect()->to('barangview/list');
    }
}
