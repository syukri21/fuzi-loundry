<?php 
  $dataSetting = $this->db->get('order_setting')->result();
  $setting = null;
  foreach ($dataSetting as $value) {
    $setting = $value;
  }
 ?>
<div class="page-header">
  <div class="header-wrapper row m-0">
    <form class="form-inline search-full col" action="#" method="get">
      <div class="form-group w-100">
        <div class="Typeahead Typeahead--twitterUsers">
          <div class="u-posRelative">
            <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text" placeholder="Search Cuba .." name="q" title="" autofocus>
            <div class="spinner-border Typeahead-spinner" role="status"><span class="sr-only">Loading...</span></div><i class="close-search" data-feather="x"></i>
          </div>
          <div class="Typeahead-menu"></div>
        </div>
      </div>
    </form>
    <div class="header-logo-wrapper col-auto p-0">
      <div class="logo-wrapper"><a href="<?php echo base_url('admin-dashboard'); ?>"><img class="img-fluid" src="<?php echo base_url(); ?>assets/images/logo/<?php echo $setting->logo; ?>" alt=""></a></div>
      <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i></div>
    </div>
    <div class="left-header col horizontal-wrapper ps-0">  
    </div>
    <div class="nav-right col-8 pull-right right-header p-0">
      <ul class="nav-menus">   
        <li class="onhover-dropdown">
          <div class="notification-box">
            <i data-feather="bell"></i>
            <span class="badge rounded-pill badge-secondary"><?php echo $notif->num_rows(); ?></span>
          </div>
          <ul class="notification-dropdown onhover-show-div">
            <li><i data-feather="bell"></i>
              <h6 class="f-18 mb-0">Penjemputan Hari Ini</h6>
            </li>   
            <li>
              <p>
                <span>Order ID</span> <span class="pull-right">Nama Pelanggan</span>
              </p>
            </li>
            <?php foreach ($notif->result() as $key => $value): ?>
              <li>
                <p><i class="fa fa-circle-o me-3 font-danger"></i><?php echo $value->order_id; ?> <span class="pull-right"><?php echo $value->nama_pelanggan; ?></span></p>
              </li> 
            <?php endforeach ?>
            <?php if($notif->num_rows() == 0) { ?>
              <li>
                <p>Tidak ada penjemputan orderan hari ini</p>
              </li>
            <?php } ?>
            <li>
              <a href="<?php echo base_url('kasir-order'); ?>" class="btn btn-secondary">Data Order</a>
            </li> 
          </ul>
        </li>
        <li>
          <div class="mode"><i class="fa fa-moon-o"></i></div>
        </li>  
        <li class="maximize"><a class="text-dark" href="javascript:;" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>
        <li class="nav onhover-dropdown p-0 me-0">
          <div class="media profile-media"><img class="b-r-10" src="<?php echo base_url(); ?>assets/images/dashboard/profile.jpg" alt="">
            <div class="media-body"><span><?php echo $user['nama_lengkap']; ?></span>
              <p class="mb-0 font-roboto"><?php echo $user['level']; ?> <i class="middle fa fa-angle-down"></i></p>
            </div>
          </div>
          <ul class="profile-dropdown onhover-show-div"> 
            <?php if($user['level'] == 'Pelanggan') { ?>
              <li><a href="<?php echo base_url('pelanggan-profile'); ?>"><i data-feather="user"> </i><span>Profile</span></a></li>
            <?php } ?>
            <li><a href="<?php echo base_url('logout'); ?>"><i data-feather="log-out"> </i><span>Log out</span></a></li>
          </ul>
        </li>
      </ul>
    </div> 
  </div>
</div>