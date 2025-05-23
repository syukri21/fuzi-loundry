<?php 
  $dataSetting = $this->db->get('order_setting')->result();
  $setting = null;
  foreach ($dataSetting as $value) {
    $setting = $value;
  }
 ?>
 <div class="sidebar-wrapper">
  <div>
    <div class="logo-wrapper"><a href="<?php echo base_url('pelanggan-dashboard'); ?>"><img class="img-fluid for-light" src="<?php echo base_url(); ?>assets/images/logo/<?php echo $value->logo; ?>" alt=""><img class="img-fluid for-dark" src="<?php echo base_url(); ?>assets/images/logo/<?php echo $value->logo; ?>" alt=""></a>
      <div class="back-btn"><i class="fa fa-angle-left"></i></div>
      <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
    </div>
    <div class="logo-icon-wrapper"><a href="<?php echo base_url('pelanggan-dashboard'); ?>"><img class="img-fluid" src="<?php echo base_url(); ?>assets/images/logo/logo-icon.png" alt=""></a></div>
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
            <a class="sidebar-link sidebar-title link-nav" href="<?php echo base_url('pelanggan-dashboard'); ?>">
              <i data-feather="home"></i>
              <span class="lan-3">Dashboard</span>
            </a> 
          </li>  
          <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="<?php echo base_url('pelanggan-order'); ?>"><i data-feather="shopping-bag"> </i><span>Order</span></a></li>
          <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="<?php echo base_url('pelanggan-profile'); ?>"><i data-feather="user"> </i><span>Profile</span></a></li>
          <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="<?php echo base_url('undang-teman'); ?>"><i data-feather="link"> </i><span>Undang Teman</span></a></li>
        </ul>
      </div>
      <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
    </nav>
  </div>
</div>