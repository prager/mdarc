<div id="heading-breadcrumbs">
  <div class="container">
    <div class="row d-flex align-items-center flex-wrap">
      <div class="col-md-7">
        <h1 class="h2">Members</h1>
      </div>
      <div class="col-md-5">
        <ul class="breadcrumb d-flex justify-content-end">
          <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
          <li class="breadcrumb-item active">Members</li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div id="content">
  <div class="container">
    <div class="row bar">
      <div class="col-md-12">
        <nav id="myTab" role="tablist" class ="nav nav-tabs"><a id="tab4-1-tab" data-toggle="tab" href="#tab4-1" role="tab"
        aria-controls="tab4-1" aria-selected="true" class="nav-item nav-link active"> <i class="icon-star"></i>Members Current (<?php echo $cnt_cur; ?>)</a>
        <a id="tab4-2-tab" data-toggle="tab" href="#tab4-2" role="tab" aria-controls="tab4-2"
          aria-selected="false" class="nav-item nav-link">Carrier H-Copy (<?php echo $cnt_carr; ?>)</a>
        <a id="tab4-3-tab" data-toggle="tab" href="#tab4-3" role="tab" aria-controls="tab4-3"
          aria-selected="false" class="nav-item nav-link">Payment Due(<?php echo $cnt_pay; ?>)</a>
        <a id="tab4-4-tab" data-toggle="tab" href="#tab4-4" role="tab" aria-controls="tab4-4"
          aria-selected="false" class="nav-item nav-link">Inactive Members(<?php echo $cnt_del; ?>)</a>
        <a id="tab5-5-tab" data-toggle="tab" href="#tab5-5" role="tab" aria-controls="tab5-5"
          aria-selected="false" class="nav-item nav-link">Silent Keys(<?php echo $cnt_silents; ?>)</a>
        </nav>
        <div id="nav-tabContent" class="tab-content">
          <div id="tab4-1" role="tabpanel" aria-labelledby="tab4-1-tab" class="tab-pane fade show active">
          <?php echo anchor('staff/download_cur_emails', 'Download Current Emails') . ' | ' . anchor('staff/add_mem', 'Add Member') . ' | ' .
                anchor('staff/download_all_mems', 'Download All'); ?>
          <div class="table-responsive">
            <table id="example" style="width:100%" class="table table-striped table-bordered text-left">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Cur Yr</th>
                  <th>Mem Type</th>
                  <th>Callsign</th>
                  <th>Lic</th>
                  <th>Pay Dt</th>
                  <th>Mem Since</th>
                  <th>Email</th>
                  <th>&nbsp;</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach($cur_members as $mem) {?>
                <tr>
                  <td><a href="#" data-toggle="modal" data-target="#editMem<?php echo $mem['id']; ?>"><?php echo $mem['fname'] . ' ' . $mem['lname']; ?></a>
                           <?php include 'modal_update_mem.php'; ?></td>
                 <td><?php echo $mem['cur_year']; ?></td>
                 <td><?php echo $mem['mem_type']; ?></td>
                 <td><?php echo $mem['callsign']; ?></td>
                 <td><?php echo $mem['license']; ?></td>
                 <td><?php echo $mem['pay_date']; ?></td>
                 <td><?php echo $mem['mem_since']; ?></td>
                 <td><?php echo $mem['email']; ?></td>
                    <td class="text-center">
                      <a href="#" data-toggle="modal" data-target="#delMem<?php echo $mem['id']; ?>"><i class="fa fa-trash"></i></a>
                      <?php include 'mod_del_mem.php'; ?>
                    </td>
                </tr>
              <?php }?>
              </tbody>
            </table>
          </div>
    </div>
    <div id="tab4-2" role="tabpanel" aria-labelledby="tab4-2-tab" class="tab-pane fade">
        <?php echo anchor('staff/download_address_lbls', 'Download Labels'); ?>
      <div class="table-responsive">
        <table id="example" style="width:100%" class="table table-striped table-bordered text-left">
          <thead>
            <tr>
              <th>Name</th>
              <th>Callsign</th>
              <th>Address</th>
              <th>City</th>
              <th>State</th>
              <th>Zip</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach($carrier as $mem) {?>
            <tr>
             <td><?php echo $mem['fname'] . ' ' . $mem['lname']; ?></td>
             <td><?php echo $mem['callsign']; ?></td>
             <td><?php echo $mem['address']; ?></td>
             <td><?php echo $mem['city']; ?></td>
             <td><?php echo $mem['state']; ?></td>
             <td><?php echo $mem['zip']; ?></td>
            </tr>
          <?php }?>
          </tbody>
        </table>
      </div>
    </div>
    <div id="tab4-3" role="tabpanel" aria-labelledby="tab4-3-tab" class="tab-pane fade">
      <?php echo anchor('staff/download_due_emails', 'Download Due Emails') . ' | ' . anchor('staff/download_pay_due', 'Download Pay Due'); ?>
      <div class="table-responsive">
        <table id="example" style="width:100%" class="table table-striped table-bordered text-left">
          <thead>
            <tr>
              <th>Name</th>
              <th>Cur Yr</th>
              <th>Mem Type</th>
              <th>Callsign</th>
              <th>Lic</th>
              <th>Pay Dt</th>
              <th>Mem Since</th>
              <th>Email</th>
              <th>&nbsp;</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach($pay_due as $mem) {?>
            <tr>
             <td><a href="#" data-toggle="modal" data-target="#editMem<?php echo $mem['id']; ?>"><?php echo $mem['fname'] . ' ' . $mem['lname']; ?></a>
                      <?php include 'modal_update_mem.php'; ?></td>
             <td><?php echo $mem['cur_year']; ?></td>
             <td><?php echo $mem['mem_type']; ?></td>
             <td><?php echo $mem['callsign']; ?></td>
             <td><?php echo $mem['license']; ?></td>
             <td><?php echo $mem['pay_date']; ?></td>
             <td><?php echo $mem['mem_since']; ?></td>
             <td><?php echo $mem['email']; ?></td>
                <td class="text-center">
                  <a href="#" data-toggle="modal" data-target="#delMem<?php echo $mem['id']; ?>"><i class="fa fa-trash"></i></a>
                  <?php include 'mod_del_mem.php'; ?>
                </td>
            </tr>
          <?php }?>
          </tbody>
        </table>
      </div>
    </div>
    <div id="tab4-4" role="tabpanel" aria-labelledby="tab4-4-tab" class="tab-pane fade">
      <?php //echo anchor('staff/download_due_emails', 'Download Due Emails'); ?>
      <div class="table-responsive">
        <table id="example" style="width:100%" class="table table-striped table-bordered text-left">
          <thead>
            <tr>
              <th>Name</th>
              <th>Mem Type</th>
              <th>Callsign</th>
              <th>Lic</th>
              <th>Pay Dt</th>
              <th>Mem Since</th>
              <th>Email</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach($del_mems as $mem) {?>
            <tr>
             <td><a href="#" data-toggle="modal" data-target="#editMem<?php echo $mem['id']; ?>"><?php echo $mem['fname'] . ' ' . $mem['lname']; ?></a>
                      <?php include 'modal_update_mem.php'; ?></td>
             <td><?php echo $mem['mem_type']; ?></td>
             <td><?php echo $mem['callsign']; ?></td>
             <td><?php echo $mem['license']; ?></td>
             <td><?php echo $mem['pay_date']; ?></td>
             <td><?php echo $mem['mem_since']; ?></td>
             <td><?php echo $mem['email']; ?></td>
            </tr>
          <?php }?>
          </tbody>
        </table>
      </div>
    </div>


    <div id="tab5-5" role="tabpanel" aria-labelledby="tab5-5-tab" class="tab-pane fade">
      <?php //echo anchor('staff/download_due_emails', 'Download Due Emails'); ?>
      <div class="table-responsive">
        <table id="example" style="width:100%" class="table table-striped table-bordered text-left">
          <thead>
            <tr>
              <th>Name</th>
              <th>Callsign</th>
              <th>Date of Passing</th>
              <th>Year of Passing</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach($silent_keys as $mem) {?>
            <tr>
             <td><a href="#" data-toggle="modal" data-target="#editSilent<?php echo $mem['id']; ?>"><?php echo $mem['fname'] . ' ' . $mem['lname']; ?></a>
                      <?php include 'modal_edit_silent.php'; ?></td>
             <td><?php echo $mem['callsign']; ?></td>
             <td><?php echo $mem['silent_date']; ?></td>
             <td><?php echo $mem['silent_year']; ?></td>
            </tr>
          <?php }?>
          </tbody>
        </table>
      </div>
    </div>
    </div>

    </div>
  </div>
</div>
</div>
