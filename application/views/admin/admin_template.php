<!DOCTYPE html>

<html>
<base href="<?=base_url()?>"/>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Top Y International Co., Ltd.</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="css/dataTables.bootstrap.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.css">

    <!-- Ionicons -->
<!--     <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
 -->    <!-- Theme style -->
    <link rel="stylesheet" href="css/AdminLTE.min.css">
    <link rel="stylesheet" href="css/AdminLTE.css">
    <link rel="stylesheet" href="css/skins/skin-blue.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
        <a href="admin" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>Top</b>tp</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Top</b> Y</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">


             
        
              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs"><?=$loginame?></span>
                </a>
                <ul class="dropdown-menu">
    
                  <!-- Menu Footer-->
                  <li class="user-footer">
                   
                    <div class="pull-right">
                      <?=anchor("site/logout","Logout"," class='btn btn-default btn-flat' ")?>
                     
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

          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?=$loginame?></p>
              <!-- Status -->
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>



          <?=$this->load->view($sidebar_menu)?>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?=$pagetitle?>
            
          </h1>
          <?=$this->breadcrumbs->show()?>
        </section>

        <!-- Main content -->
        <section class="content">
                  <div class="box box-solid bg-light-blue-gradient collapsed-box">
                <div style="cursor: move;" class="box-header ui-sortable-handle">
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                <button data-original-title="Collapse" class="btn btn-primary btn-sm pull-right" data-widget="collapse" data-toggle="tooltip" title="" style="margin-right: 5px;"><i class="fa fa-plus"></i></button>                  </div><!-- /. tools -->
                  <h3 class="box-title">
                    Dashboard
                  </h3>
                </div>
                <div class="box-body" style="display:none;">
                </div><!-- /.box-body-->
                <div class="box-footer no-border" style="display:none;">
                  <div class="row">

                      <div class="col-lg-2 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-teal">
                <div class="inner">
                 <?php
                  
                  $count = $this->db->query(' SELECT COUNT(situation) AS count FROM order_list_tbl WHERE situation = 0 ')->row_array();
                  ?>
                  <h3><?=$count['count']?></h3>
                  <p>Voucher</p>
                </div>
                <div class="icon">
                  <i class="fa fa-file-text-o"></i>
                </div>
                <a href="admin/voucher" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>


                    <div class="col-lg-2 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                 <?php
                 
                  $count = $this->db->query(' SELECT COUNT(situation) AS count FROM order_list_tbl WHERE situation = 1 ')->row_array();
                  ?>
                  <h3><?=$count['count']?></h3>
                  <p>Already Sent</p>
                </div>
                <div class="icon">
                  <i class="fa fa-send"></i>
                </div>
                <a href="admin/already-sent" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-2 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-blue">
                <div class="inner">
                  <?php
                  
                  $count = $this->db->query(' SELECT COUNT(situation) AS count FROM order_list_tbl WHERE situation = 2 ')->row_array();
                  ?>
                  <h3><?=$count['count']?></h3>
                  <p>Already Called</p>
                </div>
                <div class="icon">
                  <i class="fa fa-mobile-phone"></i>
                </div>
                <a href="admin/already-called" class="small-box-footer">
                  More info <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div><!-- ./col -->

                <div class="col-lg-2 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <?php
                  
                  $count = $this->db->query(' SELECT COUNT(situation) AS count FROM order_list_tbl WHERE situation = 3 ')->row_array();
                  ?>
                  <h3><?=$count['count']?></h3>
                  <p>Can`t Called</p>
                </div>
                <div class="icon">
                  <i class="fa  fa-thumbs-o-down"></i>
                </div>
                <a href="admin/cant-called" class="small-box-footer">
                  More info <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div><!-- ./col -->

              <div class="col-lg-2 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-gray">
                <div class="inner">
                   <?php
                  
                  $count = $this->db->query(' SELECT COUNT(situation) AS count FROM order_list_tbl WHERE situation = 4 ')->row_array();
                  ?>
                  <h3><?=$count['count']?></h3>
                  <p>Canceled</p>
                </div>
                <div class="icon ">
                  <i class="fa fa-close"></i>
                </div>
                <a href="admin/cancel" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-2 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <?php
                  $count=$this->db->count_all('order_list_tbl');
                  ?>
                  <h3><?=$count?></h3>
                  <p>Total Orders</p>
                </div>
                <div class="icon">
                  <i class="fa fa-shopping-cart"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            </div>
                </div>
              </div>
          <div class="box">
          <?=$this->load->view($main_content)?>
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <!-- Main Footer -->
      <footer class="main-footer">
        <!-- To the right -->
       
        <!-- Default to the left -->
        <strong>Copyright &copy; 2015 <a href="#">Top Y International Co., Ltd.</a>.</strong> All rights reserved.
      </footer>

      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.1.4 -->
    <script src="js/jquery.js"></script>
     <!-- DataTables -->
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="js/app.min.js"></script>
    <script src="js/myscript.js"></script>

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. Slimscroll is required when using the
         fixed layout. -->
             <script>
      $(function () {
        table = $('#hometbl').DataTable({ 
        "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        "processing": true, //Feature control the processing indicator.
        "serverSide": true,
        "autoWidth": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?=base_url()?>admin/ajax_list",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],

    });
            
      });
    </script>
  </body>
</html>
