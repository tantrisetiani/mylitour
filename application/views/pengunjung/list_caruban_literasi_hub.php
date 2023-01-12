<main id="main">
    <section class="potensi" id="potensi">
        <div class="container">
            <div class="section-title" data-aos="fade-up">
                <h2>Caruban Literasi Hub</h2>
            </div>
            <div class="row">
                <?php foreach ($carubanliterasihub as $calihub) : ?>
                    <div class="col-lg-4 col-md-4">
                        <div class="card shadow mb-4">
                            <div class="card-body small">
                                <h6 class="text-center"><strong><?= $calihub->nama_potensi; ?></strong></h6>
                                <div class="text-center">
                                    <a href="<?= base_url('pengunjung/detail_caruban_literasi_hub/'); ?><?= $calihub->slug; ?>" target="_blank">
                                        <img src=" <?= base_url(); ?>assets/img/potensi/<?= $calihub->foto_potensi; ?>" alt="" class="img-fluid" style="object-fit: cover;" width="700px" height="300px" id="responsive" target="_blank">
                                    </a>
                                </div>
                                <div class="mb-2">
                                    <span class="badge badge-primary"><?= $calihub->nama_wilayah; ?></span>
                                </div>
                                <div class="mb-1">
                                    <i class="fab fa-youtube"></i>&emsp;
                                    <a href="<?= $calihub->video_youtube; ?>" class="glightbox play-btn mb-4" style="color: black;">Tonton Video</a>
                                </div>
                                <div class="mb-1">
                                    <i class="fas fa-calendar-alt"></i>&emsp;
                                    <?php echo date('l, d-M-Y', strtotime($calihub->tanggal_update));   ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</main>