<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\KategoriModel;
use App\Models\LokasiModel;
use App\Models\BarangMasukModel;
use App\Models\BarangKeluarModel;

class Barang extends BaseController
{
    protected $barangModel;
    protected $kategoriModel;
    protected $lokasiModel;
    protected $barangMasukModel;
    protected $barangKeluarModel;

    public function __construct()
    {
        // Cek login
        if (!session()->get('logged_in')) {
            header('Location: ' . base_url('login'));
            exit;
        }

        // Load model
        $this->barangModel = new BarangModel();
        $this->kategoriModel = new KategoriModel();
        $this->lokasiModel = new LokasiModel();
        $this->barangMasukModel = new BarangMasukModel();
        $this->barangKeluarModel = new BarangKeluarModel();
    }

    public function index()
    {
        $db = \Config\Database::connect();
        $data['barang'] = $db->table('barang')
            ->select('barang.*, kategori.nama_kategori, lokasi.nama_lokasi')
            ->join('kategori', 'kategori.id = barang.kategori_id')
            ->join('lokasi', 'lokasi.id = barang.lokasi_id')
            ->get()
            ->getResultArray();
        return view('barang/index', $data);
    }

    public function create()
    {
        $data['kategori'] = $this->kategoriModel->findAll();
        $data['lokasi']   = $this->lokasiModel->findAll();
        return view('barang/create', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'nama_barang' => 'required|min_length[3]|max_length[255]',
            'kategori_id'    => 'required|integer',
            'stok'        => 'required|integer|greater_than_equal_to[0]',
            'satuan'      => 'required',
            'lokasi_id'      => 'required|integer',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        
        $this->barangModel->save([
            'nama_barang' => $this->request->getPost('nama_barang'),
            'kategori_id' => $this->request->getPost('kategori_id'),
            'stok'        => $this->request->getPost('stok'),
            'satuan'      => $this->request->getPost('satuan'),
            'lokasi_id'   => $this->request->getPost('lokasi_id'),
        ]);

        session()->setFlashdata('success', 'Data barang berhasil ditambahkan.');
        return redirect()->to('/barang');
    }

    public function edit($id)
    {
        $data['barang']   = $this->barangModel->find($id);
        $data['kategori'] = $this->kategoriModel->findAll();
        $data['lokasi']   = $this->lokasiModel->findAll();
        return view('barang/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'nama_barang' => 'required|min_length[3]|max_length[255]',
            'kategori_id'    => 'required|is_natural_no_zero',
            'stok'        => 'required|integer|greater_than_equal_to[0]',
            'satuan'      => 'required',
            'lokasi_id'      => 'required|is_natural_no_zero',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->barangModel->update($id, [
            'nama_barang' => $this->request->getPost('nama_barang'),
            'kategori_id' => $this->request->getPost('kategori_id'),
            'stok'        => $this->request->getPost('stok'),
            'satuan'      => $this->request->getPost('satuan'),
            'lokasi_id'   => $this->request->getPost('lokasi_id'),
        ]);

        session()->setFlashdata('success', 'Data barang berhasil diperbarui.');
        return redirect()->to('/barang');
    }

    public function delete($id)
    {
        $this->barangModel->delete($id);
        return redirect()->to('/barang');
    }

    // FORM: Barang Masuk
    public function formMasuk()
    {
        $data['barang'] = $this->barangModel->findAll();
        $data['masuk']  = $this->barangMasukModel->getMasukWithBarang();
        return view('barang/form_masuk', $data);
    }

    // FORM: Barang Keluar
    public function formKeluar()
    {
        $data['barang'] = $this->barangModel->findAll();
        $data['keluar'] = $this->barangKeluarModel->getKeluarWithBarang();
        return view('barang/form_keluar', $data);
    }

    // Proses Barang Masuk
    public function proses_masuk()
    {
        $id = $this->request->getPost('id_barang');
        $jumlah = (int) $this->request->getPost('jumlah');

        $barang = $this->barangModel->find($id);
        if ($barang) {
            $newStock = $barang['stok'] + $jumlah;
            $this->barangModel->update($id, ['stok' => $newStock]);

            $this->barangMasukModel->save([
                'id_barang' => $id,
                'jumlah' => $jumlah,
                'tanggal' => date('Y-m-d H:i:s'),
            ]);

            session()->setFlashdata('success', 'Barang masuk berhasil ditambahkan.');
        } else {
            session()->setFlashdata('error', 'Barang tidak ditemukan.');
        }

        return redirect()->to('/barang/form_masuk');
    }

    // Proses Barang Keluar
    public function proses_keluar()
    {
        $id = $this->request->getPost('id_barang');
        $jumlah = (int) $this->request->getPost('jumlah');

        $barang = $this->barangModel->find($id);
        if ($barang) {
            $newStock = max(0, $barang['stok'] - $jumlah);
            $this->barangModel->update($id, ['stok' => $newStock]);

            $this->barangKeluarModel->save([
                'id_barang' => $id,
                'jumlah' => $jumlah,
                'tanggal' => date('Y-m-d H:i:s'),
            ]);

            session()->setFlashdata('success', 'Barang keluar berhasil diproses.');
        } else {
            session()->setFlashdata('error', 'Barang tidak ditemukan.');
        }

        return redirect()->to('/barang/form_keluar');
    }
}
