<div id="heading-breadcrumbs">
  <div class="container">
    <div class="row d-flex align-items-center flex-wrap">
      <div class="col-md-7">
        <h1 class="h2">Edit Users</h1>
      </div>
      <div class="col-md-5">
        <ul class="breadcrumb d-flex justify-content-end">
          <li class="breadcrumb-item"><?php echo anchor('logout', 'Logout'); ?></li>
          <li class="breadcrumb-item active">Edit Users</li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div id="content">
  <div class="container">
    <div class="row">
      <div class="col-md-1">&nbsp;</div>
      <div class="col-md-10 text-center">
        <div class="table-responsive">
          <table id="example" style="width:100%" class="table table-striped table-bordered text-left">
            <thead>
              <tr>
                <th>Name</th>
                <th>Usr Type</th>
                <th>Position</th>
                <th>Activate/De-Act</th>
                <th>Auth/Unauthorize</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach($users as $user) {?>
              <tr>
                <td><a href="#" data-toggle="modal" data-target="#editUser<?php echo $user['id']; ?>"><?php echo $user['fname'] . ' ' . $user['lname']; ?></a>
                         <?php include 'modal_update_mem.php'; ?></td>
               <td><?php echo $user['type_desc']; ?></td>
               <td><?php echo $user['pos_name']; ?></td>
               <td><?php if($user['activated']) {
                 echo anchor('master/deactivate/' . $user['id'], 'Deactivate');
               }
               else {
                 echo anchor('master/activate/' . $user['id'], 'Activate');
               } ?></td>
               <td><?php if($user['authorized']) {
                 echo anchor('master/un_authorize/' . $user['id'], 'Unauthorize');
               }
               else {
                 echo anchor('master/authorize/' . $user['id'], 'Authorize');
               } ?></td>
               <td><?php echo $user['callsign']; ?></td>
                <td class="text-center">
                  <a href="#" data-toggle="modal" data-target="#delUser<?php echo $user['id']; ?>"><i class="fa fa-trash"></i></a>
                  <?php include 'mod_del_user.php'; ?>
                </td>
              </tr>
            <?php }?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-1">&nbsp;</div>
      <div class="col-md-10 text-center">
        <p>Soon to come...</p>
        <hr>
        <br><br><br><br><br>
      </div>
    </div>
  </div>
</div>
