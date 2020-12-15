<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="/user/">Tugas Besar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

                <?php if (isset($jenis)) : ?>
                    <ul class="navbar-nav">
                        <?php foreach ($jenis as $j) : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/user/home?j=<?= $j['id_jenis']; ?>"><?= $j['nama_jenis']; ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Urutkan
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/user/home?har=asc">termurah</a>
                        <a class="dropdown-item" href="/user/home?har=desc">termahal</a>
                        <a class="dropdown-item" href="/user/home?rat=desc">terpopuler</a>
                        <a class="dropdown-item" href="/user/home?id=desc">terbaru</a>
                        <a class="dropdown-item" href="/user/home?id=asc">terlama</a>
                    </div>
                </li>

                <form action="/user/home" method="GET" class="form-inline my-2 my-lg-0">
                    <div class="row">
                        <div class="col-md-2">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">cari</button>
                        </div>
                        <div class="col-md-10">
                            <input class="form-control mr-sm-2" type="search" placeholder="cari produk" name="s">
                        </div>
                    </div>


                </form>
            </ul>
        </div>

        <div class="row">
            <?php if (logged_in()) : ?>
                <div class="col-md-5">
                    <a class="btn btn-secondary" type="submit" href="/logout">Logout</a>
                </div>
            <?php else : ?>
                <div class="col-md-5">
                    <a class="btn btn-outline-secondary my-2 my-sm-0" type="submit" href="/login">Login</a>
                </div>
                <div class="col-md-5">
                    <a type="button" class="btn btn-secondary" href="/register">Daftar</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</nav>