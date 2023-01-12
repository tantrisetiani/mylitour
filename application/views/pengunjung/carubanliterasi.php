<?php foreach ($detailclh as $clh) : ?>
    <main id="main">
        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Detail Caruban Literasi Hub</h2>
                    <ol>
                        <li><a href="<?= base_url('pengunjung') ?>">Home</a></li>
                        <li><a href="<?= base_url('pengunjung/detail_clh'); ?>"></a>Detail <?= $clh->id_potensi; ?></li>
                    </ol>
                </div>
            </div>
        </section>
        <!-- End Breadcrumbs Section -->

        <section class="inner-page">
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center" style="margin: 20px 0;">
                            <h3><?= $clh->nama_potensi; ?></h3>
                        </div>
                        <div class="col-lg-8 col-md-4">
                            <div class="white-box text-center">
                                <img src="<?= base_url(); ?>assets/img/potensi/<?= $clh->foto_potensi; ?>" class="imgcenter">
                            </div>
                        </div>
                        <div class="informasi" style="text-align: justify;">
                            <p>
                                <?= $clh->informasi; ?>
                            </p>

                            <h10 class="deskripsi-unggah"> <i> Diunggah Pada : <?php echo date('l, d-M-Y', strtotime($clh->tanggal_update));   ?></i></h10>
                        </div>
                    </div>
                </div>
        </section>
    </main>
<?php endforeach; ?>
<!-- End #main -->
<style type="text/css">
    .card {
        margin-bottom: 20px;
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0 solid transparent;
        border-radius: 10;
    }

    body {
        background: #efefef;
    }

    img {
        width: 100%;
        max-width: 100%;
        max-height: 400px;
        -webkit-backface-visibility: hidden;
    }

    .imgcenter {
        display: block;
        object-fit: cover;
        margin-bottom: 20px;
    }

    .informasi {
        margin: 0 20px;
    }


    @media (min-width: 768px) {
        .imgcenter {
            display: block;
            object-fit: cover;
            margin-bottom: 20px;
            margin: 0 165px;
        }
    }

    @media (min-width: 992px) {
        .imgcenter {
            display: block;
            object-fit: cover;
            margin-bottom: 20px;
            margin: 0 165px;
        }
    }

    @media (min-width: 1200px) {
        .imgcenter {
            display: block;
            object-fit: cover;
            margin-bottom: 20px;
            margin: 0 165px;
        }
    }
</style>