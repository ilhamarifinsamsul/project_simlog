<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\KategoriLogistikModel;
use App\Models\PenerimaanModel;
use App\Models\PengajuanModel;
use App\Models\PengeluaranModel;
use App\Models\UserModel;

class Dashboard extends BaseController
{
    private $modeluser;
    private $modelbarang;
    private $modelkategorilogistik;
    private $modelpenerimaan;
    private $modelpengeluaran;
    private $modelpengajuan;

    public function __construct()
    {
        $this->modeluser = new UserModel();
        $this->modelbarang = new BarangModel();
        $this->modelkategorilogistik = new KategoriLogistikModel();
        $this->modelpenerimaan = new PenerimaanModel();
        $this->modelpengeluaran = new PengeluaranModel();
        $this->modelpengajuan = new PengajuanModel();
    }


    public function index()
    {

        $data = [
            'title' => 'Dashboard'
        ];

        if (session()->get('id_role') == 5) {
            $chart = "( SELECT COUNT(id_pengajuan) AS COUNT FROM tb_pengajuan_barang WHERE id_pengajuan = tb_pengajuan_barang.id_pengajuan) AS count";
            $data['charts'] = $this->modelpengajuan->select('*')->groupBy('id_status_pengajuan')->select($chart)->findAll();

            $data['pengajuan_pending'] = $this->modelpengajuan->select('COUNT(id_pengajuan) AS count')->where('id_status_pengajuan', 1)->first()['count'];
            $data['pengajuan_done'] = $this->modelpengajuan->select('COUNT(id_pengajuan) AS count')->where('id_status_pengajuan', 2)->first()['count'];

            return view('dashboard/desa', $data);
        } else {

            $sub_chart = "( SELECT COUNT(id_barang) AS COUNT FROM tb_barang WHERE id_barang = tb_barang.id_barang) AS count";
            $data['chart'] = $this->modelbarang->select('nama_barang')->select('stok')->select($sub_chart)->findAll();
            $data['count_barang'] = count($this->modelbarang->findAll());
            $data['count_pengeluaran'] = $this->modelpengeluaran->select('COUNT(id_pengeluaran) as count')->first()['count'];
            $data['count_penerimaan'] = $this->modelpenerimaan->select('COUNT(id_penerimaan) as count')->first()['count'];
            $data['kategori'] = $this->modelkategorilogistik->findAll();


            return view('dashboard/index', $data);
        }
    }
}
