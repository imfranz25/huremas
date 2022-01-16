
<style>
/* SET DROP DOWN MENU ITEM TO DOWNWARD BY DEFAULT => DERIVE DYNAMIC BOOSTRAP JS */
.dropdown-menu{
    transform: translate3d(5px, 35px, 0px)!important;
}
</style>




<!-- EManage Applicantsb-->
<div class="modal fade " id="track_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
    <!--Modal Dialog-->
    <div class="modal-dialog modal-xl">
        <!--Modal Content-->
        <div class="modal-content">
            <!--Modal Header-->
            <div class="modal-header">
              <h4 class="modal-title mb-3" ><b>Manage Applicants :</b><label class="job_title_modal p-0 m-0 mx-2"></label><br>
              <label class="title_code f-14" style="margin-top:-.30rem !important; position: absolute;"></label></h4>
              <button type="button" class="close reload_app" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            </div>

            <!--Modal Header **End**-->
            <!--Modal Body-->
            <div class="modal-body">
              <div class="pcoded-inner-content">
                        
                        <button type="button" class="btn btn-mat waves-effect waves-light btn-success" data-toggle="modal" data-target="#newApp" id="addCandi"><i class="fa fa-plus"></i>Add New Candidate</button>

                            <!-- Main-body start -->
                            <div class="card pb-0 mb-1">          
                              <div class="box-body pb-0">
                                <div class="card-block table-border-style row text-justify">
                                  
                                  <!--Side Bar Tracking-->
                                  <div class="col-lg-3">
                                    <div class="list-group" id="tracking_tab" role="tablist">
                                      
                                      <a class="f-16 nav-item border border-secondary rounded p-2 mb-2 text-left list-group-item tab_code active" data-toggle="list" href="" onclick="getapplicant($(this).attr('data-id'),'New Candidates')" id="candiTab"><i class="fa fa-users mx-3" aria-hidden="true"></i>New Candidates</a>

                                      <a class="f-16 nav-item border border-secondary rounded p-2 mb-2 text-left list-group-item tab_code " data-toggle="list" href="" onclick="getapplicant($(this).attr('data-id'),'In Review')"><i class="fa fa-search mx-3" aria-hidden="true"></i>In Review</a>

                                      <a class="f-16 nav-item border border-secondary rounded p-2 mb-2 text-left list-group-item tab_code " data-toggle="list" href="" onclick="getapplicant($(this).attr('data-id'),'Screening')"><i class="fa fa-pencil-square-o mx-3" aria-hidden="true"></i>Screening</a>

                                      <a class="f-16 nav-item border border-secondary rounded p-2 mb-2 text-left list-group-item tab_code " data-toggle="list" href="" onclick="getapplicant($(this).attr('data-id'),'Assesstment')"><i class="fa fa-tasks mx-3" aria-hidden="true"></i>Assesstment</a>

                                      <a class="f-16 nav-item border border-secondary rounded p-2 mb-2 text-left list-group-item tab_code " data-toggle="list" href="" onclick="getapplicant($(this).attr('data-id'),'Interview')"><i class="fa fa-comments mx-3" aria-hidden="true"></i>Interview</a> 

                                      <a class="f-16 nav-item border border-secondary rounded p-2 mb-2 text-left list-group-item tab_code " data-toggle="list" href="" onclick="getapplicant($(this).attr('data-id'),'Background Check')"><i class="fa fa-check-square-o mx-3" aria-hidden="true"></i>Background Check</a>

                                      <a class="f-16 nav-item border border-secondary rounded p-2 mb-2 text-left list-group-item tab_code " data-toggle="list" href="" onclick="getapplicant($(this).attr('data-id'),'Offered')"><i class="fa fa-money mx-3" aria-hidden="true"></i>Offered</a>

                                      <a class="f-16 nav-item border border-secondary rounded p-2 mb-2 text-left list-group-item tab_code " data-toggle="list" href="" onclick="getapplicant($(this).attr('data-id'),'Hired')"><i class="fa fa-handshake-o mx-3" aria-hidden="true"></i>Hired</a>

                                      <a class="f-16 nav-item border border-secondary rounded p-2 mb-2 text-left list-group-item tab_code" data-toggle="list" href="" onclick="getapplicant($(this).attr('data-id'),'Disqualified')"><i class="fa fa-thumbs-down mx-3" aria-hidden="true"></i>Disqualified</a>

                                    </div>
                                  </div>

                                  <!--Tab Content-->
                                  <div class="col-md-12 col-lg-9">

                                      <!--Candidate Page-->
                                      <div class="card pb-0 mb-0" style="min-height: 450px; box-shadow: none;" >


                                        <div class="card-header">
                                          <h5 class="tab_title"></h5>
                                          <!--Store Page for Previous Reference-->
                                          <input type="hidden" id="prevstage">
                                        </div> 

                                        <!--No Applicants Post-->
                                        <div class="row m-auto" id="no_candidate">
                                          <div class="col-lg-12 p-3 text-center">
                                            <img src="../assets/images/jobpost.jpg" alt="No Notification" class="img-radius img-fluid mx-auto d-block p-4 w-50">
                                            <h5>THERE ARE NO CANDIDATES IN THIS STAGE</h5>
                                            <label>Check other recruitment stages for new applicants.</label>
                                          </div>
                                        </div>
                                        <!--No Applicants Post End-->

                                        <div class="card-block row pb-0 mb-0 d-none" id="appTab">

                                          <!--Candidates List-->
                                          <div class="col-md-3 rounded pl-0 pr-0">

                                            <div class="list-group border border-secondary rounded list_applicant w-100" style="min-height: 360px; max-height:360px; overflow-y: auto;">
                                              <!-- List of Candidates Here-->
                                            </div>

                                          </div>


                                          <!--Candidate Form-->
                                          <div class="col-md-9 pr-0 pb-0 mb-0">

                                            <div class="card mt-3 mt-md-0 pb-0 mb-0" style="box-shadow: none;">
                                              <div class="card-header p-3">
                                                <div class="float-md-left btn m-0 applicant_name">
                                                <!-- Applicant Name Here-->
                                                </div>
                                                <div class="btn-group float-right m-0">
                                                  <button type="button" class="btn btn-mat waves-effect waves-light btn-warning dropdown-toggle text-dark" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="move_btn" style="border-radius: 30px;" >Move to</button>
                                                  <div class="dropdown-menu">
                                                    <a class="dropdown-item move_id" href="New Candidates" id="NewCandidates" >New Candidates</a>
                                                    <a class="dropdown-item move_id" href="In Review" id="InReview" >In Review</a>
                                                    <a class="dropdown-item move_id" href="Screening" id="Screening" >Screening</a>
                                                    <a class="dropdown-item move_id" href="Assesstment" id="Assesstment" >Assesstment</a>
                                                    <a class="dropdown-item move_id" href="Interview" id="Interview">Interview</a>
                                                    <a class="dropdown-item move_id" href="Background Check" id="BackgroundCheck">Background Check</a>
                                                    <a class="dropdown-item move_id" href="Offered" id="Offered">Offered</a>
                                                    <a class="dropdown-item move_id" href="Hired" id="Hired">Hired</a><hr class="divider m-0 p-0" />
                                                    <a class="dropdown-item move_id text-danger" href="Disqualified" id="Disqualified">Disqualified</a>
                                                  </div>
                                                  <button id="onboard" type="button" class="btn btn-mat waves-effect waves-light btn-info text-gray-dark ml-2 d-none app_id on_app" style="border-radius: 30px;" >On-board</button>
                                                  <a id="onboard_label" type="button" class="btn btn-mat waves-effect waves-light btn-default ml-2 d-none" style="border-radius: 30px;" >Applicant already on-board</a>
                                                  <button id="delete_app_btn" type="button" class="btn btn-mat waves-effect waves-light btn-danger text-gray-dark ml-2 d-none" style="border-radius: 30px;" ><i class="fa fa-trash-o mr-1" aria-hidden="true"></i>Delete</button>
                                                </div>
                                              </div>
                                              <div class="card-block table-border-style">
                                                <!--Email-->
                                                <div class="form-group row">
                                                  <label class="col-md-4">Email</label>
                                                  <div class="col-md-8">
                                                    <label class="form-control modal_email"></label>
                                                  </div>
                                                </div>
                                                 <!--Number--> 
                                                <div class="form-group row">
                                                  <label class="col-md-4">Number</label>
                                                  <div class="col-md-8">
                                                    <label class="form-control modal_number"></label>
                                                  </div>
                                                </div>
                                                <div class="form-group row">
                                                  <label class="col-md-4">Attachments</label>
                                                  <div class="col-md-8 modal_file" >
                                                    <a target="_blank" class="attachment_link" href="javascript:void(0)">
                                                      <i class="fa fa-paperclip mr-2"></i><label class="modal_attachment" style="cursor: pointer;"></label>
                                                    </a>
                                                  </div>
                                                </div>
                                                <hr class="divider" />
                                                <form method="POST" id="send_note">
                                                  <input type="hidden" name="id" id="note_id" class="note_id">
                                                  <div class="form-group row">
                                                    <label class="col-md-4 col-form-label">Notes</label>
                                                    <div class="col-md-8">
                                                      <textarea class="form-control modal_note" autocomplete="off" rows="4" id="note_text" name='note' readonly></textarea>
                                                      <label class="ml-1 p-1"  id="note_status"></label>
                                                      <button class="btn btn-info py-1 px-2 mt-1 float-right d-none" id="add_btn"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
                                                      <button type="button" class="btn btn-info py-1 px-2 mt-1 float-right" id="edit_btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
                                                    </div>
                                                  </div>
                                                </form>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                          <!-- Card Block End-->
                                      </div>
                                      <!--Candidate Page End-->
                                  </div>
                                  <!--Tab Content End-->
                                  
                                </div>
                              </div>
                            </div>
                            <!-- Main-body end -->
                        </div>
                        <!--Pcoded Inner COntent **end**-->

            </div>
            <!--Modal Body **End**-->
            <!--Modal Footer-->
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left reload_app" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            </div>
            <!--Modal Footer **End**-->
        </div>
        <!--Modal Content **end**-->
    </div>
    <!--Modal Dialog **end**-->
</div>
<!-- Manage Applicant **End**-->

<!-- Add Applicant -->
<div class="modal fade" id="newApp" style="background: rgb(0,0,0,.7);">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
              
              <h4 class="modal-title"><b>Add Candidate</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" id="form_add_candidate" method="POST" enctype="multipart/form-data">

              <input type="hidden" name="code" id="add_app_code">

              <div class="form-group form-default">
                <label class="float-label req">First Name</label>
                <span class="form-bar"></span>
                <input type="text" id="fname" name="fname" class="form-control border border-secondary" required="" autocomplete="off" />
              </div>

              <div class="form-group form-default">
                <label class="float-label">Middle Name</label>
                <span class="form-bar"></span>
                <input type="text" id="mname" name="mname" class="form-control border border-secondary" autocomplete="off" />
              </div>

              <div class="form-group form-default">
                <label class="float-label req">Last Name</label>
                <span class="form-bar"></span>
                <input type="text" id="lname" name="lname" required="" class="form-control border border-secondary" autocomplete="off" />
              </div>

              <div class="form-group form-default">
                <label class="float-label req">Email</label>
                <span class="form-bar"></span>
                <input type="email" id="email" name="email" required=""  class="form-control border border-secondary" autocomplete="off" />
              </div>

              <div class="form-group form-default">
                <label class="float-label req">Contact</label>
                <span class="form-bar"></span>
                <input type="text" id="contact" name="contact" required=""  class="form-control border border-secondary" autocomplete="off" pattern="[0-9]+" title="Use Number format" />
              </div>

              <div class="form-group form-default">
                <label class="float-label req">Attachments (Please attach your Resume/CV in a PDF or Doxc Format)</label>
                <span class="form-bar"></span>
                <input type="file" id="resume" name="resume" accept=".pdf, .doc, .docx, .dot, .dotm, .docm, .dotx, application/msword, application/vnd.ms-word.document.macroEnabled.12, application/vnd.openxmlformats-officedocument.wordprocessingml.document, application/vnd.openxmlformats-officedocument.wordprocessingml.template, application/pdf " required=""  class="form-control-file" onchange="check_resume(this)"  />

                <div class="input-group-append text-danger">
                  <span class="input-group-text">
                    <label><i class="fa fa-info-circle mr-1 mt-1"></i>Maximum Size 5 MB</label>
                  </span>
                </div>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
              </form>
            </div>
        </div>
    </div>
</div>



<!-- Move Applicant -->
<div class="modal fade" id="moveApp" style="background: rgb(0,0,0,.7);">
    <div class="modal-dialog" style="top: 10%;">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="move-title bold"></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" id="form_move" method="POST">
                <input type="hidden" id="move_app_id" name="id" />
                <input type="hidden" id="move_app_stage" name="stage" />
                <input type="hidden" id="move_app_code" name="code" />
                <div class="text-center">
                    <label>Are you sure you want to move this applicant?</label>
                    <h2 id="move_name" class="bold"></h2>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Cancel</button>
              <button type="submit" class="btn btn-success btn-flat" name="move"><i class="fa fa-arrows"></i> Move</button>
              </form>
            </div>
        </div>
    </div>
</div>


<!-- Delete Applicant -->
<div class="modal fade" id="deleteApp" style="background: rgb(0,0,0,.7);">
    <div class="modal-dialog" style="top: 10%;">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="bold">Delete</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" id="form_delete_app" method="POST">
                <input type="hidden" id="del_app_id" name="id" />
                <div class="text-center">
                    <label>Are you sure you want to delete this applicant record?</label>
                    <h2 id="del_app_name" class="bold"></h2>
                    <div class="text-center text-danger">
                       <label><i class="fa fa-exclamation-circle mx-1" aria-hidden="true"></i> Note: This process cannot be undone</label>
                    </div><hr>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label req">Password</label>
                      <div class="col-sm-9">
                        <input type="password" class="form-control border border-secondary " required name="pass" id="pass" placeholder="Please enter your password for verification" />
                      </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Cancel</button>
              <button type="submit" class="btn btn-danger btn-flat" name="move"><i class="fa fa-trash-o"></i> Delete</button>
              </form>
            </div>
        </div>
    </div>
</div>
