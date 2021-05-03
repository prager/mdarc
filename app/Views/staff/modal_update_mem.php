<div class="modal fade" id="editMem<?php echo $mem['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editMem" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content p-md-3">
      <div class="modal-header">
        <h4 class="modal-title"><?php echo $mem['fname'] . ' ' . $mem['lname'] . ' ' . $mem['callsign']; ?></h4>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <?php echo form_open('edit-mem/' . $mem['id']); ?>
          <div class="row">
            <div class="form-group col-lg-4">
              <label class="font-weight-bold text-small" for="cur_year"> Fist Name<!--<span class="text-primary ml-1">&#42;</span>--></label>
              <?php
            			 $data = array(
            			     'name' => 'fname',
                       'id' => 'fname',
            			     'placeholder' => 'First Name',
            			     'title' => 'First Name',
                       'class' => 'form-control'
            			 );
            			 echo form_input($data, $mem['fname']);
            			?>
            </div>
            <div class="form-group col-lg-4">
              <label class="font-weight-bold text-small" for="lname"> Last Name<!--<span class="text-primary ml-1">&#42;</span>--></label>
              <?php
            			 $data = array(
            			     'name' => 'lname',
                       'id' => 'lname',
            			     'title' => 'Last Name',
                       'class' => 'form-control'
            			 );
            			 echo form_input($data, $mem['lname']);
            			?>
            </div>
            <div class="form-group col-lg-4">
              <label class="font-weight-bold text-small" for="callsign"> Callsign<!--<span class="text-primary ml-1">&#42;</span>--></label>
              <?php
            			 $data = array(
            			     'name' => 'callsign',
                       'id' => 'callsign',
            			     'title' => 'Callsign',
                       'class' => 'form-control'
            			 );
            			 echo form_input($data, $mem['callsign']);
            			?>
            </div>
            <div class="form-group col-lg-6">
                <label class="font-weight-bold text-small" for="lic">License Type</label>
                <?php echo form_dropdown('lic', $lic, $mem['license'], 'class="form-control"'); ?>
            </div>
            <div class="form-group col-lg-6">&nbsp;</div>
            <div class="form-group col-lg-4">
              <label class="font-weight-bold text-small" for="w_phone"> Cell Phone <!--<span class="text-primary ml-1">&#42;</span>--></label>
              <?php
                   $data = array(
                       'name' => 'w_phone',
                       'placeholder' => 'Cell Phone',
                       'title' => 'Cell Phone',
                       'class' => 'form-control'
                   );
                   echo form_input($data, $mem['w_phone']);
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
                   echo form_input($data, $mem['h_phone']);
                  ?>
            </div>
            <div class="form-group col-lg-4">
              <label class="font-weight-bold text-small" for="email"> Email<!--<span class="text-primary ml-1">&#42;</span>--></label>
              <?php
            			 $data = array(
                       'type' => 'email',
            			     'name' => 'email',
                       'id' => 'email',
            			     'title' => 'Email',
                       'class' => 'form-control'
            			 );
            			 echo form_input($data, $mem['email']);
            			?>
            </div>
            <div class="form-group col-lg-2"><label class="font-weight-bold text-small">ARRL Member</label></div>
            <div class="form-group col-lg-1">
              <?php
                   $data = array(
                       'id' => 'arrl',
                       'name' => 'arrl',
                       'value' => 'TRUE',
                       'checked' => $mem['arrl'],
                       'class' => 'form-check-input'
                   );
                   echo form_checkbox($data);
                  ?>
            </div>
            <div class="form-group col-lg-2"><label class="font-weight-bold text-small">Carrier H-Copy</label></div>
            <div class="form-group col-lg-1">
              <?php
                   $data = array(
                       'id' => 'carrier',
                       'name' => 'carrier',
                       'value' => 'TRUE',
                       'checked' => $mem['carrier'],
                       'class' => 'form-check-input'
                   );
                   echo form_checkbox($data);
                  ?>
            </div>
            <div class="form-group col-lg-2"><label class="font-weight-bold text-small">Dir H-Copy</label></div>
            <div class="form-group col-lg-1">
              <?php
                   $data = array(
                       'id' => 'dir',
                       'name' => 'dir',
                       'value' => 'TRUE',
                       'checked' => $mem['dir'],
                       'class' => 'form-check-input'
                   );
                   echo form_checkbox($data);
                  ?>
            </div><div class="form-group col-lg-2"><label class="font-weight-bold text-small">Mem Card</label></div>
            <div class="form-group col-lg-1">
              <?php
                   $data = array(
                       'id' => 'mem_card',
                       'name' => 'mem_card',
                       'value' => 'TRUE',
                       'checked' =>$mem['mem_card'],
                       'class' => 'form-check-input'
                   );
                   echo form_checkbox($data);
                  ?>
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
            			 echo form_input($data, $mem['mem_since']);
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
            			 echo form_input($data, $mem['cur_year']);
            			?>
            </div>
            <div class="form-group col-lg-4">
              <label class="font-weight-bold text-small" for="pay_date"> Payment Date<!--<span class="text-primary ml-1">&#42;</span>--></label>
              <?php
            			 $data = array(
                       'type' => 'date',
            			     'name' => 'pay_date',
                       'id' => 'pay_date',
            			     'title' => 'Pay Date',
                       'class' => 'form-control'
            			 );
            			 echo form_input($data, $mem['pay_date']);
            			?>
            </div>

            <div class="form-group col-lg-6">
              <label class="font-weight-bold text-small" for="address"> Street<!--<span class="text-primary ml-1">&#42;</span>--></label>
              <?php
                   $data = array(
            			     'name' => 'address',
            			     'placeholder' => 'Enter Street',
            			     'title' => 'Enter Street',
                       'class' => 'form-control'
            			 );
            			 echo form_input($data, $mem['address']);
            			?>
            </div>
            <div class="form-group col-lg-6">&nbsp;</div>
            <div class="form-group col-lg-4">
              <label class="font-weight-bold text-small" for="city"> City<!--<span class="text-primary ml-1">&#42;</span>--></label>
              <?php
            			 $data = array(
            			     'name' => 'city',
            			     'placeholder' => 'Enter City',
            			     'title' => 'Enter City',
                       'class' => 'form-control'
            			 );
            			 echo form_input($data, $mem['city']);
            			?>
            </div>
            <div class="form-group col-lg-4">
                <label class="font-weight-bold text-small" for="type">State</label>
                <?php echo form_dropdown('state', $states, $mem['state'], 'class="form-control"'); ?>
            </div>
            <div class="form-group col-lg-4">
            <label class="font-weight-bold text-small" for="zip"> Zip<!--<span class="text-primary ml-1">&#42;</span>--></label>
            <?php
          			 $data = array(
          			     'name' => 'zip',
          			     'placeholder' => 'Enter Zip',
          			     'title' => 'Enter Zip',
                     'class' => 'form-control'
          			 );
          			 echo form_input($data, $mem['zip']);
          			?>
            </div>
            <div class="form-group col-lg-12">
            <label class="font-weight-bold text-small" for="comment"> Comment<!--<span class="text-primary ml-1">&#42;</span>--></label>
            <?php
          			 $data = array(
          			     'name' => 'comment',
          			     'placeholder' => 'Enter Comment',
          			     'title' => 'Enter Comment',
                     'class' => 'form-control',
                     'rows' => 4,
                     'cols' => 65
          			 );
          			 echo form_textarea($data, $mem['comment']);
          			?>
            </div>
            <!--<div class="form-group col-lg-4">
                <label class="font-weight-bold text-small" for="type">Membership Type</label>
                <?php //echo form_dropdown('type', array('Primary', 'Individual', 'Spouse'), 0, 'class="form-control"'); ?>
            </div>-->
            <div class="form-group col-lg-12 text-center"><br>
              <button type="submit" class="btn btn-template-outlined"><i class="fa fa-sign-in"></i> Submit Update</button><br><br>
            </div>
          </div>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>
