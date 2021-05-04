<div id="heading-breadcrumbs">
  <div class="container">
    <div class="row d-flex align-items-center flex-wrap">
      <div class="col-md-7">
        <h1 class="h2">Staff Reports</h1>
      </div>
      <div class="col-md-5">
        <ul class="breadcrumb d-flex justify-content-end">
          <li class="breadcrumb-item"><?php echo anchor('home', 'Home Page'); ?></li>
          <li class="breadcrumb-item active">Staff Reports</li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div id="content">
  <div class="container">
    <div class="row">
      <div class="col-md-3">&nbsp;</div>
      <div class="col-md-8">
        <br><br><br>
        <h3>Membership Report</h3>
        <br>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3">&nbsp;</div>
      <div class="col-md-8">
        <p>Current members: <?php echo $cnt_cur; ?></p>
        <p>Past Due members: <?php echo $cnt_pay; ?></p>
        <p>Total Primary or Individual members: <?php echo $cnt_cur + $cnt_pay; ?></p>
        <p>Inactive members: <?php echo $cnt_del; ?></p>
        <p>Silent Keys <?php echo $cnt_silents; ?></p>
        <br><br><br><br><br>
      </div>
    </div>
  </div>
</div>
