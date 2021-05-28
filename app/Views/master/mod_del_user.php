<div id="delMem<?php echo $user['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="delMem<?php echo $user['id']; ?>Label" aria-hidden="true" class="modal fade">
  <div role="document" class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h4 id="delMem<?php echo $user['id']; ?>Label" class="modal-title">Delete user?</h4>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <p>Delete user <strong><?php echo $user['fname'] . ' ' . $user['lname']; ?>?</strong></p>
        <a href="<?php echo base_url() . '/index.php/delete-user/'. $user['id']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Delete User </a>
        <br>
      </div>
    </div>
  </div>
</div>
