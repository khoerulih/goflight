<?= $this->extend('dashboard/index'); ?>

<?= $this->section('content'); ?>
<div class="container">
  <div class="row">
    <div class="col-8">
      <h4 class="my-3">Tambah Data Maskapai</h4>
      <form action="<?= base_url(); ?>/maskapai/save" method="POST" enctype="multipart/form-data">
      <?= csrf_field(); ?>
        <div class="row mb-3">
          <label for="judul" class="col-sm-2 col-form-label">Nama Maskapai</label>
          <div class="col-sm-10">
            <input type="text" class="form-control <?= ($validation->hasError('nama_maskapai')) ? 'is-invalid' : ''; ?>" id="nama_maskapai" name="nama_maskapai" autofocus value="<?= old('nama_maskapai'); ?>">
            <div class="invalid-feedback">
              <?= $validation->getError('nama_maskapai'); ?>
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <label for="sampul" class="col-sm-2 col-form-label">Logo Maskapai</label>
          <div class="col-sm-8">
            <div class="input-group mb-3">
              <input type="file" class="form-control <?= ($validation->hasError('maskapai_logo')) ? 'is-invalid' : ''; ?>" id="maskapai_logo" name="maskapai_logo">
              <div class="invalid-feedback">
                <?= $validation->getError('maskapai_logo'); ?>
              </div>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
      </form>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>
