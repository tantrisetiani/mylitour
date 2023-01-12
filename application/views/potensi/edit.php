        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-street-view"></i> <?= $title; ?></h1>
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
                </div>
                <div class="card-body">
                    <form action="<?php base_url('potensi/edit/'); ?><?= $potensi['id_potensi']; ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_potensi" id="id_potensi" value="<?= $potensi['id_potensi']; ?>" />
                        <input type="hidden" name="slug" id="slug" value="<?= $potensi['slug']; ?>">
                        <div class="form-group">
                            <label for="nama_potensi"><strong>Nama Potensi</strong></label>
                            <input type="text" class="form-control" id="nama_potensi" name="nama_potensi" value="<?php echo $potensi['nama_potensi']; ?>" onkeyup="createTextSlug()">
                            <?= form_error('nama_potensi', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="id_kategori"><strong>Kategori Potensi</strong></label>
                            <select class="form-control" name="id_kategori">
                                <option value="">--Pilih Kategori--</option>
                                <?php foreach ($kategori as $kate) : ?>
                                    <option <?= ($kate['id_kategori'] == $potensi['id_kategori'] ? 'selected=""' : '') ?> value="<?= $kate['id_kategori']; ?>"><?= $kate['jenis_kategori']; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_wilayah"><strong>Wilayah Potensi</strong></label>
                            <select class="form-control" name="id_wilayah">
                                <option value="">--Pilih Wilayah--</option>
                                <?php foreach ($wilayah as $wil) : ?>
                                    <option <?= ($wil['id_wilayah'] == $potensi['id_wilayah'] ? 'selected=""' : '') ?> value="<?= $wil['id_wilayah']; ?>"><?= $wil['nama_wilayah']; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="video_youtube"><strong>Video Potensi</strong></label>
                            <input type="text" class="form-control" id="video_youtube" name="video_youtube" value="<?php echo $potensi['video_youtube']; ?>">
                            <?= form_error('video_youtube', '<small class="text-danger">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <label><strong>Sejarah Potensi</strong></label>
                                </div>
                                <div class="panel-body">
                                    <textarea class="ckeditor" id="editor-custom" name="informasi"><?php echo $potensi['informasi'] ?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="tanggal_update"><strong>Tanggal Update</strong></label>
                            <input type="date" class="form-control" name="tanggal_update" placeholder="tanggal_update" value="<?php echo date('Y-m-d', strtotime($potensi['tanggal_update'])); ?>">
                        </div>

                        <div class="form-row mt-2">
                            <div class="col-md-6">
                                <img src="<?= base_url('assets/img/potensi/'); ?><?= $potensi['foto_potensi']; ?>" class="img-thumbnail" width="200px"><br>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col">
                                    <label for="file"><strong>Plih Foto Potensi (maksimal ukuran gambar 10Mb)</strong></label>
                                    <div class="custom-file">
                                        <input type="file" name="foto_potensi" class="custom-file-input" id="file">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="referensi"><strong>Referensi (Isi jika kategori yang dimasukkan adalah naskah kuno)</strong></label>
                            <input type="text" class="form-control" id="referensi" name="referensi" value="<?php echo $potensi['referensi']; ?>">
                            <?= form_error('referensi', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <hr>

                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;Simpan</button>
                        <a href="<?php echo base_url() . 'potensi' ?>" class="btn btn-secondary"><i class="fas fa-reply"></i>&nbsp;Kembali</a>
                    </form>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->

        <!-- memanggil jquery -->
        <script src="<?= base_url('assets/ckeditor/jquery/jquery-3.1.1.min.js'); ?>"></script>

        <!-- memanggil ckeditor.js -->
        <script src="<?= base_url('assets/ckeditor/ckeditor.js'); ?>"></script>
        <!-- memanggil adapter jquery ckeditor -->
        <script src="<?= base_url('assets/ckeditor/adapters/jquery.js'); ?>"></script>

        <!-- setup selector -->
        <script>
            $('textarea.texteditor').ckeditor();
        </script>

        <script>
            $('.custom-file-input').on('change', function() {
                let fileName = $(this).val().split('\\').pop();
                $(this).next('.custom-file-label').addClass("selected").html(fileName);
            });
        </script>

        <script type="text/javascript">
            var uploadField = document.getElementById("file");
            uploadField.onchange = function() {
                if (this.files[0].size > 10000000) { // ini untuk ukuran 800KB, 1000000 untuk 1 MB.
                    alert("Maaf. Ukuran Foto Terlalu Besar ! Maksimal 10 Mb");
                    this.value = "";
                };
            };
        </script>

        <script>
            var resizefunc = [];
        </script>
        <script src="<?php echo base_url() ?>assets/ckeditor/ckeditor.js"></script>
        <script type="text/javascript">
            CKEDITOR.replace('editor-custom', {
                uiColor: '#537fbb'
            });
        </script>

        <script>
            function createTextSlug() {
                var title = document.getElementById("nama_potensi").value;
                document.getElementById("slug").value = generateSlug(title);
            }

            function generateSlug(text) {
                return text.toString().toLowerCase()
                    .replace(/^-+/, '')
                    .replace(/-+$/, '')
                    .replace(/\s+/g, '-')
                    .replace(/\-\-+/g, '-')
                    .replace(/[^\w\-]+/g, '');
            }
        </script>