<div id="heading-breadcrumbs">
  <div class="container">
    <div class="row d-flex align-items-center flex-wrap">
      <div class="col-md-7">
        <h1 class="h2">New User Registration</h1>
      </div>
      <div class="col-md-5">
        <ul class="breadcrumb d-flex justify-content-end">
          <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
          <li class="breadcrumb-item active">New User</li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div id="content">
  <div class="container">
    <?php echo form_open('Home/send_reg'); ?>
    <div class="box">
      <?php if($msg != '') {?>
      <div class="row">
        <div class="col-md-3">&nbsp;</div>
        <div class="col-md-6">
          <p><?php echo $msg; ?>
        </div>
      </div>
      <?php } ?>
      <div class="row">
        <div class="col-md-3">&nbsp;</div>
          <div class="col-md-5">
            <div class="form-group">
              <?php
                 $data = array(
                    'name'          => 'user',
                    'id'            => 'user',
                    'value'         => '',
                    'maxlength'     => '75',
                    'size'          => '50',
                    'class'			=> 'form-control',
                    'placeholder' => 'User Name'
               );?>
               <label for="user"> Enter Username</label>
               <?php echo form_input($data); ?>
            </div>

          </div>
      </div>
      <div class="row">
        <div class="col-md-3">&nbsp;</div>
          <div class="col-md-5">
              <div class="form-group">
                <?php
                   $data = array(
                      'name'          => 'pass',
                      'id'            => 'pass',
                      'value'         => '',
                      'maxlength'     => '75',
                      'size'          => '50',
                      'class'			=> 'form-control',
                      'placeholder' => 'Enter Password'
                 );?>
                 <label for="pass"> Enter Password
                   (8 to 12 characters incl. at least one uppercase + lowercase letter, number and special character @#-_$%^&+=§!? )</label>
                 <?php echo form_password($data); ?>
              </div>
          </div>
      </div>
      <div class="row">
        <div class="col-md-3">&nbsp;</div>
          <div class="col-md-5">
            <?php
               $data = array(
                  'name'          => 'pass2',
                  'id'            => 'pass2',
                  'value'         => '',
                  'maxlength'     => '75',
                  'size'          => '50',
                  'class'			=> 'form-control',
                  'placeholder' => 'Re-Enter Password'
             );?>
             <label for="pass"> Re-Enter Password</label>
             <?php echo form_password($data); ?>
            </div>
          </div>
      </div>

      <div class="row">
        <div class="col-md-4">&nbsp;</div>
          <div class="col-md-3">
            <div class="text-center">
              <br>
              <span class="icon-input-btn">
                <i class="fa fa-sign-in"></i>
                <input type="submit" class="btn btn-outline-primary" value=" Send Registration ">
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php echo form_close(); ?>
  </div>
</div>
