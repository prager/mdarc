<div id="delMem<?php echo $mem['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="delMem<?php echo $mem['id']; ?>Label" aria-hidden="true" class="modal fade">
  <div role="document" class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h4 id="delMem<?php echo $mem['id']; ?>Label" class="modal-title">Deactivate Member?</h4>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <p>Deactivate Member <strong><?php echo $mem['fname'] . ' ' . $mem['lname'] . ' ' . $mem['callsign']; ?>?</strong></p>
        <a href="<?php echo base_url() . '/index.php/delete-mem/'. $mem['id']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Deactivate </a>
        <br>
      </div>
    </div>
  </div>
</div>
