<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Blank App</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="<?php echo base_url('assets/theme/custom.css');?>">  

  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css');?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

  <!-- Yet Another DataTables Column Filter -->
  <link href="<?php echo base_url('assets/plugins/yadcf/jquery.datatables.yadcf.css');?>" rel="stylesheet" type="text/css" />

  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/datatables/buttons.dataTables.min.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/datatables/fixedHeader.dataTables.min.css');?>">

  <!-- Noty v3.2.0 -->
  <link href="<?php echo base_url('assets/plugins/noty/noty.css');?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/plugins/noty/themes/relax.css');?>" rel="stylesheet">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">

  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css');?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
  folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/skins/skin-blue.min.css');?>">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/select2/select2.min.css');?>">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/datepicker/datepicker3.css');?>">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/iCheck/all.css');?>">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/daterangepicker/daterangepicker.css');?>">  
  <!-- Toggle -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/Toggle/bootstrap-toggle.min.css');?>">    

  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css');?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  
  <!-- jQuery 2.2.3 -->
  <script src="<?php echo base_url('assets/plugins/jQuery/jquery-2.2.3.min.js');?>"></script>  
  <!-- Bootstrap 3.3.6 -->
  <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js');?>"></script>

  <!-- Yet Another DataTables Column Filter -->
  <script src="<?php echo base_url('assets/plugins/yadcf/jquery.dataTables.yadcf.js');?>"></script>

  <!-- DataTables -->
  <script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js');?>"></script>
  <script src="<?php echo base_url('assets/plugins/datatables/dataTables.fixedHeader.min.js');?>"></script>
  <script src="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.min.js');?>"></script>
  <script src="<?php echo base_url('assets/plugins/datatables/dataTables.buttons.min.js');?>"></script>
  <script src="<?php echo base_url('assets/plugins/datatables/buttons.flash.min.js');?>"></script>
  <script src="<?php echo base_url('assets/plugins/datatables/jszip.min.js');?>"></script>
  <script src="<?php echo base_url('assets/plugins/datatables/pdfmake.min.js');?>"></script>
  <script src="<?php echo base_url('assets/plugins/datatables/vfs_fonts.js');?>"></script>
  <script src="<?php echo base_url('assets/plugins/datatables/buttons.html5.min.js');?>"></script>
  <script src="<?php echo base_url('assets/plugins/datatables/buttons.print.min.js');?>"></script>
  <script src="<?php echo base_url('assets/plugins/datatables/buttons.colVis.min.js');?>"></script>

  <!-- SlimScroll -->
  <script src="<?php echo base_url('assets/plugins/slimScroll/jquery.slimscroll.min.js');?>"></script>
  <!-- FastClick -->
  <script src="<?php echo base_url('assets/plugins/fastclick/fastclick.js');?>"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url('assets/dist/js/app.min.js');?>"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo base_url('assets/dist/js/demo.js');?>"></script>
  <!-- Select2 -->
  <script src="<?php echo base_url('assets/plugins/select2/select2.full.min.js');?>"></script>
  <!-- bootstrap datepicker -->
  <script src="<?php echo base_url('assets/plugins/datepicker/bootstrap-datepicker.js');?>"></script>
  <!-- iCheck 1.0.1 -->
  <script src="<?php echo base_url('assets/plugins/iCheck/icheck.min.js');?>"></script>
  <!-- Toggle -->
  <script src="<?php echo base_url('assets/plugins/Toggle/bootstrap-toggle.min.js');?>"></script>
  <!-- bootstrap time picker -->
  <script src="<?php echo base_url('assets/plugins/timepicker/bootstrap-timepicker.min.js');?>"></script>
  <!-- date-range-picker -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
  <script src="<?php echo base_url('assets/plugins/daterangepicker/daterangepicker.js');?>"></script>

  <!-- Noty v3.2.0 -->
  <script src="<?php echo base_url('assets/plugins/noty/noty.js');?>" type="text/javascript"></script>

  <!-- Bootstrap WYSIHTML5 -->
  <script src="<?php echo base_url('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js');?>""></script>

  <?php $current_user = $this->aauth->get_user(); ?>

  <style type="text/css">

    .loader {
      border: 16px solid #f3f3f3; /* Light grey */
      border-top: 16px solid #3498db; /* Blue */
      border-radius: 50%;
      width: 120px;
      height: 120px;
      animation: spin 2s linear infinite;
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }

    .windowloader {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url(<?php echo base_url() . 'loader.gif'; ?>) 50% 50% no-repeat #fff;
    }

  </style>

  <script type="text/javascript">
    function goBack() {
      window.history.back();
    }
  </script>

</head>
<body class="hold-transition skin-blue sidebar-mini sidebar-collapse" id="sidebar">

  <div class="windowloader"></div>

  <div class="wrapper">
    <header class="main-header">

      <!-- Logo -->
      <a href="<?php echo base_url('index.php');?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">APP</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">Application Name</span>
      </a>

      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">

        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>

    <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <?php $pms = $this->aauth->count_unread_pms();
              if ($pms > 0 ) {?>
                <span class="label label-success"><?php echo $pms; ?></span>
              <?php } ?>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have <?php echo $pms ?> new messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">

                  <?php $msg = $this->main_db->view('*', 'aauth_pms', ['receiver_id'=>$this->current_user->id,'read'=>0], 'date|DESC') ?>

                  <?php if (isset($msg[0])) { ?>
                  <?php foreach ($msg as $m) { ?>
                    
                  <li><!-- start message -->
                    <a href="<?php echo site_url("messages/read/$m->id"); ?>">
                      <h4>
                        <?php echo $m->title ?>
                        <small><i class="fa fa-clock-o"></i> <?php echo $this->main_db->time_elapsed_string($m->date); ?></small>
                      </h4>
                      <p><?php echo substr(strip_tags($m->message), 0, 30).'...'; ?></p>
                    </a>
                  </li>
                  <!-- end message -->
                    <?php } //end foreach loop ?>
                  <?php } // end if statment ?>
                </ul>
              </li>
              <li class="footer"><a href="<?php echo site_url('messages'); ?>">See All Messages</a></li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> -->
              <span class="hidden-xs"><?php echo $current_user->name;?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php echo $current_user->name;?>
                  <?php $groups = $this->aauth->get_user_groups(); ?>

                  <small><?php foreach ($groups as $g){ echo $g->name. ', ';} ?></small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo site_url('login/update_pass') ?>" class="btn btn-success btn-flat">Update Password</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo site_url('login/logout');?>" class="btn btn-danger btn-flat">Sign out</a>
                </div>
                <!-- /.row -->
              </li>      
    </nav>
  </header>

<?php if($this->session->flashdata('success')){ ?>
<script type="text/javascript">
    function notify() {
    new Noty({
            text: '<?php echo $this->session->flashdata('success'); ?>',
            layout: 'topRight',
            theme: 'relax',
            type: 'success',
            closeButton: true,
            timeout: 3500,
        }).show();

    }
    window.onload = notify;
</script>
<?php } ?>

<?php if($this->session->flashdata('error')){ ?>
<script type="text/javascript">
    function notify() {
    new Noty({
            text: '<?php echo $this->session->flashdata('success'); ?>',
            layout: 'topRight',
            theme: 'relax',
            type: 'error',
            closeButton: true,
            timeout: false
        }).show();

    }
    window.onload = notify;
</script>
<?php } ?>