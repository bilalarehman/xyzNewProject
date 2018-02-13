<?php $current_user = $this->aauth->get_user();

$first = $this->uri->segment(1);
$second = $this->uri->segment(2);
$link = $first .'/'.$second; ?>

  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar sidebar-collapse">
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">

        <li class="header">Main Navigation</li>
                
        <?php

        $db_centralized = $this->load->database('centralized', TRUE);
        $query = $db_centralized->query("SELECT * FROM inf_main_menu WHERE ALLOW = 'Y' ORDER BY ORDER_BY");
        $main_menu = $query->result();

        foreach ($main_menu as $value): 

        $allowed_group = explode(',', $value->ALLOW_GROUP); 
        $user_groups = $this->main_db->allowed_groups();
        $allow_main_menu = array_intersect($user_groups, $allowed_group);
            
        if(!empty($allow_main_menu)) { ?>

        <li class="treeview <?php if($first == $value->PMENULINK){ echo 'active';}?>">
          <a href="#">
            <i class="<?php echo $value->PMENUICON; ?>"></i><span> <?php echo $value->PMENUNAME; ?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu" >

            <?php 

              $query2 = $db_centralized->query("SELECT * FROM inf_sub_menu WHERE PMENUID = {$value->PMENUID} AND ALLOW = 'Y' ORDER BY ORDER_BY");
              $sub_menu = $query2->result();

              if(!empty($sub_menu)) {

              foreach ($sub_menu as $value1): $allowed_group_s = explode(',', $value1->ALLOW_GROUP);
              $allow_sub_menu = array_intersect($user_groups, $allowed_group_s); 

              if(!empty($allow_sub_menu)) { ?>

              <li <?php if($link == $value1->MENULINK){ echo 'class="active"';}?>>
              <a href="<?php echo site_url($value1->MENULINK);?>"><i class="<?php echo $value1->MENUICON; ?>"></i><?php echo $value1->MENUNAME; ?></a></li>
            
              <?php } ?>

          <?php endforeach; } ?>
          
          </ul>

        </li>

        <?php } endforeach;  ?>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">


    <a href="../" class="btn btn-primary">BACK</a>

  </small>
  </h1>
</section>

<!-- Main content -->
<section class="content">
