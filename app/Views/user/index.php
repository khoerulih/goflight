<?= $this->extend('dashboard/index'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">My Tiket</h1>
  </div>
  <div class="row">
    <div class="card shadow mb-4">
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Asal</th>
              <th scope="col">Tujuan</th>
              <th scope="col">Tanggal</th>
              <th scope="col">Jam</th>
              <th scope="col">Maskapai</th>
              <th scope="col">Kelas</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($transaksi as $t) : ?>
              <tr>
                <th scope="row"><?= $i++; ?></th>
                <td><?= $t->asal; ?></td>
                <td><?= $t->tujuan; ?></td>
                <td><?= $t->tanggal_keberangkatan; ?></td>
                <td><?= $t->jam_keberangkatan; ?></td>
                <td><?= $t->nama_maskapai; ?></td>
                <td><?= $t->kelas; ?></td>
                <td><a href="<?= base_url(); ?>/transaksi/exportpdf/<?= $t->transaksi_id; ?>" class="btn btn-danger"><i class="fas fa-file-download"></i> Download Tiket</a></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection('content'); ?>
