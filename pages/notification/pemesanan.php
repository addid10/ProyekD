<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Service Computer Go!</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../../plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index.html"><b>Transaksi</b><br>Service Komputer</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
  <?php if (isset($_SESSION['username_user'])): ?>
  <?php echo $_SESSION['username_user']; ?>
  <?php endif ?>
  <form method="post" action="logout.php"> 
    <input type="hidden" name="logout">
    <button type="submit">Logout</button>
  </form>
    <form action="kirim.php" method="post">
       </p>
      <div class="form-group has-feedback">
        <input id="idService" name="idService" type="text" class="form-control" placeholder="idService">
      </div>
      <div class="form-group has-feedback">
        <input id="Merk_Komputer" name="Merk_Komputer" type="text" class="form-control" placeholder="Merk Komputer">
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Konfirmasi</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
</div>

<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
