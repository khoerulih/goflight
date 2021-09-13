<?= $this->extend('templates/index'); ?>

<?= $this->section('content'); ?>

<div class="content">
  <!-- Jumbotron -->
  <div class="hero__about" role="img" aria-label="hero__about Section" tabindex="0">
    <div class="hero__inner" tabindex="0">
      <h1 class="hero__about__title"><span>Ab</span>out</h1>
      <div class="container">
        <p class="hero__tagline">
          GoFlight adalah perusahaan teknologi terkemuka di Asia yang 
            memungkinkan pengguna untuk menemukan dan memesan  
            produk transportasi.
            Portofolio komprehensif yang dimiliki oleh GoFlight 
            untuk pemesanan tiket untuk transportasi seperti tiket 
            pesawat GoFlight sebagai platform pemesanan dengan pilihan 
            paket terlengkap.
        </p>
      </div>
    </div>
  </div>

  <!-- Experience -->
  <section class="section-networks" id="networks">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h2>Jaringan Kita</h2>
          <p>
            Perusahaan mempercayai kita
            <br />
            lebih dari satu perjalanan
          </p>
        </div>
        <div class="col-md-8 text-center">
          <img src="/img/partner.png" class="img-patner" />
        </div>
      </div>
    </div>
  </section>
  <section class="section-testimonials-heading" id="testimonialsHeading">
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <h2>TIM KITA</h2>
          <p>
            Kita akan berikan
            <br />
            Pengalaman terbaik
          </p>
        </div>
      </div>
    </div>
  </section>
  <section class="section-testimonials-content" id="testimonialsContent">
    <div class="container">
      <div class="section-popular-travel row justify-content-center match-height">
        <div class="col-sm-6 col-md-6 col-lg-3">
          <div class="card card-testimonial text-center">
            <div class="testimonial-content">
              <img
                src="<?= base_url(); ?>/img/ikhsan.jpeg"
                alt=""
                class="mb-4 rounded-circle"
                width="100"
                height="100"
              />
              <h3 class="mb-4">Ikhsan </h3>
              <p class="testimonials">
                “ our lead “
              </p>
            </div>
            <hr />
            <p class="trip-to mt-2">1197050050</p>
          </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-3">
          <div class="card card-testimonial text-center">
            <div class="testimonial-content">
              <img
                src="<?= base_url(); ?>/img/iqbal.jpeg"
                alt=""
                class="mb-4 rounded-circle"
                width="100"
                height="100"
              />
              <h3 class="mb-4">Iqbal </h3>
              <p class="testimonials">
                “ our member “
              </p>
            </div>
            <hr />
            <p class="trip-to mt-2">1197050054</p>
          </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-3">
          <div class="card card-testimonial text-center">
            <div class="testimonial-content mb-auto">
              <img
                src="<?= base_url(); ?>/img/rizki.jpg"
                alt=""
                class="mb-4 rounded-circle"
                width="100"
                height="100"
              />
              <h3 class="mb-4">Rizky</h3>
              <p class="testimonials">
                “ our member “
              </p>
            </div>
            <hr />
            <p class="trip-to mt-2">1197050041</p>
          </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-3">
          <div class="card card-testimonial text-center">
            <div class="testimonial-content mb-auto">
              <img
                src="<?= base_url(); ?>/img/hanif.jpg"
                alt=""
                class="mb-4 rounded-circle"
                width="100"
                height="100"
              />
              <h3 class="mb-4">Hanif</h3>
              <p class="testimonials">
                “ our member “
              </p>
            </div>
            <hr />
            <p class="trip-to mt-2">1197050043</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 text-center">
          <a href="<?= base_url(); ?>" class="btn btn-need-help px-4 mt-4 mx-1">
            Get Started
          </a>
          <a href="<?= base_url(); ?>/pesan" class="btn btn-get-started px-4 mt-4 mx-1">
            Pesan Tiket
          </a>
        </div>
      </div>
    </div>
  </section>
</div>

<?= $this->endSection(); ?>
