<nav class="navbar navbar-expand-md fixed-top navbar-dark bg-info">
  <div class="container">
    <a class="navbar-brand abs" href="#"><img src="<?= base_url(); ?>/logo-light.png" alt="Logo GoFlight" width="100"></a>
    <button
      class="navbar-toggler ms-auto"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#collapseNavbar"
    >
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse" id="collapseNavbar">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url(); ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url(); ?>/about">About Us</a>
        </li>
        <?php if(logged_in()) : ?>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('/pesan'); ?>">Pesan Tiket</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img class="img-profile rounded-circle" src="<?= base_url(); ?>/img/<?= user()->user_image; ?>" width="25"/>
            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= user()->username; ?></span>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?= base_url('/user'); ?>"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a class="dropdown-item" href="<?= base_url('/logout'); ?>"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
          </ul>
        </li>
        <?php else : ?>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url(); ?>/login"><i class="fas fa-sign-in-alt"></i> Login</a>
        </li>
        <?php endif ?>
      </ul>
    </div>
  </div>
</nav>
