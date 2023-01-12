<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h3 class="text-center"><?= $title; ?> <?= $detail->nama_potensi; ?></h3>
            <table class="table">
                <div class="col-lg-8 col-md-4">
                    <div class="white-box text-center">
                        <img src="<?php echo base_url(); ?>assets/img/potensi/<?= $detail->foto_potensi; ?>" class="imgcenter">
                    </div>

                    <tr>
                        <th> Kategori Potensi</th>
                        <td><?php echo $detail->jenis_kategori; ?></td>
                    </tr>
                    <tr>
                        <th> Wilayah Potensi</th>
                        <td><?php echo $detail->nama_wilayah; ?></td>
                    </tr>
                    <tr>
                        <th> Video Potensi</th>
                        <td><?php echo $detail->video_youtube; ?></td>
                    </tr>
                    <tr>
                        <th>Informasi Potensi</th>
                        <td class="text-justify"><?php echo $detail->informasi; ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal Update</th>
                        <td><?php echo date('l, d-M-Y', strtotime($detail->tanggal_update));   ?></td>
                    </tr>
                    <tr>
                        <th>Referensi (Naskah Kuno)</th>
                        <td><?php echo $detail->referensi; ?></td>
                    </tr>
                </div>
            </table>
            <a href="<?php echo base_url() . 'potensi' ?>" class="btn btn-secondary"><i class="fas fa-reply"></i>&nbsp;Kembali</a>
        </div>
    </div>
</div>
</div>
<br>

</html>

<style type="text/css">
    .imgcenter {
        display: block;
        object-fit: cover;
        margin-bottom: 20px;
        margin-left: 165px;
    }

    img {
        width: 100%;
        max-height: 400px;
        max-width: 100%;
        -webkit-backface-visibility: hidden;
    }

    @media (max-width: 575px) {
        .imgcenter {
            display: block;
            object-fit: cover;
            margin-bottom: 20px;
            margin-left: 1px;
        }
    }

    @media (min-width: 576px) {
        .imgcenter {
            display: block;
            object-fit: cover;
            margin-bottom: 20px;
            margin-left: 1px;
        }
    }

    @media (min-width: 768px) {
        .imgcenter {
            display: block;
            object-fit: cover;
            margin-bottom: 20px;
            margin-left: 75px;
        }
    }

    @media (min-width: 992px) {
        .imgcenter {
            display: block;
            object-fit: cover;
            margin-bottom: 20px;
            margin-left: 125px;
        }
    }

    @media (min-width: 1200px) {
        .imgcenter {
            display: block;
            object-fit: cover;
            margin-bottom: 20px;
            margin-left: 175px;
        }
    }
</style>