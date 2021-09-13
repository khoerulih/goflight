<?= $this->extend('templates/index'); ?>

<?= $this->section('content'); ?>

<div class="content">
  <div class="hero__pesan">
    <div class="hero__inner" tabindex="0">
      <h1 class="hero__title">Mau Kemana?</h1>
      <form action="<?= base_url(); ?>/pesan" method="POST">
        <div class="row g-3 mt-6">
          <?= csrf_field(); ?>
          <div class="col-sm">
            <input type="text" class="form-control" placeholder="Asal" aria-label="Asal" name="asal">
          </div>
          <div class="col-sm">
            <input type="text" class="form-control" placeholder="Tujuan" aria-label="Tujuan" name="tujuan">
          </div>
          <div class="col-sm-3">
            <input type="text" class="form-control" placeholder="Tanggal" name="tanggal_keberangkatan">
          </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Cari Tiket</button>
      </form>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <h1 class="section-label" tabindex="0">Tiket</h1>
      <?php foreach($tiket as $t): ?>
      <div class="col-lg-6 col-md-12">
        <div class="card mb-3">
          <div class="row g-0">
            <div class="col-md-4 text-center">
              <img src="<?= base_url(); ?>/img/maskapai_logo/<?= $t->maskapai_logo; ?>" width="150" alt="Logo Maskapai" style="margin-top:32px">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title"><?= $t->asal; ?> - <?= $t->tujuan; ?></h5>
                <p class="card-text"><small class="text-muted"><i class="fas fa-plane-departure"></i> <?= $t->kelas; ?></small></p>
                <p class="card-text">Rp.<?= $t->harga_tiket; ?></p>
                <p class="card-text">
                  <span><small class="text-muted"><i class="far fa-clock"></i> <?= $t->jam_keberangkatan; ?></small></span>
                  <span><small class="text-muted"><i class="fas fa-calendar-alt"></i> <?= $t->tanggal_keberangkatan; ?></small></span>
                </p>
                <a href="<?= base_url(); ?>/pesan/<?= $t->tiket_id; ?>" class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Pesan</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>



<?= $this->endSection('content'); ?>
