
<!-- Edit ACTION -->
<div class="modal fade" id="employee_action">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><b>Edit Disciplinary Action</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

        <form class="form-horizontal" method="POST" action="function/disciplinaryA_edit.php" enctype="multipart/form-data">

          <input type="hidden" name="reference" id="reference_DA">

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Issue Date</label>
            <div class="col-sm-10">
              <input type="text" class="form-control date_DA border border-secondary" readonly>
            </div>
          </div>


          <div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Reason</label>
              <div class="col-sm-10">
                <input class="form-control border border-secondary reason_DA border border-secondary" readonly /> 
              </div>
            </div>                            
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Internal Note</label>
              <div class="col-sm-10">
                <textarea class="form-control description_DA border border-secondary" readonly=""  rows="10"></textarea>
              </div>
            </div>      
          </div>

          <ul class="nav nav-tabs mt-3 state_tab">
            <!--Dynamic Tab-->
          </ul>

          <div class="tab-content container mt-5">

            <div class="tab-pane fade show active" id="er" role="tabpanel" aria-labelledby="er">
              <div class="form-group row">
                <label class="col-sm-2">Attachment</label>
                <div class="col-sm-10">
                  <a target="_blank" class="attachment_link_DA" href="javascript:void(0)" >
                  </a>
                  <input type="file" onchange="check_attachment(this)" name="attachment" id="attachment" class="form-control border border-secondary" accept=".pdf, .doc, .docx, .dot, .dotm, .docm, .dotx, application/msword, application/vnd.ms-word.document.macroEnabled.12, application/vnd.openxmlformats-officedocument.wordprocessingml.document, application/vnd.openxmlformats-officedocument.wordprocessingml.template, application/pdf " />
                </div>
              </div>  
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Explanation</label>
                <div class="col-sm-10">
                  <textarea class="form-control explain_DA border border-secondary"  name='explanation' required="" rows="10"></textarea>
                </div>                          
              </div>
            </div>

             <div class="tab-pane fade" id="ad" role="tabpanel" aria-labelledby="ad">
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Action</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control action_DA border border-secondary" name="action" readonly="" />
                </div>
              </div>  
              <div class="form-group row">
                <label class="col-sm-2">Action Details</label>
                <div class="col-sm-10">
                  <textarea class="form-control action_details_DA border border-secondary" name='action_details' readonly rows="10"></textarea>
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



<!-- View ACTION -->
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
            <label class="col-sm-2 col-form-label">Issue Date</label>
            <div class="col-sm-10">
              <input type="text" class="form-control date_DA border border-secondary" readonly>
            </div>
          </div>


          <div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Reason</label>
              <div class="col-sm-10">
                <input class="form-control border border-secondary reason_DA" readonly /> 
              </div>
            </div>                            
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Internal Note</label>
              <div class="col-sm-10">
                <textarea class="form-control description_DA border border-secondary" readonly=""  rows="10"></textarea>
              </div>
            </div>      
          </div>

          <ul class="nav nav-tabs mt-3 state_tab_view">
            <!--Dynamic Tab-->
          </ul>

          <div class="tab-content container mt-5">

            <div class="tab-pane fade show active" id="er_view" role="tabpanel" aria-labelledby="er_view">
              <div class="form-group row">
                <label class="col-sm-2">Attachment</label>
                <div class="col-sm-10">
                  <a target="_blank" class="attachment_link_DA" href="javascript:void(0)" >
                  </a>
                </div>
              </div>  
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Explanation</label>
                <div class="col-sm-10">
                  <textarea class="form-control explain_DA border border-secondary" readonly="" rows="10"></textarea>
                </div>                          
              </div>
            </div>

             <div class="tab-pane fade" id="ad_view" role="tabpanel" aria-labelledby="ad_view">
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Action</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control action_DA border border-secondary" name="action" readonly="" />
                </div>
              </div>  
              <div class="form-group row">
                <label class="col-sm-2">Action Details</label>
                <div class="col-sm-10">
                  <textarea class="form-control action_details_DA border border-secondary" name='action_details' readonly rows="10"></textarea>
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



