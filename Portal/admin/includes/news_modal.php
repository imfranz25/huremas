<!-- Create News -->
<div class="modal fade" id="addNews">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    	<div class="modal-header">
      	<h4 class="modal-title"><b>Create News</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    	</div>
      <form class="form-horizontal" method="POST" action="function/news_add.php" enctype="multipart/form-data">
    	  <div class="modal-body">
          <div class="form-group row">
            <label class="col-sm-2 col-form-label req">Date</label>
            <div class="col-sm-10">
              <input type="date" class="form-control border border-secondary" min="<?php echo date('Y-m-d');  ?>" value="<?php echo date('Y-m-d');  ?>" name="date" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label req">Display Image</label>
            <div class="col-sm-10">
              <input type="file" name="display" class="form-control border border-secondary" accept="image/*" onchange="check_image(this)"  required="" >
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label req">Headline</label>
            <div class="col-sm-10">
              <input type="text" name="headline" class="form-control border border-secondary"  required="" >
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 req">News Detail</label>
            <div class="col-sm-10">
              <textarea class="form-control border border-secondary" required="" name='details' rows="10"></textarea>
            </div>
          </div>
      	</div>
      	<div class="modal-footer">
        	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
        	<button type="submit" class="btn btn-success btn-flat" name="add"><i class="fa fa-save"></i> Publish</button>
      	</div>
      </form>
    </div>
  </div>
</div>




<!-- Edit News -->
<div class="modal fade" id="viewNews">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b>View News</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Date</label>
          <div class="col-sm-10">
            <input type="text" class="form-control border border-secondary news_datetext" min="<?php echo date('Y-m-d');  ?>"  readonly>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Display Image</label>
          <div class="col-sm-10">
            <label class="col-form-label">
              <a class="news_image" target="_blank" href=""></a>
            </label>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Headline</label>
          <div class="col-sm-10">
            <input type="text" class="form-control border border-secondary news_headline"  readonly >
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2">News Detail</label>
          <div class="col-sm-10">
            <textarea class="form-control border border-secondary news_detail"  readonly rows="10"></textarea>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
      </div>
    </div>
  </div>
</div>


<!-- Edit News -->
<div class="modal fade" id="editNews">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b>Edit News</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" method="POST" action="function/news_edit.php" enctype="multipart/form-data">
        <input type="hidden" class="reference_id" name="reference_id" id="reference_id">
        <div class="modal-body">
          <div class="form-group row">
            <label class="col-sm-2 col-form-label req">Date</label>
            <div class="col-sm-10">
              <input type="date" class="form-control border border-secondary news_date" min="<?php echo date('Y-m-d');  ?>" name="date" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Display Image</label>
            <div class="col-sm-10">
              <label class="col-form-label"><a class="news_image" target="_blank" href=""></a></label>
              <input type="file" name="display" class="form-control border border-secondary" accept="image/*" onchange="check_image(this)"  >
              <!-- INFO FOR FILE -->
              <div class="input-group-append">
                <span class="input-group-text text-info" >
                  <i class="fa fa-info-circle"></i>
                  <strong>Leave upload file to default if you dont wish to change the display image</strong>
                </span>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label req">Headline</label>
            <div class="col-sm-10">
              <input type="text" name="headline" class="form-control border border-secondary news_headline"  required="" >
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 req">News Detail</label>
            <div class="col-sm-10">
              <textarea class="form-control border border-secondary news_detail" required="" name='details' rows="10"></textarea>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
          <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-save"></i> Update</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Delete News -->
<div class="modal fade" id="newsDelete">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b>Delete</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" method="POST" action="function/news_delete.php">
        <input type="hidden" class="reference_id" name="id">
        <div class="modal-body">
          <div class="text-center">
            <label>Are you sure you want to delete the following news headline(s)?
            </label>
            <h2 id="del_news" class="bold"></h2>
            <label id="del_date"></label>
            <div class="text-center text-danger" >
              <i class="fa fa-exclamation-circle mx-1" aria-hidden="true"></i>
              <label> Note: This process cannot be undone</label>
            </div>
            <hr>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label req">Password</label>
              <div class="col-sm-9">
                <input type="password" name="pass" class="form-control border border-secondary" placeholder="Enter your password for verification"  required="" >
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
          <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
        </div>
      </form>
    </div>
  </div>
</div>
