<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-list-ul"></i> <?= $title; ?></h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
        </div>
        <div class="card-body">
            <?php foreach ($kategori as $ktr) : ?>
                <form action="<?= base_url('kategori/fungsiUpdate') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label><strong>Jenis Kategori</strong></label>
                        <input type="hidden" name="id_kategori" class="form-control" value="<?php echo $ktr->id_kategori ?>">
                        <input type="text" name="jenis_kategori" class="form-control" value="<?php echo $ktr->jenis_kategori ?>">
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;Simpan</button>
                    <?= anchor('kategori/', '<div class="btn btn-secondary"><i class="fa fa-reply"></i>&nbsp;Kembali</div>') ?>
                </form>
            <?php endforeach; ?>
        </div>
    </div>
</div>
</div>