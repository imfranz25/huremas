
<!-- Manage Attendees-->
<div class="modal fade " id="document_request_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
    <!--Modal Dialog-->
    <div class="modal-dialog modal-xl">
        <!--Modal Content-->
        <div class="modal-content">
            <!--Modal Header-->
            <div class="modal-header">
              <h4 class="modal-title"><b>Document Request</b></h4>
              <button type="button" class="close closeModal" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</button>
            </div>

            <!--Modal Header **End**-->
            <!--Modal Body-->
            <div class="modal-body">
              <div class="pcoded-inner-content" >

                      
                          <div class="col-xl-12 col-xl-6">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs md-tabs border border-success rounded-top" id="training_tab">
                              <li class="nav-item" id="tab2nd">
                                <a class="nav-link req_tab" data-toggle="tab" href="#hrreq_tab" role="tab" >HR's Document Request <label class="badge badge-success ml-1 f-14" id="hrreq_badge"></label></a>
                                <div class="slide"></div>
                                <div class="trojan_slide"></div>
                              </li>
                              <li class="nav-item" id="tabfirst">
                                <a class="nav-link req_tab" data-toggle="tab" href="#ereq_tab" role="tab" >Employees' Document Request <label class="badge badge-danger ml-1 f-14" id="ereq_badge"></label></a>
                                <div class="slide"></div>
                              </li>
                            </ul>
                          </div>

                          <!-- Tab panes -->
                          <div class="tab-content container">
                            <div class="card tab-pane fade" id="ereq_tab">
                              <div class="card-header">
                                  <h5>Employees' Document Request</h5>
                                </div>   

                                <div class="box-body pb-0">
                                  <div class="card-block table-border-style row text-justify">
                                    
                                    <!--Tab Content-->
                                    <div class="col-md-12">

                                        <div class="card pb-0 mb-0" style="min-height: 450px; box-shadow: none;" > 
                                          <div class="table-responsive" id="emp_request_table">
                                            <table id="table1" class="table table-striped table-bordered" style="width:100%">
                                                <thead>
                                                <tr>
                                                    <th>Reference No</th>
                                                    <th>Request Title</th>
                                                    <th>Employee Name</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                </tbody>
                                            </table>
                                          </div>

                                          <!--No Request-->
                                          <div class="row m-auto" id="no_emp_request">
                                            <div class="col-lg-12 p-3 text-center">
                                              <img src="/HUREMAS/Portal/assets/images/no_docu.png" alt="No Request" class="img-fluid mx-auto d-block p-4 w-25">
                                              <h5>THERE ARE NO EMPLOYEE REQUEST AT THE MOMENT</h5>
                                              <label>You can view request here.</label>
                                            </div>
                                          </div>
                                          <!--No Request End-->



                                        </div>
                                        <!--Request Page End-->
                                    </div>
                                    <!--Tab Content End-->
                                    
                                  </div>
                                </div>
                            </div>

                            <div class="card tab-pane fade show active" id="hrreq_tab">
                              
                              <!-- Main-body start --> 
                                <div class="card-header">
                                  <h5>
                                    <a type="button" class="btn btn-mat waves-effect waves-light btn-default training_title">HR's Document Request</a>
                                  </h5>
                                  <button type="button" class="btn btn-mat waves-effect waves-light btn-success m-0 float-right" data-target="#admin_request" data-toggle="modal" id="add_doc_req"><i class="fa fa-plus"></i>Add Document Request</button>

                                </div>   

                                <div class="box-body pb-0">
                                  <div class="card-block table-border-style row text-justify">
                                    
                                    <!--Tab Content-->
                                    <div class="col-md-12">

                                        <div class="card pb-0 mb-0" style="min-height: 450px; box-shadow: none;" > 

                                          
                                          <div class="table-responsive" id="hr_request_table">
                                            <table id="table2" class="table table-striped table-bordered" style="width:100%">
                                                <thead>
                                                <tr>
                                                    <th>Reference No</th>
                                                    <th>Request Title</th>
                                                    <th>Employee Name</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                </tbody>
                                            </table>
                                          </div>

                 

                                          <!--No Request-->
                                          <div class="row m-auto" id="no_hr_request">
                                            <div class="col-lg-12 p-3 text-center">
                                              <img src="/HUREMAS/Portal/assets/images/no_docu.png" alt="No Request" class="img-fluid mx-auto d-block p-4 w-25">
                                              <h5>THERE ARE NO REQUEST AT THE MOMENT</h5>
                                              <label>You can view request here.</label>
                                            </div>
                                          </div>
                                          <!--No Request End-->
                                 

                                        </div>
                                        <!--Request Page End-->
                                    </div>
                                    <!--Tab Content End-->
                                    
                                  </div>
                                </div>
                            </div>

                     

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





<!-- Admin Document Request-->
<div class="modal fade" id="admin_request" style="background:rgba(0, 0, 0, .7);">
    <!--Modal Dialog-->
    <div class="modal-dialog modal-lg">
        <!--Modal Content-->
        <div class="modal-content">
            <!--Modal Header-->
            <div class="modal-header">
              <h4 class="modal-title"><b>Request Document</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            </div>
            <!--Modal Header **End**-->
            <!--Modal Body-->
            <div class="modal-body">
              <form class="form-horizontal" method="POST" enctype="multipart/form-data" id="admin_request_form">


                <!--Owner-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Request Title</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control border border-secondary" name="name" autocomplete="off" minlength="4" required   />
                     </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Employee</label>
                    <div class="col-sm-9">
                      <select class="form-control form-control-sm border border-secondary" name="employee" required>
                        <option value="">--select employee--</option>
                        <?php 
                          $id = $user['employee_id'];
                          $sql="SELECT *,admin.employee_id AS empid FROM admin RIGHT JOIN employees ON admin.employee_id=employees.employee_id WHERE admin.employee_id!='$id' ";
                          $query=$conn->query($sql);
                          while ($row=$query->fetch_assoc()) {
                        ?>
                          <option value="<?php echo $row['empid']; ?>"><?php echo $row['firstname'].' '.$row['lastname']; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                </div>

                <!--Internal Note-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Internal Note</label>
                  <div class="col-sm-9">
                    <textarea class="form-control border border-secondary" required rows="8" name='details'></textarea>
                  </div>
                </div>


            </div>
            <!--Modal Body **End**-->
            
            <!--Modal Footer-->
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal" ><i class="fa fa-close"></i> Close</button>
              <button type="submit" name="admin_request" class="btn btn-success btn-flat pull-left"><i class="fa fa-save"></i> Save</button>
            </div>
            <!--Modal Footer **End**-->
            </form>
        </div>
        <!--Modal Content **end**-->
    </div>
    <!--Modal Dialog **end**-->
</div>
<!-- Add Admin Request END-->






<!-- Edit Admin Document Request-->
<div class="modal fade" id="admin_request_edit" style="background:rgba(0, 0, 0, .7);">
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
            <!--Modal Body-->
            <div class="modal-body">
              <form class="form-horizontal" method="POST" enctype="multipart/form-data" id="admin_edit_request_form">
                <input type="hidden" name="reference_id_admin" class="req_ref_id">

                <!--Owner-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Request Title</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control border border-secondary view_request_name" name="name" autocomplete="off" minlength="4" required   />
                     </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Employee</label>
                    <div class="col-sm-9">
                      <select class="form-control form-control-sm border border-secondary view_request_employee" name="employee" required>
                        <option value="">--select employee--</option>
                        <?php 
                          $id = $user['employee_id'];
                          $sql="SELECT *,admin.employee_id AS empid FROM admin RIGHT JOIN employees ON admin.employee_id=employees.employee_id WHERE admin.employee_id!='$id' ";
                          $query=$conn->query($sql);
                          while ($row=$query->fetch_assoc()) {
                        ?>
                          <option value="<?php echo $row['empid']; ?>"><?php echo $row['firstname'].' '.$row['lastname']; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                </div>

                <!--Internal Note-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Internal Note</label>
                  <div class="col-sm-9">
                    <textarea class="form-control border border-secondary view_request_details" required rows="8" name='details'></textarea>
                  </div>
                </div>


            </div>
            <!--Modal Body **End**-->
            
            <!--Modal Footer-->
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal" ><i class="fa fa-close"></i> Close</button>
              <button type="submit" name="edit" class="btn btn-success btn-flat pull-left"><i class="fa fa-save"></i> Update</button>
            </div>
            <!--Modal Footer **End**-->
            </form>
        </div>
        <!--Modal Content **end**-->
    </div>
    <!--Modal Dialog **end**-->
</div>
<!-- Add Admin Request END-->





<!-- CANCEL REQUEST -->
<div class="modal fade" id="cancelreq" style="background: rgba(0, 0, 0, .7);">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><b>Cancel Request</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" id="admin_cancel_request_form">
                <input type="hidden" class="req_ref_id" name="reference_id">
                <div class="text-center">
                    <label>Are you sure you want to cancel this request?</label>
                    <h2 class="req_name_cancel bold"></h2>
                    <label class="req_date_cancel"></label>
                    <div class="text-center text-danger" >
                      <label><i class="fa fa-exclamation-circle mx-1" aria-hidden="true"></i> Once this request is cancelled, it can't be undone.</label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-danger btn-flat" name="lock"><i class="fa fa-ban"></i> Cancel Request</button>
              </form>
            </div>
        </div>
    </div>
</div>



<!-- Review Admin Document Request-->
<div class="modal fade" id="admin_request_review" data-backdrop="static" data-keyboard="false" style="background:rgba(0, 0, 0, .7);">
    <!--Modal Dialog-->
    <div class="modal-dialog modal-lg">
        <!--Modal Content-->
        <div class="modal-content">
            <!--Modal Header-->
            <div class="modal-header">
              <h4 class="modal-title"><b>Review Request</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            </div>
            <!--Modal Header **End**-->
            <!--Modal Body-->
            <div class="modal-body">

                <input type="hidden" name="reference_id_admin" class="req_ref_id" id="reference_id_admin">

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Status</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control border border-secondary view_request_status" readonly   />
                     </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Request Title</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control border border-secondary view_request_name" readonly   />
                     </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Employee</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control border border-secondary view_request_employee_name" readonly   />
                    </div>
                </div>

                <!--Internal Note-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Internal Note</label>
                  <div class="col-sm-9">
                    <textarea class="form-control border border-secondary view_request_details" readonly rows="8"></textarea>
                  </div>
                </div>

                <hr class="divider my-4 replied"></hr>

                <div class="form-group row replied">
                  <label class="col-sm-3 col-form-label">File</label>
                  <div class="col-sm-9">
                    <label class="form-control"><a href="#" target="_blank" class="request_file">No Uploaded File</a></label>
                  </div>
                </div>

                <div class="form-group row replied">
                  <label class="col-sm-3 col-form-label">Employees' Note</label>
                  <div class="col-sm-9">
                    <textarea class="form-control border border-secondary view_request_comment" readonly rows="8"></textarea>
                  </div>
                </div>


            </div>
            <!--Modal Body **End**-->
            
            <!--Modal Footer-->
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal" ><i class="fa fa-close"></i> Close</button>
              <button type="button" class="btn btn-danger btn-flat pull-left replied rej_btn status_btn" data-status="reject" ><i class="fa fa-thumbs-o-down"></i> Reject</button>
              <button type="button" class="btn btn-success btn-flat pull-left replied val_btn status_btn" data-status="validate" ><i class="fa fa-thumbs-o-up"></i> Validate</button>
            </div>
            <!--Modal Footer **End**-->
            </form>
        </div>
        <!--Modal Content **end**-->
    </div>
    <!--Modal Dialog **end**-->
</div>
<!-- Add Admin Request END-->




<!-- Validate Document-->
<div class="modal fade" id="validateSave" style="background:rgba(0, 0, 0, .7);">
    <!--Modal Dialog-->
    <div class="modal-dialog modal-lg">
        <!--Modal Content-->
        <div class="modal-content">
            <!--Modal Header-->
            <div class="modal-header">
              <h4 class="modal-title"><b>Save Document</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            </div>
            <!--Modal Header **End**-->
            <!--Modal Body-->
            <div class="modal-body">
              <form class="form-horizontal" method="POST" id="add_docu_form" action="function/document_add.php" enctype="multipart/form-data" >

                <!--Document Name-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Folder Name</label>
                  <div class="col-sm-9">
                    <select class="form-control form-control-sm border border-secondary " name="folder" required>
                        <option value="">--select folder--</option>
                        <option value="Institutional Records">Institutional Records</option>
                        <option value="Employees Resume">Employees' Resume</option>
                        <option value="Human Resource">Human Resource</option>
                        <?php 
                          $sql="SELECT * FROM document_folder WHERE folder_archive=0  ";
                          $query=$conn->query($sql);
                          while ($row=$query->fetch_assoc()) {
                        ?>
                          <option value="<?php echo $row['folder_id']; ?>"><?php echo $row['folder_name'] ?></option>
                        <?php } ?>
                      </select>
                  </div>
                </div>


                <!--Document Name-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Document Name</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control border border-secondary view_request_name" name="name" autocomplete="off" minlength="5" required />
                  </div>
                </div>

                <!--File-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">File</label>
                  <div class="col-sm-9">
                    <label class="form-control"><a href="#" target="_blank" class="request_file">File</a></label>
                    <input type="hidden" name="reference_id" class="req_ref_id">
                    <input type="hidden" name="file" class="req_ref_file">
                  </div>
                </div>

                <!--Owner-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Owner</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control border border-secondary view_request_employee_name" name="owner" readonly   />
                  </div>
                </div>

                <!--Folder Details-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Details</label>
                  <div class="col-sm-9">
                    <textarea class="form-control border border-secondary" required="" autocomplete="off" rows="5" name='details'></textarea>
                  </div>
                </div>

            </div>
            <!--Modal Body **End**-->

            <!--Modal Footer-->
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="add_via_request"><i class="fa fa-save"></i> Save</button>
              </form>
            </div>
            <!--Modal Footer **End**-->
        </div>
        <!--Modal Content **end**-->
    </div>
    <!--Modal Dialog **end**-->
</div>
<!-- Validate Document END-->





<!-- ADMIN Document Request REVIEW-->
<div class="modal fade" id="employee_request_review" style="background:rgba(0, 0, 0, .7);">
    <!--Modal Dialog-->
    <div class="modal-dialog modal-lg">
        <!--Modal Content-->
        <div class="modal-content">
            <!--Modal Header-->
            <div class="modal-header">
              <h4 class="modal-title"><b>Review HR's Document Request</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            </div>
            <!--Modal Header **End**-->
            <!--Modal Body-->
            <div class="modal-body">
              <form class="form-horizontal" method="POST" id="review_emp_req_form" enctype="multipart/form-data" >
                <input type="hidden" name="reply_id" class="req_ref_id" />

                <!--Date-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Request Date</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control border border-secondary view_request_date" readonly   />
                     </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Employee</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control border border-secondary view_request_employee_name" readonly   />
                    </div>
                </div>

                <!--Status-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Request Status</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control border border-secondary view_request_status" readonly   />
                     </div>
                </div>

                <!--Title-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Request Title</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control border border-secondary view_request_name" readonly />
                     </div>
                </div>

                <!--Internal Note-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Internal Note</label>
                  <div class="col-sm-9">
                    <textarea class="form-control border border-secondary view_request_details" rows="8" readonly></textarea>
                  </div>
                </div>

                <hr class="divider my-4" />

                <!--File-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">File</label>
                    <div class="col-sm-9">
                      <input type="file" class="form-control border border-secondary request_file_upload d-none" name="file" />
                      <!-- INFO FOR FILE -->
                      <div class="input-group-append d-none" id="file_request_change">
                        <span class="input-group-text text-info" >
                          <i class="fa fa-info-circle"></i>
                          <strong>Leave upload file to default if you dont wish to change the document file</strong>
                        </span>
                      </div>
                      <a href="#" target="_blank" class="view_request_file form-control"></a>
                     </div>
                </div>

                <!--Comment-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Comment</label>
                    <div class="col-sm-9">
                      <textarea class="form-control border border-secondary view_request_comment" id="comment_req" rows="8" name="comment" readonly required></textarea>
                     </div>
                </div>

            </div>
            <!--Modal Body **End**-->
            
            <!--Modal Footer-->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger btn-flat pull-left edit_reply validated_reply d-none ml-3 rej_btn" style="position: absolute; left: 0;"><i class="fa fa-thumbs-o-down"></i> Reject</button>
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal" ><i class="fa fa-close"></i> Close</button>
              <button type="button" name="reply" class="btn btn-warning text-dark btn-flat pull-left validated_reply edit_btn"><i class="fa fa-save"></i> Edit</button>
              <button type="button" class="btn btn-danger btn-flat pull-left edit_reply validated_reply d-none" id="cancel_edit"><i class="fa fa-ban"></i> Cancel</button>
              <button type="submit" name="reply" class="btn btn-success btn-flat pull-left edit_reply validated_reply d-none"><i class="fa fa-save"></i> Save</button>
            </div>
            <!--Modal Footer **End**-->
            </form>
        </div>
        <!--Modal Content **end**-->
    </div>
    <!--Modal Dialog **end**-->
</div>
<!-- Edit Employee Request END-->