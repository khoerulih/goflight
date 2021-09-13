<?= $this->extend('dashboard/index'); ?>

<?= $this->section('content'); ?>
<div class="container">
  <div class="row">
    <div class="col-8">
      <h4 class="my-3">Edit Data Maskapai</h4>
      <form action="<?= base_url(); ?>/maskapai/update/<?= $maskapai->maskapai_id; ?>" method="POST" enctype="multipart/form-data">
      <?= csrf_field(); ?>
        <div class="row mb-3">
          <input type="hidden" name="maskapai_id" value="<?= $maskapai->maskapai_id; ?>">
          <input type="hidden" name="logoLama" value="<?= $maskapai->maskapai_logo; ?>">
          <label for="judul" class="col-sm-2 col-form-label">Nama Maskapai</label>
          <div class="col-sm-10">
            <input type="text" class="form-control <?= ($validation->hasError('nama_maskapai')) ? 'is-invalid' : ''; ?>" id="nama_maskapai" name="nama_maskapai" autofocus value="<?= (old('nama_maskapai')) ? old('nama_maskapai') : $maskapai->nama_maskapai ?>">
            <div class="invalid-feedback">
              <?= $validation->getError('nama_maskapai'); ?>
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <label for="maskapai_logo" class="col-sm-2 col-form-label">Logo Maskapai</label>
          <div class="col-sm-2">
            <img src="<?= base_url(); ?>/img/maskapai_logo/<?= $maskapai->maskapai_logo ?>" class="img-thumbnail img-preview">
          </div>
          <div class="col-sm-8">
            <div class="input-group mb-3">
              <input type="file" class="form-control <?= ($validation->hasError('maskapai_logo')) ? 'is-invalid' : ''; ?>" id="maskapai_logo" name="maskapai_logo">
              <div class="invalid-feedback">
                <?= $validation->getError('maskapai_logo'); ?>
              </div>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Edit Data</button>
      </form>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>
