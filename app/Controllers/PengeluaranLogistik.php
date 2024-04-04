<?php

namespace App\Controllers;

use App\Models\KategoriLogistikModel;
use App\Models\BarangkModel;
use App\Models\BarangModel;
use App\Models\PengeluaranModel;
use App\Models\SatuanModel;
use CodeIgniter\RESTful\ResourceController;

class PengeluaranLogistik extends BaseController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    private $modelpengeluaran;
    private $modelbarang;
    private $modelkategorilogistik;
    private $modelsatuan;
    private $title = 'Pengeluaran Logistik';

    public function __construct()
    {
        $this->modelpengeluaran = new PengeluaranModel();
        $this->modelbarang = new BarangModel();
        $this->modelkategorilogistik = new KategoriLogistikModel();
        $this->modelsatuan = new SatuanModel();
    }

    public function index()
    {
        $pengeluaran = $this->modelpengeluaran->select('*')->join('tb_barang', 'tb_pengeluaran.id_barang = tb_barang.id_barang')->join('tb_kategori', 'tb_kategori.id_kategori = tb_barang.id_kategori')->join('tb_satuan', 'tb_satuan.id_satuan = tb_barang.id_satuan')->join('tb_status', 'tb_pengeluaran.id_status = tb_status.id_status')->orderBy('id_pengeluaran', 'DESC')->findAll();

        $data = [
            'title' => $this->title,
            'pengeluaran' => $pengeluaran
        ];



        return view('pengeluaranview/list/index', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        return redirect()->to('pengeluaranview/list');
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
            'satuan' => $this->modelsatuan->findAll()
        ];

        return view('pengeluaranview/list/new', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        // ambul data dari id_barang
        $id_barang = $this->request->getVar('id_barang');
        // SELECT * FROM tb_barang WHERE id_barang;
        $dataBarang = $this->modelbarang->find($id_barang);

        $stokAwal = $dataBarang['stok'];
        $stokKeluar = $this->request->getVar('jumlah');
        $stokAkhir = $stokAwal - $stokKeluar;

        if ($stokAkhir < 0) {
            $this->alert->set('warning', 'Warning',  'Jumlah Barang yang dikeluarkan melebihi stok');
            return redirect()->to('pengeluaranview/list/new');
        }

        // dd($stokAkhir);

        $dataStok = [
            'stok' => $stokAkhir
        ];

        $result = $this->modelbarang->update($id_barang, $dataStok);
        if ($result) {
            $this->alert->set('success', 'Success', 'Update Success');
        } else {
            $this->alert->set('warning', 'Warning', 'Update Failed');
        }

        // dd($_FILES);
        // dd($_POST);
        if (!$this->validate([
            'keterangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong'
                ]
            ],
            'gambar' => [
                'rules' => 'mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar,2048]',
                'errors' => [
                    'uploaded' => 'Harus Ada File yang diupload',
                    'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png',
                    'max_size' => 'Ukuran File Maksimal 5 MB'
                ]
            ]
        ])) {
            $this->alert->set('warning', 'Warning', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $dataGambar = $this->request->getFile('gambar');
        $fileName = '';
        if ($dataGambar->getError() == 4) {
            $this->alert->set('warning', 'Warning', 'Harus ada foto yang diupload');
            return redirect()->to('pengeluaranview/list/new');
            // $dataGambar->move('assets/upload', $fileName);
        }
        $fileName = $dataGambar->getRandomName();

        $data = [
            // 'id_barang' => $this->request->getVar('id_barang');
            'id_barang' => $this->request->getVar('id_barang'),
            // 'id_kategori' => $this->request->getVar('id_kategori'),
            'jumlah' => $this->request->getVar('jumlah'),
            // 'id_satuan' => $this->request->getVar('id_satuan'),
            'tanggal' => $this->request->getVar('tanggal'),
            'nama_penerima' => $this->request->getVar('nama_penerima'),
            'alamat' => $this->request->getVar('alamat'),
            'jenis_bencana' => $this->request->getVar('jenis_bencana'),
            'keterangan' => $this->request->getVar('keterangan'),
            'gambar' => $fileName,
            'id_status' => 1
        ];

        $dataGambar->move('assets/upload', $fileName);


        // dd($data);

        $res = $this->modelpengeluaran->save($data);
        if ($res) {
            $this->alert->set('success', 'Success', 'Add Success');
        } else {
            $this->alert->set('warning', 'Warning', 'Add Failed');
        }

        return redirect()->to('pengeluaranview/list');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        // dd($_POST);
        $result = $this->modelpengeluaran->select('*')->join('tb_kategori', 'tb_kategori.id_kategori = tb_kategori.id_kategori')->join('tb_satuan', 'tb_satuan.id_satuan = tb_satuan.id_satuan')->find($id);
        if (!$result) {
            $this->alert->set('warning', 'Warning', 'NOT VALID');
            return redirect()->to('pengeluaranview/list');
        }

        $data = [
            'title' => $this->title,
            'barang' => $this->modelbarang->findAll(),
            'kategori' => $this->modelkategorilogistik->findAll(),
            'satuan' => $this->modelsatuan->findAll(),
            'pengeluaran' => $result
        ];

        return view('pengeluaranview/list/edit', $data);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        // dd($_FILES);
        $result = $this->modelpengeluaran->find($id);
        if (!$result) {
            $this->alert->set('warning', 'warning', 'NOT VALID');
            return redirect()->to('pengeluaranview/list');
        }

        $dataGambar = $this->request->getFile('gambar');
        $fileName = '';

        $data = [
            'id_barang' => $this->request->getVar('id_barang'),
            // 'id_kategori' => $this->request->getVar('id_kategori'),
            'jumlah' => $this->request->getVar('jumlah'),
            // 'id_satuan' => $this->request->getVar('id_satuan'),
            'tanggal' => $this->request->getVar('tanggal'),
            'nama_penerima' => $this->request->getVar('nama_penerima'),
            'alamat' => $this->request->getVar('alamat'),
            'jenis_bencana' => $this->request->getVar('jenis_bencana'),
            'keterangan' => $this->request->getVar('keterangan')
        ];

        if (session()->get('id_role') == 2) {
            $data = [
                'id_status' => htmlspecialchars($this->request->getVar('id_status'))
            ];
        }

        if (session()->get('id_role') != 2) {

            if ($dataGambar->getError() != 4) {
                $fileName = $dataGambar->getRandomName();
                $dataGambar->move('assets/upload', $fileName);
                $data['gambar'] = $fileName;
            }
        }


        $res = $this->modelpengeluaran->update($id, $data);
        if ($res) {
            $this->alert->set('success', 'Success', 'Updated Success');
        } else {
            $this->alert->set('warning', 'Warning', 'Updated Failed');
        }


        return redirect()->to('pengeluaranview/list/index');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $result = $this->modelpengeluaran->find($id);
        if (!$result) {
            $this->alert->set('warning', 'Warning', 'NOT VALID');
            return redirect()->to('pengeluarankview/list');
        }

        $res = $this->modelpengeluaran->delete($id);
        if ($res) {
            $this->alert->set('success', 'Success', 'Delete Success');
        } else {
            $this->alert->set('warning', 'Warning', 'Delete Failed');
        }
        return redirect()->to('pengeluaranview/list');
    }
}
