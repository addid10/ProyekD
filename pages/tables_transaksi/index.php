<?php session_start() ?>
<?php if (isset($_SESSION['username'])): ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Service Computer Go!</title>
  <link href="../../img/favicon.png" rel="icon">
  <link href="../../img/apple-touch-icon.png" rel="apple-touch-icon">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>		
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  
  
  <script src="Js/Transaksi.js"></script>
  <script src="../notification/notif.js"></script>
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="../../bower_components/morris.js/morris.css">
  <link rel="stylesheet" href="../../bower_components/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="../../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="../../bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  
</head>
<body class="hold-transition skin-blue sidebar-mini">



<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <div class="logo">
      <span class="logo-mini"><b>S</b>KG</span>
      <span class="logo-lg"><b>Service</b> Komputer Go!</span>
    </div>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown messages-menu" id="myNavbar">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="notifikasi">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning" id="jumlah">0</span>
            </a>
            <ul class="dropdown-menu">
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                            <div id="info"></div>
                            <div id="loading"></div>
                            <div id="konten-info">
                </ul>
              </li>
              <li class="footer"><a href="../tables_transaksi/">View all</a></li>
            </ul>
          </li> 
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../../dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION['username'];?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
              <p>
                  <?php require('../adminProfile.php'); echo "$admin->Nama_Akun_Service"; ?>
                  <small>Member since, <?php require('../adminProfile.php'); echo "$admin->Tanggal_Daftar"; ?></small>
                </p>
              </li>
              <!-- Menu Body 
              <li class="user-body">
                  <div class="row">
                    <center><h5>Service Komputer Admin</h5></center>
                  </div>
              </li>
              -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                <a id="log" class="btn btn-default btn-flat">Sign out</a>
                  <form id="out" method="post" action="../user_service/logout.php"> 
                    <input type="hidden" name="logout">
                  </form>
                </div>
              </li>
            </ul>
		  </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
              <p><?php require('personalToko.php'); echo $namaService->Nama_Service; ?></p>
              <i><?php require('ratingToko.php');?></i>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

        <li>
          <a href="../Halaman_Utama/">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="active">
          <a href="#">
            <i class="fa fa-bell"></i> <span>Daftar Transaksi</span>
          </a>
        </li>
        <li>
          <a href="../tables_service/">
            <i class="fa fa-table"></i> <span>Daftar Service</span>
          </a>
        </li>
        <li>
          <a href="../tables_toko/">
            <i class="fa fa-home"></i> <span>Daftar Toko</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>


  
  <div class="content-wrapper">
 

    <!-- Main content -->
        <div class="col-md-13">
        <div align="right" style="margin-bottom:7px;margin-top:7px;">
					      <button style="background:#3C8DBC;border-color:#3C8DBC" type="button" id="add_button" data-toggle="modal" data-target="#Help" class="btn btn-success btn-lg">Help</button>
        </div>
            <!-- /.box-header -->
            <div class="container box">
			      <div class="table-responsive">	
				    <table id="Service_Data" class="table ">
					  <thead>
						<tr>
							<th width="25%">ID Transaksi</th>
							<th width="25%">Nama User</th>
							<th width="10%">View</th>
							<th width="10%">Status</th>
							<th width="10%">Cancel</th>
						</tr>
					  </thead>
                    </table>
			      </div>
		    </div>
        </div>
    </div>
  </aside>
  

    
    <!--Modal View-->
    <div id="dataModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
           <div class="modal-header">
           <h4 class="modal-title">Detail View</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
       </div>
       <div class="modal-body"> 
       <div id="viewNotifikasi"></div>
       </div>
       <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       </div>
      </div>
     </div>
    </div>
    <!--End Modal View-->
<div class="modal fade" id="Help">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Information</h4>
              </div>
              <div class="modal-body">
                <div class="table-responsive">  
                <table class="table table-bordered">
                <tr>
                    <td><span class="btn btn-info btn-xs">View</span></td>
                    <td>Klik untuk melihat detail pesanan</td>
                </tr>
                <tr>
                    <td><span class="btn btn-success btn-xs">Agreed</span></td>
                    <td>Klik untuk menerima pesanan</td>
                </tr>
                <tr>
                    <td><span class="btn btn-danger btn-xs">Decline</span></td>
                    <td>Klik untuk menolak pesanan</td>
                </tr>
                <tr>
                    <td><span class="btn btn-warning btn-xs">Processing</span></td>
                    <td>Klik jika pesanan atau perbaikan sudah selesai</td>
                </tr>
                <tr>
                    <td><span class="btn btn-xs" style="background:#b901ba;color:#fff;">Delivered</span></td>
                    <td>Klik jika komputer sudah diterima oleh pelanggan</td>
                </tr>
                </table>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn" data-dismiss="modal">Close</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


  <div class="control-sidebar-bg"></div>
</div>
<?php else: ?>
<?php header('location: ../user_service/login.php'); ?>
<?php endif; ?>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
<script type="text/javascript">
    $('#log').click(function() {
      $('#out').submit();
    });
</script>

<!--
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
-->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<script src="../../dist/js/adminlte.min.js"></script>
<script src="../../dist/js/demo.js"></script>

</body>
</html>