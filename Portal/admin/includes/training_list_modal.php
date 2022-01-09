

<!-- Add Training-->
<div class="modal fade" id="trainingNew">
    <!--Modal Dialog-->
    <div class="modal-dialog modal-lg">
        <!--Modal Content-->
        <div class="modal-content">
            <!--Modal Header-->
            <div class="modal-header">
              <h4 class="modal-title"><b>Add Training</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            </div>
            <!--Modal Header **End**-->
            <!--Modal Body-->
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="function/training_list_add.php" >
                <!--Title-->
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label req">Title</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control border border-secondary" name="title" autocomplete="off" required />
                  </div>
                </div>
                <!--Objective-->
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label req">Objective</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control border border-secondary" name="objective" autocomplete="off" required />
                  </div>
                </div>

                <!--Course-->
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label req">Course</label>
                  <div class="col-sm-10">
                    <select class="form-control border border-secondary" required name="course" onchange="if (this.value=='nothing') {window.location='training_course.php';}">
                      <option value="">--Select Course--</option>
                      <?php
                        $sql = "SELECT * FROM training_course"; 
                        $query = $conn->query($sql);
                        $count = $query->num_rows;
                        if ($count<1) {
                      ?>
                        <option value="nothing">There is no course available Click Here to create one !</option>
                      <?php
                        }else{
                          while ($row=$query->fetch_assoc()) {
                      ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['course_title']; ?></option>
                      <?php
                          }//while
                        }//else
                      ?>
                    </select>
                  </div>
                </div>

                <!--Batch Size-->
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label req">Batch Size</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control border border-secondary" name="size" autocomplete="off" min="1" required />
                  </div>
                </div>
                <!--Schedule-->
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label req">Schedule</label>
                  <div class="col-sm-5">
                    <input type="datetime-local" class="form-control border border-secondary from" name="from" min="<?php echo date('Y-m-d').'T00:00';  ?>"  required />
                  </div>
                  <div class="col-sm-5">
                    <input type="datetime-local" class="form-control border border-secondary to" name="to" min="<?php echo date('Y-m-d').'T00:00';  ?>"   required />
                  </div>
                </div>

                <!--Training Mode-->
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label req">Training Mode</label>
                  <div class="col-sm-10">
                    <select class="border border-secondary form-control" name="mode" required="">
                      <option value="">--Select Training Mode--</option>
                      <option value="Online">Online</option>
                      <option value="Offline">Offline</option>
                      <option value="Hybrid">Hybrid</option>
                    </select>
                  </div>
                </div>

                <!--Vendor-->
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label req">Vendor</label>
                  <div class="col-sm-10">
                    <select class="form-control border border-secondary" required name="vendor" onchange="if (this.value=='nothing') {window.location='training_vendor.php';}">
                      <option value="">--Select Vendor--</option>
                      <?php
                        $sql = "SELECT * FROM training_vendor"; 
                        $query = $conn->query($sql);
                        $count = $query->num_rows;
                        if ($count<1) {
                      ?>
                        <option value="nothing">There is no vendor available Click Here to create one !</option>
                      <?php
                        }else{
                          while ($row=$query->fetch_assoc()) {
                      ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['vendor_name']; ?></option>
                      <?php
                          }//while
                        }//else
                      ?>
                    </select>
                  </div>
                </div>

                <!--Trainer-->
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label req">Trainer</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control border border-secondary" name="trainer" autocomplete="off" required />
                  </div>
                </div>

                <!--Experience-->
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label req">Experience</label>
                  <div class="col-sm-10">
                    <textarea class="form-control border border-secondary" rows="5" name="exp"  required ></textarea>
                  </div>
                </div>

                <!--Training Details-->
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label req">Training Details</label>
                  <div class="col-sm-10">
                    <textarea class="form-control border border-secondary" rows="8" name="details"  required ></textarea>
                  </div>
                </div>


           
            </div>
            <!--Modal Body **End**-->
            <!--Modal Footer-->
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="reset" class="btn btn-default btn-flat pull-left"><i class="fa fa-window-restore"></i> Set to Default</button>
              <button type="submit" class="btn btn-success btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
              </form>
            </div>
            <!--Modal Footer **End**-->
        </div>
        <!--Modal Content **end**-->
    </div>
    <!--Modal Dialog **end**-->
</div>
<!-- Add Training **End**-->




<!-- Edit Training-->
<div class="modal fade" id="trainingEdit">
    <!--Modal Dialog-->
    <div class="modal-dialog modal-lg">
        <!--Modal Content-->
        <div class="modal-content">
            <!--Modal Header-->
            <div class="modal-header">
              <h4 class="modal-title"><b>Edit Training</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            </div>
            <!--Modal Header **End**-->
            <!--Modal Body-->
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="function/training_list_edit.php" >
                <input type="hidden" name="code" class="code">
                <!--Title-->
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label req">Title</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control border border-secondary training_title" name="title" autocomplete="off" required />
                  </div>
                </div>
                <!--Objective-->
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label req">Objective</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control border border-secondary training_objective" name="objective" autocomplete="off" required />
                  </div>
                </div>

                <!--Course-->
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label req">Course</label>
                  <div class="col-sm-10">
                    <select class="form-control border border-secondary training_course" name="course" required onchange="if (this.value=='nothing') {window.location='training_course.php';}">
                      <?php
                        $sql = "SELECT * FROM training_course"; 
                        $query = $conn->query($sql);
                        $count = $query->num_rows;
                        if ($count<1) {
                      ?>
                        <option value="nothing">There is no course available Click Here to create one !</option>
                      <?php
                        }else{
                          while ($row=$query->fetch_assoc()) {
                      ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['course_title']; ?></option>
                      <?php
                          }//while
                        }//else
                      ?>
                    </select>
                  </div>
                </div>

                <!--Batch Size-->
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label req">Batch Size</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control border border-secondary training_size" name="size" autocomplete="off" min="1" required />
                  </div>
                </div>

                <!--Schedule-->
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label req">Schedule</label>
                  <div class="col-sm-5">
                    <input type="datetime-local" class="form-control border border-secondary from" name="from"  required />
                  </div>
                  <div class="col-sm-5">
                    <input type="datetime-local" class="form-control border border-secondary to" name="to"  required />
                  </div>
                </div>

                <!--Training Mode-->
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label req">Training Mode</label>
                  <div class="col-sm-10">
                    <select class="border border-secondary form-control training_mode" name="mode" required="">
                      <option value="Online">Online</option>
                      <option value="Offline">Offline</option>
                      <option value="Hybrid">Hybrid</option>
                    </select>
                  </div>
                </div>

                <!--Vendor-->
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label req">Vendor</label>
                  <div class="col-sm-10">
                    <select class="form-control border border-secondary training_vendor" name="vendor" required onchange="if (this.value=='nothing') {window.location='training_vendor.php';}">
                      <?php
                        $sql = "SELECT * FROM training_vendor"; 
                        $query = $conn->query($sql);
                        $count = $query->num_rows;
                        if ($count<1) {
                      ?>
                        <option value="nothing">There is no vendor available Click Here to create one !</option>
                      <?php
                        }else{
                          while ($row=$query->fetch_assoc()) {
                      ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['vendor_name']; ?></option>
                      <?php
                          }//while
                        }//else
                      ?>
                    </select>
                  </div>
                </div>

                <!--Trainer-->
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label req">Trainer</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control border border-secondary training_trainer" name="trainer" autocomplete="off" required />
                  </div>
                </div>

                <!--Experience-->
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label req">Experience</label>
                  <div class="col-sm-10">
                    <textarea class="form-control border border-secondary training_exp" rows="5" name="exp"  required ></textarea>
                  </div>
                </div>

                <!--Training Details-->
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label req">Training Details</label>
                  <div class="col-sm-10">
                    <textarea class="form-control border border-secondary training_details" rows="8" name="details"  required ></textarea>
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
<!-- Edit Training **End**-->


<!-- View Training-->
<div class="modal fade" id="trainingView">
    <!--Modal Dialog-->
    <div class="modal-dialog modal-lg">
        <!--Modal Content-->
        <div class="modal-content">
            <!--Modal Header-->
            <div class="modal-header">
              <h4 class="modal-title"><b>View Training</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            </div>
            <!--Modal Header **End**-->
            <!--Modal Body-->
            <div class="modal-body">
                <!--Title-->
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Title</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control border border-secondary training_title" readonly="" />
                  </div>
                </div>
                <!--Objective-->
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Objective</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control border border-secondary training_objective" readonly />
                  </div>
                </div>

                <!--Course-->
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Course</label>
                  <div class="col-sm-10">
                    <input type="text" class="training_course_view border border-secondary form-control" readonly="">
                  </div>
                </div>

                <!--Batch Size-->
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Batch Size</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control border border-secondary training_size" readonly />
                  </div>
                </div>

                <!--Schedule-->
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Schedule</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control border border-secondary from_view"   readonly />
                  </div>
                  <div class="col-sm-5">
                    <input type="text" class="form-control border border-secondary to_view"   readonly />
                  </div>
                </div>

                <!--Training Mode-->
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Training Mode</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control border border-secondary training_mode" readonly>
                  </div>
                </div>

                <!--Vendor-->
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Vendor</label>
                  <div class="col-sm-10">
                    <input type="text" readonly="" class="border border-secondary form-control training_vendor_view">
                  </div>
                </div>

                <!--Trainer-->
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Trainer</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control border border-secondary training_trainer" readonly />
                  </div>
                </div>

                <!--Experience-->
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Experience</label>
                  <div class="col-sm-10">
                    <textarea class="form-control border border-secondary training_exp" rows="5" readonly ></textarea>
                  </div>
                </div>

                <!--Training Details-->
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Training Details</label>
                  <div class="col-sm-10">
                    <textarea class="form-control border border-secondary training_details" rows="8" readonly ></textarea>
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
<!-- View Training **End**-->

<!-- Delete Training -->
<div class="modal fade" id="trainingDelete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><b>Delete</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="function/training_list_delete.php">
                <input type="hidden" name="code" class="code" />
                <div class="text-center">
                    <label>Are you sure you want to delete this training record?</label>
                    <h2 id="del_training" class="bold"></h2>
                    <label id="del_tcode"></label>
                    <div class="text-center text-danger" >
                      <label><i class="fa fa-exclamation-circle mx-1" aria-hidden="true"></i>
                       Note: Deleting this Training Record will also result in the deletion of employee training records connected to this training, and once deleted, this action can't be undone. </label>
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






