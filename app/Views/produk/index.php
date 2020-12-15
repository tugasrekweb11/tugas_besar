<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>



<?php $u_2 = $ukuran; ?>
<?php $k_2 = $kategori; ?>

<div class="container">



    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>

    <?php if ($produk == null) {
        echo "<h3>Tidak ada data</h3>";
        die();
    } ?>

    <div class="row">
        <div class="col">
            <a href="/produk/create" class="btn btn-primary mt-3">Tambah Data</a>
            <h3>Daftar Komik</h3>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Sampul</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Diskon</th>
                        <th scope="col">Jenis</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($produk as $data) : ?>
                        <?php $p = $data["produk"]; ?>
                        <?php $k = $data["kategori"]; ?>
                        <?php $h = $data["harga"]; ?>
                        <?php $d = $data["diskon"]; ?>
                        <tr>
                            <th scope="row"><?= $p['id_produk']; ?></th>
                            <td><img src="/img/<?= $p['gambar']; ?>" class="gambar" width="100px"></td>
                            <td><?= $p['nama_produk']; ?></td>
                            <td><?= $h['harga_saat_ini']; ?></td>
                            <td><?= ($d['diskon_persen'] !== null) ? $d['diskon_persen'] . " %" : "tidak ada"; ?></td>
                            <td><?= $p['jenis']; ?></td>
                            <td>
                                <ul>
                                    <?php
                                    $maxCol = 3;
                                    for ($i = 0; $i < $maxCol; $i++) {
                                        $id_kategori = $k["id_kategori_" . ($i + 1)];
                                        if ($id_kategori  !== null && trim($id_kategori, "") !== "") {
                                            foreach ($k_2 as $kategori) {
                                                if ($kategori['id_kategori'] == $id_kategori) { ?>
                                                    <li>
                                                        <h5><?= $kategori['nama_kategori']; ?></h5>
                                                    </li>
                                    <?php }
                                            }
                                        }
                                    } ?>
                                </ul>
                            </td>

                            <td>

                                <ul class="list-group">
                                    <li class="list-group-item"><a href="/produk/edit/<?= $p['id_produk']; ?> " class="alarm btn btn-warning">Edit</a></li>

                                    <li class="list-group-item">
                                        <form action="/produk/<?= $p['id_produk']; ?>" method="POST">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('yakin ingin menghapus ? ');">
                                                Delete
                                            </button>
                                        </form>
                                    </li>
                                </ul>


                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>