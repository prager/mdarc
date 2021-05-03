<div id="silentDate<?php echo $mem['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="silentDate<?php echo $mem['id']; ?>Label" aria-hidden="true" class="modal fade">
  <div role="document" class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h4 id="silentDate<?php echo $mem['id']; ?>Label" class="modal-title">Set Silent Key?</h4>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <p>Set date of Passing for Silent Key <strong>
          <?php echo $mem['fname'] . ' ' . $mem['lname'] . ' ' . $mem['callsign']; ?>?</strong></p><br><br>
            <?php echo form_open('staff/set_silent/' . $mem['id']); ?>
          <label class="font-weight-bold text-small" for="silent_date"> Silent Key Date<!--<span class="text-primary ml-1">&#42;</span>--></label>
          <?php
               $data = array(
                   'type' => 'date',
                   'name' => 'silent_date',
                   'id' => 'silent_date',
                   'title' => 'Silent Date',
                   'class' => 'form-control'
               );
               echo form_input($data, date('Y-m-d', time()));
              ?>
        </div>
        <button type="submit" class="btn btn-outline-dark"><i class="fa fa-check"></i> Set Silent Key </button>
        <?php echo form_close(); ?>
        <br>
      </div>
    </div>
  </div>
</div>
