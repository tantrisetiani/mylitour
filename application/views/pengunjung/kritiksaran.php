       <!-- ======= Kritik Saran Section ======= -->
       <section id="contact" class="contact">
           <div class="container">
               <div class="section-title" data-aos="fade-up">
                   <h2>Kritik Saran</h2>
                   <p>Kritik dan Saran</p>
                   <div class="row justify-content-between">
                       <div class="col-lg-8 mt-5 mt-lg-0" data-aos="fade-left" data-aos-delay="200">
                           <form action="<?= base_url('pengunjung/kirim_kritik_saran/') ?>" method="post" role="form" class="kritiksaran">
                               <div class="row">
                                   <div class="col-md-6 form-group">
                                       <input type="text" name="nama_pengunjung" class="form-control" id="nama_pengunjung" placeholder="Nama Pengunjung" required>
                                   </div>
                                   <div class="col-md-6 form-group mt-3 mt-md-0">
                                       <input type="email" class="form-control" name="email_pengunjung" id="email_pengunjung" placeholder="Email" required>
                                   </div>
                               </div>
                               <div class="form-group mt-3">
                                   <textarea class="form-control" name="kritik_saran" rows="5" id="kritik_saran" placeholder="Masukkan kritik dan saran" required></textarea>
                               </div>
                               <div class="text-center">
                                   <button id="submit" type="submit" name="submit" onclick="message()">Kirim</button>
                               </div>
                               <div class="message">
                                   <div class="success" id="success">Kritik dan Saran berhasil terkirim!</div>
                                   <div class="danger" id="danger">Kolom tidak boleh kosong!</div>
                               </div>
                           </form>
                       </div>
                       <div class="col-lg-4 order-1 order-lg-2 chat" data-aos="zoom-out" data-aos-delay="300">
                           <img src="<?= base_url('assets/'); ?>pengunjung/img/chat.png" class="img-fluid animated" alt="">
                       </div>
                   </div>
               </div>
                   <form role="form" class="kirim-artikel">
                       <div class="row justify-content-center">
                           <div class="col-md-4 py-3" data-aos="zoom-out" data-aos-delay="200" style="display:flex; align-self:center;">
                               <p>Apakah Anda Ingin Menulis Artikel<br>Ensiklopedia Kearifan Lokal Madiun?</p>
                           </div>
                           <div class="col-md-4" data-aos="zoom-out" data-aos-delay="200">
                               <img src="<?= base_url('assets/'); ?>pengunjung/img/kirim-artikel.png" class="img-fluid" alt="">
                           </div>
                           <div class="col-md-4 py-3" data-aos="zoom-out" data-aos-delay="200" style="display:flex; align-self:center;">
                               <div class="card round h-100 shadow">
                                   <div class="card-body">
                                       <h5 class="card-title">
                                           <p>Kirim Artikel Terbaik Kamu Disini!</p>
                                       </h5>
                                       <div class="text-center">
                                           <button id="submit" type="submit" name="submit"><a href="<?php echo base_url('assets/bukupanduan/User ManualBook Dispustour.pdf') ?>">Kirim Artikel</a></button>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>

               </form>
       </section>
       <!-- End Kritik Saran Section -->
       <script type=" text/javascript" src="<?= base_url('assets/'); ?>pengunjung/js/form.js"></script>