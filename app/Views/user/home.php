<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?= $this->include('layout/navbar_user'); ?>

<div class="container">

    UPDATE TESTING
    UPDATE TESTING
    UPDATE TESTING
    UPDATE TESTING
    UPDATE TESTING




    <!--
    <div class="row mt-5">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <blockquote class="blockquote">
                        <p class="mb-0">Jenis</p>
                        <footer class="blockquote-footer">pilih berdasarkan <cite title="Source Title">Jenis</cite></footer>
                    </blockquote>

                    <div class="row">
                        <?php foreach ($jenis as $j) : ?>
                            <div class="col-md-3 mt-3">
                                <button type="button" class="btn btn-light col-12 text-truncate"><?= $j['nama_jenis']; ?></button>
                            </div>
                        <?php endforeach; ?>
                    </div>


                    <blockquote class="blockquote mt-5">
                        <p class="mb-0">Kategori</p>
                        <footer class="blockquote-footer">pilih berdasarkan <cite title="Source Title">Kategori</cite></footer>
                    </blockquote>

                    <div class="row">
                        <?php foreach ($kategori as $k) : ?>
                            <div class="col-md-3 mt-3">
                                <button type="button" class="btn btn-light col-12 text-truncate"><?= $k['nama_kategori']; ?></button>
                            </div>
                        <?php endforeach; ?>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-9">
            <blockquote class="blockquote">
                <p class="mb-0">fashion terpopuler nih</p>
                <footer class="blockquote-footer">cari berdasarkan <cite title="Source Title">Kategori</cite></footer>
            </blockquote>
        </div>
    </div>
     -->

    <div class="row">
        <?php if ($produk == null) : ?>
            <h1>Data Tidak Di temukan</h1>
        <?php else : ?>
            <?php foreach ($produk as $data) : ?>

                <?php
                $p = $data["produk"];
                $h = $data["harga"];
                $d = $data["diskon"];
                $r = $data["rating"];
                ?>


                <div class="col-md-3 mt-5"> <a class="nav-link" href="/produk/<?= $p['id_produk']; ?>">
                        <div class="card">
                            <img src="/img/<?= $p["gambar"]; ?>" class="card-img-top">
                            <div class="card-body">
                                <div class="row">
                                    <p class="col-12 text-truncate text-dark card-title primary"><?= $p["nama_produk"]; ?></p>
                                </div>

                                <?php if ($d['diskon_persen'] != null || $d['diskon_persen'] > 0) : ?>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p class="badge badge-success"><?= $d["diskon_persen"]; ?> %</p>
                                        </div>

                                        <div class="col-md-9">
                                            <p class="text-secondary font-weight-light"><s> Rp. <?= number_format($h["harga_normal"]); ?></s></p>
                                        </div>

                                    </div>

                                <?php endif; ?>

                                <h6 class="text-dark card-text font-weight-bold">Rp. <?= number_format($h["harga_saat_ini"]); ?></h6>

                                <div class="row">
                                    <div class="col-md-8">


                                        <?php for ($i = 0; $i < 5; $i++) : ?>
                                            <img src="/assets/img/<?= ($r['total_rating'] > $i) ? 'star_true.png' : 'star_false.png'; ?>" width="15">
                                        <?php endfor; ?>
                                    </div>

                                    <div class="col-md-4">
                                        <p class="text-right text-secondary font-weight-light">(<?= $p['total_pesanan']; ?>)</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </a>
                </div>


            <?php endforeach; ?>
        <?php endif ?>
    </div>
</div>
<?= $this->endSection(); ?>