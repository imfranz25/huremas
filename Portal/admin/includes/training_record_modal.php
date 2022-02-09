
<!-- Manage Attendees-->
<div class="modal fade " id="training_record_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
  <!--Modal Dialog-->
  <div class="modal-dialog modal-xl">
    <!--Modal Content-->
    <div class="modal-content">
      <!--Modal Header-->
      <div class="modal-header">
        <h4 class="modal-title"><b>Manage Training</b></h4>
        <button type="button" class="close closeModal" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;
        </button>
      </div>
      <!--Modal Header **End**-->
      <!--Modal Body-->
      <div class="modal-body">
        <div class="pcoded-inner-content" id="refresh_tabcontent">
          <?php
            //GET CODE FROM SESSION 
            if (isset($_SESSION['code'])) {
              $code = $_SESSION['code'];
              $code_query = "AND training_record.training_code='$code'";
            }else{
              $code_query ='';
            } 
            $sql = "SELECT *, (SELECT COUNT(*) FROM training_record WHERE status ='Pending' $code_query) AS pcount, (SELECT COUNT(*) FROM training_record WHERE (status ='Finished' OR status ='Reviewed' OR status ='On-going')  $code_query) AS acount, (SELECT COUNT(*) FROM training_record WHERE status ='Rejected' $code_query) AS rcount  FROM training_record ";
            $cquery = $conn->query($sql);  
            $count_row = $cquery->fetch_assoc();

            // PENDING COUNT
            $pcount = isset($count_row['pcount'])?$count_row['pcount']: 0;
            // ATTENDEES COUNT
            $acount = isset($count_row['acount'])?$count_row['acount']: 0;
            // REJECT COUNT
            $rcount = isset($count_row['rcount'])?$count_row['rcount']: 0;
          ?>
                        
          <div class="col-xl-12 col-xl-6">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs md-tabs border border-success rounded-top" id="training_tab">
              <li class="nav-item" id="tabfirst">
                <a class="nav-link" data-toggle="tab" href="#reqtab" role="tab" >Traning Request <label class="badge badge-danger ml-1 f-14"><?php echo $pcount;?></label></a>
                <div class="slide"></div>
              </li>
              <li class="nav-item active" id="tab2nd">
                <a class="nav-link" data-toggle="tab" href="#attab" role="tab" >Attendees <label class="badge badge-success ml-1 f-14"><?php echo $acount;?></label></a>
                <div class="slide"></div>
                <div class="trojan_slide"></div>
              </li>
              <li class="nav-item" id="tab3rd">
                <a class="nav-link" data-toggle="tab" href="#rejtab" role="tab">Rejected <label class="badge badge-warning ml-1 f-14"><?php echo $rcount; ?></label></a>
                <div class="slide"></div>
              </li>
            </ul>
          </div>
          <!-- Tab panes -->
          <div class="tab-content container">
            <div class="card tab-pane fade" id="reqtab">
              <div class="card-header">
                <h5>Training Request List</h5>
              </div>   
              <div class="box-body pb-0">
                <div class="card-block table-border-style row text-justify"> 
                  <!--Tab Content-->
                  <div class="col-md-12">
                    <div class="card pb-0 mb-0" style="min-height: 450px; box-shadow: none;" > 
                      <?php
                        //GET CODE FROM SESSION 
                        if (isset($_SESSION['code'])) {
                          $code = $_SESSION['code'];
                          $code_query = "AND training_code='$code'";
                        }else{
                          $code_query ='';
                        } 
                        $sql = "SELECT * FROM training_record LEFT JOIN employees ON employees.employee_id=training_record.employee_id WHERE status='Pending' $code_query ";
                        $query = $conn->query($sql); 
                        if ($query->num_rows>0) {
                      ?>
                      <div class="table-responsive">
                        <table id="table1" class="table table-striped table-bordered" style="width:100%">
                          <thead>
                            <tr>
                              <th>Reference No</th>
                              <th>Request Date</th>
                              <th>Employee Name</th>
                              <th>Internal Note</th>
                              <th>Tools</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              while($row = $query->fetch_assoc()):
                            ?>
                            <tr>
                              <td><?php echo $row['reference_no']; ?></td>
                              <td>
                                <?php echo (new Datetime($row['request_date']))->format('F d, Y'); ?>
                              </td>
                              <td><?php echo $row['firstname'].' '.$row['lastname']; ?></td>
                              <td style='overflow: hidden;white-space: nowrap;text-overflow: ellipsis;max-width: 250px;'>
                                <?php echo $row['internal_note']; ?>
                              </td>
                              <td>
                                <button class="btn btn-success btn-sm review_rej btn-round" data-id="<?php echo $row['reference_no']; ?>"><i class="fa fa-edit"></i> Review</button>
                              </td>
                            </tr>
                            <?php endwhile; ?>
                          </tbody>
                        </table>
                      </div>
                      <?php }else{ ?>
                        <!--No Attendees-->
                        <div class="row m-auto" id="no_candidate">
                          <div class="col-lg-12 p-3 text-center">
                            <img src="../assets/images/no_notif.png" alt="No Notification" class="img-fluid mx-auto d-block p-4 rounded-circle">
                            <h5>THERE ARE NO TRAINING REQUEST AT THE MOMENT</h5>
                            <label>You can view pending request here.</label>
                          </div>
                        </div>
                        <!--No Attendees End-->
                      <?php } ?>
                    </div>
                    <!--Attendee Page End-->
                  </div>
                  <!--Tab Content End-->
                </div>
              </div>
            </div>
            <div class="card tab-pane fade show active" id="attab">
              <!-- Main-body start --> 
              <div class="card-header">
                <h5>
                  <a type="button" class="btn btn-mat waves-effect waves-light btn-default training_title">Attendees List</a>
                </h5>
                <button type="button" class="btn btn-mat waves-effect waves-light btn-success m-0 float-right" data-target="#addnew" data-toggle="modal"  id="addAtt"><i class="fa fa-plus"></i>Add Attendee</button>
              </div>   
              <div class="box-body pb-0">
                <div class="card-block table-border-style row text-justify">
                  <!--Tab Content-->
                  <div class="col-md-12">
                    <div class="card pb-0 mb-0" style="min-height: 450px; box-shadow: none;" > 
                      <?php
                        $sql = "SELECT * FROM training_record LEFT JOIN employees ON employees.employee_id=training_record.employee_id WHERE (status='Reviewed' OR status='Finished' OR status='On-going') $code_query ORDER BY CASE WHEN status='Reviewed' THEN 1 WHEN status='Finished' THEN 2 ELSE 3 END ";
                        $query = $conn->query($sql); 
                        if ($query->num_rows>0) {
                      ?>
                      <div class="table-responsive">
                        <table id="table2" class="table table-striped table-bordered" style="width:100%">
                          <thead>
                            <tr>
                              <th>Reference No</th>
                              <th>Employee Name</th>
                              <th>Status</th>
                              <th>Tools</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              while($row = $query->fetch_assoc()){
                            ?>
                              <tr>
                                <td><?php echo $row['reference_no']; ?></td>
                                <td><?php echo $row['firstname'].' '.$row['lastname']; ?></td>
                                <td>
                                  <span class="badge <?php echo ($row['status']=='On-going')? 'badge-warning' : 'badge-success'; ?>"><?php echo $row['status']; ?></span>
                                </td>
                                <td>
                                  <button type="button" class="btn btn-default btn-sm btn-flat border-success wave-effect dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Action
                                  </button>
                                  <div class="dropdown-menu" style="">
                                    <a class="dropdown-item view_att" href="javascript:void(0)" data-id="<?php echo $row['reference_no'] ?>">
                                      <i class="fa fa-eye"></i>View
                                    </a>
                                    <?php 
                                      if ((strcmp($row['status'], 'Reviewed')+strcmp($row['status'], 'Finished'))==0) {
                                    ?>
                                      <div class="dropdown-divider"></div>
                                      <a class="dropdown-item remove text-danger" href="javascript:void(0)" data-id="<?php echo $row['reference_no'] ?>">
                                        <i class="fa fa-trash"></i>Remove
                                      </a>
                                    <?php } ?>
                                  </div>
                                </td>
                              </tr>
                            <?php } ?>
                          </tbody>
                        </table>
                      </div>
                      <?php }else{ ?>
                        <!--No Attendees-->
                        <div class="row m-auto" id="no_candidate">
                          <div class="col-lg-12 p-3 text-center">
                            <img src="../assets/images/no_notif.png" alt="No Notification" class="img-fluid mx-auto d-block p-4 rounded-circle">
                            <h5>THERE ARE NO EMPLOYEES IN THIS TRAINING SESSION</h5>
                            <label>Add Employees to this training to view their details.</label>
                          </div>
                        </div>
                        <!--No Attendees End-->
                      <?php } ?>
                    </div>
                    <!--Attendee Page End-->
                  </div>
                  <!--Tab Content End-->
                </div>
              </div>
            </div>
            <!--Rejected-->
            <div class="card tab-pane fade" id="rejtab">
              <div class="card-header">
                <h5 class="tab_title">Rejected Training Request List</h5>
              </div>   
              <div class="box-body pb-0">
                <div class="card-block table-border-style row text-justify">
                  <!--Tab Content-->
                  <div class="col-md-12">
                    <div class="card pb-0 mb-0" style="min-height: 450px; box-shadow: none;" > 
                      <?php
                        $sql = "SELECT * FROM training_record LEFT JOIN employees ON employees.employee_id=training_record.employee_id WHERE status='Rejected' $code_query ";
                        $query = $conn->query($sql); 
                        if ($query->num_rows>0) {
                      ?>
                      <div class="table-responsive">
                        <table id="table3" class="table table-striped table-bordered" style="width:100%">
                          <thead>
                            <tr>
                              <th>Reference No</th>
                              <th>Request Date</th>
                              <th>Employee Name</th>
                              <th>Internal Note</th>
                              <th>Tools</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              while($row = $query->fetch_assoc()){
                            ?>
                              <tr>
                                <td><?php echo $row['reference_no']; ?></td>
                                <td><?php echo (new Datetime($row['request_date']))->format('F d, Y'); ?></td>
                                <td><?php echo $row['firstname'].' '.$row['lastname']; ?></td>
                                <td style='overflow: hidden;white-space: nowrap;text-overflow: ellipsis;max-width: 250px;'>
                                  <?php echo ($row['internal_note']=='')?'N/A':$row['internal_note']; ?>
                                </td>
                                <td>
                                  <button class="btn btn-success btn-sm review_rej btn-round" data-id="<?php echo $row['reference_no']; ?>"><i class="fa fa-edit"></i> Review</button>
                                </td>
                              </tr>
                            <?php } ?>
                          </tbody>
                        </table>
                      </div>
                      <?php }else{ ?>
                        <!--No Attendees-->
                        <div class="row m-auto" id="no_candidate">
                          <div class="col-lg-12 p-3 text-center">
                            <img src="../assets/images/no_notif.png" alt="No Notification" class="img-fluid mx-auto d-block p-4 rounded-circle">
                            <h5>THERE ARE NO REJECTED TRAINING REQUEST SO FAR</h5>
                            <label>You can view rejected request here.</label>
                          </div>
                        </div>
                        <!--No Attendees End-->
                      <?php } ?>
                    </div>
                    <!--Attendee Page End-->
                  </div>
                  <!--Tab Content End-->
                </div>
              </div>
            </div>
            <?php
              //AFTER USING SESSION CODE -> UNSET
              if (isset($_SESSION['code'])) {
                unset($_SESSION['code']);
              } 
            ?>
          </div>
          <!-- Tab panes -->
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





<!-- Add Attendees -->
<div class="modal fade" id="addnew" style="background: rgba(0,0,0,.7);">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b>New Attendee</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" id="attForm" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Training Code</label>
            <div class="col-sm-9">
              <input type="text" class="form-control border border-secondary attCode" name="code" readonly >
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label req">Employee</label>
            <div class="col-sm-9">
              <select name="employee" class="form-control border border-secondary" id="selectEmp" required="">
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Department</label>
            <div class="col-sm-9">
              <input type="text" id="department" class="form-control border border-secondary" placeholder="Department" readonly >
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Position</label>
            <div class="col-sm-9">
              <input type="text" id="posi" class="form-control border border-secondary" placeholder="Position" readonly >
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
          <button type="submit" class="btn btn-success btn-flat" name="add"><i class="fa fa-save"></i> Proceed</button>
        </div>
      </form>
    </div>
  </div>
</div>




<!-- View Attendees -->
<div class="modal fade" id="view_att" style="background: rgba(0,0,0,.7);">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b>View Attendee</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Employee</label>
          <div class="col-sm-9">
            <input type="text" class="form-control border border-secondary view_emp" readonly >
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Department</label>
          <div class="col-sm-9">
            <input type="text" class="form-control border border-secondary view_dept" readonly >
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Position</label>
          <div class="col-sm-9">
            <input type="text" class="form-control border border-secondary view_post"  readonly >
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Status</label>
          <div class="col-sm-9">
            <input type="text" class="form-control border border-secondary view_status"  readonly >
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Review</label>
          <div class="col-sm-9">
            <input type="text" class="form-control border border-secondary view_review"  readonly >
          </div>
        </div>
        <div class="form-group row int_note">
          <label class="col-sm-3 col-form-label">Internal Note</label>
          <div class="col-sm-9">
            <textarea class="form-control border border-secondary view_note" rows="8" readonly ></textarea>
          </div>
        </div>
        <div class="form-group row comment_text">
          <label class="col-sm-3 col-form-label">Comment</label>
          <div class="col-sm-9">
            <textarea class="form-control border border-secondary view_comment" rows="8" readonly ></textarea>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
      </div>
    </div>
  </div>
</div>



<!-- Review Attendees -->
<div class="modal fade" id="review_rej" style="background: rgba(0,0,0,.7);">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b>Review Attendee</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" id="review_form" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Training Code</label>
            <div class="col-sm-9">
              <input type="text" class="form-control border border-secondary att-Code" name="code" readonly />
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Employee</label>
            <div class="col-sm-9">
              <input type="text" class="form-control border border-secondary view_emp" readonly >
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Department</label>
            <div class="col-sm-9">
              <input type="text" class="form-control border border-secondary view_dept" readonly >
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Position</label>
            <div class="col-sm-9">
              <input type="text" class="form-control border border-secondary view_post"  readonly >
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Status</label>
            <div class="col-sm-9">
              <input type="text" class="form-control border border-secondary view_status"  readonly >
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Internal Note</label>
            <div class="col-sm-9">
              <textarea class="form-control border border-secondary view_note" readonly="" rows="7"></textarea>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
          <button type="button" class="btn btn-danger btn-flat rej_btn" ><i class="fa fa-thumbs-down"></i> Reject</button>
          <button type="button" class="btn btn-success btn-flat app_btn" ><i class="fa fa-save"></i> Add to List</button>
        </div>
      </form>
    </div>
  </div>
</div>




<!-- Delete Attendees -->
<div class="modal fade" id="attremove" style='background: rgba(0,0,0,.7)'>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b>Remove</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" method="POST" id="removeAttForm">
        <input type="hidden" id="refCode" />
        <input type="hidden" id="delCode" />
        <div class="modal-body">
          <div class="text-center">
            <label>Are you sure you want to remove this attendee to training list?
            </label>
            <h2 id="del_att" class="bold"></h2>
            <label id="del_attCode"></label>
            <div class="text-center text-danger" >
              <label><i class="fa fa-exclamation-circle mx-1" aria-hidden="true"></i>
               Note: Once you remove this attendee it will be moved to rejected training list. </label>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
          <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Remove</button>
        </div>
      </form>
    </div>
  </div>
</div>
