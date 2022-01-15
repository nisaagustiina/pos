<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Point Of Sales</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?= base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/bower_components/sweetalert2/sweetalert2.min.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/bower_components/sweetalert2/animate.min.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style>
    .swal2-popup{
      font-size: 1.6rem !important;
    }
  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini <?=$this->uri->segment(1) == 'sale'  ? 'sidebar-collapse' :  null?>">
<div class="wrapper">
  <header class="main-header">
    <a href="<?= base_url('dashboard')?>" class="logo">
      <span class="logo-mini"><b>P</b></span>
      <span class="logo-lg"><b>POS</b></span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?= base_url()?>assets/dist/img/default.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?= $this->fungsi->user_login()->username?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="<?= base_url()?>assets/dist/img/default.jpg" class="img-circle" alt="User Image">
                <p>
                <?= $this->fungsi->user_login()->nama?>
                  <small><?= $this->fungsi->user_login()->alamat?></small>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?= site_url('auth/logout')?>" class="btn btn-danger btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url()?>assets/dist/img/default.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= $this->fungsi->user_login()->username?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li <?=$this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>>
          <a href="<?= site_url('dashboard')?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li <?=$this->uri->segment(1) == 'supplier' ? 'class="active"' : '' ?>>
          <a href="<?= site_url('supplier')?>">
            <i class="fa fa-truck"></i> <span>Supplier</span>
          </a>
        </li>
        <li <?=$this->uri->segment(1) == 'customer' ? 'class="active"' : '' ?>>
          <a href="<?= site_url('customer')?>">
            <i class="fa fa-users"></i> <span>Customer</span>
          </a>
        </li>
        <li class="treeview <?=$this->uri->segment(1) == 'category' || $this->uri->segment(1) == 'unit' || $this->uri->segment(1) == 'item' ? 'active' : '' ?>">
          <a href="#">
            <i class="fa fa-archive"></i> <span>Product</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?=$this->uri->segment(1) == 'category' ? 'class="active"' : '' ?>><a href="<?= site_url('category')?>"><i class="fa fa-circle-o"> Categories</i></a></li>
            <li <?=$this->uri->segment(1) == 'unit' ? 'class="active"' : '' ?>><a href="<?= site_url('unit')?>"><i class="fa fa-circle-o"> Units</i></a></li>
            <li <?=$this->uri->segment(1) == 'item' ? 'class="active"' : '' ?>><a href="<?= site_url('item')?>"><i class="fa fa-circle-o"> Items</i></a></li>
          </ul>
        </li>
        <li class="treeview <?=$this->uri->segment(1) == 'stock' || $this->uri->segment(1) == 'sale'  ? 'active' : ''?>">
          <a href="#">
            <i class="fa fa-shopping-cart"></i> <span>Transaction</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?=$this->uri->segment(1) == 'sale' ? 'class="active"' : ''?> ><a href="<?= site_url('sale')?>"><i class="fa fa-circle-o"> Sales</i></a></li>
            <li <?=$this->uri->segment(1) == 'stock' && $this->uri->segment(2) == 'in'  ? 'class="active"' : '' ?>><a href="<?= site_url('stock/in')?>"><i class="fa fa-circle-o"> Stock In</i></a></li>
            <li <?=$this->uri->segment(1) == 'stock' && $this->uri->segment(2) == 'out'  ? 'class="active"' : '' ?> ><a href="<?= site_url('stock/out')?>"><i class="fa fa-circle-o"> Stock Out</i></a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i> <span>Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= site_url('report/sale')?>"><i class="fa fa-circle-o"> Sales</i></a></li>
            <li><a href="<?= site_url('report/stock')?>"><i class="fa fa-circle-o"> Stock</i></a></li>
          </ul>
        </li>
        </li>
        <?php if($this->fungsi->user_login()->level == 1) { ?>
        <li class="header">SETTING</li>
        <li <?=$this->uri->segment(1) == 'user' ? 'class="active"' : '' ?>>
          <a href="<?= site_url('user')?>">
            <i class="fa fa-user"></i> <span>User</span>
          </a>
        </li>
        </li>
        <?php } ?>
       </ul>
    </section>
  </aside>

  <script src="<?= base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
  <script src="<?= base_url()?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?= base_url()?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

  <div class="content-wrapper">
    <?=$contents?>
  </div>

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2019 </strong> All rights
    reserved.
  </footer>
</div>

<script src="<?= base_url()?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?= base_url()?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?= base_url()?>assets/dist/js/adminlte.min.js"></script>
<script src="<?= base_url()?>assets/bower_components/sweetalert2/sweetalert2.min.js"></script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree();
    $('#tabel').DataTable();
    
  });
</script>
<script>
  var flash = $('#flash').data('flash');
  if(flash){
    Swal.fire({
      icon : 'success',
      title: 'Success',
      text: flash
    })
  }

  $(document).on('click','#btn-hapus',function(e){
    e.preventDefault();
    var link = $(this).attr('href');
    Swal.fire({
      title: 'Apakah anda yakin?',
      text: 'Data akan dihapus!',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3885d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, hapus',
      showClass: {
        popup: 'animate__animated animate__fadeInDown'
      },
      hideClass: {
        popup: 'animate__animated animate__fadeOutUp'
      }
    }).then((result)=>{
      if(result.isConfirmed){
        window.location = link;
      }
    })
  })
</script>
</body>
</html>
