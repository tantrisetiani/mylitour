<main id="main">
    <section class="potensi" id="potensi">
        <div class="container">
            <div class="section-title" data-aos="fade-up">
                <h2><?= $title; ?></h2>
            </div>
            <div class="row g-0" data-aos="fade-left">
                <?php foreach ($kearifan_lokal as $kearifan) : ?>
                    <div class="col-lg-4 col-md-4">
                        <div class="potensi-item" data-aos="zoom-in" data-aos-delay="100">
                            <div class="youtube">
                                <p style="position: absolute; top: 10px; right: 10px;">
                                    <a href="<?= $kearifan->video_youtube; ?>" class="glightbox play-btn mb-4" target="_blank" class="mt-0">
                                        <i class="fab fa-2x fa-youtube" aria-hidden="true"></i>
                                    </a>
                                </p>
                            </div>
                            <a href="<?= base_url('pengunjung/potensi360/'); ?><?= $kearifan->slug; ?>" target="_blank">
                                <img src=" <?= base_url(); ?>assets/img/potensi/<?= $kearifan->foto_potensi; ?>" alt="" class="img-fluid" width="100%" id="responsive">
                            </a>
                            <div class="img-title">
                                <h6><a href="<?= base_url('pengunjung/potensi360/'); ?><?= $kearifan->slug; ?>" target="_blank">
                                        <?= $kearifan->nama_potensi; ?></a></h6>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</main>

<script type="text/javascript">
    var slug = function(str) {
        var $slug = '';
        var trimmed = $.trim(str);
        $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
        replace(/-+/g, '-').
        replace(/^-|-$/g, '');
        return $slug.toLowerCase();
    }
    $('.nama_potensi').on('keyup', function() {
        $('.preview_slug').val(slug($(this).val()));
    });
</script>