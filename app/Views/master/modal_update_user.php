<div class="modal fade" id="editUser<?php echo $user['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editUser" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content p-md-3">
      <div class="modal-header">
        <h4 class="modal-title"><?php echo $user['fname'] . ' ' . $user['lname'] . ' ' . $user['callsign']; ?></h4>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <?php echo form_open('edit-user/' . $user['id']); ?>
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
            			 echo form_input($data, $user['fname']);
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
            			 echo form_input($data, $user['lname']);
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
            			 echo form_input($data, $user['callsign']);
            			?>
            </div>
            <div class="form-group col-lg-6">
                <label class="font-weight-bold text-small" for="pos">Position Description</label>
                <?php echo form_dropdown('pos', $user['type_desc'], $user['usr_types'], 'class="form-control"'); ?>
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
                   echo form_input($data, $user['w_phone']);
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
                   echo form_input($data, $user['h_phone']);
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
            			 echo form_input($data, $user['email']);
            			?>
            </div>
            <div class="form-group col-lg-2"><label class="font-weight-bold text-small">ARRL Member</label></div>
            <div class="form-group col-lg-1">
              <?php
                   $data = array(
                       'id' => 'arrl',
                       'name' => 'arrl',
                       'value' => 'TRUE',
                       'checked' => $user['arrl'],
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
                       'checked' => $user['carrier'],
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
                       'checked' => $user['dir'],
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
                       'checked' =>$user['mem_card'],
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
            			 echo form_input($data, $user['mem_since']);
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
            			 echo form_input($data, $user['cur_year']);
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
            			 echo form_input($data, $user['pay_date']);
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
            			 echo form_input($data, $user['address']);
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
            			 echo form_input($data, $user['city']);
            			?>
            </div>
            <div class="form-group col-lg-4">
                <label class="font-weight-bold text-small" for="type">State</label>
                <?php echo form_dropdown('state', $states, $user['state'], 'class="form-control"'); ?>
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
          			 echo form_input($data, $user['zip']);
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
          			 echo form_textarea($data, $user['comment']);
          			?>
            </div>
            <div class="form-group col-lg-12">
              <?php echo anchor('set-silent-key/'. $user['id'], 'Set Silent Key'); ?>
            </div>
            <div class="form-group col-lg-12 text-center"><br>
              <button type="submit" class="btn btn-template-outlined"><i class="fa fa-sign-in"></i> Submit Update</button><br><br>
            </div>
          </div>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>
