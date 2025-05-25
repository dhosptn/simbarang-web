<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\BarangMasukModel;
use App\Models\BarangKeluarModel;

class Barang extends BaseController
{
    protected $barangModel;
    protected $barangMasukModel;
    protected $barangKeluarModel;

    public function __construct()
    {
        $this->barangModel = new BarangModel();
        $this->barangMasukModel = new BarangMasukModel();
        $this->barangKeluarModel = new BarangKeluarModel();
    }

    public function index()
    {
        $data['barang'] = $this->barangModel->findAll();
        return view('barang/index', $data);
    }

    public function create()
    {
        return view('barang/create');
    }

    public function store()
    {
        if (!$this->validate([
            'nama_barang' => 'required|min_length[3]|max_length[255]',
            'kategori'    => 'required',
            'stok'        => 'required|integer|greater_than_equal_to[0]',
            'satuan'      => 'required',
            'lokasi'      => 'required',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->barangModel->save([
            'nama_barang' => $this->request->getPost('nama_barang'),
            'kategori'    => $this->request->getPost('kategori'),
            'stok'        => $this->request->getPost('stok'),
            'satuan'      => $this->request->getPost('satuan'),
            'lokasi'      => $this->request->getPost('lokasi'),
        ]);

        session()->setFlashdata('success', 'Data barang berhasil ditambahkan.');
        return redirect()->to('/barang');
    }

    public function edit($id)
    {
        $data['barang'] = $this->barangModel->find($id);
        return view('barang/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'nama_barang' => 'required|min_length[3]|max_length[255]',
            'kategori'    => 'required',
            'stok'        => 'required|integer|greater_than_equal_to[0]',
            'satuan'      => 'required',
            'lokasi'      => 'required',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->barangModel->update($id, [
            'nama_barang' => $this->request->getPost('nama_barang'),
            'kategori'    => $this->request->getPost('kategori'),
            'stok'        => $this->request->getPost('stok'),
            'satuan'      => $this->request->getPost('satuan'),
            'lokasi'      => $this->request->getPost('lokasi'),
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