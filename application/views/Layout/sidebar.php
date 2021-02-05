<?php $level = $this->session->userdata('level'); ?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li><a href="<?php echo base_url('Dashboard') ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <?php if ($level == 'Manager') { ?>

           <li class="active treeview menu-open">
          <a href="#">
            <i class="fa fa-desktop"></i> <span>Master Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('Mekanik') ?>"><i class="fa fa-circle-o"></i> Mekanik </a></li>
            <li><a href="<?php echo base_url('Mesin') ?>"><i class="fa fa-circle-o"></i> Mesin </a></li>
            <li><a href="<?php echo base_url('Part') ?>"><i class="fa fa-circle-o"></i> Sparepart </a></li>
          </ul>
        </li>
         
       <?php  } ?>
       
        <li class="treeview">
          <a href="#">
            <i class="fa fa-cogs"></i> <span>Maintenance</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Perbaikan&Perawatan Mesin
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <span class="pull-right-container">
                </span>
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> Perbaikan
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="<?php echo base_url('Kerusakan') ?>"><i class="fa fa-circle-o"></i> Kerusakan</a></li>
                    <li><a href="<?php echo base_url('Perbaikan') ?>"><i class="fa fa-circle-o"></i>  Perbaikan</a></li>
                  </ul>
                </li>
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> Perawatan
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="<?php echo base_url('Jadwal') ?>"><i class="fa fa-circle-o"></i> Jadwal Perawatan </a></li>
                    <li><a href="<?php echo base_url('Perawatan') ?>"><i class="fa fa-circle-o"></i> Penugasan Perawatan </a></li>
                  </ul>
                </li>
              </ul>
            </li>
          </ul>
        </li>
        <li><a href="<?php echo base_url('Laporan') ?>"><i class="fa fa-book"></i> <span>Daftar Laporan</span></a></li>
         <?php if ($level == 'Manager') { ?>
        <li><a href="<?php echo base_url('User') ?>"><i class="fa fa-users"></i> <span>User</span></a></li>
      <?php } ?>
      </ul>

    </section>
    <!-- /.sidebar -->
  </aside>