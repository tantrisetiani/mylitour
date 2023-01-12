<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-map-marker-alt"></i> <?= $title; ?></h1>

    <div class="card shadow mb-4">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
        </div>
        <div class="card-body">
            <form action="<?= base_url('wilayah/tambah') ?>" id="form-tambah" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nama_wilayah"><strong>Nama Wilayah</strong></label>
                    <input type="text" id="nama_wilayah" name="nama_wilayah" placeholder="Contoh : Mejayan" class="form-control">
                    <?= form_error('nama_wilayah', '<small class="text-danger">', '</small>'); ?>
                </div>
                <hr>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
                <a href="<?php echo base_url() . 'wilayah' ?>" class="btn btn-secondary"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
            </form>
        </div>
    </div>
</div>
</div>

</html>