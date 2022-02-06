<!-- Add ACTION -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          	<div class="modal-header">
            	
            	<h4 class="modal-title"><b>New Disciplinary Action</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="function/disciplinaryA_add.php">

      

				<div class="form-group row">
					<label class="col-sm-2 col-form-label req">Employee</label>
                        <div class="col-sm-10">
                            <select name="employee" class="form-control border border-secondary" id="selectEmp" required="" >
                                <option value="">Select an Employee</option>
								<?php
                  $id = $user['employee_id'];
									$sql = "SELECT * FROM employees LEFT JOIN position ON position.id=employees.position_id LEFT JOIN department_category ON department_category.id=employees.department_id WHERE employees.employee_id != '$id' ";
									$query = $conn->query($sql);
									while($row = $query->fetch_assoc()){

										echo "<option value='".$row['employee_id']."' data-pos='".$row['description']."' data-dept='".$row['title']."'>".$row['firstname'].'  '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix']."</option>";
                          }
                       		 ?>
                            </select>
                        </div>
            	</div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Department</label>
          <div class="col-sm-10">
            <input type="text" id="department" class="form-control border border-secondary" placeholder="Department" readonly >
          </div>
        </div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Position</label>
					<div class="col-sm-10">
						<input type="text" id="posi" class="form-control border border-secondary" placeholder="Position" readonly >
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Issue Date</label>
					<div class="col-sm-10">
						<input type="text" class="form-control border border-secondary" placeholder="Date" value="<?php echo date('F d, Y'); ?>"readonly>
					</div>
				</div>


				<h4 class="sub-title">Disciplinary Information</h4>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label req">Reason</label>
                        <div class="col-sm-10">
                            <select name="reason" class="form-control border border-secondary">
                                <option value="">Select Reason</option>
								<?php
									$sql = "SELECT * FROM disciplinary_category";
									$query = $conn->query($sql);
									while($row = $query->fetch_assoc()){
										echo "
										<option value='".$row['id']."'>".$row['title']."</option>
                            ";
                          }
                       		 ?>
                            </select>
                        </div>
            	</div>
                                          
				

              <div class="form-group row">
                  <label class="col-sm-2 req">Internal Note</label>
                  <div class="col-sm-10">
                    <textarea class="form-control border border-secondary" required="" name='description' rows="10"></textarea>
                  </div>
              </div>
                



          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-flat" name="add_action"><i class="fa fa-save"></i> Proceed</button>
            	</form>
          	</div>
        </div>
    </div>
</div>


<!-- Edit ACTION -->
<div class="modal fade" id="edit_action">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
              
              <h4 class="modal-title"><b>Edit Disciplinary Action</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

        <form class="form-horizontal" method="POST" action="function/disciplinaryA_edit.php">

        <input type="hidden" name="reference" id="reference_DA">
        <div class="form-group row">
          <label class="col-sm-2 col-form-label req">Employee</label>
                        <div class="col-sm-10">
                            <select name="employee" class="form-control border border-secondary employee_DA" id="selectEmp2" required="" >
                <?php
                  $id = $user['employee_id'];
                  $sql = "SELECT * FROM employees LEFT JOIN position ON position.id=employees.position_id LEFT JOIN department_category ON department_category.id=employees.department_id WHERE employees.employee_id != '$id' ";
                  $query = $conn->query($sql);
                  while($row = $query->fetch_assoc()){

                    echo "<option value='".$row['employee_id']."' data-pos='".$row['description']."' data-dept='".$row['title']."'>".$row['firstname'].'  '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix']."</option>";
                          }
                           ?>
                            </select>
                        </div>
              </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Department</label>
          <div class="col-sm-10">
            <input type="text" id="department2" class="form-control department_DA border border-secondary" placeholder="Department" readonly >
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Position</label>
          <div class="col-sm-10">
            <input type="text" id="posi2" class="form-control posi_DA border border-secondary" placeholder="Position" readonly >
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Issue Date</label>
          <div class="col-sm-10">
            <input type="text" class="form-control date_DA border border-secondary" readonly>
          </div>
        </div>

        <ul class="nav nav-tabs mt-5 state_tab">
            <!--Dynamic Tab-->
        </ul>

        <div class="tab-content container mt-5">

          <div class="tab-pane fade show active" id="di" role="tabpanel" aria-labelledby="di">
            <div class="form-group row">
              <label class="col-sm-2 col-form-label req">Reason</label>
              <div class="col-sm-10">
                <select name="reason" class="form-control border border-secondary reason_DA" required> 
                  <?php
                    $sql = "SELECT * FROM disciplinary_category";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      echo "
                      <option value='".$row['id']."'>".$row['title']."</option>
                              ";
                    }
                  ?>
                </select>
              </div>
            </div>                            
            <div class="form-group row">
              <label class="col-sm-2 req">Internal Note</label>
              <div class="col-sm-10">
                <textarea class="form-control description_DA border border-secondary" required="" name='description' rows="10"></textarea>
              </div>
            </div>      
          </div>

          <div class="tab-pane fade" id="er" role="tabpanel" aria-labelledby="er">
            <div class="form-group row">
              <label class="col-sm-2">Attachment</label>
              <div class="col-sm-10">
                <a target="_blank" class="attachment_link_DA" href="javascript:void(0)">
                  
                </a>
              </div>
            </div>  
            <div class="form-group row">
              <label class="col-sm-2">Explanation</label>
              <div class="col-sm-10">
                <textarea class="form-control explain_DA border border-secondary" readonly rows="10"></textarea>
              </div>
            </div>                              
          </div>

          <div class="tab-pane fade" id="ad" role="tabpanel" aria-labelledby="ad">
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Action</label>
              <div class="col-sm-10">
                <input type="text" class="form-control action_DA border border-secondary" name="action" />
              </div>
            </div>  
            <div class="form-group row">
              <label class="col-sm-2">Action Details</label>
              <div class="col-sm-10">
                <textarea class="form-control action_details_DA border border-secondary" name='action_details' rows="10"></textarea>
              </div>
              
            </div>                              
          </div>
       

        </div>

        
      </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="edit_action"><i class="fa fa-save"></i> Proceed</button>
              </form>
            </div>
        </div>
    </div>
</div>


<!-- View Deisciplinary -->
<div class="modal fade" id="view_action">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
              
              <h4 class="modal-title"><b>View Disciplinary Action</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Employee</label>
                        <div class="col-sm-10">
                            <input type="text" class="employee_DA_view form-control border border-secondary" readonly="">
                        </div>
              </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Department</label>
          <div class="col-sm-10">
            <input type="text" class="form-control department_DA_view border border-secondary" placeholder="Department" readonly >
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Position</label>
          <div class="col-sm-10">
            <input type="text" class="form-control posi_DA_view border border-secondary" placeholder="Position" readonly >
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Issue Date</label>
          <div class="col-sm-10">
            <input type="text" class="form-control date_DA border border-secondary" readonly>
          </div>
        </div>

        <ul class="nav nav-tabs mt-5 state_tab_view">
            <!--Dynamic Tab-->
        </ul>

        <div class="tab-content container mt-5">

          <div class="tab-pane fade show active" id="di_view" role="tabpanel" aria-labelledby="di_view">
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Reason</label>
              <div class="col-sm-10">
                <input class="form-control border border-secondary" id="reason_DA" readonly> 
                  
              </div>
            </div>                            
            <div class="form-group row">
              <label class="col-sm-2">Internal Note</label>
              <div class="col-sm-10">
                <textarea class="form-control description_DA border border-secondary" readonly rows="10"></textarea>
              </div>
              
            </div>      
          </div>

          <div class="tab-pane fade" id="er_view" role="tabpanel" aria-labelledby="er_view">
            <div class="form-group row">
              <label class="col-sm-2">Attachment</label>
              <div class="col-sm-10">
                <a target="_blank" class="attachment_link_DA" href="javascript:void(0)">
                  
                </a>
              </div>
            </div>  
            <div class="form-group row">
              <label class="col-sm-2">Explanation</label>
              <div class="col-sm-10">
                <textarea class="form-control explain_DA" readonly rows="10"></textarea>
              </div>
            </div>                              
          </div>

          <div class="tab-pane fade" id="ad_view" role="tabpanel" aria-labelledby="ad_view">
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Action</label>
              <div class="col-sm-10">
                <input type="text" class="form-control action_DA border border-secondary" readonly />
              </div>
            </div>  
            <div class="form-group row">
              <label class="col-sm-2">Action Details</label>
              <div class="col-sm-10">
                <textarea class="form-control action_details_DA border border-secondary" readonly rows="10"></textarea>
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


<!-- Delete ACTION-->
<div class="modal fade" id="delete_action">
    <div class="modal-dialog ">
        <div class="modal-content">
          	<div class="modal-header">
            	
            	<h4 class="modal-title"><b>Delete<span class="bene_id"></span></b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="function/disciplinaryA_delete.php">
            		<input type="hidden" id="del_action_id" name="id">
            		<div class="text-center">
	                	<p>Are you sure you want to delete this disciplinary action record(s)?</p>
	                	<h2 id="del_action" class="bold h4"></h2>
                    <label id="ref_id"></label>
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
            	</form>
          	</div>
        </div>
    </div>
</div>




<!-- Add CATEGORY-->
<div class="modal fade" id="addnewCAT">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
      	<h4 class="modal-title"><b>New Disciplinary Category</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    	</div>
      <form class="form-horizontal" method="POST" action="function/disciplinaryC_add.php">
        <div class="modal-body">
  				<div class="form-group row">
  					<label class="col-sm-2 col-form-label req">Title</label>
            <div class="col-sm-10">
  						<input type="text" class="form-control border border-secondary" name="title" >
            </div>
          </div>
  				<div class="form-group row">
  					<label class="col-sm-2 col-form-label req">Category Type</label>
            <div class="col-sm-10">
  						<input type="text" class="form-control border border-secondary"  name="cat_type">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label req">Details</label>
            <div class="col-sm-10">
              <textarea class="form-control border border-secondary" required="" name='details' rows="8"></textarea>
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


<!-- Edit CATEGORY-->
<div class="modal fade" id="editCAT">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b>Edit Disciplinary Category</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" method="POST" action="function/disciplinaryC_edit.php">
        <input type="hidden" name="id" class="cat_id">
        <div class="modal-body">
          <div class="form-group row">
            <label class="col-sm-2 col-form-label req">Title</label>
            <div class="col-sm-10">
              <input type="text" class="form-control border border-secondary cat_title" name="title" >
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label req">Category Type</label>
            <div class="col-sm-10">
              <input type="text" class="form-control border border-secondary cat_type"  name="cat_type">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label req">Details</label>
            <div class="col-sm-10">
              <textarea class="form-control border border-secondary cat_details" required="" name='details' rows="8"></textarea>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
          <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-save"></i> Save Changes</button>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- View CATEGORY-->
<div class="modal fade" id="viewCAT">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b>View Disciplinary Category</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Title</label>
          <div class="col-sm-10">
            <input type="text" class="form-control border border-secondary cat_title" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Category Type</label>
          <div class="col-sm-10">
            <input type="text" class="form-control border border-secondary cat_type" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Details</label>
          <div class="col-sm-10">
            <textarea class="form-control border border-secondary cat_details" rows="8" readonly></textarea>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
      </div>
    </div>
  </div>
</div>


<!-- Delete Category-->
<div class="modal fade" id="deleteCAT">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b>Delete<span class="bene_id"></span></b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" method="POST" action="function/disciplinaryC_delete.php">
        <input type="hidden" class="cat_id" name="id">
        <div class="modal-body">
          <div class="text-center">
            <p>Are you sure you want to delete this disciplinary category?</p>
            <h2 id="del_cat" class="bold h4"></h2>
            <hr>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label req">Password</label>
                <div class="col-sm-9">
                  <input type="password" name="pass" class="form-control border border-secondary" required="" placeholder="Please enter your password for verification"  />
                </div>
              </div>
            <div class="text-center text-danger" >
              <i class="fa fa-exclamation-circle mx-1" aria-hidden="true"></i>
              <label> Note: You can't delete a category if its currently applied in disciplinary action</label>
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

