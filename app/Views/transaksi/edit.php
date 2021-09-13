<?= $this->extend('dashboard/index'); ?>

<?= $this->section('content'); ?>
<div class="container">
  <div class="row">
    <div class="col-8">
      <h4 class="my-3">Edit Status Transaksi</h4>
      <form action="<?= base_url(); ?>/transaksi/update/<?= $transaksi->transaksi_id; ?>" method="POST">
        <?= csrf_field(); ?>
        <div class="form-group">
          <input type="hidden" name="nama_admin" value="<?= $user->fullname; ?>">
          <label for="status_id">Status</label>
          <select class="form-control" id="status_id" name="status_id">
            <option>Pilih Status</option>
            <?php foreach($status as $s): ?>
            <option value="<?= $s->status_id; ?>" <?php if ($s->status_id == $transaksi->status_id) :?> selected <?php endif;?>><?= $s->nama_status; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Edit Data</button>
      </form>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>
