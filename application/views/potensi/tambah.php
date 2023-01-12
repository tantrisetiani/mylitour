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
              <form action="<?php base_url('potensi/tambah/'); ?>" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="slug" id="slug">
                  <div class="form-group">
                      <label><strong>Nama Potensi</strong></label>
                      <input type="text" id="nama_potensi" name="nama_potensi" class="form-control" onkeyup="createTextSlug()">
                      <?= form_error('nama_potensi', '<small class="text-danger">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                      <label for="id_kategori"><strong>Kategori Potensi</strong></label>
                      <select class="form-control" name="id_kategori">
                          <option value="">---Pilih Kategori---</option>
                          <?php foreach ($kategori as $ktgri) : ?>
                              <option value="<?= $ktgri['id_kategori']; ?>"><?= $ktgri['jenis_kategori']; ?></option>
                          <?php endforeach ?>
                      </select>
                  </div>

                  <div class="form-group">
                      <label for="id_wilayah"><strong>Wilayah Potensi</strong></label>
                      <select class="form-control" name="id_wilayah">
                          <option value="">---Pilih Wilayah---</option>
                          <?php foreach ($wilayah as $wil) : ?>
                              <option value="<?= $wil['id_wilayah']; ?>"><?= $wil['nama_wilayah']; ?></option>
                          <?php endforeach ?>
                      </select>
                  </div>

                  <div class="form-group">
                      <label><strong>Video Potensi</strong></label>
                      <input type="text" name="video_youtube" class="form-control">
                      <?= form_error('video_youtube', '<small class="text-danger">', '</small>'); ?>
                  </div>

                  <div class="form-group">
                      <div class="panel panel-default">
                          <div class="panel-heading">
                              <label><strong>Informasi Potensi</strong></label>
                          </div>
                          <div class="panel-body">
                              <textarea class="ckeditor" id="editor-custom" name="informasi"></textarea>
                          </div>
                      </div>
                  </div>

                  <div class="form-group ">
                      <label><strong>Tanggal Update</strong></label>
                      <input type="date" class="form-control" name="tanggal_update" placeholder="Tanggal Update">
                  </div>

                  <div class="form-group">
                      <div class="form-row">
                          <div class="col">
                              <label for="file"><strong>Plih Gambar (Maksimal ukuran gambar 10Mb)</strong></label>
                              <div class="custom-file">
                                  <input type="file" name="foto_potensi" class="custom-file-input" id="file">
                                  <label class="custom-file-label" for="customFile">Choose file</label>
                              </div>
                          </div>
                          <?= form_error('foto_potensi', '<small class="text-danger pl-3">', '</small>'); ?>
                      </div>
                  </div>

                  <div class="form-group">
                      <label><strong>Referensi (Isi jika kategori yang dimasukkan adalah naskah kuno)</strong></label>
                      <input type="text" name="referensi" class="form-control">
                      <?= form_error('referensi', '<small class="text-danger">', '</small>'); ?>
                  </div>

                  <hr>

                  <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;Tambah</button>
                  <a href="<?php echo base_url() . 'potensi' ?>" class="btn btn-secondary"><i class="fas fa-reply"></i>&nbsp;Kembali</a>
              </form>
          </div>
      </div>

  </div>
  <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->


  <!-- panggil jquery -->
  <script src="<?= base_url('assets/ckeditor/jquery/jquery-3.1.1.min.js'); ?>"></script>

  <!-- panggil ckeditor.js -->
  <script src="<?= base_url('assets/ckeditor/ckeditor.js'); ?>"></script>

  <!-- panggil adapter jquery ckeditor -->
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