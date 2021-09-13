<?= $this->extend('dashboard/index'); ?>

<?= $this->section('content'); ?>
<div class="container">
  <div class="row">
    <div class="col-8">
      <h4 class="my-3">Tambah Data Maskapai</h4>
      <form action="<?= base_url(); ?>/tiket/update/<?= $tiket->tiket_id; ?>" method="POST" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="form-group">
          <label for="maskapai_id">Nama Maskapai</label>
          <select class="form-control" id="maskapai_id" name="maskapai_id">
            <option>Pilih Maskapai</option>
            <?php foreach($maskapai as $m): ?>
            <option value="<?= $m->maskapai_id; ?>" <?php if ($m->maskapai_id == $tiket->maskapai_id) :?> selected <?php endif;?>><?= $m->nama_maskapai; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group">
          <label for="maskapai_id">Kelas Tiket</label>
          <select class="form-control" id="kelas_id" name="kelas_id">
            <option>Pilih Kelas</option>
            <?php foreach($kelas as $k): ?>
            <option value="<?= $k->kelas_id; ?>" <?php if ($k->kelas_id == $tiket->kelas_id) :?> selected <?php endif;?>><?= $k->kelas; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Asal</label>
          <input type="text" class="form-control" name="asal" placeholder="Asal Kota" value="<?= $tiket->asal; ?>">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Tujuan</label>
          <input type="text" class="form-control" name="tujuan" placeholder="Tujuan" value="<?= $tiket->tujuan; ?>">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Harga Tiket</label>
          <input type="number" class="form-control" name="harga_tiket" placeholder="Harga Tiket" value="<?= $tiket->harga_tiket; ?>">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Tanggal Keberangkatan</label>
          <input type="text" class="form-control" name="tanggal_keberangkatan" placeholder="Format: YYYY/MM/DD" value="<?= $tiket->tanggal_keberangkatan; ?>">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Jam Keberangkatan</label>
          <input type="time" class="form-control" name="jam_keberangkatan" value="<?= $tiket->jam_keberangkatan; ?>">
        </div>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
      </form>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>
