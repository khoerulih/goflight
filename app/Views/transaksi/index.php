<?= $this->extend('dashboard/index'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Pending Transaction</h1>
  </div>
  <div class="row">
    <div class="card shadow mb-4">
      <div class="card-body">
        <?php if (session()->getFlashdata('pesan')) : ?>
          <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
          </div>
        <?php endif; ?>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nama Pemesan</th>
              <th scope="col">Tanggal Transaksi</th>
              <th scope="col">Jumlah Tiket</th>
              <th scope="col">Total Harga</th>
              <th scope="col">Tipe Pembayaran</th>
              <th scope="col">Status Transaksi</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($transaksi as $t) : ?>
              <tr>
                <th scope="row"><?= $i++; ?></th>
                <td><?= $t->fullname; ?></td>
                <td><?= $t->tanggal_transaksi; ?></td>
                <td><?= $t->jumlah_tiket; ?></td>
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
                <td>
                  <a href="<?= base_url(); ?>/transaksi/edit/<?= $t->transaksi_id; ?>" class="btn btn-warning">Edit Status</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection('content'); ?>
