        <main id="main">
            <?php foreach ($detailnaskah as $nk) : ?>
                <section class="potensi" id="potensi">
                    <div class="container">
                        <div class="section-title" data-aos="fade-up">
                            <h2><?= $nk->nama_potensi; ?></h2>
                        </div>

                        <div class="row justify-content-between" style="margin: 0 15px;">
                            <div class="col-lg-7 mt-5 mt-lg-0" data-aos="fade-up" data-aos-delay="300">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3" style="background-color: #494949">
                                        <h6 class="m-0 font-weight-bold text-white">Deskripsi <?= $nk->nama_potensi; ?></h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="informasi" style="text-align: justify;">
                                            <div class="row ">
                                                <div class="col-3 text-left">
                                                    <p><strong>Judul</strong></p>
                                                    <p><strong>Penjelasan</strong></p>
                                                </div>
                                                <div class="col-1">
                                                    <p><strong>:</strong></p>
                                                    <p><strong>:</strong></p>
                                                </div>
                                                <div class="col-8">
                                                    <p> <?= $nk->nama_potensi; ?></p>
                                                    <p><?= $nk->informasi; ?></p>
                                                </div>
                                            </div>

                                            <div class="row justify-content-start">
                                                <div class="col-3 ">
                                                    <p><strong>Referensi</strong></p>
                                                </div>
                                                <div class="col-1">
                                                    <p><strong>:</strong></p>
                                                </div>
                                                <div class="col-8">
                                                    <p><a href="<?= $nk->referensi; ?>" target="_blank"><?= $nk->referensi; ?></a></p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="300">
                                <img src="<?= base_url(); ?>assets/img/potensi/<?= $nk->foto_potensi; ?>" class="img-fluid" alt="">
                          
                            </div>
                        </div>
                    </div>
                </section>
        </main>
        <?php endforeach; ?>
        <!-- End #main -->
        <style type="text/css">
            .card {
                position: relative;
                display: flex;
                word-wrap: break-word;
                background-color: #fff;
                background-clip: border-box;
                border: 0 solid transparent;
                border-radius: 10;
            }

            img {
                width: 100%;
                max-width: 100%;
                max-height: 400px;
                -webkit-backface-visibility: hidden;
                border-radius: 10px;
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