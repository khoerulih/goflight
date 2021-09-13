<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Register</title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url(); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="<?= base_url(); ?>/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-expand-md navbar-dark bg-info">
    <div class="container">
      <a class="navbar-brand abs" href="<?= base_url(); ?>"><img src="<?= base_url(); ?>/logo-light.png" alt="Logo GoFlight" width="100"></a>
    </div>
  </nav>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4"><?=lang('Auth.register')?></h1>
                  </div>
                  <?= view('Myth\Auth\Views\_message_block') ?>
                  <form class ="user" action="<?= route_to('register') ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="form-group">
                      <input
                        type="text"
                        class="form-control form-control-user <?php if(session('errors.fullname')) : ?>is-invalid<?php endif ?>"
                        name="fullname"
                        placeholder="Nama Lengkap"
                        value="<?= old('fullname') ?>"
                      />
                    </div>
                    <div class="form-group">
                      <input
                        type="text"
                        class="form-control form-control-user <?php if(session('errors.nik')) : ?>is-invalid<?php endif ?>"
                        name="nik"
                        placeholder="NIK"
                        value="<?= old('nik') ?>"
                      />
                    </div>
                    <div class="form-group">
                      <input
                        type="text"
                        class="form-control form-control-user <?php if(session('errors.alamat')) : ?>is-invalid<?php endif ?>"
                        name="alamat"
                        placeholder="Alamat Lengkap"
                        value="<?= old('alamat') ?>"
                      />
                    </div>
                    <div class="form-group">
                      <input
                        type="text"
                        class="form-control form-control-user <?php if(session('errors.no_telepon')) : ?>is-invalid<?php endif ?>"
                        name="no_telepon"
                        placeholder="No Telephone"
                        value="<?= old('no_telepon') ?>"
                      />
                    </div>
                    <div class="form-group">
                      <input
                        type="text"
                        class="form-control form-control-user <?php if(session('errors.tanggal_lahir')) : ?>is-invalid<?php endif ?>"
                        name="tanggal_lahir"
                        placeholder="Tanggal Lahir (Format : YYYY/MM/DD)"
                        value="<?= old('tanggal_lahir') ?>"
                      />
                    </div>
                    <div class="form-group">
                      <input
                        type="text"
                        class="form-control form-control-user <?php if(session('errors.username')) : ?>is-invalid<?php endif ?>"
                        name="username"
                        placeholder="<?=lang('Auth.username')?>"
                        value="<?= old('username') ?>"
                      />
                    </div>
                    <div class="form-group">
                      <input
                        type="email"
                        class="form-control form-control-user <?php if(session('errors.email')) : ?>is-invalid<?php endif ?>"
                        name="email"
                        placeholder="<?=lang('Auth.email')?>"
                        value="<?= old('email') ?>"
                      />
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-6 mb-3 mb-sm-0">
                        <input
                          type="password"
                          class="form-control form-control-user <?php if(session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.password')?>"
                          name="password"
                          placeholder="<?=lang('Auth.password')?>"
                          autocomplete="off"
                        />
                      </div>
                      <div class="col-sm-6">
                        <input
                          type="password"
                          class="form-control form-control-user <?php if(session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.repeatPassword')?>"
                          name="pass_confirm"
                          placeholder="<?=lang('Auth.repeatPassword')?>"
                          autocomplete="off"
                        />
                      </div>
                    </div>
                    <button type="submit" class="btn btn-info btn-user btn-block">
                      <?=lang('Auth.register')?>
                    </button>
                  </form>
                  <hr />
                  <div class="text-center">
                    <p><?=lang('Auth.alreadyRegistered')?><a href="<?= route_to('login') ?>"> <?=lang('Auth.signIn')?></a></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url(); ?>/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url(); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url(); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url(); ?>/js/sb-admin-2.min.js"></script>

  <script type="text/javascript">  
    $('.date').datepicker({  
       format: 'yyyy-mm-dd'  
     });  
  </script>  
</body>
</html>
