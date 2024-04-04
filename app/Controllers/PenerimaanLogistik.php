<?php

namespace App\Controllers;

use App\Models\KategoriLogistikModel;
use App\Models\BarangModel;
use App\Models\PenerimaanModel;
use App\Models\SatuanModel;
use CodeIgniter\RESTful\ResourceController;

class PenerimaanLogistik extends BaseController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    private $modelpenerimaan;
    private $modelbarang;
    private $modelkategorilogistik;
    private $modelsatuan;
    private $title = 'Penerimaan Barang';

    public function __construct()
    {
        $this->modelpenerimaan = new PenerimaanModel();
        $this->modelbarang = new BarangModel();
        $this->modelkategorilogistik = new KategoriLogistikModel();
        $this->modelsatuan = new SatuanModel();
    }


    public function index()
    {
        $penerimaan = $this->modelpenerimaan->select('*')->join('tb_barang', 'tb_penerimaan.id_barang = tb_barang.id_barang')->join('tb_kategori', 'tb_kategori.id_kategori = tb_barang.id_kategori')->join('tb_satuan', 'tb_satuan.id_satuan = tb_barang.id_satuan')->join('tb_status', 'tb_penerimaan.id_status = tb_status.id_status')->orderBy('id_penerimaan', 'DESC')->findAll();

        $data = [
            'title' => $this->title,
            'penerimaan' => $penerimaan
        ];

        return view('penerimaanview/list/index', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        return redirect()->to('penerimaanview/list');
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        $data = [
            'title' => $this->title,
            'barang' => $this->modelbarang->findAll(),
            'kategori' => $this->modelkategorilogistik->findAll(),
            'satuan' => $this->modelsatuan->findAll(),

        ];

        return view('penerimaanview/list/new', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {

        // ambil data dari id_barang
        $id_barang  = $this->request->getVar('id_barang');
        // SELECT * FROM tb_barang WHERE id_barang=1;
        $dataBarang = $this->modelbarang->find($id_barang);
        // d($dataBarang);

        $stokAwal = $dataBarang['stok'];
        $stokTambah = $this->request->getVar('jumlah');
        $stokAkhir = $stokAwal + $stokTambah;

        $dataSTok = [
            'stok' => $stokAkhir
        ];

        $result = $this->modelbarang->update($id_barang, $dataSTok);
        if ($result) {
            $this->alert->set('success', 'Success', 'Update Success');
        } else {
            $this->alert->set('warning', 'Warning', 'Update Failed');
        }


        // dd();
        $data = [
            'id_barang' => $this->request->getVar('id_barang'),
            // 'id_kategori' => htmlspecialchars($this->request->getVar('id_kategori'), true),
            'jumlah' => $this->request->getVar('jumlah'),
            // 'id_satuan' => htmlspecialchars($this->request->getVar('id_satuan'), true),
            'tanggal' => $this->request->getVar('tanggal'),
            'id_status' => 1
        ];

        // dd($data);

        $res = $this->modelpenerimaan->save($data);
        if ($res) {
            $this->alert->set('success', 'Success', 'Add Success');
        } else {
            $this->alert->set('warning', 'Warning', 'Add Failed');
        }
        return redirect()->to('penerimaanview/list');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $result = $this->modelpenerimaan->select('*')->join('tb_kategori', 'tb_kategori.id_kategori = tb_kategori.id_kategori')->join('tb_satuan', 'tb_satuan.id_satuan = tb_satuan.id_satuan')->find($id);
        if (!$result) {
            $this->alert->set('warning', 'Warning', 'NOT VALID');
            return redirect()->to('penerimaanview/list');
        }

        $data = [
            'title' => $this->title,
            'barang' => $this->modelbarang->findAll(),
            'kategori' => $this->modelkategorilogistik->findAll(),
            'satuan' => $this->modelsatuan->findAll(),
            'penerimaan' => $result
        ];
        // dd($data);

        return view('penerimaanview/list/edit', $data);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $data = [
            'id_barang' => $this->request->getVar('id_barang'),
            'id_kategori' => $this->request->getVar('id_kategori'),
            'jumlah' => $this->request->getVar('jumlah'),
            'id_satuan' => $this->request->getVar('id_satuan'),
            'tanggal' => $this->request->getVar('tanggal'),

        ];

        if (session()->get('id_role') == 2) {
            $data = [
                'id_status' => htmlspecialchars($this->request->getVar('id_status'))
            ];
        }

        $res = $this->modelpenerimaan->update($id, $data);

        if ($res) {
            $this->alert->set('success', 'Success', 'Update Success');
        } else {
            $this->alert->set('warning', 'Warning', 'Update Failed');
        }
        return redirect()->to('penerimaanview/list');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $result = $this->modelpenerimaan->find($id);
        if (!$result) {
            $this->alert->set('warning', 'Warning', 'NOT VALID');
            return redirect()->to('penerimaankview/list');
        }

        $res = $this->modelpenerimaan->delete($id);
        if ($res) {
            $this->alert->set('success', 'Success', 'Delete Success');
        } else {
            $this->alert->set('warning', 'Warning', 'Delete Failed');
        }
        return redirect()->to('penerimaanview/list');
    }
}
