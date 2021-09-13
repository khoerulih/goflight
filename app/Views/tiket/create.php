<?= $this->extend('dashboard/index'); ?>

<?= $this->section('content'); ?>
<div class="container">
  <div class="row">
    <div class="col-8">
      <h4 class="my-3">Tambah Data Maskapai</h4>
      <form action="<?= base_url(); ?>/tiket/save" method="POST" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="form-group">
          <label for="maskapai_id">Nama Maskapai</label>
          <select class="form-control" id="maskapai_id" name="maskapai_id">
            <option>Pilih Maskapai</option>
            <?php foreach($maskapai as $m): ?>
            <option value="<?= $m->maskapai_id; ?>"><?= $m->nama_maskapai; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group">
          <label for="maskapai_id">Kelas Tiket</label>
          <select class="form-control" id="kelas_id" name="kelas_id">
            <option>Pilih Kelas</option>
            <?php foreach($kelas as $k): ?>
            <option value="<?= $k->kelas_id; ?>"><?= $k->kelas; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Asal</label>
          <input type="text" class="form-control" name="asal" placeholder="Asal Kota">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Tujuan</label>
          <input type="text" class="form-control" name="tujuan" placeholder="Tujuan">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Harga Tiket</label>
          <input type="number" class="form-control" name="harga_tiket" placeholder="Harga Tiket">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Tanggal Keberangkatan</label>
          <input type="text" class="form-control" name="tanggal_keberangkatan" placeholder="Format: YYYY/MM/DD">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Jam Keberangkatan</label>
          <input type="time" class="form-control" name="jam_keberangkatan">
        </div>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
      </form>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>
