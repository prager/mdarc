<div id="heading-breadcrumbs">
  <div class="container">
    <div class="row d-flex align-items-center flex-wrap">
      <div class="col-md-7">
        <h1 class="h2">Master Page</h1>
      </div>
      <div class="col-md-5">
        <ul class="breadcrumb d-flex justify-content-end">
          <li class="breadcrumb-item"><?php echo anchor('logout', 'Logout'); ?></li>
          <li class="breadcrumb-item active">Main Page</li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div id="content">
  <div class="container">
    <div class="row">
      <div class="col-md-1">&nbsp;</div>
      <div class="col-md-10 text-center">
        <br><br><br><br><br>
          <hr>
        <h3>Master - Not done yet!</h3>
        <br><br>
      </div>
    </div>
    <div class="row">
      <div class="col-md-1">&nbsp;</div>
      <div class="col-md-10 text-center">
        <p>Staff page: <?php echo anchor('staff', 'Staff Page'); ?> </p>
        <p>Members: <?php echo anchor('members', 'Members'); ?> </p>
        <!--<p>Special function: <?php //echo anchor('staff/verify_payment', 'Verify Payments'); ?></p>-->
        <p>Download user types: <?php echo anchor('master/download_user_types', 'Download User Types'); ?>
        <p>Download users: <?php echo anchor('master/download_users', 'Download Users'); ?>
        <p>Edit users: <?php echo anchor('edit-users', 'Edit Users'); ?>
        <hr>
        <br><br><br><br><br>
      </div>
    </div>
  </div>
</div>
