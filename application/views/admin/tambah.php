<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-user-check"></i> <?= $title; ?></h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
        </div>
        <div class="card-body">
            <form action="<?= base_url('admin/tambah') ?>" id="form-tambah" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="kode_admin"><strong>Kode Admin</strong></label>
                    <input type="text" name="kode_admin" placeholder="Masukkan Kode Admin" class="form-control" value="<?= $kode_admin = $this->admin->buatkode() ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="nama_admin"><strong>Nama Admin</strong></label>
                    <input type="text" id="nama_admin" name="nama_admin" placeholder="Contoh : Tantri Setiani" class="form-control">
                    <?= form_error('nama_admin', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="username"><strong>Username</strong></label>
                    <input type="text" id="username" name="username" placeholder="Contoh : tantri123" class="form-control">
                    <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <label for="password"><strong>Password</strong></label>
                    <div class="input-group mb-2">
                        <input name="password" type="password" value="" class="input form-control" id="password" placeholder="Contoh : Tantri12@" />
                        <div class="input-group-append">
                            <span class="input-group-text" onclick="password_show_hide();">
                                <i class="fas fa-eye" id="show_eye"></i>
                                <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                            </span>
                        </div>
                    </div>
                    <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                </div>

                <div class="form-row">
                    <div class="col">
                        <label for="file"><strong>Plih Gambar (Maksimal ukuran gambar 2Mb)</strong></label>
                        <div class="custom-file">
                            <input type="file" name="foto_admin" class="custom-file-input" id="file">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                </div>

                <hr>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
                <a href="<?= base_url() . 'admin' ?>" class="btn btn-secondary"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
            </form>
        </div>
    </div>
</div>
<!-- </div>
</div>
</div>
</body> -->

</html>
<!-- memanggil jquery -->
<script src="<?= base_url('assets/ckeditor/jquery/jquery-3.1.1.min.js'); ?>"></script>

<!-- memanggil ckeditor.js -->
<script src="<?= base_url('assets/ckeditor/ckeditor.js'); ?>"></script>
<!-- memanggil adapter jquery ckeditor -->
<script src="<?= base_url('assets/ckeditor/adapters/jquery.js'); ?>"></script>

<!-- menampilkan nama file setelah dipilih -->
<script>
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>

<!-- jika ukuran file terlalu besar/file tidak sesuai -->
<script type="text/javascript">
    var uploadField = document.getElementById("file");
    uploadField.onchange = function() {
        if (this.files[0].size > 2000000) { // ini untuk ukuran 800KB, 1000000 untuk 1 MB.
            alert("Maaf. Ukuran Foto Terlalu Besar ! Maksimal 2 Mb");
            this.value = "";
        };
    };
</script>

<!-- show hide password -->
<script>
    function password_show_hide() {
        var x = document.getElementById("password");
        var show_eye = document.getElementById("show_eye");
        var hide_eye = document.getElementById("hide_eye");
        hide_eye.classList.remove("d-none");
        if (x.type === "password") {
            x.type = "text";
            show_eye.style.display = "none";
            hide_eye.style.display = "block";
        } else {
            x.type = "password";
            show_eye.style.display = "block";
            hide_eye.style.display = "none";
        }
    }
    JavaScript
</script>