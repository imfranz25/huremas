<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          	<div class="modal-header">
            	
            	<h4 class="modal-title"><b>Add Benefit</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="function/benefits_add.php">

              <div class="form-group form-default">
                <label class="float-label">Title</label>
                <span class="form-bar"></span>
                <input type="text" name="title" class="form-control" required="">
              </div>

              <div class="form-group form-default">
              
                  <label class="float-label">Description</label>
                  <span class="form-bar"></span>
                  <textarea class="form-control" required="" name='description' style='height:200px;'></textarea>
                  
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

<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          	<div class="modal-header">
            	
            	<h4 class="modal-title"><b>Update Benefit: <span class="bene_id"></span></b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
          	</div>

          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="function/benefits_edit.php">
            		<input type="hidden" id="beneid" name="id">

                <div class="form-group form-default">
                  <label class="float-label">Title</label>
                  <span class="form-bar"></span>
                  <input type="text" id='edit_title' name="title" class="form-control" required="">
                </div>


                <div class="form-group form-default">
                  <label class="float-label">Description</label>
                  <span class="form-bar"></span>
                  <textarea class="form-control" id='edit_description' required=""  style='height:200px;' name='description'></textarea>
                </div>

          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	
            	<h4 class="modal-title"><b>Delete</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="function/benefits_delete.php">
            		<input type="hidden" id="del_beneid" name="id">
            		<div class="text-center">
	                	<p>Are you sure you want to delete this benefit record(s)?</p>
	                	<h2 id="del_benefit" class="bold"></h2>
                    <div class="text-center text-danger" >
                      <i class="fa fa-exclamation-circle mx-1" aria-hidden="true"></i>
                      <label> Note: This process cannot be undone</label>
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


<!-- View description -->
<div class="modal fade" id="view_desc">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          	<div class="modal-header">
            	
            	<h4 class="modal-title"><b><span class="bene_id"></span></b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
          	</div>
          	<div class="modal-body">
            		<div class="text-center">
	                	<p><span class="view_title"></span> Description</p>
					</div>
	                	<h5 id="view_benefit" class="bold"></h5>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>

          	</div>
        </div>
    </div>
</div>


     