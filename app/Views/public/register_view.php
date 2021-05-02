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
        <div class="col-md-3">
          <div class="form-group">
            <?php
               $data = array(
                  'name'          => 'fname',
                  'id'            => 'fname',
                  'value'         => $fname,
                  'maxlength'     => '75',
                  'size'          => '50',
                  'class'			=> 'form-control',
                  'placeholder' => 'First Name'
             );?>
             <label for="name-fname">* First Name</label>
             <?php echo form_input($data); ?>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <?php
               $data = array(
                  'name'          => 'lname',
                  'id'            => 'lname',
                  'value'         => $lname,
                  'maxlength'     => '75',
                  'size'          => '50',
                  'class'			=> 'form-control',
                  'placeholder' => 'Last Name'
             );?>
             <label for="name-lname">* Last Name</label>
             <?php echo form_input($data); ?>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3">&nbsp;</div>
        <div class="col-md-3">
          <div class="form-group">
            <?php
               $data = array(
                  'name'          => 'email',
                  'id'            => 'email',
                  'value'         => $email,
                  'maxlength'     => '75',
                  'size'          => '50',
                  'class'			=> 'form-control',
                  'placeholder' => 'Email'
             );?>
             <label for="name-email">* Email</label>
             <?php echo form_input($data); ?>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <?php
               $data = array(
                  'name'          => 'callsign',
                  'id'            => 'callsign',
                  'value'         => $callsign,
                  'maxlength'     => '75',
                  'size'          => '50',
                  'class'			=> 'form-control',
                  'placeholder' => 'Callsign'
             );?>
             <label for="name-callsign"> Callsign</label>
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
                    'name'          => 'phone',
                    'id'            => 'phone',
                    'value'         => $phone,
                    'maxlength'     => '75',
                    'size'          => '50',
                    'class'			=> 'form-control',
                    'placeholder' => 'Phone Number'
               );?>
               <label for="name-phone">* Phone Number</label>
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
                      'name'          => 'street',
                      'id'            => 'street',
                      'value'         => $street,
                      'maxlength'     => '75',
                      'size'          => '50',
                      'class'			=> 'form-control',
                      'placeholder' => 'Street'
                 );?>
                 <label for="name-street">* Street Address</label>
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
                    'name'          => 'city',
                    'id'            => 'city',
                    'value'         => $city,
                    'maxlength'     => '75',
                    'size'          => '50',
                    'class'			=> 'form-control',
                    'placeholder' => 'City'
               );?>
               <label for="name-city">* City</label>
               <?php echo form_input($data); ?>
            </div>
          </div>
      </div>
      <div class="row">
          <div class="col-md-3">&nbsp;</div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="name-state">* State</label>
              <?php echo form_dropdown('state', $states, $state, 'class="form-control"'); ?>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <?php
                 $data = array(
                    'name'          => 'zip_cd',
                    'id'            => 'zip_cd',
                    'value'         => $zip_cd,
                    'maxlength'     => '75',
                    'size'          => '50',
                    'class'			=> 'form-control',
                    'placeholder' => 'Zip Code'
               );?>
               <label for="name-zip_cd">* Zip Code</label>
               <?php echo form_input($data); ?>
            </div>
          </div>
      </div>

      <div class="row">
        <div class="col-md-3">&nbsp;</div>
        <div class="col-md-3">
          <div class="form-group">
            <?php
               $data = array(
                  'name'          => 'facebook',
                  'id'            => 'facebook',
                  'value'         => $facebook,
                  'maxlength'     => '75',
                  'size'          => '50',
                  'class'			=> 'form-control',
                  'placeholder' => 'Facebook URL'
             );?>
             <label for="name-facebook"> Facebook</label>
             <?php echo form_input($data); ?>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <?php
               $data = array(
                  'name'          => 'twitter',
                  'id'            => 'twitter',
                  'value'         => $twitter,
                  'maxlength'     => '75',
                  'size'          => '50',
                  'class'			=> 'form-control',
                  'placeholder' => 'Twitter URL'
             );?>
             <label for="name-twitter"> Twitter</label>
             <?php echo form_input($data); ?>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-3">&nbsp;</div>
        <div class="col-md-3">
          <div class="form-group">
            <?php
               $data = array(
                  'name'          => 'linkedin',
                  'id'            => 'linkedin',
                  'value'         => $linkedin,
                  'maxlength'     => '75',
                  'size'          => '50',
                  'class'			=> 'form-control',
                  'placeholder' => 'LinkedIn URL'
             );?>
             <label for="name-linkedin"> LinkedIn</label>
             <?php echo form_input($data); ?>
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
