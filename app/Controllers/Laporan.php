<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BarangModel;
use App\Models\KategoriLogistikModel;
use App\Models\PenerimaanModel;
use App\Models\PengeluaranModel;
use App\Models\SatuanModel;

class Laporan extends BaseController
{
    private $modelbarang;
    private $modelpenerimaan;
    private $modelpengeluaran;
    private $modelkategorilogistik;
    private $modelsatuan;
    private $title = 'Laporan';

    public function __construct()
    {
        $this->modelbarang = new BarangModel();
        $this->modelpenerimaan = new PenerimaanModel();
        $this->modelpengeluaran = new PengeluaranModel();
        $this->modelkategorilogistik = new KategoriLogistikModel();
        $this->modelsatuan = new SatuanModel();
    }

    public function index()
    {
        $start = (htmlspecialchars($this->request->getVar('start'), true) == '') ? date('Y-m-d') : htmlspecialchars($this->request->getVar(
            'start'
        ), true);

        $end = (htmlspecialchars($this->request->getVar('end'), true) == '') ? date('Y-m-d') : htmlspecialchars($this->request->getVar('end'), true);

        $data = [
            'title' => $this->title . ' Barang',
            'start' => $start,
            'end' => $end,
            'barang' => $this->modelbarang->select('*')->join('tb_kategori', 'tb_barang.id_kategori = tb_kategori.id_kategori')->join('tb_satuan', 'tb_barang.id_satuan = tb_satuan.id_satuan')->where('CONVERT(tb_barang.created_at, DATE) >=', $start)->where('CONVERT(tb_barang.created_at, DATE) <=', $end)->findAll()
        ];

        return view('laporan/barangLaporan', $data);
    }

    public function penerimaan()
    {
        // ambil data tanggal awal
        $start = (htmlspecialchars($this->request->getVar('start'), true) == '') ? date('Y-m-d') : htmlspecialchars($this->request->getVar(
            'start'
        ), true);

        // ambil data tanggal akhir
        $end = (htmlspecialchars($this->request->getVar('end'), true) == '') ? date('Y-m-d') : htmlspecialchars($this->request->getVar('end'), true);

        // ambil data keseluruhan penerimaan di database
        $data = [
            'title' => $this->title . ' Penerimaan Barang',
            'start' => $start,
            'end' => $end,
            'penerimaan' => $this->modelpenerimaan->select('*')->join('tb_barang', 'tb_penerimaan.id_barang = tb_barang.id_barang')->join('tb_kategori', 'tb_kategori.id_kategori = tb_barang.id_kategori')->join('tb_satuan', 'tb_satuan.id_satuan = tb_barang.id_satuan')->join('tb_status', 'tb_penerimaan.id_status = tb_status.id_status')->where('CONVERT(tb_penerimaan.created_at, DATE) >=', $start)->where('CONVERT(tb_penerimaan.created_at, DATE) <=', $end)->findAll()
        ];

        return view('laporan/penerimaanLaporan', $data);
    }

    public function pengeluaran()
    {
        // ambil data tanggal awal
        $start = (htmlspecialchars($this->request->getVar('start'), true) == '') ? date('Y-m-d') : htmlspecialchars($this->request->getVar(
            'start'
        ), true);

        // ambil data tanggal akhir
        $end = (htmlspecialchars($this->request->getVar('end'), true) == '') ? date('Y-m-d') : htmlspecialchars($this->request->getVar('end'), true);

        // ambil keseluruhan data pengeluran di database
        $data = [
            'title' => $this->title . ' Pengeluaran Barang',
            'start' => $start,
            'end' => $end,
            'pengeluaran' => $this->modelpengeluaran->select('*')->join('tb_barang', 'tb_pengeluaran.id_barang = tb_barang.id_barang')->join('tb_kategori', 'tb_kategori.id_kategori = tb_barang.id_kategori')->join('tb_satuan', 'tb_satuan.id_satuan = tb_barang.id_satuan')->join('tb_status', 'tb_pengeluaran.id_status = tb_status.id_status')->where('CONVERT(tb_pengeluaran.created_at, DATE) >=', $start)->where('CONVERT(tb_pengeluaran.created_at, DATE) <=', $end)->findAll()
        ];

        return view('laporan/pengeluaranLaporan', $data);
    }

    public function cetak()
    {
        // ambil data tanggal awal
        $start = $this->request->getVar('start');
        $start = ($start) ? $start : date('Y-m-d');

        // ambil data tanggal akhir
        $end = $this->request->getVar('end');
        $end = ($end) ? $end : date('Y-m-d');



        // ambil keseluruhan data pengeluran di database
        $data = [
            'title' => $this->title . ' Pengeluaran Barang',
            'start' => $start,
            'end' => $end,
            'pengeluaran' => $this->modelpengeluaran->select('*')->join('tb_barang', 'tb_pengeluaran.id_barang = tb_barang.id_barang')->join('tb_kategori', 'tb_kategori.id_kategori = tb_barang.id_kategori')->join('tb_satuan', 'tb_satuan.id_satuan = tb_barang.id_satuan')->join('tb_status', 'tb_pengeluaran.id_status = tb_status.id_status')->where('CONVERT(tb_pengeluaran.created_at, date) >=', $start)->where('CONVERT(tb_pengeluaran.created_at, date) <=', $end)->findAll()
        ];

        return view('laporan/cetak', $data);
    }

    public function cetakBarang()
    {
        $start = $this->request->getVar('start');
        $start = ($start) ? $start : date('Y-m-d');

        $end = $this->request->getVar('end');
        $end = ($end) ? $end : date('Y-m-d');

        $data = [
            'title' => $this->title . ' Barang',
            'start' => $start,
            'end' => $end,
            'barang' => $this->modelbarang->select('*')->join('tb_kategori', 'tb_barang.id_kategori = tb_kategori.id_kategori')->join('tb_satuan', 'tb_barang.id_satuan = tb_satuan.id_satuan')->where('CONVERT(tb_barang.created_at, DATE) >=', $start)->where('CONVERT(tb_barang.created_at, DATE) <=', $end)->findAll()
        ];

        return view('laporan/cetakBarang', $data);
    }

    public function cetakPenerimaan()
    {
        $start = $this->request->getVar('start');
        $start = ($start) ? $start : date('Y-m-d');

        $end = $this->request->getVar('end');
        $end = ($end) ? $end : date('Y-m-d');

        $data = [
            'title' => $this->title . ' Penerimaan Barang',
            'start' => $start,
            'end' => $end,
            'penerimaan' => $this->modelpenerimaan->select('*')->join('tb_barang', 'tb_penerimaan.id_barang = tb_barang.id_barang')->join('tb_kategori', 'tb_kategori.id_kategori = tb_barang.id_kategori')->join('tb_satuan', 'tb_satuan.id_satuan = tb_barang.id_satuan')->join('tb_status', 'tb_penerimaan.id_status = tb_status.id_status')->where('CONVERT(tb_penerimaan.created_at, DATE) >=', $start)->where('CONVERT(tb_penerimaan.created_at, DATE) <=', $end)->findAll()
        ];

        return view('laporan/cetakPenerimaan', $data);
    }
}
