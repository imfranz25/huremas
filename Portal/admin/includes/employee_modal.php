<!-- Add -->
<div class="modal fade" id="addnew">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b>Select Employement Category</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group form-default text-center">
          <a href="employee.php?page=new_employee_cnt">
            <button type="button" class="btn btn-mat waves-effect waves-light btn-success" ><i class="fa fa-plus"></i>Contractual</button>
          </a>
          <br>
          <hr>
          <a href="employee.php?page=new_employee_jo">
            <button type="button" class="btn btn-mat waves-effect waves-light btn-success" ><i class="fa fa-plus"></i>Job Order</button>
          </a>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
      </div>
    </div>
  </div>
</div>




  <!-- Delete -->
<div class="modal fade" id="delete">
  <div class="modal-dialog">
    <div class="modal-content">
    	<div class="modal-header">
      	<h4 class="modal-title"><b>Archive</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        	<span aria-hidden="true">&times;</span>
        </button>
    	</div>
      <form class="form-horizontal" method="POST" action="function/employee_delete.php">
        <input type="hidden" class="empid" name="id">
        <div class="modal-body">
      		<div class="text-center">
          	<p>Are you sure you want to move this employee to archive? </p>
          	<h2 class="bold del_employee_name"></h2>
            <label>Employee ID : <span class="employee_id text-dark"></span></label>
            <div class="text-center text-info" >
              <i class="fa fa-exclamation-circle mx-1" aria-hidden="true"></i>
              <label> Info : You can retrieve this employee at archive section anytime</label>
            </div>
        	</div>
    	  </div>
        <div class="modal-footer">
        	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
        	<button type="submit" class="btn btn-warning text-dark btn-flat" name="delete"><i class="fa fa-archive"></i> Archive</button>	
        </div>
      </form>
    </div>
  </div>
</div>


<!-- Edit -->
<div class="modal fade" id="edit">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
    	<div class="modal-header">
      	<h4 class="modal-title">Edit Employee Record</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        	<span aria-hidden="true">&times;</span>
        </button>
    	</div>
      <form class="form-material" method="POST" action="function/employee_edit.php" enctype="multipart/form-data">
        <input type="hidden" class="empid" name="id">
        <input type="hidden" class="recid" name="eid">
        <div class="modal-body">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <h2 class="text-center"><b><span class="employee_id"></span></b></h2>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-12">
                  <h4>Profile Details</h4>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-6  ">
                  <div class="form-group">
                    <label for="" class="control-label req">First Name</label>
                    <input type="text" id="edit_firstname" name="firstname" class="form-control form-control-sm" required >
                  </div>
                  <div class="form-group">
                    <label for="" class="control-label">Middle Name (optional)</label>
                    <input type="text" id="edit_middlename" name="middlename" class="form-control form-control-sm" >
                  </div>
                  <div class="form-group">
                    <label for="" class="control-label">Last Name</label>
                    <input type="text" id="edit_lastname" name="lastname" class="form-control form-control-sm" required >
                  </div>
                  <div class="form-group">
                    <label for="" class="control-label">Suffix (optional)</label>
                    <input type="text" id="edit_suffix" name="suffix" class="form-control form-control-sm" >
                  </div>
                  <div class="form-group">
                    <label for="" class="control-label req">Date of Birth</label>
                    <input type="date" id="datepicker_edit" onchange="getAge(this.value)"  name="bday" class="form-control form-control-sm" required >
                  </div>
                  <div class="form-group">
                    <label for="" class="control-label">Age</label>
                    <input type="text" id="age" name="age" class="form-control form-control-sm" readonly="" >
                  </div>
                  <div class="form-group">
                    <label for="" class="control-label req">Sex</label>
                    <select name="sex" id="gender_val" class="form-control form-control-sm select2">
                      <option value="">--Select--</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label class="control-label req">Address</label>
                    <textarea class="form-control" rows="2" id="edit_address"  name="address" required=""></textarea>
                  </div>
                  <div class="form-group">
                    <label for="" class="control-label req">Mobile Number</label>
                    <input type="text" id="mobile" name="mobile" class="form-control form-control-sm" >
                  </div>
                  <div class="form-group">
                    <label for="" class="control-label req">Contact Number</label>
                    <input type="text" id="edit_contact" name="contact" class="form-control form-control-sm" >
                  </div>
                </div>
                <div class="col-md-6">
                	<label for="" class="control-label">Profile Photo</label>
                  <div class="form-group d-flex justify-content-center align-items-center">
                    <img src="../assets/profile/avatar-blank.jpg" alt="Avatar" id="cimg" class="img-thumbnail img-fluid" width="143" height="143">
                  </div>
                  <div class="form-group ">
                    <div class="custom-file">
                    	<input type="hidden" name="dbimage" id="dbimage">
                      <input type="file" class="" id="customFile" name="img" onchange="displayImg(this,$(this))">
                    </div>
                  </div> 
                  <div class="form-group">
                    <label class="control-label">Email</label>
                    <input type="email" id="edit_email" class="form-control form-control-sm" name="email" required >
                    <small id="#msg"></small>
                  </div>
                  <div class="form-group">
                    <label for="" class="control-label req">Category</label>
                    <select class="form-control" name="category" id="category" required onchange="reload(this.value)">
                      <option value="" selected>--Select--</option>
                      <?php
                        $sql = "SELECT * FROM employment_category ";
                        $query = $conn->query($sql);
                        while($prow = $query->fetch_assoc()):
                      ?>
                        <option value='<?php echo $prow['id']; ?>'>
                          <?php echo $prow['cat'].' ('.$prow['code'].')'; ?>
                        </option>
                      <?php endwhile; ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="" class="control-label req">Department</label>
                    <select class="form-control" id="department1" name="department" required>
                      <option value="" selected>--Select--</option>
                      <?php
                        $sql = "SELECT * FROM department_category";
                        $query = $conn->query($sql);
                        while($srow = $query->fetch_assoc()): 
                      ?>
                        <option value='<?php echo $srow['id']; ?>'>
                          <?php echo $srow['title'].' ('.$srow['code'].')'; ?>
                        </option>
                      <?php endwhile; ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="" class="control-label req">Designation</label>
                    <select class="form-control" name="position" id="position" onchange="getSalary()" required>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="" class="control-label req">Date Hired</label>
                    <input type="date" name="date_hired" id="date_hired" class="form-control form-control-sm" value="<?php echo date('Y-m-d'); ?>" required >
                  </div>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-6 border-bottom">
                  <h4>GOVENMENT ISSUED ID'S</h4>
                </div>
                <div class="col-md-6 border-bottom">
                  <h4>SALARY AND CONTRIBUTIONS</h4>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-6 border-right">
                  <div class="form-group">
                    <label for="" class="control-label req">TIN NUMBER</label>
                    <input type="text" name="tin" id="tin" class="form-control form-control-sm" >
                  </div>
                  <div class="form-group">
                    <label for="" class="control-label ">SSS</label>
                    <input type="text" name="sss" id="sss" class="form-control form-control-sm" >
                  </div>
                  <div class="form-group">
                    <label for="" class="control-label ">PAGIBIG</label>
                    <input type="text" name="pagibig" id="pagibig" class="form-control form-control-sm" >
                  </div>
                  <div class="form-group">
                    <label for="" class="control-label ">PHILHEALTH</label>
                    <input type="text" name="phealth" id="phealth" class="form-control form-control-sm" >
                  </div>  
                </div>

                <div class="col-md-6 border-right">
                  <div class="form-group">
                    <label id="income" for="" class="control-label">Basic Salary</label>
                    <input type="text" id="basic_salary" name="basic_salary" class="form-control form-control-sm" readonly="">
                  </div>
                  <div id="deducts" style="display: none;">
                    <div class="form-group">
                      <div class="col-md-6 border-bottom">
                        <h4>DEDUCTIONS</h4>
                      </div>
                    </div>
                    <div class="form-group ">
                      <div class="selectBox" onclick="showCheckboxes()">
                        <select class="form-control border border-secondary">
                          <option> Deductions</option>
                        </select>
                        <div class="overSelect"></div>
                      </div>        
                      <div id="checkBoxes" class="multipleSelection">
                        <hr>
                        <?php
                          $sql = "SELECT * FROM deduction";
                          $query = $conn->query($sql);
                          $cbcount=0;
                          $i=0;
                          while($srow = $query->fetch_assoc()):
                          if ($srow['deduction_type'] =="Fixed Amount" || $srow['deduction_type'] =="Hour Amount") {
                            $amt_rate = "&#8369; ".number_format($srow['amount_rate'],2);
                          }else {
                            $amt_rate = $srow['amount_rate']."%";
                          }
                        ?>
                        <label for="">&ensp;
                          <input type="checkbox" class="myCheckbox" value="<?php echo $srow['id']; ?>"  id="<?php echo 'cb'.$srow['id']; ?>" name="cb<?php echo $i; ?>"   />
                          <?php echo $srow['deduction_name']; ?> - <?php echo $srow['deduction_desc']; ?> - (<?php echo $amt_rate; ?>)
                        </label>
                        <hr>
                        <?php
                          $i++;
                          $cbcount++;
                          endwhile;
                        ?>
                        <input type="hidden" name="deductions" value="<?php echo $cbcount; ?>">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal Body End -->
      	<div class="modal-footer">
        	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
        	<button type="submit" class="btn btn-success btn-flat" name="edit">
            <i class="fa fa-check-square-o"></i> Update
          </button>
      	</div>
      </form>
    </div>
  </div>
</div>



<!-- View -->
<div class="modal fade" id="view">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
    	<div class="modal-header">
      	<h4 class="modal-title">View Employee Record</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        	<span aria-hidden="true">&times;</span>
        </button>
    	</div>
      <div class="modal-body">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <h2 class="text-center"><b><span class="employee_id"></span></b></h2>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-12">
                <h4>Profile Details</h4>
              </div>
            </div>
            <hr>
            <div class="row ">
              <div class="col-md-6  ">
                <div class="form-group">
                  <label for="" class="control-label">First Name</label>
                  <input type="text" id="view_firstname" class="form-control border border-secondary" readonly >
                </div>
                <div class="form-group">
                  <label for="" class="control-label">Middle Name</label>
                  <input type="text" id="view_middlename" class="form-control border border-secondary" readonly>
                </div>
                <div class="form-group">
                  <label for="" class="control-label">Last Name</label>
                  <input type="text" id="view_lastname" class="form-control border border-secondary" readonly >
                </div>
                <div class="form-group">
                  <label for="" class="control-label">Suffix</label>
                  <input type="text" id="view_suffix" readonly class="form-control border border-secondary" >
                </div>
                <div class="form-group">
                  <label for="" class="control-label">Date of Birth</label>
                  <input type="date" id="datepicker_view"  class="form-control border border-secondary" readonly >
                </div>
                <div class="form-group">
                  <label for="" class="control-label">Sex</label>
                  <input type="text"  id="gender_view" class="form-control border border-secondary" readonly >
                </div> 
                <div class="form-group">
                  <label class="control-label">Address</label>
                  <textarea class="form-control border border-secondary" rows="2" id="view_address" readonly></textarea>
                </div>
                <div class="form-group">
                  <label for="" class="control-label">Mobile Number</label>
                  <input type="text" id="view_mobile" readonly class="form-control border border-secondary" >
                </div>
                <div class="form-group">
                  <label for="" class="control-label">Contact Number</label>
                  <input type="text" id="view_contact" readonly class="form-control border border-secondary" >
                </div>
              </div>
              <div class="col-md-6">
              	<label for="" class="control-label">Profile Photo</label>
                <div class="form-group d-flex justify-content-center align-items-center">
                  <img src="" alt="Avatar" id="cimg_view" class="img-thumbnail img-fluid" width="143" height="143">
                </div>
                <div class="form-group">
                  <label class="control-label">Email</label>
                  <input type="email" id="view_email" class="form-control border border-secondary" readonly >
                </div>
                <div class="form-group">
                  <label for="" class="control-label">Category</label>
                  <input type="text" id="view_category" class="form-control border border-secondary" readonly >
                </div>
                <div class="form-group">
                  <label for="" class="control-label">Department</label>
                  <input type="text" id="view_department1" class="form-control border border-secondary" readonly >
                </div>
                <div class="form-group">
                  <label for="" class="control-label">Designation</label>
                  <input type="text" id="view_position" class="form-control border border-secondary" readonly >
                </div>
                <div class="form-group">
                  <label for="" class="control-label">Date Hired</label>
                  <input type="date" id="view_date_hired" class="form-control border border-secondary" readonly >
                </div>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-6 border-bottom">
                <h4>GOVENMENT ISSUED ID'S</h4>
              </div>
              <div class="col-md-6 border-bottom">
                <h4>SALARY AND CONTRIBUTIONS</h4>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-6 border-right">
                <div class="form-group">
                  <label for="" class="control-label">TIN NUMBER</label>
                  <input type="text" id="view_tin" class="form-control border border-secondary" readonly>
                </div>
                <div class="form-group">
                  <label for="" class="control-label ">SSS</label>
                  <input type="text" id="view_sss"  class="form-control border border-secondary" readonly>
                </div>
                <div class="form-group">
                  <label for="" class="control-label ">PAGIBIG</label>
                  <input type="text" id="view_pagibig" class="form-control border border-secondary" readonly>
                </div>
                <div class="form-group">
                  <label for="" class="control-label ">PHILHEALTH</label>
                  <input type="text" readonly id="view_phealth" class="form-control border border-secondary" >
                </div>     
              </div>
              <div class="col-md-6 border-right">
                <div class="form-group">
                  <label id="income" for="" class="control-label">Basic Salary</label>
                  <input type="text" id="view_basic_salary"  class="form-control border border-secondary" readonly="">
                </div> 
                <div id="deducts_view" class="d-none">
                  <h4>DEDUCTIONS</h4>
                    <div>
                      <ul id="deduc_list">     
                      </ul>
                  </div>
                </div>      
              </div>
            </div>
          </div>
        </div>
      </div>
    	<div class="modal-footer">
      	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
    	</div>
    </div>
  </div>
</div>



<!-- Update Photo -->
<div class="modal fade" id="edit_photo">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b><span class="del_employee_name"></span></b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" method="POST" action="function/employee_edit_photo.php" enctype="multipart/form-data">
        <input type="hidden" class="empid" name="id">
        <div class="modal-body">
          <div class="form-group">
            <label for="photo" class="col-sm-3 control-label">Update Photo</label>
            <div class="col-sm-9">
              <input type="file" id="photo" name="photo" required>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
          <button type="submit" class="btn btn-success btn-flat" name="upload"><i class="fa fa-check-square-o"></i> Update</button>
        </div>
      </form>
    </div>
  </div>
</div>    