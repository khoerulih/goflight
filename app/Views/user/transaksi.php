<?= $this->extend('dashboard/index'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Transaksi</h1>
  </div>
  <div class="row">
    <div class="card shadow mb-4">
      <div class="card-body">
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#cara_bayar">
          Cara Bayar
        </button>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Tanggal Transaksi</th>
              <th scope="col">Asal</th>
              <th scope="col">Tujuan</th>
              <th scope="col">Tanggal</th>
              <th scope="col">Jam</th>
              <th scope="col">Maskapai</th>
              <th scope="col">Kelas</th>
              <th scope="col">Total</th>
              <th scope="col">Tipe Pembayaran</th>
              <th scope="col">Status Transaksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($transaksi as $t) : ?>
              <tr>
                <th scope="row"><?= $i++; ?></th>
                <td><?= $t->tanggal_transaksi; ?></td>
                <td><?= $t->asal; ?></td>
                <td><?= $t->tujuan; ?></td>
                <td><?= $t->tanggal_keberangkatan; ?></td>
                <td><?= $t->jam_keberangkatan; ?></td>
                <td><?= $t->nama_maskapai; ?></td>
                <td><?= $t->kelas; ?></td>
                <td><?= $t->total_harga; ?></td>
                <td><?= $t->nama_pembayaran; ?></td>
                <td>
                  <?php if($t->status_id == 1) : ?>
                    <span class="badge bg-warning"><?= $t->nama_status; ?></span>
                  <?php elseif($t->status_id == 2) : ?>
                    <span class="badge bg-success"><?= $t->nama_status; ?></span>
                  <?php else : ?>
                    <span class="badge bg-success"><?= $t->nama_status; ?></span>
                    <?php endif; ?>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="modal fade" id="cara_bayar" tabindex="-1" aria-labelledby="cara_bayar_label" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cara Bayar</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Transfer sesuai total harga ke nomor rekening 000xxxxxx (a.n Ujang Hernandez)
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection('content'); ?>
