<?= $this->extend('dashboard/index'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tiket List</h1>
  </div>
  <div class="row">
    <div class="card shadow mb-4">
      <div class="card-body">
        <a href="<?= base_url(); ?>/tiket/create" class="btn btn-success mb-3"><i class="fas fa-plus-circle"></i> Tambah Data</a>
        <?php if (session()->getFlashdata('pesan')) : ?>
          <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
          </div>
        <?php endif; ?>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nama Maskapai</th>
              <th scope="col">Kelas Tiket</th>
              <th scope="col">Asal</th>
              <th scope="col">Tujuan</th>
              <th scope="col">Harga</th>
              <th scope="col">Tanggal</th>
              <th scope="col">Jam</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($tiket as $t) : ?>
              <tr>
                <th scope="row"><?= $i++; ?></th>
                <td><?= $t->nama_maskapai; ?></td>
                <td><?= $t->kelas; ?></td>
                <td><?= $t->asal; ?></td>
                <td><?= $t->tujuan; ?></td>
                <td><?= $t->harga_tiket; ?></td>
                <td><?= $t->tanggal_keberangkatan; ?></td>
                <td><?= $t->jam_keberangkatan; ?></td>
                <td>
                  <a href="<?= base_url(); ?>/tiket/edit/<?= $t->tiket_id; ?>" class="btn btn-warning">Edit</a>
                  <form action="<?= base_url(); ?>/tiket/<?= $t->tiket_id; ?>" method="post" class="d-inline">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin?');">Delete</button>
                  </form>
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
