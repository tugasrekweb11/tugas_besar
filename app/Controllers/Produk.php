<?php

namespace App\Controllers;

use Exception;
use JenisModel;
use KategoriModel;
use ProdukModel;
use UkuranModel;

use function PHPSTORM_META\type;

class Produk extends BaseController
{
    protected $produkModel;
    protected $ukuranModel;
    protected $kategoriModel;
    protected $jenisModel;

    public function __construct()
    {
        $this->produkModel = new ProdukModel();
        $this->ukuranModel = new UkuranModel();
        $this->kategoriModel = new KategoriModel();
        $this->jenisModel = new JenisModel();
    }

    public function index()
    {
        $produk = $this->produkModel->getAllProduk();
        $ukuran = $this->ukuranModel->getAll();
        $kategori = $this->kategoriModel->getAll();
        $data = [
            'title' => "Daftar Produk",
            'produk' => $produk,
            'ukuran' => $ukuran,
            'kategori' => $kategori
        ];
        return view('produk/index', $data);
    }

    public function detail($id)
    {

        $produk = $this->produkModel->getById($id);
        $ukuran = $this->ukuranModel->getAll();
        $kategori = $this->kategoriModel->getAll();
        $data = [
            'title' => "Detail",
            'produk' => $produk,
            'ukuran' => $ukuran,
            'kategori' => $kategori
        ];

        // cek jika tidak ada kemungkinan karena user mengarang ID di url
        if ($produk == null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('produk/detail', $data);
    }

    public function create()
    {
        $ukuran = $this->ukuranModel->getAll();
        $kategori = $this->kategoriModel->getAll();
        $jenis = $this->jenisModel->getAll();

        $data = [
            'title' => "Tambah Produk",
            'ukuran' => $ukuran,
            'kategori' => $kategori,
            'jenis' => $jenis,
            'validation' => \Config\Services::validation()
        ];
        return view("produk/create", $data);
    }



    public function delete($id)
    {
        $produk = $this->produkModel->getById($id);
        $gambar = $produk[0]['gambar'];


        for ($i = 0; $i < 5; $i++) {
            $key = $gambar["gambar_" . ($i + 1)];
            if ($key != null && $key != "") unlink('img/' . $key);
        }

        $this->produkModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil di hapus');
        return redirect()->to('/produk');
    }

    public function edit($id)
    {
        $produk = $this->produkModel->getById($id);
        $ukuran = $this->ukuranModel->getAll();
        $kategori = $this->kategoriModel->getAll();
        $jenis = $this->jenisModel->getAll();
        $data = [
            'title' => "Ubah Data",
            'produk' => $produk,
            'ukuran' => $ukuran,
            'kategori' => $kategori,
            'jenis' => $jenis,
            'validation' => \Config\Services::validation()
        ];

        // cek jika tidak ada kemungkinan karena user mengarang ID di url
        if ($produk == null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('produk/edit', $data);
    }


    public function save($id = null)
    {
        // jika $id di isi berarti maskud nya adalah untuk meng ubah data
        // jika kosong berarti menambah data
        $isEdit = ($id);

        if ($isEdit) {
            if (!$this->validate([
                'nama'     => 'required',
                'deskripsi' => 'required',
                'stok'     => 'required',
                'harga'    => 'required',
                'jenis'    => 'required',
                'kategori' => 'required',

            ])) {
                // jika id di isi kembalikan lagi ke halaman edit
                return redirect()->to("/produk/edit/$id")->withInput();
            }
        } else {
            if (!$this->validate([
                'nama'     => 'required',
                'deskripsi' => 'required',
                'stok'     => 'required',
                'harga'    => 'required',
                'jenis'    => 'required',
                'kategori' => 'required',
                'gambar_1' => [
                    'rules' => 'uploaded[gambar_1]|max_size[gambar_1,1024]|is_image[gambar_1]|mime_in[gambar_1,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'uploaded' => 'gambar 1 wajib di isi',
                        'max_size' => 'ukuran gambar terlalu besar',
                        'is_image' => 'yang anda pilih bukan gambar',
                        'mime_in'  => 'yang anda pilih bukan gambar'
                    ]
                ]

            ])) {
                return redirect()->to("/produk/create")->withInput();
            }
        }


        $listIdKategori = $this->request->getVar('kategori');
        $listIdUkuran = $this->request->getVar('ukuran');
        $daftarNamaGambar = [];

        if ($isEdit) {
            // 5 adalah jumlah maksimal gambar di tabel
            $tempData = $this->produkModel->getById($id);

            for ($i = 0; $i < 5; $i++) {
                $key = "gambar_" . ($i + 1);
                $fileGambar = $this->request->getFile($key);
                $gambarLama = $tempData[0]['gambar'][$key];

                try {
                    $namaGambar = $key . "_" . $fileGambar->getRandomName();
                    $fileGambar->move('img', $namaGambar);
                    $daftarNamaGambar[$i] = $namaGambar;

                    if ($gambarLama != null) unlink('img/' . $gambarLama);
                } catch (Exception $e) {
                    $namaGambar = $gambarLama;
                    $daftarNamaGambar[$i] = $namaGambar;
                }
            }
        } else {
            // 5 adalah jumlah maksimal gambar di tabel

            for ($i = 0; $i < 5; $i++) {
                $key = "gambar_" . ($i + 1);
                $fileGambar = $this->request->getFile($key);
                try {
                    $namaGambar = $key . "_" . $fileGambar->getRandomName();

                    $fileGambar->move('img', $namaGambar);
                    $daftarNamaGambar[$i] = $namaGambar;
                } catch (Exception $e) {
                    $daftarNamaGambar[$i] = null;
                }
            }
        }


        $gambar = [
            "gambar_1" => $daftarNamaGambar[0],
            "gambar_2" => $daftarNamaGambar[1],
            "gambar_3" => $daftarNamaGambar[2],
            "gambar_4" => $daftarNamaGambar[3],
            "gambar_5" => $daftarNamaGambar[4],
        ];

        $produk = [
            'nama_produk'      => $this->request->getVar('nama') ?? null,
            'deskripsi_produk' => $this->request->getVar('deskripsi') ?? null,
            'stok_produk'      => $this->request->getVar('stok') ?? null,
            'total_pesanan'    => 0,
            'total_wishlist'   => 0,
            'id_jenis'         => $this->request->getVar('jenis') ?? null,
        ];

        $harga_normal = $this->request->getVar('harga') ?? null;
        $harga_diskon = null;
        $harga_saat_ini = null;

        $diskon_persen = $this->request->getVar('diskon_persen') ?? null;
        $total_produk = $this->request->getVar('total_produk') ?? null;;

        if ($diskon_persen != null) {
            $harga_diskon = $harga_normal - (($diskon_persen / 100) * $harga_normal);
            $harga_saat_ini = $harga_diskon;

            if ($total_produk == null) $total_produk =  $this->request->getVar('stok');
        } else {
            $total_produk = null;
            $harga_saat_ini = $harga_normal;
        }

        $diskon = [
            'diskon_persen' => $diskon_persen,
            'total_produk'  => $total_produk
        ];

        $harga = [
            'harga_normal'    => $harga_normal,
            'harga_diskon'    => $harga_diskon,
            'harga_saat_ini'  => $harga_saat_ini
        ];

        $kategori = [
            "id_kategori_1" => $listIdKategori[0] ?? null,
            "id_kategori_2" => $listIdKategori[1] ?? null,
            "id_kategori_3" => $listIdKategori[2] ?? null
        ];

        $ukuran = [
            "id_ukuran_1" => $listIdUkuran[0] ?? null,
            "id_ukuran_2" => $listIdUkuran[1] ?? null,
            "id_ukuran_3" => $listIdUkuran[2] ?? null,
            "id_ukuran_4" => $listIdUkuran[3] ?? null,
            "id_ukuran_5" => $listIdUkuran[4] ?? null,
            "id_ukuran_6" => $listIdUkuran[5] ?? null
        ];

        $data = [
            "produk" => $produk,
            "gambar" => $gambar,
            "harga"   => $harga,
            "kategori" => $kategori,
            "ukuran" => $ukuran,
            "diskon" => $diskon
        ];

        if ($id) {
            $this->produkModel->updateProduk($data, $id);
        } else {
            $this->produkModel->insertProduk($data);
        }

        session()->setFlashdata('pesan', 'Data `' . $this->request->getVar('nama') . '` berhasil ' . (($id) ? 'di ubah' : 'di tambahkan'));
        return redirect()->to("/produk");
    }
}
