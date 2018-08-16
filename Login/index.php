<?php
  session_start();
  require_once "../_l_.php";
  if (isset($_SESSION['tdn']) && !empty($_SESSION['tdn']) && isset($_SESSION['mk']) && !empty($_SESSION['mk'])) {
    $kn = new clsKetnoi();
    $mk = $_SESSION['mk'];
    $tdn = $_SESSION['tdn'];
    if ($kn->tontai("SELECT * FROM taikhoan WHERE (BINARY TDN='$tdn') and (BINARY MK='$mk')")) {
      $kn->checklogin($tdn,$mk);
    }
  }else
  if (isset($_POST['tdn']) && !empty($_POST['tdn']) && isset($_POST['mk']) && !empty($_POST['mk'])) {
    $kn = new clsKetnoi();
    $mk = md5($_POST['mk']);
    $tdn = $_POST['tdn'];
    if ($kn->tontai("SELECT * FROM taikhoan WHERE (BINARY TDN='$tdn') and (BINARY MK='$mk')")) {
      $_SESSION['tdn']=$tdn;
      $_SESSION['mk']=$mk;
      $kn->checklogin($tdn,$mk);
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Đăng nhập</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../public/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../public/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../public/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../public/dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a><b>QUẢN LÝ CỬA HÀNG</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Đăng nhập hệ thống</p>

    <form method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Tên đăng nhập" name="tdn">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Mật khẩu" name="mk">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <center>
            <button type="submit" class="btn btn-primary btn-flat">ĐĂNG NHẬP</button>
          </center>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <!-- /.social-auth-links -->
    <hr>
    <a href="#">Tôi đã quên mật khẩu?</a><br>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
</body>
</html>