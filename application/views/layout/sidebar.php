<?php 
  $dataSetting = $this->db->get('order_setting')->result();
  $setting = null;
  foreach ($dataSetting as $value) {
    $setting = $value;
  }
 ?>
<div class="sidebar-wrapper">
  <div>
    <div class="logo-wrapper"><a href="<?php echo base_url('admin-dashboard'); ?>"><img class="img-fluid for-light" src="<?php echo base_url(); ?>assets/images/logo/<?php echo $value->logo; ?>" alt=""><img class="img-fluid for-dark" src="<?php echo base_url(); ?>assets/images/logo/<?php echo $value->logo; ?>" alt=""></a>
      <div class="back-btn"><i class="fa fa-angle-left"></i></div>
      <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
    </div>
    <div class="logo-icon-wrapper"><a href="<?php echo base_url('admin-dashboard'); ?>"><img class="img-fluid" src="<?php echo base_url(); ?>assets/images/logo/logo-icon.png" alt=""></a></div>
    <nav class="sidebar-main">
      <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
      <div id="sidebar-menu">
        <ul class="sidebar-links" id="simple-bar">
          <li class="back-btn"><a href="index.html"><img class="img-fluid" src="<?php echo base_url(); ?>assets/images/logo/logo-icon.png" alt=""></a>
            <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
          </li>
          <li class="sidebar-main-title">
            <div>
              <h6>Laundry Application</h6>
              <p>Dashboards <?php echo $user['level']; ?> .</p>
            </div>
          </li>
          <li class="sidebar-list"> 
            <a class="sidebar-link sidebar-title link-nav" href="<?php echo base_url('admin-dashboard'); ?>">
              <i data-feather="home"></i>
              <span class="lan-3">Dashboard</span>
            </a> 
          </li> 
          <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="javascript:;"><i data-feather="book"></i><span>Master Data</span></a>
            <ul class="sidebar-submenu">
              <!-- <li><a href="<?php echo base_url('outlet'); ?>">Outlet</a></li> -->
              <li><a href="<?php echo base_url('pelanggan') ?>">Pelanggan</a></li> 
              <!-- <li><a href="<?php echo base_url('paket-laundry') ?>">Paket Laundry</a></li> -->
              <li><a href="<?php echo base_url('karyawan') ?>">Karyawan</a></li> 
            </ul>
          </li> 
          <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="javascript:;"><i data-feather="shopping-bag"></i><span>Transaksi</span></a>
            <ul class="sidebar-submenu">
              <!-- <li><a href="<?php echo base_url('admin-online-order'); ?>">Online Order</a></li> -->
              <li><a href="<?php echo base_url('admin-reguler-order') ?>">Order</a></li>
              <!-- <li><a href="<?php echo base_url('admin-membership') ?>">Membership</a></li> -->
            </ul>
          </li>  
          <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="<?php echo base_url('atur-paket-reguler'); ?>"><i data-feather="box"> </i><span>Atur Paket Reguler</span></a></li>
          <!-- <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="<?php echo base_url('komisi-kurir'); ?>"><i data-feather="dollar-sign"> </i><span>Komisi Kurir</span></a></li> -->
          <!-- <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="<?php echo base_url('komisi-washing'); ?>"><i data-feather="dollar-sign"> </i><span>Komisi Washing</span></a></li> -->
          <!-- <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="<?php echo base_url('kinerja-pegawai'); ?>"><i data-feather="user"> </i><span>Kinerja Pegawai</span></a></li> -->
          <!-- <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="<?php echo base_url('admin-undang-teman'); ?>"><i data-feather="link"> </i><span>Undang Teman</span></a></li> -->
          <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="javascript:;"><i data-feather="list"></i><span>Laporan</span></a>
            <ul class="sidebar-submenu">
              <li><a href="<?php echo base_url('laporan-order'); ?>">Order</a></li>
              <!-- <li><a href="<?php echo base_url('laporan-membership') ?>">Membership</a></li> -->
              <li><a href="<?php echo base_url('laporan-pendapatan') ?>">Pendapatan</a></li>
            </ul>
          </li> 
        </ul>
      </div>
      <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
    </nav>
  </div>
</div>
