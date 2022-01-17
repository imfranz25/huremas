
<!-- Add User-->
<div class="modal fade" id="addUsers">
    <!--Modal Dialog-->
    <div class="modal-dialog modal-md">
        <!--Modal Content-->
        <div class="modal-content">
            <!--Modal Header-->
            <div class="modal-header">
              <h4 class="modal-title"><b>New User</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            </div>
            <!--Modal Header **End**-->
            <!--Modal Body-->
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="function/users_add.php">
                <!-- Names-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Employee</label>
                  <div class="col-sm-8">
                    <select name="employee_id" id="employee_id" class="form-control form-control-sm select2" required>
                      <option value="">--select employee--</option>
                      <?php 
                      $employees = $conn->query("SELECT *,concat(lastname,', ',firstname,' ',middlename) as name FROM employees WHERE employee_id not in (SELECT employee_id FROM admin) order by concat(lastname,', ',firstname,' ',middlename) asc");
                      while($row=$employees->fetch_assoc()):
                      ?>
                      <option value="<?php echo $row['employee_id'] ?>" data-fn="<?php echo $row['firstname'] ?>" data-ln="<?php echo $row['lastname'] ?>" ><?php echo $row['name'] ?></option>
                      <?php endwhile; ?>
                  </select>
                  </div>
                </div>
                <!--OT Type-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">User Type</label>
                  <div class="col-sm-8">
                    <select name="type" class="form-control border border-secondary"  required>
                      <option value="employee" selected>Employee</option>
                      <option value="admin" >Admin</option>
                    </select>
                  </div>
                </div>
                <!-- Username-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Username</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control border border-secondary" name="username" id="username" readonly/>
                  </div>
                </div>
            </div>
            <!--Modal Body **End**-->
            <!--Modal Footer-->
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
              </form>
            </div>
            <!--Modal Footer **End**-->
        </div>
        <!--Modal Content **end**-->
    </div>
    <!--Modal Dialog **end**-->
</div>
<!-- Add User **End**-->



  <!-- Delete -->
<div class="modal fade" id="deleteOT">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">

            	<h4 class="modal-title"><b><span id="">Delete User</span></b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
          	</div>
          	<div class="modal-body">

            	<form class="form-horizontal" method="POST" action="function/users_delete.php">
            		<input type="hidden" id="deleteid" name="id">
            		<div class="text-center">
	                	<label>Are you sure you want to delete this user ? </label>
	                	<h2 class="bold" id="username_delete"></h2>
                    <div class="text-center text-danger" >
                      <i class="fa fa-exclamation-circle mx-1" aria-hidden="true"></i>
                      <label> Note: This process cannot be undone</label>
                    </div>
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
            	</form>
          	</div>
        </div>
    </div>
</div>



<!-- Edit User-->
<div class="modal fade" id="Edit_user">
    <!--Modal Dialog-->
    <div class="modal-dialog modal-md">
        <!--Modal Content-->
        <div class="modal-content">
            <!--Modal Header-->
            <div class="modal-header">
              <h4 class="modal-title"><b>Edit User</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            </div>
            <!--Modal Header **End**-->
            <!--Modal Body-->
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="function/users_edit.php">
                <input type="hidden" name="aid" id="aid">
                <!-- Names-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Employee</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control border border-secondary" name="name" id="name_edit" readonly/>
                  </div>
                </div>
                <!--OT Type-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">User Type</label>
                  <div class="col-sm-8">
                    <select name="type" class="form-control border border-secondary" id="user_type" required>
                      <option value="employee" selected>Employee</option>
                      <option value="admin" >Admin</option>
                    </select>
                  </div>
                </div>
                <!-- Username-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Username</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control border border-secondary" name="username" id="username_edit" readonly/>
                  </div>
                </div>
                <!-- pass-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Password</label>
                  <div class="col-sm-8">
                    <button type="submit" name="reset" class="btn btn-info btn-flat" ><i class="fa fa-circle-o-notch"></i> Reset</button>
                  </div>
                </div>
               
            </div>
            <!--Modal Body **End**-->
            <!--Modal Footer-->
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="add"><i class="fa fa-save"></i> Update</button>
              </form>
            </div>
            <!--Modal Footer **End**-->
        </div>
        <!--Modal Content **end**-->
    </div>
    <!--Modal Dialog **end**-->
</div>
<!-- Edit User **End**-->

