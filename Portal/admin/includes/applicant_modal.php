


<!----=================================Job Details============================--------->


<!-- Add Job-->
<div class="modal fade" id="newJob">
    <!--Modal Dialog-->
    <div class="modal-dialog modal-lg">
        <!--Modal Content-->
        <div class="modal-content">
            <!--Modal Header-->
            <div class="modal-header">
              <h4 class="modal-title"><b>Job Details</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            </div>
            <!--Modal Header **End**-->
            <!--Modal Body-->
            <div class="modal-body">
              <form class="form-horizontal" id="formJob" method="POST" action="function/job_add.php" >

                <!--Applicants to Recruit-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Job Title</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control border border-secondary" name="title" autocomplete="off" required />
                  </div>
                </div>

                <!--Job Position-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Job Position</label>
                  <div class="col-sm-9">
                    <select class="form-control border border-secondary" name="position" required>
                        <option value="" selected>--Select Job Position--</option>
                        <?php
                          $sql = "SELECT * FROM position";
                          $query = $conn->query($sql);
                          while($prow = $query->fetch_assoc()){
                            echo "
                              <option value='".$prow['id']."'>".$prow['description']."</option>
                            ";
                          }
                        ?>
                      </select>
                  </div>
                </div>

                <!--Applicants to Recruit-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Applicants to Recruit</label>
                  <div class="col-sm-9">
                    <input type="number" class="form-control border border-secondary" name="recruit" min="1" step="1" required />
                  </div>
                </div>

                <!--Department-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Department</label>
                  <div class="col-sm-9">
                    <select name="department" class="form-control border border-secondary" required>
                      <option value="" selected>--Select Department--</option>
                      <?php
                          $sql = "SELECT * FROM department_category";
                          $query = $conn->query($sql);
                          while($drow = $query->fetch_assoc()){
                            echo "
                              <option value='".$drow['id']."'>".$drow['title']."</option>
                            ";
                          }
                        ?>
                    </select>
                  </div>
                </div>

                <!--Employement Term-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Employement Term</label>
                  <div class="col-sm-9">
                    <select name="term" class="form-control border border-secondary" required>
                      <option value="" selected>--Select Employement Term--</option>
                      <option value="Permanent">Permanent</option>
                      <option value="Contract">Contract</option>
                      <option value="Temporary">Temporary</option>
                    </select>
                  </div>
                </div>

                <!--Employement Type-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Employement Type</label>
                  <div class="col-sm-9">
                    <select name="type" class="form-control border border-secondary" required>
                      <option value="" selected>--Select Employement Type--</option>
                      <option value="Full Time">Full Time</option>
                      <option value="Part Time">Part Time</option>
                    </select>
                  </div>
                </div>

                <!--Experience-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Experience</label>
                  <div class="col-sm-9">
                    <select name="exp" class="form-control border border-secondary" required>
                      <option value="" selected>--Select Experience--</option>
                      <option value="No Experience Needed">No Experience</option>
                      <option value="Entry Level">Entry Level</option>
                      <option value="Internship">Internship</option>
                      <option value="Atleast One (1) Year of Experience">Atleast One (1) Year of Experience</option>
                      <option value="2 Years + of Experience">2 Years + of Experience</option>
                      <option value="5 Years + of Experience">5 Years + of Experience</option>
                      <option value="10 Years + of Experience">10 Years + of Experience</option>
                    </select>
                  </div>
                </div>

                <!--Salary Grade-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Salary Grade</label>
                  <div class="col-sm-9">
                    <select name="grade" class="form-control border border-secondary grade" required>
                      <option value="" selected>--Select Salary Grade--</option>
                    </select>
                  </div>
                </div>

                <!--Job Description-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Job Description</label>
                  <div class="col-sm-9">
                    <textarea class="form-control border border-secondary" required="" rows="4" autocomplete="off" name='desc'></textarea>
                  </div>
                </div>
              
            </div>
            <!--Modal Body **End**-->
            <!--Modal Footer-->
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="reset" class="btn btn-default btn-flat pull-left" id="reset_adeduc"><i class="fa fa-window-restore"></i> Set to Default</button>
              <button type="submit" class="btn btn-success btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
              </form>
            </div>
            <!--Modal Footer **End**-->
        </div>
        <!--Modal Content **end**-->
    </div>
    <!--Modal Dialog **end**-->
</div>
<!-- Add Job **End**-->



<!-- Edit Job-->
<div class="modal fade" id="editJob">
    <!--Modal Dialog-->
    <div class="modal-dialog modal-lg">
        <!--Modal Content-->
        <div class="modal-content">
            <!--Modal Header-->
            <div class="modal-header">
              <h4 class="modal-title"><b>Update Job Details</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            </div>
            <!--Modal Header **End**-->
            <!--Modal Body-->
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="function/job_edit.php" >
                <input type="hidden" name="id" id="edit_id" />

                <!--Applicants to Recruit-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Job Title</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control border border-secondary edit_title" autocomplete="off"  name="title" required />
                  </div>
                </div>

                <!--Job Title-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Job Position</label>
                  <div class="col-sm-9">
                    <select class="form-control border border-secondary edit_position" name="position" required>
                        <?php
                          $sql = "SELECT * FROM position";
                          $query = $conn->query($sql);
                          while($prow = $query->fetch_assoc()){
                            echo "
                              <option value='".$prow['id']."'>".$prow['description']."</option>
                            ";
                          }
                        ?>
                      </select>
                  </div>
                </div>

                <!--Applicants to Recruit-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Applicants to Recruit</label>
                  <div class="col-sm-9">
                    <input type="number" class="form-control border border-secondary edit_recruit" name="recruit" min="1" step="1" required />
                  </div>
                </div>

                <!--Department-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Department</label>
                  <div class="col-sm-9">
                    <select name="department" class="form-control border border-secondary edit_department" required>
                      <?php
                          $sql = "SELECT * FROM department_category";
                          $query = $conn->query($sql);
                          while($drow = $query->fetch_assoc()){
                            echo "
                              <option value='".$drow['id']."'>".$drow['title']."</option>
                            ";
                          }
                        ?>
                    </select>
                  </div>
                </div>

                <!--Employement Term-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Employement Term</label>
                  <div class="col-sm-9">
                    <select name="term" class="form-control border border-secondary edit_term" required>
                      <option value="Permanent">Permanent</option>
                      <option value="Contract">Contract</option>
                      <option value="Temporary">Temporary</option>
                    </select>
                  </div>
                </div>

                <!--Employement Type-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Employement Type</label>
                  <div class="col-sm-9">
                    <select name="type" class="form-control border border-secondary edit_type" required>
                      <option value="Full Time">Full Time</option>
                      <option value="Part Time">Part Time</option>
                    </select>
                  </div>
                </div>

                <!--Experience-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Experience</label>
                  <div class="col-sm-9">
                    <select name="exp" class="form-control border border-secondary edit_exp" required>
                      <option value="No Experience Needed">No Experience</option>
                      <option value="Entry Level">Entry Level</option>
                      <option value="Internship">Internship</option>
                      <option value="Atleast One (1) Year of Experience">Atleast One (1) Year of Experience</option>
                      <option value="2 Years + of Experience">2 Years + of Experience</option>
                      <option value="5 Years + of Experience">5 Years + of Experience</option>
                      <option value="10 Years + of Experience">10 Years + of Experience</option>
                    </select>
                  </div>
                </div>

                <!--Salary Grade-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Salary Grade</label>
                  <div class="col-sm-9">
                    <select name="grade" class="form-control border border-secondary grade edit_grade" required>
                      <option value="" selected>--Select Salary Grade--</option>
                    </select>
                  </div>
                </div>

                <!--Job Description-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Job Description</label>
                  <div class="col-sm-9">
                    <textarea class="form-control border border-secondary edit_desc" required="" rows="4" autocomplete="off" name='desc'></textarea>
                  </div>
                </div>
              
            </div>
            <!--Modal Body **End**-->
            <!--Modal Footer-->
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-save"></i> Save</button>
              </form>
            </div>
            <!--Modal Footer **End**-->
        </div>
        <!--Modal Content **end**-->
    </div>
    <!--Modal Dialog **end**-->
</div>
<!-- Edit Job **End**-->



<!-- View Job-->
<div class="modal fade" id="jobView">
    <!--Modal Dialog-->
    <div class="modal-dialog modal-lg">
        <!--Modal Content-->
        <div class="modal-content">
            <!--Modal Header-->
            <div class="modal-header">
              <h4 class="modal-title"><b>View Job Details</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            </div>
            <!--Modal Header **End**-->
            <!--Modal Body-->
            <div class="modal-body">

              <!--Applicants to Recruit-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Job Title</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control border border-secondary edit_title"  readonly />
                  </div>
                </div>

                <!--Job Title-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Job Position</label>
                  <div class="col-sm-9">
                    <input type="text" id="edit_title" class="form-control border border-secondary" readonly />
                  </div>
                </div>

                <!--Applicants to Recruit-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Applicants to Recruit</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control border border-secondary edit_recruit" readonly />
                  </div>
                </div>

                <!--Department-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Department</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control border border-secondary edit_department_title" readonly />
                  </div>
                </div>

                <!--Employement Term-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Employement Term</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control border border-secondary edit_term" readonly />
                  </div>
                </div>

                <!--Employement Type-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Employement Type</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control border border-secondary edit_type" readonly />
                  </div>
                </div>

                <!--Experience-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Experience</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control border border-secondary edit_exp" readonly />
                  </div>
                </div>

                <!--Salary Grade-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Salary Grade</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control border border-secondary edit_grade" readonly />
                  </div>
                </div>

                <!--Job Description-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Job Description</label>
                  <div class="col-sm-9">
                    <textarea class="form-control border border-secondary edit_desc" rows="4" readonly></textarea>
                  </div>
                </div>
              
            </div>
            <!--Modal Body **End**-->
            <!--Modal Footer-->
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            </div>
            <!--Modal Footer **End**-->
        </div>
        <!--Modal Content **end**-->
    </div>
    <!--Modal Dialog **end**-->
</div>
<!-- View Job **End**-->


<!-- Delete Job -->
<div class="modal fade" id="jobDelete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><b>Delete</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="function/job_delete.php">
                <input type="hidden" id="del_job" name="id">
                <input type="hidden" name="code" id="edit_code" />
                <div class="text-center">
                    <label>Are you sure you want to delete this job record?</label>
                    <h2 id="del_jobtitle" class="bold"></h2>
                    <label id="del_jcode"></label>
                    <div class="text-center text-danger" >
                      <label><i class="fa fa-exclamation-circle mx-1" aria-hidden="true"></i>
                       Note: Deleting this Job Record will also result in the deletion of application records connected to this job, and once deleted, this action can't be undone. </label>
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



<!-- Delete Job -->
<div class="modal fade" id="jobDelete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><b>Delete</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="function/job_delete.php">
                <input type="hidden" id="del_job" name="id">
                <input type="hidden" name="code" id="edit_code" />
                <div class="text-center">
                    <label>Are you sure you want to delete this job record?</label>
                    <h2 id="del_jobtitle" class="bold"></h2>
                    <label id="del_jcode"></label>
                    <div class="text-center text-danger" >
                      <label><i class="fa fa-exclamation-circle mx-1" aria-hidden="true"></i>
                       Note: Deleting this Job Record will also result in the deletion of application records connected to this job, and once deleted, this action can't be undone. </label>
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





