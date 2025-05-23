<!DOCTYPE html>
<html lang="en">
  <head>
  	<?php 
  		$pageData = array(
  			'title' => 'Profile',
  			'mainBreadcrumb' => 'Profile',
  			'subBreadcrumb' => '', 
  		);
  	 ?>
    <?php $this->load->view('layout/head',$pageData); ?>
  </head>
  <body>
    <?php $this->load->view('layout/loader'); ?>
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
      <!-- Page Header Start-->
      <?php $this->load->view('layout/header', $pageData); ?>
      <!-- Page Header Ends-->
      <!-- Page Body Start-->
      <div class="page-body-wrapper">
        <!-- Page Sidebar Start-->
        <?php $this->load->view('layout/sidebar_pelanggan'); ?>
        <!-- Page Sidebar Ends-->
        <div class="page-body">
          <div class="container-fluid">        
            <?php $this->load->view('layout/breadcrumb', $pageData); ?>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid"> 
            <div class="edit-profile">
              <div class="row">
                <div class="col-xl-4">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title mb-0">My Profile</h4>
                      <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                    </div>
                    <div class="card-body">
                      <form>
                        <div class="row mb-2">
                          <div class="profile-title">
                            <div class="media">                        <img class="img-70 rounded-circle" alt="" src="<?php echo base_url(); ?>assets/images/dashboard/profile.jpg">
                              <div class="media-body">
                                <h5 class="mb-1"><?php echo $user['nama_lengkap']; ?></h5>
                                <p><?php echo $user['level']; ?></p>
                              </div>
                            </div>
                          </div>
                        </div> 
                        <div class="mb-3">
                          <label class="form-label"><b>Email : </b></label>
                          <p>
                            <?php echo $user['email']; ?>
                          </p>
                        </div> 
                        <div class="mb-3">
                          <label class="form-label"><b>Nomor WhatsApp : </b></label>
                          <p>
                            <?php echo $user['no_wa']; ?>
                          </p>
                        </div> 
                        <div class="mb-3">
                          <label class="form-label"><b>Alamat : </b></label>
                          <p>
                            <?php echo $user['alamat']; ?>
                          </p>
                        </div> 
                        <div class="mb-3">
                          <label class="form-label"><b>Lokasi Google Map : </b></label>
                          <p>
                            <a target="_blank" href="<?php echo $user['lokasi']; ?>"><?php echo $user['lokasi']; ?></a>
                          </p>
                        </div> 
                      </form>
                    </div>
                  </div>
                </div>
                <div class="col-xl-8">
                  <form class="card" method="post" action="<?php echo base_url('update-profile-pengguna'); ?>">
                    <input type="hidden" name="id_user" value="<?php echo $user['id_user']; ?>">
                    <input type="hidden" name="id_pelanggan" value="<?php echo $user['id']; ?>">
                    <div class="card-header">
                      <h4 class="card-title mb-0">Edit Profile</h4>
                      <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input value="<?php echo $user['nama_lengkap']; ?>" required="" class="form-control" name="nama_lengkap" id="nama_lengkap" type="text" placeholder="Masukkan Nama Lengkap">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input value="<?php echo $user['email']; ?>" required="" class="form-control"  name="email" id="email" type="email" placeholder="Masukkan Email">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="mb-3">
                            <label class="form-label">Nomor WhatsApp</label>
                            <input value="<?php echo $user['no_wa']; ?>" required="" class="form-control"  name="no_wa" id="no_wa" type="text" placeholder="Masukkan Nomor WhatsApp">
                          </div>
                        </div>  
                        <div class="col-md-12">
                          <div class="mb-3">
                            <label class="form-label">Lokasi Google Maps</label>
                            <input value="<?php echo $user['lokasi']; ?>" required="" class="form-control"  name="lokasi" id="lokasi" type="text" placeholder="Masukkan Link Lokasi Google Maps">
                          </div>
                        </div>   
                        <div class="col-md-12">
                          <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea required="" class="form-control"  name="alamat" id="alamat" rows="5" placeholder="Masukkan Alamat"><?php echo $user['alamat']; ?></textarea>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="mb-3">
                            <label class="form-label">Password</label> 
                            <input class="form-control"  name="password" id="password" type="text" placeholder="Password Baru">
                            Kosongkan jika tidak ingin mengubah password Anda.
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer text-end">
                      <button class="btn btn-primary" type="submit">Update Profile</button>
                    </div>
                  </form>
                </div> 
              </div>
            </div> 
          </div>  
          <!-- Container-fluid Ends-->
        </div>
        <!-- footer start-->
        <?php $this->load->view('layout/footer'); ?>
      </div>
    </div>
    <?php $this->load->view('layout/js'); ?> 
    <script type="text/javascript">   
      const base_url = '<?php echo base_url(); ?>' 
      const notifOpt = {
        type: 'theme',
        allow_dismiss: true,
        delay: 3000,
        showProgressbar: true,
        timer: 300,
        animate:{
          enter:'animated fadeInDown',
          exit:'animated fadeOutUp'
        }
      } 

      $(document).ready(function () {
        var status = "<?php echo $this->session->flashdata('status'); ?>"

        if(status == 'success') {
          $.notify('<i class="fa fa-check"></i><strong>Berhasil</strong> mengubah profile', notifOpt)    
        }
        if(status == 'error') {
          $.notify('<i class="fa fa-remove"></i><strong>Error</strong> kesalahan sistem', notifOpt)    
        }
      })
    </script>
  </body>
</html>