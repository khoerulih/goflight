<?= $this->extend('templates/index'); ?>    

<?= $this->section('content'); ?>
    <div class="hero" role="img" aria-label="Hero Section" tabindex="0">
      <div class="hero__inner" tabindex="0">
        <h1 class="hero__title">GoFlight</h1>
        <p class="hero__tagline">Pesan Tiket Pesawat Kapanpun Dimanapun</p>
        <a href="<?= base_url(); ?>/pesan" class="btn btn-outline-light">Pesan Sekarang</a>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <h1 class="section-label" tabindex="0">Choose your destination</h1>
        <div class="col-lg-6 col-md-12">
          <div class="card mb-3">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="<?= base_url(); ?>/img/air-asia-logo.png" alt="Logo Maskapai" width="200">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Air Asia : Jakarta - Bali</h5>
                  <p class="card-text"><small class="text-muted"><i class="fas fa-plane-departure"></i> Economy</small></p>
                  <p class="card-text">Rp.890.000</p>
                  <p class="card-text"><small class="text-muted">12/12/2012</small></p>
                  <a href="<?= base_url(); ?>/pesan" class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Pesan</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-12">
          <div class="card mb-3">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="<?= base_url(); ?>/img/air-asia-logo.png" alt="Logo Maskapai" width="200">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Air Asia : Jakarta - Lombok</h5>
                  <p class="card-text"><small class="text-muted"><i class="fas fa-plane-departure"></i> Economy</small></p>
                  <p class="card-text">Rp.544.000</p>
                  <p class="card-text"><small class="text-muted">12/12/2012</small></p>
                  <a href="<?= base_url(); ?>/pesan" class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Pesan</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="our-partner">
          <h2 aria-label="Our Partner" tabindex="0">Our Partner</h2>
          <div class="our-partner-wrapper">
            <?php foreach($maskapai as $m): ?>
              <div class="our-partner-list">
                <img src="<?= base_url(); ?>/img/maskapai_logo/<?= $m->maskapai_logo; ?>" alt="Our Partner"></img>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>

<?= $this->endSection(); ?>
