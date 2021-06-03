<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SSM Panel - Kullanıcı kaydı</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="index.php" class="h1"><b>SSM</b>Panel</a>
            </div>
            <div class="card-body">
<?php
if (@$_GET['kayit']=="mevcut") { ?>
<div class="alert alert-danger alert-dismissible" role="alert" auto-close="3000"><p class="text-center">Kullanıcı sistemde zaten kayıtlıdır. <br><a href="giris.php">Şifrenizi mi unuttunuz?</a></p></div>
<?php } elseif (@$_GET['kayit']=="no") {?>
  <div class="alert alert-danger alert-dismissible" role="alert" auto-close="3000">Kayıt olma işlemi esnasında bir hata meydana geldi. Bir süre sonra yeniden kayıt olmayı deneyin.</div>
<?php } ?>
                <p class="login-box-msg">Tüm bilgilerinizi eksiksiz bir şekilde girmeniz gerekmektedir.</p>

                <form action="islem.php" method="POST">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="E-posta adresinizi giriniz" name="posta" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Parolanızı giriniz" name="sifre" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Firma ismini giriniz" name="firma" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-building"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Firma yetkilisinin kullanıcı adını giriniz" name="yetkili" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-address-book"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                        Zaten üye misiniz?<br><a href="giris.php" class="text-center">Giriş yapın</a>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button name="kullanici_kaydet" type="submit" class="btn btn-primary btn-block">Kayıt ol</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <script>
$(function() {
  var alert = $('div.alert[auto-close]');
  alert.each(function() {
    var that = $(this);
    var time_period = that.attr('auto-close');
    setTimeout(function() {
      that.alert('close');
    }, time_period);
  });
});

$(function () {
    var url = window.location;
    // for single sidebar menu
    $('ul.nav-sidebar a').filter(function () {
        return this.href == url;
    }).addClass('active');

    // for sidebar menu and treeview
    $('ul.nav-treeview a').filter(function () {
        return this.href == url;
    }).parentsUntil(".nav-sidebar > .nav-treeview")
        .css({'display': 'block'})
        .addClass('menu-open').prev('a')
        .addClass('active');
});
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
</body>

</html>