<?= $this->extend('templates/index'); ?>

<?= $this->section('content'); ?>

<div class="container">
  <div class="row">
    <h1 class="section-label" tabindex="0" style="margin-top: 64px;">Pesan Tiket</h1>
    <div class="col-12">
      <div class="card mb-3">
        <div class="row g-0">
          <div class="col-md-4 text-center">
            <img src="<?= base_url(); ?>/img/maskapai_logo/<?= $tiket->maskapai_logo; ?>" width="150" alt="Logo Maskapai" style="margin-top:32px">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title"><?= $tiket->asal; ?> - <?= $tiket->tujuan; ?></h5>
              <p class="card-text"><small class="text-muted"><i class="fas fa-plane-departure"></i> <?= $tiket->kelas; ?></small></p>
              <p class="card-text">Rp.<?= $tiket->harga_tiket; ?></p>
              <p class="card-text">
                <span><small class="text-muted"><i class="far fa-clock"></i> <?= $tiket->jam_keberangkatan; ?></small></span>
                <span><small class="text-muted"><i class="fas fa-calendar-alt"></i> <?= $tiket->tanggal_keberangkatan; ?></small></span>
              </p>
            </div>
          </div>
        </div>
      </div>
      <h1 class="section-label">Detail Pesanan</h1>
      <form action="<?= base_url(); ?>/transaksi/save" method="POST" class="row g-3 mb-4">
        <?= csrf_field(); ?>
        <input type="hidden" name="user_id" value="<?= user_id(); ?>">
        <input type="hidden" name="tiket_id" value="<?= $tiket->tiket_id ?>">
        <input type="hidden" id="harga_tiket" value="<?= $tiket->harga_tiket ?>">
        <div class="col-12">
          <label for="jumlah_tiket">Jumlah Tiket</label>
          <input type="number" class="form-control" id="jumlah_tiket" name="jumlah_tiket" placeholder="Jumlah Tiket" onkeyup="getTotal();">
        </div>
        <div class="col-12">
          <label for="tipe_pembayaran_id">Jenis Pembayaran</label>
          <select class="form-control" id="tipe_pembayaran_id" name="tipe_pembayaran_id">
            <option>Pilih Pembayaran</option>
            <?php foreach($tipe_pembayaran as $tp): ?>
            <option value="<?= $tp->tipe_pembayaran_id; ?>"><?= $tp->nama_pembayaran; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="col-12">
          <label for="total_harga">Total Harga</label>
          <input type="number" class="form-control" name="total_harga" placeholder="Total Harga" id="total_harga" readonly>
        </div>
          <button type="submit" class="btn btn-block btn-primary">Bayar</button>
      </form>
    </div>
  </div>
</div>



<?= $this->endSection('content'); ?>
