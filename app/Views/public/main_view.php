<div id="heading-breadcrumbs">
  <div class="container">
    <div class="row d-flex align-items-center flex-wrap">
      <div class="col-md-7">
        <h1 class="h2">Members Portal</h1>
        <small style="color:red;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Under Construction)</small>
      </div>
      <div class="col-md-5">
        <ul class="breadcrumb d-flex justify-content-end">
          <!--<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>-->
          <li class="breadcrumb-item active">Login</li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div id="content">
  <div class="container">
    <div class="row bar">
      <div class="col-md-2">&nbsp;</div>
      <div class="col-md-8">
        <section>
          <div class="box-simple box-white same-height">
          <!--<form action="customer-orders.html" method="get">-->
          <?php //$validation->listErrors(); ?>
          <?php echo form_open('login'); ?>
            <br>
                <h4>Enter Username and Password</h4>
                <br>
                <div class="form-group">
                  <?php
                     $usr_data = array(
								        'name'          => 'user',
								        'id'            => 'user',
								        'value'         => '',
								        'maxlength'     => '100',
								        'size'          => '50',
                     		'class'			=> 'form-control',
                     		'placeholder' => 'Enter User ID'
                   );?>
			             <?php echo form_input($usr_data); ?>
                </div>
                <br>
                <div class="form-group">
                  <!--<input id="password_modal" type="password" placeholder="password" class="form-control">-->
                  <?php $usr_data = array(
								        'name'          => 'pass',
								        'id'            => 'pass',
								        'value'         => '',
								        'maxlength'     => '100',
								        'size'          => '50',
                        'class'			=> 'form-control',
                        'placeholder' => 'Enter Password'
			                     );?>
                     			<?php echo form_password($usr_data);?>
                </div>
                <br>
                <p class="text-center">
                  <!--<button class="btn btn-template-outlined"><i class="fa fa-sign-in"></i> Log in</button>-->
                  <!--<input type="submit" value="Submit" class="btn btn-template-outlined"><i class="fa fa-sign-in"></i>-->
                  <?php  //echo form_submit('submit', ' Log In ', 'class="btn btn-template-outlined"'); ?>
                  <span class="icon-input-btn">
                		<i class="fa fa-sign-in"></i>
                		<input type="submit" class="btn btn-outline-primary" value=" Login ">
                	</span>
                </p>
                <small>Register <?php echo anchor('register', 'here' ); ?></small>
            <br>
          <?php echo form_close(); ?>
        </div>
        </section>
      </div>
    </div>
  </div>
</div>
