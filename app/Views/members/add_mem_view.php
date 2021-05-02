<div id="heading-breadcrumbs">
  <div class="container">
    <div class="row d-flex align-items-center flex-wrap">
      <div class="col-md-7">
        <h1 class="h2">Add Member</h1>
      </div>
      <div class="col-md-5">
        <ul class="breadcrumb d-flex justify-content-end">
          <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
          <li class="breadcrumb-item active">Add Member</li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div id="content">
  <div class="container">
    <?php echo form_open('edit-mem'); ?>
    <div class="row bar">
      <div class="form-group col-lg-2 offset-lg-2 text-center">
        <label for="arrl" class="font-weight-bold text-small">
        <?php
             $data = array(
                 'id' => 'arrl',
                 'name' => 'arrl',
                 'value' => 'TRUE',
                 'checked' => FALSE,
                 'class' => 'form-check-input'
             );
             echo form_checkbox($data);
            ?>ARRL Member</label>
            <!--<input type="checkbox" id="arrl" name="arrl" value="Bike" class="form-check-input">-->
      </div>
      <div class="form-group col-lg-2 text-center">
        <label class="font-weight-bold text-small">
        <?php
             $data = array(
               'id' => 'hard_news',
               'name' => 'hard_news',
               'value' => 'TRUE',
               'checked' => FALSE,
               'class' => 'form-check-input'
             );
             echo form_checkbox($data);
            ?>Carrier H-Copy</label>
      </div>
      <div class="form-group col-lg-2 text-center">
        <label class="font-weight-bold text-small">
        <?php
             $data = array(
                 'id' => 'dir',
                 'name' => 'dir',
                 'value' => 'TRUE',
                 'checked' => FALSE,
                 'class' => 'form-check-input'
             );
             echo form_checkbox($data);
            ?>Dir H-Copy</label>
      </div><div class="form-group col-lg-2 text-center">
        <label class="font-weight-bold text-small">
        <?php
             $data = array(
                 'id' => 'mem_card',
                 'name' => 'mem_card',
                 'value' => 'TRUE',
                 'checked' => FALSE,
                 'class' => 'form-check-input'
             );
             echo form_checkbox($data);
            ?>Mem Card</label>
      </div>
      <div class="col-lg-2">&nbsp;</div>
      <div class="form-group col-lg-4 offset-lg-2">
          <label class="font-weight-bold text-small" for="lic">License Type</label>
          <?php echo form_dropdown('lic', $lic, 'Technician', 'class="form-control"'); ?>
      </div>
      <div class="form-group col-lg-4">
        <label class="font-weight-bold text-small" for="mem_since"> Member Since (Year)<!--<span class="text-primary ml-1">&#42;</span>--></label>
        <?php
             $data = array(
                 'name' => 'mem_since',
                 'id' => 'mem_since',
                 'placeholder' => 'Member Since (Year)',
                 'title' => 'Member Since (Year)',
                 'class' => 'form-control'
             );
             echo form_input($data, date('Y', time()));
            ?>
      </div>
      <div class="form-group col-lg-4 offset-lg-2">
        <label class="font-weight-bold text-small" for="cur_year"> Fist Name<!--<span class="text-primary ml-1">&#42;</span>--></label>
        <?php
             $data = array(
                 'name' => 'fname',
                 'id' => 'fname',
                 'placeholder' => 'First Name',
                 'title' => 'First Name',
                 'class' => 'form-control'
             );
             echo form_input($data);
            ?>
      </div>
      <div class="form-group col-lg-4">
        <label class="font-weight-bold text-small" for="lname"> Last Name<!--<span class="text-primary ml-1">&#42;</span>--></label>
        <?php
             $data = array(
                 'name' => 'lname',
                 'id' => 'lname',
                 'placeholder' => 'Last Name',
                 'title' => 'Last Name',
                 'class' => 'form-control'
             );
             echo form_input($data);
            ?>
      </div>
      <div class="col-lg-2">&nbsp;</div>
      <div class="form-group col-lg-4 offset-lg-2">
        <label class="font-weight-bold text-small" for="callsign"> Callsign<!--<span class="text-primary ml-1">&#42;</span>--></label>
        <?php
             $data = array(
                 'name' => 'callsign',
                 'id' => 'callsign',
                 'placeholder' => 'Callsign',
                 'title' => 'Callsign',
                 'class' => 'form-control'
             );
             echo form_input($data);
            ?>
      </div>

      <div class="form-group col-lg-4">
        <label class="font-weight-bold text-small" for="cur_year"> Cur Year<!--<span class="text-primary ml-1">&#42;</span>--></label>
        <?php
             $data = array(
                 'name' => 'cur_year',
                 'placeholder' => 'Enter Current Year',
                 'title' => 'Enter Current Year',
                 'class' => 'form-control'
             );
             echo form_input($data, date('Y', time()));
            ?>
      </div>
      <div class="col-lg-2">&nbsp;</div>
      <div class="form-group col-lg-4 offset-lg-2">
        <label class="font-weight-bold text-small" for="pay_date"> Payment Date<!--<span class="text-primary ml-1">&#42;</span>--></label>
        <?php
             $data = array(
                 'type' => 'date',
                 'name' => 'pay_date',
                 'id' => 'pay_date',
                 'title' => 'Pay Date',
                 'class' => 'form-control'
             );
             echo form_input($data);
            ?>
      </div>
      <div class="form-group col-lg-4">
        <label class="font-weight-bold text-small" for="pay_date"> Email<!--<span class="text-primary ml-1">&#42;</span>--></label>
        <?php
             $data = array(
                 'type' => 'email',
                 'name' => 'email',
                 'placeholder' => 'Email',
                 'id' => 'email',
                 'title' => 'Email',
                 'class' => 'form-control'
             );
             echo form_input($data);
            ?>
      </div>
      <div class="col-lg-2">&nbsp;</div>
      <div class="form-group col-lg-4 offset-lg-2">
        <label class="font-weight-bold text-small" for="w_phone"> Cell Phone<!--<span class="text-primary ml-1">&#42;</span>--></label>
        <?php
             $data = array(
                 'name' => 'w_phone',
                 'placeholder' => 'Cell Phone',
                 'title' => 'Cell Phone',
                 'class' => 'form-control'
             );
             echo form_input($data);
            ?>
      </div>
      <div class="form-group col-lg-4">
        <label class="font-weight-bold text-small" for="h_phone"> Other Phone<!--<span class="text-primary ml-1">&#42;</span>--></label>
        <?php
             $data = array(
                 'name' => 'h_phone',
                 'placeholder' => 'Other Phone',
                 'title' => 'Other Phone',
                 'class' => 'form-control'
             );
             echo form_input($data);
            ?>
      </div>
      <div class="col-lg-2">&nbsp;</div>
      <div class="form-group col-lg-4 offset-lg-2">
        <label class="font-weight-bold text-small" for="address"> Street<!--<span class="text-primary ml-1">&#42;</span>--></label>
        <?php
             $data = array(
                 'name' => 'address',
                 'placeholder' => 'Enter Street',
                 'title' => 'Enter Street',
                 'class' => 'form-control'
             );
             echo form_input($data);
            ?>
      </div>
      <div class="form-group col-lg-4">
        <label class="font-weight-bold text-small" for="city"> City<!--<span class="text-primary ml-1">&#42;</span>--></label>
        <?php
             $data = array(
                 'name' => 'city',
                 'placeholder' => 'Enter City',
                 'title' => 'Enter City',
                 'class' => 'form-control'
             );
             echo form_input($data);
            ?>
      </div>
      <div class="col-lg-2">&nbsp;</div>
      <div class="form-group col-lg-4 offset-lg-2">
          <label class="font-weight-bold text-small" for="type">State</label>
          <?php echo form_dropdown('state', $states, 'CA', 'class="form-control"'); ?>
      </div>
      <div class="form-group col-lg-4">
      <label class="font-weight-bold text-small" for="zip"> Zip</label>
      <?php
           $data = array(
               'name' => 'zip',
               'placeholder' => 'Enter Zip',
               'title' => 'Enter Zip',
               'class' => 'form-control'
           );
           echo form_input($data);
          ?>
      </div>

      <div class="col-lg-2">&nbsp;</div>
      <div class="form-group col-lg-8 offset-lg-2">
        <label class="font-weight-bold text-small" for="comment"> Comment</label>
        <?php
             $data = array(
                 'name' => 'comment',
                 'placeholder' => 'Enter Comment',
                 'title' => 'Enter Comment',
                 'class' => 'form-control',
                 'rows' => 4,
                 'cols' => 65
             );
             echo form_textarea($data);
            ?>
      </div>

      <!--<div class="form-group col-lg-4">
          <label class="font-weight-bold text-small" for="type">Membership Type</label>
          <?php //echo form_dropdown('type', array('Primary', 'Individual', 'Spouse'), 0, 'class="form-control"'); ?>
      </div>-->
      <div class="form-group col-lg-7 offset-lg-5"><br>
        <button type="submit" class="btn btn-template-outlined"><i class="fa fa-sign-in"></i> Add Member</button><br><br>
      </div>
      <?php echo form_close(); ?>

    </div>
  </div>
</div>
