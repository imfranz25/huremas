
<!-- Add Custom Folder-->
<div class="modal fade" id="add_custom">
    <!--Modal Dialog-->
    <div class="modal-dialog modal-md">
        <!--Modal Content-->
        <div class="modal-content">
            <!--Modal Header-->
            <div class="modal-header">
              <h4 class="modal-title"><b>Add Custom Folder</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            </div>
            <!--Modal Header **End**-->
            <!--Modal Body-->
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="function/folder_add.php" >
                <!--Document Name-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Folder Name</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control border border-secondary" name="name" autocomplete="off" minlength="5" maxlength="15" required />
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
<!-- Add Custom Folder END-->


<!-- Edit Custom Folder-->
<div class="modal fade" id="edit_custom">
    <!--Modal Dialog-->
    <div class="modal-dialog modal-md">
        <!--Modal Content-->
        <div class="modal-content">
            <!--Modal Header-->
            <div class="modal-header">
              <h4 class="modal-title"><b>Edit Folder</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            </div>
            <!--Modal Header **End**-->
            <!--Modal Body-->
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="function/folder_edit.php" >
                <input type="hidden" name="folder_id" class="edit_folder_id" />
                <!--Document Name-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Folder Name</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control border border-secondary edit_folder_name" name="name" minlength="5" maxlength="15" autocomplete="off" required />
                  </div>
                </div>


                <!--Folder Details-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Details</label>
                  <div class="col-sm-9">
                    <textarea class="form-control border border-secondary edit_folder_details" required="" autocomplete="off" rows="5" name='details'></textarea>
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
<!-- Edit Custom Folder END-->


<!-- View Custom Folder-->
<div class="modal fade" id="view_custom">
    <!--Modal Dialog-->
    <div class="modal-dialog modal-md">
        <!--Modal Content-->
        <div class="modal-content">
            <!--Modal Header-->
            <div class="modal-header">
              <h4 class="modal-title"><b>View Folder</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            </div>
            <!--Modal Header **End**-->
            <!--Modal Body-->
            <div class="modal-body">

                <!--Document Name-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Folder Name</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control border border-secondary edit_folder_name" readonly />
                  </div>
                </div>


                <!--Folder Details-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Details</label>
                  <div class="col-sm-9">
                    <textarea class="form-control border border-secondary edit_folder_details" readonly rows="5"></textarea>
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
<!-- View Custom Folder END-->


<!-- Delete Folder -->
<div class="modal fade" id="archive_custom">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><b>Archive Folder</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="function/folder_delete.php">
                <input type="hidden" class="edit_folder_id" name="folder_id">
                <div class="text-center">
                    <label>Are you sure you want to move this folder to archive?</label>
                    <h2 id="del_folder_name" class="bold"></h2>
                    <label id="del_folder_date"></label>
                    <div class="text-center text-info" >
                      <i class="fa fa-info-circle mx-1" aria-hidden="true"></i>
                      <label> You can retrieve this folder in the archive section if you confirm </label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-warning btn-flat text-dark" name="archive"><i class="ti-archive"></i> Move to archive</button>
              </form>
            </div>
        </div>
    </div>
</div>



<!-- Upload Document-->
<div class="modal fade" id="uploadModal">
    <!--Modal Dialog-->
    <div class="modal-dialog modal-lg">
        <!--Modal Content-->
        <div class="modal-content">
            <!--Modal Header-->
            <div class="modal-header">
              <h4 class="modal-title"><b>Upload Document</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            </div>
            <!--Modal Header **End**-->
            <!--Modal Body-->
            <div class="modal-body">
              <form class="form-horizontal" method="POST" id="add_docu_form" action="function/document_add.php" enctype="multipart/form-data" >

                <input type="hidden" name="folder_id" id="add_docu_folder_id">
                <!--Document Name-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Folder Name</label>
                  <div class="col-sm-9">
                    <label class="add_docu_folder form-control border border-secondary"></label>
                  </div>
                </div>


                <!--Document Name-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Document Name</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control border border-secondary" name="name" autocomplete="off" minlength="5" required />
                  </div>
                </div>

                <!--File-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">Upload File</label>
                  <div class="col-sm-9">
                    <input type="file" class="form-control form-control-file border border-secondary" name="file" required />
                  </div>
                </div>

                <!--Owner-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Owner</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control border border-secondary" name="owner" autocomplete="off" placeholder="(Optional)"  />
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
<!-- Add Custom Folder END-->




<!-- Add URL-->
<div class="modal fade" id="addURL">
    <!--Modal Dialog-->
    <div class="modal-dialog modal-lg">
        <!--Modal Content-->
        <div class="modal-content">
            <!--Modal Header-->
            <div class="modal-header">
              <h4 class="modal-title"><b>Add URL</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            </div>
            <!--Modal Header **End**-->
            <!--Modal Body-->
            <div class="modal-body">
              <form class="form-horizontal" method="POST" id="add_url_form" action="function/url_add.php" enctype="multipart/form-data" >

                <input type="hidden" name="folder_id" id="add_url_folder_id">
                <!--Document Name-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Folder Name</label>
                  <div class="col-sm-9">
                    <label class="add_url_folder form-control border border-secondary"></label>
                  </div>
                </div>


                <!--Document Name-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">URL Name</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control border border-secondary" name="name" autocomplete="off" minlength="5" required />
                  </div>
                </div>

                <!--File-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label req">URL (link)</label>
                  <div class="col-sm-9">
                    <input type="url" class="form-control border border-secondary" name="link" autocomplete="off" minlength="5" required />
                  </div>
                </div>

                <!--Owner-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Owner</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control border border-secondary" name="owner" autocomplete="off" placeholder="(Optional)"  />
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
<!-- Add Link END-->





<!-- View Document-->
<div class="modal fade" id="viewUpload" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
    <!--Modal Dialog-->
    <div class="modal-dialog modal-lg">
        <!--Modal Content-->
        <div class="modal-content">
            <!--Modal Header-->
            <div class="modal-header">
              <h4 class="modal-title"><b>Document Details</b></h4>
              <button type="button" class="close close_docu" data-folder_id="Institutional Records" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            </div>
            <!--Modal Header **End**-->
            <!--Modal Body-->
            <div class="modal-body">
              <form class="form-horizontal" method="POST" id="edit_docu_form" enctype="multipart/form-data" action="function/document_edit.php">

                <input type="hidden" name="document_id_edit" id="edit_document_id">

                <div class="row">
                  
                  <div class="col-md-3">
                    <img src="../assets/images/document_dp/file.png" alt="" class="img-fluid rounded mb-2" id="img_file" style="max-height: 150px;min-height: 150px;background: darkgreen;width: 100%;"  />
                    <!-- <h6 class="text-center mb-2">5 KB</h6> -->
                    <div class="list-group">        
                      <a class="f-16 border border-secondary rounded p-2 mb-2 text-left bg-success" href="javascript:void(0)" id="starred" ><i class="fa fa-star-o mx-3 text-warning" id="star_icon"></i>Starred</a>
                    </div>
                    <div class="list-group" style="position: relative;">        
                      <a class="f-16 border border-secondary rounded p-2 mb-2 text-left bg-success download" href="javascript:void(0)"  id="download" ><i class="ti-download mx-3" ></i>Download</a>
                    </div>
                    <div class="list-group">        
                      <a class="f-16 border border-secondary rounded p-2 mb-2 text-left bg-success" href="javascript:void(0)" id="share" ><i class="ti-share mx-3" ></i>Share</a>
                    </div>
                    <div class="list-group">        
                      <a class="f-16 border border-secondary rounded p-2 mb-2 text-left bg-success" href="javascript:void(0)" id="lock" data-toggle="modal" data-target="#lock_docu"><i class="ti-lock mx-3"></i>Lock</a>
                    </div>
                    <div class="list-group">    
                      <a class="f-16 border border-secondary rounded p-2 mb-2 text-left bg-success" href="javascript:void(0)" id="unlock"  data-toggle="modal" data-target="#unlock_docu"><i class="ti-unlock mx-3"></i>Unlock</a>
                    </div>
                    <div class="list-group mb-3" >        
                      <a class="f-16 border border-secondary rounded p-2 mb-2 text-left bg-success" href="javascript:void(0)" id="archive"  data-toggle="modal" data-target="#archive_docu" ><i class="ti-archive mx-3"></i>Archive</a>
                    </div>
                  </div>

                  <div class="col-md-9 container">
                    <div class="card rounded">
                      <div class="card-header">
                        <h5 class="w-100">
                          <label id="view_upload_label"><label class="mb-0 pb-0" id="view_upload_name"></label></label>
                          <!--Document Name-->
                          <div class="form-group row mb-0 pb-0 d-none" id="input_upload_name">
                            <div class="col-sm-12">
                              <input type="text" class="form-control border border-secondary view_upload_name" name="name" autocomplete="off" minlength="5" required />
                            </div>
                          </div>
                        </h5>
                      </div>
                      <div class="card-block">
                        <!--Document Name-->
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Folder</label>
                          <div class="col-sm-9" id="view_upload_folder">
                            <input type="text" class="form-control border border-secondary view_upload_folder" name="folder"  readonly />
                          </div>
                          <div class="col-sm-9 d-none" id="edit_upload_folder">
                            <select class="form-control form-control-sm select_upload_folder border border-secondary" name="document_folder">
                              <option value="Institutional Records">Institutional Records</option>
                              <option value="Employees Resume">Employees' Resume</option>
                              <option value="Human Resource">Human Resource</option>
                              <?php 
                                $sql="SELECT * FROM document_folder";
                                $query=$conn->query($sql);
                                while ($row=$query->fetch_assoc()) {
                              ?>
                                <option value="<?php echo $row['folder_id']; ?>"><?php echo ucfirst($row['folder_name']); ?></option>
                              <?php } ?>
                            </select>
                          </div>

                        </div>

                        <!--File-->
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label label_docu">File</label>
                          <div class="col-sm-9">
                            <label class="view_upload_file form-control border border-secondary"></label>
                            <input type="file" class="form-control form-control-file border border-secondary view_upload_input d-none" name="file" />
                            <input type="url" class="form-control border border-secondary d-none view_url_input" name="link" autocomplete="off" minlength="5" required />
                            <!-- INFO FOR FILE -->
                            <div class="input-group-append d-none" id="file_info_change">
                              <span class="input-group-text text-info" >
                                <i class="fa fa-info-circle"></i>
                                <strong>Leave upload file to default if you dont wish to change the document file</strong>
                              </span>
                            </div>
                          </div>
                        </div>

                        <!--Owner-->
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Owner</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control border border-secondary view_upload_owner" name="owner" autocomplete="off" readonly placeholder="N/A"  />
                          </div>
                        </div>

                        <!--Folder Details-->
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Details</label>
                          <div class="col-sm-9">
                            <textarea class="form-control border border-secondary view_upload_details" required readonly autocomplete="off" rows="6" name='details'></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                  </div>

                </div>

            </div>
            <!--Modal Body **End**-->
            

            <!--Modal Footer-->
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left close_docu" data-dismiss="modal" data-folder_id="Institutional Records"><i class="fa fa-close"></i> Close</button>
              <button type="button" id="edit_btn_docu" class="btn btn-warning text-dark btn-flat pull-left"><i class="fa fa-edit"></i> Edit</button>

              <button type="button" id="cancel_btn_docu" class="btn btn-danger btn-flat pull-left"><i class="fa fa-close"></i> Cancel</button>
              <button type="submit" name="edit" id="save_btn_docu" class="btn btn-success btn-flat pull-left"><i class="fa fa-save"></i> Save</button>
            </div>
            <!--Modal Footer **End**-->
            </form>
        </div>
        <!--Modal Content **end**-->
    </div>
    <!--Modal Dialog **end**-->
</div>
<!-- Add Custom Folder END-->



<!-- Lock Document -->
<div class="modal fade" id="lock_docu" style="background: rgba(0, 0, 0, .7);">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><b>Lock Document</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" id="lockForm">
                <input type="hidden" class="docu_folder_id" name="document_id">
                <input type="hidden" value="lock" name="status">
                <div class="text-center">
                    <label>Are you sure you want to lock this document?</label>
                    <h2 class="lock_folder_name bold"></h2>
                    <label class="lock_folder_date"></label>
                    <div class="text-center text-danger" >
                      <label><i class="fa fa-exclamation-circle mx-1" aria-hidden="true"></i> Once this document is locked, you will not able to edit and share this document(for file only).</label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-danger btn-flat" name="lock"><i class="ti-lock"></i> Lock</button>
              </form>
            </div>
        </div>
    </div>
</div>


<!-- UnLock Document -->
<div class="modal fade" id="unlock_docu" style="background: rgba(0, 0, 0, .7);">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><b>Unlock Document</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" id="unlockForm">
                <input type="hidden" class="docu_folder_id" name="document_id">
                <input type="hidden" value="unlock" name="status">
                <div class="text-center">
                    <label>Are you sure you want to unlock this document?</label>
                    <h2 class="lock_folder_name bold"></h2>
                    <label class="lock_folder_date"></label>

                    <!--Password-->
                    <div class="form-group row mt-3">
                      <label class="col-sm-3 col-form-label">Password</label>
                      <div class="col-sm-9">
                        <input type="password" class="form-control border border-secondary" name="pass" id="unlock_pass"  placeholder="Enter your password for verification" required   />
                      </div>
                    </div>

                    <div class="text-center text-info" >
                      <label><i class="fa fa-info-circle mx-1" aria-hidden="true"></i> Once this document is unlocked, you will able to edit and share this document(for file only).</label>
                    </div>

                    
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-warning text-dark btn-flat" name="lock"><i class="ti-unlock"></i> Unlock</button>
              </form>
            </div>
        </div>
    </div>
</div>




<!-- UnLock Document -->
<div class="modal fade" id="archive_docu" style="background: rgba(0, 0, 0, .7);">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><b>Archive Document/URL</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="function/document_edit.php">
                <input type="hidden" class="docu_folder_id" name="document_id_archive">
                <div class="text-center">
                    <label>Are you sure you want to archive this document/url?</label>
                    <h2 class="lock_folder_name bold"></h2>
                    <label class="lock_folder_date"></label>

                    <div class="text-center text-info" >
                      <i class="fa fa-info-circle mx-1" aria-hidden="true"></i>
                      <label> You can retrieve this folder in the archive section once you moved this to archive </label>
                    </div>

                    
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-warning text-dark btn-flat" name="archive"><i class="ti-archive"></i> Move to Archive</button>
              </form>
            </div>
        </div>
    </div>
</div>





