

  <!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">

            	<h4 class="modal-title"><b>Archive</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
          	</div>
          	<div class="modal-body">

            	<form class="form-horizontal" method="POST" action="function/employee_delete.php">
            		<input type="hidden" class="empid" name="id">
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
            	</form>
          	</div>
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
              		<span aria-hidden="true">&times;</span></button>
          	</div>
          	<div class="modal-body">
              <div class="card">
        <div class="card-body">

            <form class="form-material" method="POST" action="function/employee_edit.php" enctype="multipart/form-data">
              <input type="hidden" class="empid" name="id">
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
                            <label for="" class="control-label req">Department</label>
                            <select class="form-control" id="department1" name="department" required>
                                <option value="" selected>--Select--</option>
                                <?php

                                  $sql = "SELECT * FROM department_category";
                                  $query = $conn->query($sql);
                                  while($srow = $query->fetch_assoc()){
                                    echo "
                                      <option value='".$srow['id']."'>".$srow['title']." (".$srow['code'].")</option>
                                    ";
                                  }
                                ?>
                          </select>
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label req">Designation</label>
                            <select class="form-control" name="position" id="position" onchange="getSalary()" required>
                                <option value="" selected>--Select--</option>
                                <?php
                                  $sql = "SELECT * FROM position";
                                  $query = $conn->query($sql);
                                  while($prow = $query->fetch_assoc()){
                                    echo "
                                      <option value='".$prow['id']."' data-rate='".$prow['rate']."'>".$prow['description']."</option>
                                    ";
                                  }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label req">Category</label>
                            <select class="form-control" name="category" id="category" required>
                                <option value="" selected>--Select--</option>
                                <?php
                                  $sql = "SELECT * FROM employment_category";
                                  $query = $conn->query($sql);
                                  while($prow = $query->fetch_assoc()){
                                    echo "
                                      <option value='".$prow['id']."'>".$prow['cat']." (".$prow['code'].")</option>
                                    ";
                                  }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label req">Schedule</label>
                            <select class="form-control" id="schedule" name="schedule" required>
                                <option value="" selected>--Select--</option>
                                <?php
                                  $sql = "SELECT * FROM schedules";
                                  $query = $conn->query($sql);
                                  while($srow = $query->fetch_assoc()){
                                    echo "
                                      <option value='".$srow['id']."'>".$srow['time_in'].' - '.$srow['time_out']."</option>
                                    ";
                                  }
                                ?>
                              </select>
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label req">Date Hired</label>
                            <input type="date" name="date_hired" id="date_hired" class="form-control form-control-sm" value="<?php echo date('Y-m-d'); ?>" required >
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label ">Date Regularization</label>
                            <input type="date" name="date_regular" id="date_regular" class="form-control form-control-sm"  >
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
                            <label for="" class="control-label req">SSS</label>
                            <input type="text" name="sss" id="sss" class="form-control form-control-sm" >
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label req">PAGIBIG</label>
                            <input type="text" name="pagibig" id="pagibig" class="form-control form-control-sm" >
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label req">PHILHEALTH</label>
                            <input type="text" name="phealth" id="phealth" class="form-control form-control-sm" >
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label req">TIN NUMBER</label>
                            <input type="text" name="tin" id="tin" class="form-control form-control-sm" >
                        </div>
                    </div>
                    <div class="col-md-6 border-right">
                        <div class="form-group">
                            <label for="" class="control-label">Basic Salary</label>
                            <input type="text" id="basic_salary" name="basic_salary" class="form-control form-control-sm" readonly="">
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label">Daily Wage</label>
                            <input type="text" id="daily_wage" name="daily_wage" class="form-control form-control-sm" readonly="">
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label req">SSS Premium</label>
                            <input type="text" name="sss_prem" id="sss_prem" class="form-control form-control-sm" >
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label req">PHILHEALTH Premium</label>
                            <input type="text" name="phealth_prem" id="phealth_prem" class="form-control form-control-sm" >
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label req">PAGIBIG Premium</label>
                            <input type="text" name="pagibig_prem" id="pagibig_prem" class="form-control form-control-sm" >
                        </div>
                    </div>
                </div>
  
          </div>
        </div>



          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
            	</form>
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
                  <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="function/employee_edit_photo.php" enctype="multipart/form-data">
                <input type="hidden" class="empid" name="id">
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
              </form>
            </div>
        </div>
    </div>
</div>    