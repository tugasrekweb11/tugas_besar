<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>


<?php

// Data dari produk
$data = $produk[0];
$p = $data["produk"];
$h = $data["harga"];
$d = $data["diskon"];
$r = $data["rating"];
$g = $data["gambar"];
$u = $data["ukuran"];
$k = $data["kategori"];
// Data dari ukuran
$u_2 = $ukuran;
$k_2 = $kategori;
?>


<div class="container">
    <form action="/produk/save/<?= $p['id_produk']; ?>" method="POST" enctype="multipart/form-data">
        <?= csrf_field(); ?>

        <div class="col mt-5">
            <h3>Ubah Produk</h3>
            <p>Produk yang sudah di ubah akan langsung di tampilkan ke halaman user</p>
        </div>


        <div class="row justify-content-center mt-5">
            <div class="col-md">
                <div class="form-group row-sm-2">
                    <div class="input-group mb-3">

                        <div class="row-md">
                            <img src="/img/<?= $g['gambar_1'] ?? "default_upload_img.png"; ?>" class="img-thumbnail img-preview_1" alt="" width="200">
                        </div>

                        <div class="row-md">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input  <?= ($validation->hasError('gambar_1')) ? 'is-invalid' : ''; ?>" id="gambar_1" name="gambar_1" onchange="previewImg('#gambar_1','.label_gambar_1','.img-preview_1')">
                                <div class=" invalid-feedback">
                                    <?= $validation->getError('gambar_1'); ?>
                                </div>
                                <label class="custom-file-label label_gambar_1" for="gambar_1">Gambar 1</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md">
                <div class="form-group row-sm-2">
                    <div class="input-group mb-3">

                        <div class="row-md">
                            <img src="/img/<?= $g['gambar_2'] ?? "default_upload_img.png"; ?>" class="img-thumbnail img-preview_2" alt="" width="200">
                        </div>

                        <div class="row-md">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input  <?= ($validation->hasError('gambar_2')) ? 'is-invalid' : ''; ?>" id="gambar_2" name="gambar_2" onchange="previewImg('#gambar_2','.label_gambar_2','.img-preview_2')">
                                <div class=" invalid-feedback">
                                    <?= $validation->getError('gambar_2'); ?>
                                </div>
                                <label class="custom-file-label label_gambar_2" for="gambar_2">Gambar 2</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md">
                <div class="form-group row-sm-2">
                    <div class="input-group mb-3">

                        <div class="row-md">
                            <img src="/img/<?= $g['gambar_3'] ?? "default_upload_img.png"; ?>" class="img-thumbnail img-preview_3" alt="" width="200">
                        </div>

                        <div class="row-md">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input  <?= ($validation->hasError('gambar_3')) ? 'is-invalid' : ''; ?>" id="gambar_3" name="gambar_3" onchange="previewImg('#gambar_3','.label_gambar_3','.img-preview_3')">
                                <div class=" invalid-feedback">
                                    <?= $validation->getError('gambar_3'); ?>
                                </div>
                                <label class="custom-file-label label_gambar_3" for="gambar_3">Gambar 3</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md">
                <div class="form-group row-sm-2">
                    <div class="input-group mb-3">

                        <div class="row-md">
                            <img src="/img/<?= $g['gambar_4'] ?? "default_upload_img.png"; ?>" class="img-thumbnail img-preview_4" alt="" width="200">
                        </div>

                        <div class="row-md">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input  <?= ($validation->hasError('gambar_4')) ? 'is-invalid' : ''; ?>" id="gambar_4" name="gambar_4" onchange="previewImg('#gambar_4','.label_gambar_4','.img-preview_4')">
                                <div class=" invalid-feedback">
                                    <?= $validation->getError('gambar_4'); ?>
                                </div>
                                <label class="custom-file-label label_gambar_4" for="gambar_4">Gambar 4</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md">
                <div class="form-group row-sm-2">
                    <div class="input-group mb-3">

                        <div class="row-md">
                            <img src="/img/<?= $g['gambar_5'] ?? "default_upload_img.png"; ?>" class="img-thumbnail img-preview_5" alt="" width="200">
                        </div>

                        <div class="row-md">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input  <?= ($validation->hasError('gambar_5')) ? 'is-invalid' : ''; ?>" id="gambar_5" name="gambar_5" onchange="previewImg('#gambar_5','.label_gambar_5','.img-preview_5')">
                                <div class=" invalid-feedback">
                                    <?= $validation->getError('gambar_5'); ?>
                                </div>
                                <label class="custom-file-label label_gambar_5" for="gambar_5">Gambar 5</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <div class="card pt-2 pb-2 pl-4 pr-4 mb-4 mt-4">
            <h4>Informasi Produk</h4>
            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= old('nama') ?? $p['nama_produk']; ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('nama'); ?>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="deskripsi">Deskripsi Produk</label>
                <div class="col-sm-10">
                    <textarea class="form-control <?= ($validation->hasError('deskripsi')) ? 'is-invalid' : ''; ?>" id="deskripsi" rows="5" name="deskripsi"><?= old('deskripsi') ?? $p['deskripsi_produk']; ?></textarea>
                    <div class="invalid-feedback">
                        <?= $validation->getError('deskripsi'); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md">
                <div class="card pt-2 pb-2 pl-4 pr-4 mb-4 mt-4">
                    <h4>Ketersediaan</h4>
                    <div class="form-group row">
                        <label for="stok" class="col-sm-4 col-form-label">Stok</label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control <?= ($validation->hasError('stok')) ? 'is-invalid' : ''; ?>" id="stok" name="stok" value="<?= old('stok') ?? $p['stok_produk']; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('stok'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="harga" class="col-sm-4 col-form-label">harga</label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control <?= ($validation->hasError('harga')) ? 'is-invalid' : ''; ?>" id="harga" name="harga" value="<?= old('harga') ?? $h['harga_normal']; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('harga'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md">
                <div class="card pt-2 pb-2 pl-4 pr-4 mb-4 mt-4">
                    <h4>Diskon</h4>

                    <div class="form-group row">
                        <label for="diskon_persen" class="col-sm-4 col-form-label">Persen</label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control" id="diskon_persen" name="diskon_persen" value="<?= $d['diskon_persen']; ?>">

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="total_produk" class="col-sm-4 col-form-label">Total Produk</label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control" id="total_produk" name="total_produk" value="<?= $d['total_produk']; ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card pt-2 pb-2 pl-4 pr-4 mb-4 mt-4">
            <h4>Detail Produk</h4>
            <div class="row justify-content-center">
                <div class="col-md">
                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-4 pt-0">Jenis</legend>
                            <div class="col-sm-8">
                                <?php if ($validation->hasError('jenis')) : ?>
                                    <p class="text-danger"> <?= $validation->getError('jenis'); ?></p>
                                <?php endif; ?>
                                <?php foreach ($jenis as $j) : ?>
                                    <?php $idJenis = (old('jenis') ?? $p['id_jenis']);  ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jenis" id="jenis_<?= $j['id_jenis']; ?>" value="<?= $j['id_jenis']; ?>" <?= ($idJenis == $j['id_jenis']) ? "checked" : ""; ?>>
                                        <label class="form-check-label" for="jenis_<?= $j['id_jenis']; ?>">
                                            <?= $j['nama_jenis']; ?>
                                        </label>
                                    </div>
                                <?php endforeach; ?>

                            </div>
                        </div>
                    </fieldset>
                </div>


                <div class="col-md">
                    <div class="form-group row">
                        <div class="col-sm-4">Kategori</div>
                        <div class="col-sm-8">
                            <?php if ($validation->hasError('kategori')) : ?>
                                <p class="text-danger"> <?= $validation->getError('kategori'); ?></p>
                            <?php endif; ?>

                            <?php $i = 0;
                            foreach ($kategori as $k) :

                                $idNow = $k['id_kategori'];
                                $checked = false;

                                if (old('kategori') != null) {
                                    foreach (old('kategori') as $id) {
                                        if ($id == $idNow) {
                                            $checked = true;
                                            break;
                                        }
                                    }
                                } else {
                                    $ks = $data['kategori'];
                                    for ($i = 0; $i < 3; $i++) {
                                        $key = "id_kategori_" . ($i + 1);
                                        if ($ks[$key] == $idNow) {
                                            $checked = true;
                                            break;
                                        }
                                    }
                                }
                            ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="kategori[]" value=<?= $k['id_kategori']; ?> <?= ($checked) ? "checked" : ""; ?>>
                                    <label class="form-check-label" for="kategori">
                                        <?= $k['nama_kategori']; ?>
                                    </label>

                                </div>
                            <?php $i++;
                            endforeach; ?>
                        </div>
                    </div>
                </div>


                <div class="col-md">
                    <div class="form-group row">
                        <div class="col-sm-4">Ukuran</div>
                        <div class="col-sm-8">
                            <?php $i = 0;
                            foreach ($ukuran as $u) :


                                $idNow = $u['id_ukuran'];
                                $checked = false;

                                if (old('ukuran') != null) {
                                    foreach (old('ukuran') as $id) {
                                        if ($id == $idNow) {
                                            $checked = true;
                                            break;
                                        }
                                    }
                                } else {
                                    $us = $data['ukuran'];
                                    for ($i = 0; $i < 6; $i++) {
                                        $key = "id_ukuran_" . ($i + 1);
                                        if ($us[$key] == $idNow) {
                                            $checked = true;
                                            break;
                                        }
                                    }
                                }


                            ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="ukuran[]" value=<?= $u['id_ukuran']; ?> <?= ($checked) ? "checked" : ""; ?>>
                                    <label class="form-check-label" for="ukuran">
                                        <?= $u['nama_ukuran']; ?>
                                    </label>
                                </div>
                            <?php $i++;
                            endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>






        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-warning">Ubah</button>
            </div>
        </div>
    </form>
</div>


<?= $this->endSection(); ?>