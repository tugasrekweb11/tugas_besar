<?php

use CodeIgniter\Model;

class ProdukModel extends Model
{
    // ini nama tabel dari produk
    protected $table = 'produk';
    protected $primaryKey = 'id_produk';

    /// mengambil data dari produk
    public function getAllProduk()
    {
        $result = $this->db->table('produk')
            ->join('produk_gambar', 'produk_gambar.id_produk = produk.id_produk')
            ->join('produk_kategori', 'produk_kategori.id_produk = produk.id_produk')
            ->join('produk_ukuran', 'produk_ukuran.id_produk = produk.id_produk')
            ->join('produk_rating', 'produk_rating.id_produk = produk.id_produk')
            ->join('produk_harga', 'produk_harga.id_produk = produk.id_produk')
            ->join('produk_diskon', 'produk_diskon.id_produk = produk.id_produk')
            ->join('jenis', 'jenis.id_jenis = produk.id_jenis')
            ->get()->getResultArray();

        return $this->formatDataProduk($result);
    }

    public function getByKategori($idKategori)
    {
        $result = $this->db->table('produk')
            ->join('produk_gambar', 'produk_gambar.id_produk = produk.id_produk')
            ->join('produk_kategori', 'produk_kategori.id_produk = produk.id_produk')
            ->join('produk_ukuran', 'produk_ukuran.id_produk = produk.id_produk')
            ->join('produk_rating', 'produk_rating.id_produk = produk.id_produk')
            ->join('produk_harga', 'produk_harga.id_produk = produk.id_produk')
            ->join('produk_diskon', 'produk_diskon.id_produk = produk.id_produk')

            ->join('jenis', 'jenis.id_jenis = produk.id_jenis')

            ->where('produk_to_kategori.id_kategori_1', $idKategori)
            ->orWhere('produk_to_kategori.id_kategori_2', $idKategori)
            ->orWhere('produk_to_kategori.id_kategori_3', $idKategori)
            ->get()
            ->getResultArray();

        return $this->formatDataProduk($result);
    }

    public function getByJenis($idJenis)
    {
        $result = $this->db->table('produk')
            ->join('produk_gambar', 'produk_gambar.id_produk = produk.id_produk')
            ->join('produk_kategori', 'produk_kategori.id_produk = produk.id_produk')
            ->join('produk_ukuran', 'produk_ukuran.id_produk = produk.id_produk')
            ->join('produk_rating', 'produk_rating.id_produk = produk.id_produk')
            ->join('produk_harga', 'produk_harga.id_produk = produk.id_produk')
            ->join('produk_diskon', 'produk_diskon.id_produk = produk.id_produk')

            ->join('jenis', 'jenis.id_jenis = produk.id_jenis')

            ->where('produk.id_jenis', $idJenis)
            ->get()
            ->getResultArray();

        return $this->formatDataProduk($result);
    }

    public function getByNama($namaProduk)
    {
        $result = $this->db->table('produk')
            ->join('produk_gambar', 'produk_gambar.id_produk = produk.id_produk')
            ->join('produk_kategori', 'produk_kategori.id_produk = produk.id_produk')
            ->join('produk_ukuran', 'produk_ukuran.id_produk = produk.id_produk')
            ->join('produk_rating', 'produk_rating.id_produk = produk.id_produk')
            ->join('produk_harga', 'produk_harga.id_produk = produk.id_produk')
            ->join('produk_diskon', 'produk_diskon.id_produk = produk.id_produk')

            ->join('jenis', 'jenis.id_jenis = produk.id_jenis')

            ->like('produk.nama_produk', $namaProduk)
            ->get()
            ->getResultArray();

        return $this->formatDataProduk($result);
    }

    public function getById($idProduk)
    {
        $result = $this->db->table('produk')
            ->join('produk_gambar', 'produk_gambar.id_produk = produk.id_produk')
            ->join('produk_kategori', 'produk_kategori.id_produk = produk.id_produk')
            ->join('produk_ukuran', 'produk_ukuran.id_produk = produk.id_produk')
            ->join('produk_rating', 'produk_rating.id_produk = produk.id_produk')
            ->join('produk_harga', 'produk_harga.id_produk = produk.id_produk')
            ->join('produk_diskon', 'produk_diskon.id_produk = produk.id_produk')

            ->join('jenis', 'jenis.id_jenis = produk.id_jenis')

            ->where('produk.id_produk', $idProduk)
            ->get()
            ->getResultArray();

        return $this->formatDataProduk($result);
    }



    public function getOrderRating($order)
    {
        $result = $this->db->table('produk')
            ->join('produk_gambar', 'produk_gambar.id_produk = produk.id_produk')
            ->join('produk_kategori', 'produk_kategori.id_produk = produk.id_produk')
            ->join('produk_ukuran', 'produk_ukuran.id_produk = produk.id_produk')
            ->join('produk_rating', 'produk_rating.id_produk = produk.id_produk')
            ->join('produk_harga', 'produk_harga.id_produk = produk.id_produk')
            ->join('produk_diskon', 'produk_diskon.id_produk = produk.id_produk')

            ->join('jenis', 'jenis.id_jenis = produk.id_jenis')

            ->orderBy('produk_rating.total_rating', $order)
            ->orderBy('produk.total_pesanan', $order)
            ->get()
            ->getResultArray();

        return $this->formatDataProduk($result);
    }

    public function getOrderProduk($order)
    {
        $result = $this->db->table('produk')
            ->join('produk_gambar', 'produk_gambar.id_produk = produk.id_produk')
            ->join('produk_kategori', 'produk_kategori.id_produk = produk.id_produk')
            ->join('produk_ukuran', 'produk_ukuran.id_produk = produk.id_produk')
            ->join('produk_rating', 'produk_rating.id_produk = produk.id_produk')
            ->join('produk_harga', 'produk_harga.id_produk = produk.id_produk')
            ->join('produk_diskon', 'produk_diskon.id_produk = produk.id_produk')

            ->join('jenis', 'jenis.id_jenis = produk.id_jenis')

            ->orderBy('produk.id_produk', $order)
            ->get()
            ->getResultArray();

        return $this->formatDataProduk($result);
    }

    public function getOrderHarga($order)
    {
        $result = $this->db->table('produk')
            ->join('produk_gambar', 'produk_gambar.id_produk = produk.id_produk')
            ->join('produk_kategori', 'produk_kategori.id_produk = produk.id_produk')
            ->join('produk_ukuran', 'produk_ukuran.id_produk = produk.id_produk')
            ->join('produk_rating', 'produk_rating.id_produk = produk.id_produk')
            ->join('produk_harga', 'produk_harga.id_produk = produk.id_produk')
            ->join('produk_diskon', 'produk_diskon.id_produk = produk.id_produk')

            ->join('jenis', 'jenis.id_jenis = produk.id_jenis')

            ->orderBy('produk_harga.harga_saat_ini', $order)
            ->get()
            ->getResultArray();

        return $this->formatDataProduk($result);
    }

    private function formatDataProduk($data)
    {
        $tempIdProduk = null;
        $dataProduk = null;
        foreach ($data as $listProduk) {
            if ($tempIdProduk != $listProduk["id_produk"]) {
                $produk =  [
                    "id_produk" => $listProduk["id_produk"],
                    "nama_produk" => $listProduk["nama_produk"],
                    "gambar" => $listProduk["gambar_1"],
                    "deskripsi_produk" => $listProduk["deskripsi_produk"],
                    "stok_produk" => intval($listProduk["stok_produk"]),
                    "total_pesanan" => intval($listProduk["total_pesanan"]),
                    "id_jenis" => intval($listProduk['id_jenis']),
                    "jenis" => $listProduk["nama_jenis"],
                ];

                $harga = [
                    "harga_normal" => intval($listProduk["harga_normal"]),
                    "harga_diskon" => intval($listProduk["harga_diskon"]),
                    "harga_saat_ini" => intval($listProduk["harga_saat_ini"])
                ];

                $diskon = [
                    "diskon_persen" => intval($listProduk["diskon_persen"]),
                    "total_produk" => $listProduk["total_produk"]
                ];

                $rating = [
                    "total_rating" => intval($listProduk["total_rating"]),
                    "bintang_1" => intval($listProduk["bintang_1"]),
                    "bintang_2" => intval($listProduk["bintang_2"]),
                    "bintang_3" => intval($listProduk["bintang_3"]),
                    "bintang_4" => intval($listProduk["bintang_4"]),
                    "bintang_5" => intval($listProduk["bintang_5"]),
                ];

                $gambar = [
                    "gambar_1" => $listProduk["gambar_1"],
                    "gambar_2" => $listProduk["gambar_2"],
                    "gambar_3" => $listProduk["gambar_3"],
                    "gambar_4" => $listProduk["gambar_4"],
                    "gambar_5" => $listProduk["gambar_5"],
                ];

                $ukuran = [
                    "id_ukuran_1" => $listProduk["id_ukuran_1"],
                    "id_ukuran_2" => $listProduk["id_ukuran_2"],
                    "id_ukuran_3" => $listProduk["id_ukuran_3"],
                    "id_ukuran_4" => $listProduk["id_ukuran_4"],
                    "id_ukuran_5" => $listProduk["id_ukuran_5"],
                    "id_ukuran_6" => $listProduk["id_ukuran_6"],
                ];

                $kategori = [
                    "id_kategori_1" => $listProduk["id_kategori_1"],
                    "id_kategori_2" => $listProduk["id_kategori_2"],
                    "id_kategori_3" => $listProduk["id_kategori_3"],
                ];

                $dataProduk[] = [
                    "produk" => $produk,
                    "harga" => $harga,
                    "diskon" => $diskon,
                    "rating" => $rating,
                    "gambar" => $gambar,
                    "ukuran" => $ukuran,
                    "kategori" => $kategori
                ];
            }

            $tempIdProduk =  $listProduk["id_produk"];
        }

        return $dataProduk;
    }


    /// menambah data produk
    public function insertProduk($data)
    {

        $insertTableProduk = $data['produk'];

        $resultProduk = $this->db->table($this->table)->insert($insertTableProduk);
        if ($resultProduk) {
            $idProduk = $this->insertID();
            $listGambar = $data['gambar'];
            $listKategori = $data['kategori'];
            $listUkuran = $data['ukuran'];
            $listHarga = $data['harga'];
            $listDiskon = $data['diskon'];

            $insertGambar = ["id_produk" => $idProduk];
            $insertGambar += $listGambar;

            $insertKategori = ["id_produk" => $idProduk];
            $insertKategori += $listKategori;

            $insertUkuran = ["id_produk" => $idProduk];
            $insertUkuran += $listUkuran;

            $insertDiskon = ["id_produk" => $idProduk];
            $insertDiskon += $listDiskon;

            $insertHarga = ["id_produk" => $idProduk];
            $insertHarga += $listHarga;

            $insertRating = [
                "id_produk" => $idProduk,
                "bintang_1" => 0,
                "bintang_2" => 0,
                "bintang_3" => 0,
                "bintang_4" => 0,
                "bintang_5" => 0,
            ];

            $this->db->table("produk_gambar")->insert($insertGambar);
            $this->db->table("produk_kategori")->insert($insertKategori);
            $this->db->table("produk_ukuran")->insert($insertUkuran);
            $this->db->table("produk_harga")->insert($insertHarga);
            $this->db->table("produk_diskon")->insert($insertDiskon);
            $this->db->table("produk_rating")->insert($insertRating);
        }
    }

    /// menambah data produk
    public function updateProduk($data, $idProduk)
    {

        $insertTableProduk = $data['produk'];
        $listHarga = $data['harga'];
        $listGambar = $data['gambar'];
        $listKategori = $data['kategori'];
        $listUkuran = $data['ukuran'];
        $listDiskon = $data['diskon'];

        $insertGambar = ["id_produk" => $idProduk];
        $insertGambar += $listGambar;

        $insertKategori = ["id_produk" => $idProduk];
        $insertKategori += $listKategori;

        $insertUkuran = ["id_produk" => $idProduk];
        $insertUkuran += $listUkuran;

        $insertDiskon = ["id_produk" => $idProduk];
        $insertDiskon += $listDiskon;


        $insertHarga = ["id_produk" => $idProduk];
        $insertHarga += $listHarga;

        $insertRating = [
            "id_produk" => $idProduk,
            "bintang_1" => 0,
            "bintang_2" => 0,
            "bintang_3" => 0,
            "bintang_4" => 0,
            "bintang_5" => 0,
        ];


        $this->db->table($this->table)->update($insertTableProduk, ["id_produk" => $idProduk]);
        $this->db->table("produk_gambar")->update($insertGambar, ["id_produk" => $idProduk]);
        $this->db->table("produk_kategori")->update($insertKategori, ["id_produk" => $idProduk]);
        $this->db->table("produk_ukuran")->update($insertUkuran, ["id_produk" => $idProduk]);
        $this->db->table("produk_harga")->update($insertHarga, ["id_produk" => $idProduk]);
        $this->db->table("produk_diskon")->update($insertDiskon, ["id_produk" => $idProduk]);
        $this->db->table("produk_rating")->update($insertRating, ["id_produk" => $idProduk]);
    }
}
