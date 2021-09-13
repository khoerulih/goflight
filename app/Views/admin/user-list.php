<?= $this->extend('dashboard/index'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">User List</h1>
  </div>
  <div class="row">
    <div class="card shadow mb-4">
      <div class="card-body">
        <!-- <a href="/komik/create" class="btn btn-primary mt-3">Tambah Data Komik</a> -->
        <?php if (session()->getFlashdata('pesan')) : ?>
          <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
          </div>
        <?php endif; ?>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">NIK</th>
              <th scope="col">Nama Lengkap</th>
              <th scope="col">Email</th>
              <th scope="col">Alamat</th>
              <th scope="col">No Telepon</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($users as $user) : ?>
              <tr>
                <th scope="row"><?= $i++; ?></th>
                <td><?= $user->nik; ?></td>
                <td><?= $user->fullname; ?></td>
                <td><?= $user->email; ?></td>
                <td><?= $user->alamat; ?></td>
                <td><?= $user->no_telepon; ?></td>
                <td>
                  <form action="<?= base_url(); ?>/admin/user-list/<?= $user->id; ?>" method="post" class="d-inline">
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
