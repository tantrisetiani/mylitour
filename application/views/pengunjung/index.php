   <!-- ======= Hero Section ======= -->
   <section id="hero">

       <div class="container">
           <div class="row justify-content-between">
               <div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center">
                   <div data-aos="zoom-out">
                       <h1>Dinas Perpustakaan dan Kearsipan <br>Kabupaten Madiun</h1>
                       <div class="text-center text-lg-start">
                           <a href="#category" class="btn-get-started scrollto">Mari Mulai Virtual Tour</a>
                       </div>
                   </div>
               </div>
               <div class="col-lg-5 order-1 order-lg-4 hero-img" data-aos="zoom-out" data-aos-delay="300">
                   <img src="assets/pengunjung/img/logoweb.png" class="img-fluid animated" alt="">
               </div>
           </div>
       </div>

       <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
           <defs>
               <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
           </defs>
           <g class="wave1">
               <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
           </g>
           <g class="wave2">
               <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
           </g>
           <g class="wave3">
               <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
           </g>
       </svg>
   </section><!-- End Hero -->

   <main id="main">

       <!-- ======= Kategori Section ======= -->
       <section id="category" class="category">
           <div class="container">
               <div class="section-title" data-aos="fade-up">
                   <h2>Kenal Dekat dengan Kabupaten Madiun</h2>
                   <div class="container py-3 ">
                       <div class="row col-lg-10 mx-auto">

                           <div class="col-md-4 py-3">
                               <div class="card round h-100 shadow">
                                   <img class="thun" img src="<?= base_url(); ?>assets/pengunjung/img/Caruban.png" class="card-img-top">
                                   <div class="card-body">
                                       <h5 class="card-title"><a href="<?= base_url('pengunjung/caruban_literasi_hub'); ?>" class="text-dark ">Caruban Literasi Hub
                                           </a>
                                       </h5>
                                   </div>
                               </div>
                           </div>

                           <div class="col-md-4 py-3">
                               <div class="card round h-100 shadow">
                                   <img class="thun" img src="<?= base_url(); ?>assets/pengunjung/img/Naskah Kuno.png" class="card-img-top">
                                   <div class="card-body">
                                       <h5 class="card-title"><a href="<?= base_url('pengunjung/naskah_kuno/'); ?>" class="text-dark ">Naskah Kuno
                                           </a>
                                       </h5>
                                   </div>
                               </div>
                           </div>
                           <div class="col-md-4 py-3">
                               <div class="card round h-100 shadow">
                                   <img class="thun" img src="<?= base_url(); ?>assets/pengunjung/img/Kearifan Lokal.png" class="card-img-top">
                                   <div class="card-body">
                                       <h5 class="card-title"><a href="<?= base_url('pengunjung/kearifan_lokal/'); ?>" class="text-dark ">Kearifan Lokal
                                           </a>
                                       </h5>
                                   </div>
                               </div>
                           </div>
                       </div>

                       <style>
                           a:link {
                               text-decoration: none;
                           }

                           a:visited {
                               text-decoration: none;
                           }

                           a:hover {
                               text-decoration: none;
                           }

                           a:active {
                               text-decoration: none;
                           }

                           .thun {
                               max-height: 354px;
                               max-width: 357px;
                               border-top-left-radius: 10px;
                               border-top-right-radius: 10px;
                           }

                           .round {
                               border-radius: 10px;
                           }

                           .author {
                               font-size: 10px;
                           }

                           .fa-size {
                               font-size: 20px;
                           }

                           .jam {
                               font-size: 10px;

                           }

                           .card-title {
                               text-align: center;
                           }

                           img {
                               height: 320px;
                               width: 100%;
                               object-fit: cover;

                           }

                           .thun img {
                               justify-content: center;
                           }
                       </style>
                   </div>
               </div>
           </div>
       </section>
       <!-- End Kategori Section -->

       <!-- ======= About Section ======= -->
       <section id="about" class="about">
           <div class="container">
               <div class="section-title" data-aos="fade-up">
                   <h2>Tentang Kami</h2>
               </div>
               <div class="row">
                   <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch" data-aos="fade-right">
                       <a href="https://youtu.be/tpbdAw6PNz4" class="glightbox play-btn mb-4"></a>
                   </div>

                   <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5" data-aos="fade-left">
                       <p>Sistem informasi berbasis virtual tour wilayah Kabupaten Madiun digunakan untuk memberikan gambaran informasi mengenai potensi-potensi yang terdapat di Kabupaten Madiun. Sistem ini akan membawa masyarakat atau pengunjung sistem menjelajahi potensi-potensi yang ada di Kabupaten Madiun secara virtual. Pengunjung dapat menjelajahi situs kearifan lokal, perpustakaan, dan situs sejarah di Kabupaten Madiun. Dengan memanfaatkan teknologi kamera 360 derajat, potensi-potensi wilayah Kabupaten Madiun yang didokumentasikan dapat menghasilkan video menarik yang membuat pengunjung dapat mengetahui potensi-potensi tersebut secara 360 derajat. Sistem informasi ini merupakan implementasi dari gerakan Literasi Nasional di Indonesia, khususnya literasi budaya dan kewarganegaraan.</p>
                   </div>
               </div>

           </div>
       </section>
       <!-- End About Section -->

   </main><!-- End #main -->