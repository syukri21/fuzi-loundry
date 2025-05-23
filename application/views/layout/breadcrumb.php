<div class="page-title">
  <div class="row">
    <div class="col-6">
      <h3><?php echo $title; ?></h3>
    </div>
    <div class="col-6">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:;"><i data-feather="home"></i></a></li>
        <li class="breadcrumb-item"><?php echo $mainBreadcrumb; ?></li>
        <?php if($subBreadcrumb != '') { ?>
        <li class="breadcrumb-item active"><?php echo $subBreadcrumb; ?></li>
        <?php } ?>
      </ol>
    </div>
  </div>
</div>