<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon">
      <i class="fas fa-plane-departure"></i>
    </div>
    <div class="sidebar-brand-text mx-3">GoFlight</div>
  </a>

  <?php if(in_groups('admin')) :?>
  <!-- Divider -->
  <hr class="sidebar-divider" />

  <!-- Heading -->
  <div class="sidebar-heading">Admin Section</div>

  <!-- Nav Item - My Profile -->
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('admin'); ?>">
      <i class="fas fa-fw fa-chart-area"></i>
      <span>Dashboard</span>
    </a>
    <a class="nav-link" href="<?= base_url('admin/user_list'); ?>">
      <i class="fas fa-users"></i>
      <span>User List</span>
    </a>
    <a class="nav-link" href="<?= base_url('admin/admin_list'); ?>">
      <i class="fas fa-users"></i>
      <span>Admin List</span>
    </a>
    <a class="nav-link" href="<?= base_url('maskapai'); ?>">
      <i class="fas fa-plane"></i>
      <span>Maskapai</span>
    </a>
    <a class="nav-link" href="<?= base_url('tiket'); ?>">
      <i class="fas fa-ticket-alt"></i>
      <span>Tiket</span>
    </a>
    <a class="nav-link" href="<?= base_url('transaksi'); ?>">
      <i class="fas fa-money-bill-wave"></i>
      <span>Pending Transaction</span>
    </a>
    <a class="nav-link" href="<?= base_url('transaksi/all'); ?>">
      <i class="fas fa-money-bill-wave"></i>
      <span>All Transaction</span>
    </a>
  </li>
  <?php endif; ?>

  <!-- Divider -->
  <?php if(in_groups('user')) : ?>
  <hr class="sidebar-divider" />

  <div class="sidebar-heading">User Section</div>
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('user'); ?>">
      <i class="fas fa-ticket-alt"></i>
      <span>My Tiket</span>
    </a>
    <a class="nav-link" href="<?= base_url('pesan'); ?>">
      <i class="fas fa-ticket-alt"></i>
      <span>Pesan Tiket</span>
    </a>
    <a class="nav-link" href="<?= base_url('user/transaksi'); ?>">
      <i class="fas fa-money-bill-wave"></i>
      <span>Pembayaran</span>
    </a>
  </li>
  <?php endif ?>


    <!-- Divider -->
  <hr class="sidebar-divider" />

  <!-- Nav Item - Logout -->
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('logout'); ?>">
      <i class="fas fa-sign-out-alt"></i>
      <span>Logout</span>
    </a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block" />

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul>
