

<!-- Manage Attendees-->
<div class="modal fade " id="training_list_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
  <!--Modal Dialog-->
  <div class="modal-dialog modal-xl">
    <!--Modal Content-->
    <div class="modal-content">
      <!--Modal Header-->
      <div class="modal-header">
        <h4 class="modal-title"><b>Request Training</b></h4>
        <button type="button" class="close closeModal" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;
        </button>
      </div>
      <!--Modal Header **End**-->

      <!--Modal Body-->
      <div class="modal-body">
        <div class="pcoded-inner-content" id="refresh_tabcontent">
          <div class="card">
            <div class="card-header">
              <h5>Training List</h5>
            </div>   
            <div class="box-body pb-0">
              <div class="card-block table-border-style row text-justify">
                <!--Tab Content-->
                <div class="col-md-12">
                  <div class="card pb-0 mb-0" style="min-height: 450px; box-shadow: none;" > 
                    <?php
                      $show_count = 0;
                      $emp_id = $user['employee_id'];  
                      $sql = "SELECT *,(SELECT COUNT(*) FROM training_record WHERE training_record.employee_id='$emp_id' AND training_list.training_code=training_record.training_code) AS basecount FROM training_list LEFT JOIN training_course ON training_course.id=training_list.training_course ";
                      $query=$conn->query($sql);
                    ?>
                    <div class="table-responsive">
                      <table id="table4" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                          <tr>
                            <th>View</th>
                            <th>Training Code</th>
                            <th>Training Title</th>
                            <th>Training Date</th>
                            <th>Course</th>
                            <th>Tools</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            while($row = $query->fetch_assoc()){
                              $start = strtotime($row['schedule_from']);
                              $today = strtotime(date('Y-m-d'));
                              //dont if batch size is full
                              if ($row['basecount'] > 0) continue;
                              //dont show training if already started
                              if ($today>=$start) continue;
                              $show_count++;
                          ?>
                          <tr>
                            <td class="d-flex justify-content-center">
                              <a href='#view_tra' data-toggle='modal' class='view_tra' data-id='<?php echo $row['training_code']; ?>'>
                                <i class='fa fa-eye'></i>
                              </a>
                            </td>
                            <td><?php echo $row['training_code']; ?></td>
                            <td><?php echo $row['training_title']; ?></td>
                            <td>
                              <?php echo (new Datetime($row['schedule_from']))->format('F d, Y h:i a').' - '.(new Datetime($row['schedule_to']))->format('F d, Y h:i a'); ?>
                            </td>
                            <td><?php echo $row['course_title']; ?></td>
                            <td>
                              <button class="btn btn-success btn-sm request_tra btn-round" data-id="<?php echo $row['training_code']; ?>"><i class="fa fa-edit"></i> Request</button>
                            </td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>

                    <?php if($show_count<1){ ?>

                      <!--No Attendees-->
                      <div class="row m-auto" id="no_candidate">
                        <div class="col-lg-12 p-3 text-center">
                          <img src="../assets/images/no_training.png" alt="No Notification" class="img-fluid mx-auto d-block p-4 w-25">
                          <h5>THERE ARE NO AVAILABLE TRAININGS AT THE MOMENT</h5>
                          <label>You can view active trainings here.</label>
                        </div>
                      </div>
                      <!--No Attendees End-->

                   <?php } ?>
                  </div>
                  <!--List Page End-->
                </div>
                <!--Tab Content End-->
              </div>
            </div>
          </div>
        </div>
        <!--Pcoded Inner COntent **end**-->
      </div>
      <!--Modal Body **End**-->
      <!--Modal Footer-->
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat pull-left closeModal" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
      </div>
      <!--Modal Footer **End**-->
    </div>
    <!--Modal Content **end**-->
  </div>
  <!--Modal Dialog **end**-->
</div>
<!-- Manage Attendees **End**-->



<!-- View Training-->
<div class="modal fade" id="trainingView" style="background: rgb(0, 0, 0,.7);">
  <!--Modal Dialog-->
  <div class="modal-dialog modal-lg">
    <!--Modal Content-->
    <div class="modal-content">
      <!--Modal Header-->
      <div class="modal-header">
        <h4 class="modal-title"><b>Training Details</b></h4>
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
        <!--Trainer Details-->
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Trainer Details</label>
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


<!-- Send Request-->
<div class="modal fade" id="reqnew" style="background:rgba(0, 0, 0, .7);">
  <!--Modal Dialog-->
  <div class="modal-dialog modal-lg">
    <!--Modal Content-->
    <div class="modal-content">
      <!--Modal Header-->
      <div class="modal-header">
        <h4 class="modal-title"><b>Request</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
      </div>
      <!--Modal Header **End**-->
      <form class="form-horizontal" method="POST" id="sendForm" >
        <!--Modal Body-->
        <div class="modal-body">
          <!--Code-->
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Code</label>
            <div class="col-sm-10">
              <input type="text" class="form-control border border-secondary training_code" readonly id="tra_code_req" />
            </div>
          </div>
          <!--Title-->
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
              <input type="text" class="form-control border border-secondary training_title" readonly="" />
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
          <!--Note-->
          <div class="form-group row">
            <label class="col-sm-2 col-form-label req">Note</label>
            <div class="col-sm-10">
              <textarea class="form-control border border-secondary" id="note_req" required="" autocomplete="off" rows="5" ></textarea>
            </div>
          </div>
        </div>
        <!--Modal Body **End**-->
        <!--Modal Footer-->
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
          <button type="submit" class="btn btn-success btn-flat" name="add"><i class="fa fa-save"></i> Send</button>
        </div>
        <!--Modal Footer **End**-->
      </form>
    </div>
    <!--Modal Content **end**-->
  </div>
  <!--Modal Dialog **end**-->
</div>
<!-- Send Request **End**-->


<!-- Edit Request-->
<div class="modal fade" id="reqedit" style="background:rgba(0, 0, 0, .7);">
  <!--Modal Dialog-->
  <div class="modal-dialog modal-lg">
    <!--Modal Content-->
    <div class="modal-content">
      <!--Modal Header-->
      <div class="modal-header">
        <h4 class="modal-title"><b>Edit Request</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
      </div>
      <!--Modal Header **End**-->
      <form class="form-horizontal" method="POST" action="function/training_record_edit.php" >
        <!--Modal Body-->
        <div class="modal-body">
          <input type="hidden" id="refrence_no_edit" class="reference_no" name="refrence_no">
          <!--Code-->
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Code</label>
            <div class="col-sm-10">
              <input type="text" class="form-control border border-secondary training_code" readonly />
            </div>
          </div>
          <!--Title-->
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
              <input type="text" class="form-control border border-secondary training_title" readonly="" />
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
          <!--Note-->
          <div class="form-group row">
            <label class="col-sm-2 col-form-label req">Note</label>
            <div class="col-sm-10">
              <textarea class="form-control border border-secondary edit_note" name="note" required="" autocomplete="off" rows="5" ></textarea>
            </div>
          </div>
        </div>
        <!--Modal Body **End**-->
        <!--Modal Footer-->
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
          <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-save"></i> Update</button>
        </div>
        <!--Modal Footer **End**-->
      </form>
    </div>
    <!--Modal Content **end**-->
  </div>
  <!--Modal Dialog **end**-->
</div>
<!-- Edit Request **End**-->


<!-- View Request-->
<div class="modal fade" id="reqview" style="background:rgba(0, 0, 0, .7);">
  <!--Modal Dialog-->
  <div class="modal-dialog modal-lg">
    <!--Modal Content-->
    <div class="modal-content">
      <!--Modal Header-->
      <div class="modal-header">
        <h4 class="modal-title"><b>View Details</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
      </div>
      <!--Modal Header **End**-->
      <!--Modal Body-->
      <div class="modal-body">
        <!--Code-->
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Code</label>
          <div class="col-sm-10">
            <input type="text" class="form-control border border-secondary training_code" readonly />
          </div>
        </div>
        <!--Title-->
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Title</label>
          <div class="col-sm-10">
            <input type="text" class="form-control border border-secondary training_title" readonly="" />
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
        <!--Note-->
        <div class="form-group row view_note">
          <label class="col-sm-2 col-form-label">Note</label>
          <div class="col-sm-10">
            <textarea class="form-control border border-secondary edit_note" readonly rows="5" ></textarea>
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
<!-- Edit Request **End**-->


<!-- Cancel Request -->
<div class="modal fade" id="cancel_req">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b>Cancel Request</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" method="POST" action="function/training_record_delete.php">
        <div class="modal-body">
          <input type="hidden" id="cancel_tra" name="id">
          <div class="text-center">
            <label>Are you sure you want to cancel this training request?</label>
            <h2 id="cancel_title" class="bold"></h2>
            <label id="cancel_ref"></label>
            <div class="text-center text-danger" >
              <i class="fa fa-exclamation-circle mx-1" aria-hidden="true"></i>
              <label> Note: This process cannot be undone</label>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
          <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Cancel Request</button>
        </div>
      </form>
    </div>
  </div>
</div>
