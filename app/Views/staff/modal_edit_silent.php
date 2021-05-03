<div class="modal fade" id="editSilent<?php echo $mem['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editMem" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
    <div class="modal-content p-md-3">
      <div class="modal-header">
        <h4 class="modal-title"><?php echo $mem['fname'] . ' ' . $mem['lname'] . ' ' . $mem['callsign']; ?></h4>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <?php echo form_open('load-silent/' . $mem['id']); ?>
          <div class="row">
            <div class="form-group col-lg-12">

              <label class="font-weight-bold text-small" for="pay_date"> Update Silent Date<!--<span class="text-primary ml-1">&#42;</span>--></label>
              <?php
            			 $data = array(
                       'type' => 'date',
            			     'name' => 'sil_date',
                       'id' => 'sil_date',
            			     'title' => 'Silent Date',
                       'class' => 'form-control'
            			 );
            			 echo form_input($data, $mem['silent_date']);
            			?>
            </div>
            <div class="form-group col-lg-12">
              <?php echo anchor('unset-silent-key/' . $mem['id'], ' Unset Silent Key'); ?>
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
