
<!-- Add Applicant -->
<div class="modal fade" id="newApp" style="background: rgb(0,0,0,.7);">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
              
              <h4 class="modal-title"><b>Application Form</b></h4>
              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
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
                <input type="file" id="resume" name="resume" accept=".pdf, .doc, .docx, .dot, .dotm, .docm, .dotx, application/msword, application/vnd.ms-word.document.macroEnabled.12, application/vnd.openxmlformats-officedocument.wordprocessingml.document, application/vnd.openxmlformats-officedocument.wordprocessingml.template, application/pdf " required=""  class="form-control-file" onchange="check_file(this)"  />

                <div class="input-group-append text-danger">
                  <label><i class="fa fa-info-circle mr-1 mt-1"></i>Maximum Size 5 MB</label>
                </div>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger btn-flat pull-left" data-bs-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
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
              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
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
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-bs-dismiss="modal"><i class="fa fa-close"></i> Cancel</button>
              <button type="submit" class="btn btn-success btn-flat" name="move"><i class="fa fa-trash-o"></i> Delete</button>
              </form>
            </div>
        </div>
    </div>
</div>


<!--===============Success======================== -->

<div id="successModal" class="modal fade" style="background: rgb(0,0,0,.7);">
  <div class="modal-dialog modal-confirm">
    <div class="modal-content">
      <div class="modal-header justify-content-center bg-success">
        <div class="icon-box">
          <i class="fa fa-check-circle-o"></i>
        </div>
        <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body text-center">
        <h4>Success</h4> 
        <label id="success_msg"></label><br>
        <button class="btn btn-warning" data-bs-dismiss="modal"><span>Continue</span> <i class="fa fa-arrow-circle-right ml-1"></i></button>
      </div>
    </div>
  </div>
</div> 


<!--===============Error======================== -->
<div id="errorModal" class="modal fade" style="background: rgb(0,0,0,.7);">
  <div class="modal-dialog modal-confirm">
    <div class="modal-content">
      <div class="modal-header justify-content-center bg-danger">
        <div class="icon-box">
          <i class="fa fa-times-circle-o"></i>
        </div>
        <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body text-center">
        <h4>Failed</h4> 
        <label id="error_msg"></label><br>
        <button class="btn btn-warning" data-bs-dismiss="modal"><span>Continue</span> <i class="fa fa-arrow-circle-right ml-1"></i></button>
      </div>
    </div>
  </div>
</div> 


<!--===============Warning======================== -->
<div id="fullModal" class="modal fade" style="background: rgb(0,0,0,.7);">
  <div class="modal-dialog modal-confirm">
    <div class="modal-content">
      <div class="modal-header justify-content-center bg-warning">
        <div class="icon-box">
          <i class="fa fa-exclamation-triangle"></i>
        </div>
        <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body text-center">
        <h4>Opps</h4> 
        <label id="warn_msg"></label><br>
        <button class="btn btn-warning" data-bs-dismiss="modal"><span>Continue</span> <i class="fa fa-arrow-circle-right ml-1"></i></button>
      </div>
    </div>
  </div>
</div> 






