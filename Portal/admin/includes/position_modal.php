<!-- Add -->
<div class="modal fade" id="addnew">
  <div class="modal-dialog">
    <div class="modal-content">
    	<div class="modal-header">
      	<h4 class="modal-title"><b>Add Designation</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      		<span aria-hidden="true">&times;</span>
        </button>
    	</div>
      <form class="form-horizontal" method="POST" action="function/position_add.php">
      	<div class="modal-body">
          <div class="form-group">
            <label for="rate" class="col-sm-3 control-label">Type</label>
            <div class="col-sm-9">
              <select id="typeS" name="type" class="form-control border border-secondary" onchange="changelabel()" required>
                <option value="1">Contractual (CNT)</option>
                <option value="2">Job Order (JO)</option>
              </select>
            </div>
          </div>
    		  <div class="form-group">
          	<label for="title" class="col-sm-3 control-label">Designation Title</label>
          	<div class="col-sm-9">
            	<input type="text" class="form-control" id="title" name="title" required>
          	</div>
          </div>
          <div class="form-group">
            <div id="bs" class="col-sm-12">
              <div class="form-group">
                <label  for="rate" class="control-label">Basic Salary: </label>
                <select class="border border-secondary" name="sslx" id="sslx" onchange="ssl_table()">
                  <?php
                    $sql = "SELECT * FROM ssl_table ";
                          $query = $conn->query($sql);
                    while($prow = $query->fetch_assoc()){
                      echo "<option value='".$prow['id']."'>Salary Grade - ".$prow['salary_grade']."</option>";
                    }
                  ?>
                </select>
                <label  for="" class="control-label"> - </label>
                <select class="border border-secondary" onchange="ssl_table()" name="step" id="step">
                  <?php
                    for ($i=1; $i < 9; $i++) { 
                     echo "<option value='S".$i."'>Step - ".$i."</option>";
                    }
                  ?>
                </select>
              </div>
            </div>
          </div>
          <div id="rph" style="display: none;">
            <label  for="rate" class="col-sm-3 control-label">Rate per Hr</label>
          </div>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="rate" name="rate" readonly="" required="">
          </div>
        </div>
      	<div class="modal-footer">
        	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
        	<button type="submit" class="btn btn-success btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
      	</div>
      </form>
    </div>
  </div>
</div>



<!-- Edit -->
<div class="modal fade" id="edit">
  <div class="modal-dialog">
    <div class="modal-content">
    	<div class="modal-header">
      	<h4 class="modal-title"><b>Update Designation</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      		<span aria-hidden="true">&times;</span>
        </button>
    	</div>
      <form class="form-horizontal" method="POST" action="function/position_edit.php">
        <input type="hidden" id="posid" name="id">
      	<div class="modal-body">
          <div class="form-group">
            <label for="rate" class="col-sm-3 control-label">Type</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="typeS2" name="type" readonly="">
            </div>
          </div>
          <div class="form-group">
            <label for="edit_title" class="col-sm-3 control-label">Designation Title
            </label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="edit_title" name="title">
            </div>
          </div>
          <div class="form-group">
            <div id="bs2" class="col-sm-12">
              <div class="form-group">
                <label  for="rate" class="control-label">Basic Salary: </label>
                <select class="border border-secondary" name="sslx2" id="sslx2" onchange="ssl_table2()">
                  <?php
                    $sql = "SELECT * FROM ssl_table ";
                    $query = $conn->query($sql);
                    while($prow = $query->fetch_assoc()){
                      echo "<option value='".$prow['id']."'>Salary Grade - ".$prow['salary_grade']."</option>";
                    }
                  ?>
                </select>
                <label  for="" class="control-label"> - </label>
                <select class="border border-secondary" name="step2" onchange="ssl_table2()" id="step2">
                  <?php
                    for ($i=1; $i < 9; $i++) { 
                     echo "<option value='S".$i."'>Step - ".$i."</option>";
                    }
                  ?>
                </select>
              </div>
            </div>
            <div id="rph2" style="display: none;">
              <label  for="rate" class="col-sm-3 control-label">Rate per Hr</label>
            </div>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="edit_rate" name="rate" required readonly="">
            </div>
          </div>
        </div>
      	<div class="modal-footer">
        	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
        	<button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
      	</div>
      </form>
    </div>
  </div>
</div>


<!-- Delete -->
<div class="modal fade" id="delete">
  <div class="modal-dialog">
    <div class="modal-content">
    	<div class="modal-header">
      	<h4 class="modal-title"><b>Delete</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      		<span aria-hidden="true">&times;</span>
        </button>
    	</div>
      <form class="form-horizontal" method="POST" action="function/position_delete.php">
        <input type="hidden" id="del_posid" name="id">
        <div class="modal-body">
      		<div class="text-center">
          	<p>Are you sure you want to delete this designation record(s)?</p>
          	<h2 id="del_position" class="bold"></h2>
            <div class="text-center text-danger" >
              <i class="fa fa-exclamation-circle mx-1" aria-hidden="true"></i>
              <label> Note: This process cannot be undone</label>
            </div>
            <hr>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label req">Password</label>
              <div class="col-sm-9">
                <input type="password" name="pass" class="form-control border border-secondary" required="" placeholder="Please enter your password for verification"  />
              </div>
            </div> 
        	</div>
        </div>
      	<div class="modal-footer">
        	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
        	<button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
      	</div>
      </form>
    </div>
  </div>
</div>



<!-- Add -->
<div class="modal fade" id="addnew2">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b>Add Department</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" method="POST" action="function/department_add.php">
        <div class="modal-body">
          <div class="form-group">
            <label for="title" class="col-sm-4 control-label">Department Title</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="" name="title" required>
            </div>
          </div>
          <div class="form-group">
            <label for="rate" class="col-sm-4 control-label">Department Code</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="" name="code" required>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
          <button type="submit" class="btn btn-success btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
        </div>
      </form>
    </div>
  </div>
</div>



<!-- Edit -->
<div class="modal fade" id="edit2">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b>Update Department</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" method="POST" action="function/department_edit.php">
        <input type="hidden" id="posid2" name="id">
        <div class="modal-body">
          <div class="form-group">
            <label for="edit_title" class="col-sm-4 control-label">Department Title
            </label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="edit_title2" name="title">
            </div>
          </div>
          <div class="form-group">
            <label for="edit_rate" class="col-sm-4 control-label">Department Code
            </label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="edit_code2" name="code">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
          <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
        </div>
      </form>
    </div>
  </div>
</div>



<!-- Delete -->
<div class="modal fade" id="delete2">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b>Delete</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" method="POST" action="function/department_delete.php">
        <input type="hidden" id="del_posid2" name="id">
        <div class="modal-body">
          <div class="text-center">
            <p>Are you sure you want to delete this department record(s)?</p>
            <h2 id="del_position2" class="bold"></h2>
            <div class="text-center text-danger" >
              <i class="fa fa-exclamation-circle mx-1" aria-hidden="true"></i>
              <label> Note: This process cannot be undone</label>
            </div>
            <hr />
            <div class="form-group row">
              <label class="col-sm-3 col-form-label req">Password</label>
              <div class="col-sm-9">
                <input type="password" name="pass" class="form-control border border-secondary" required="" placeholder="Please enter your password for verification"  />
              </div>
            </div> 
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
          <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
        </div>
      </form>
    </div>
  </div>
</div>


          