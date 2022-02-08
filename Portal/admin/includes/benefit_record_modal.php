
<!-- Event Request -->
<div class="modal fade" id="benModal">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b>Benefit Record: <span id="emp_name"></span></b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Card Block -->
        <div class="card">
          <div class="card-block mb-0">
            <!-- Header Request -->
            <div class="card-header mt-0">
              <h5>
                <a type="button" class="btn btn-mat waves-effect waves-light btn-default">Employee Benefit List</a>
              </h5>
              <button type="button" class="btn btn-mat waves-effect waves-light btn-success float-right" id="addBeneFormat" data-toggle="modal" data-target="#addBene"><i class="fa fa-plus"></i>Add Benefit</button>
            </div>
            <!-- Body Request-->
            <div class="box-body">
              <div class="card-block table-border-style">
                <div class="table-responsive">
                  <table id="benefit_record_table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Benefit ID</th>
                        <th>Benefit Name</th>
                        <th>Description</th>
                        <th>Date Applied</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody id="benefit_body">
                    </tbody>
                  </table>
                </div>
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



<!-- Add -->
<div class="modal fade" id="addBene" style="background:rgba(0, 0, 0, .7);">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b>Add Benefit</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" method="POST" id="addbene_submit">
        <input type="hidden" name="emp_id_ben" class="emp_id_ben" />
        <div class="modal-body">
          <div class="form-group row">
            <label class="col-2 float-label req">Benefit</label>
            <div class="col-10">
              <select name="benefit" id="select_benefit" class="form-control border border-secondary" required>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-2 float-label">Description</label>
            <div class="col-10">
              <textarea class="form-control border border-secondary" id="benefit_desc" readonly rows="8"></textarea>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
          <button type="submit" class="btn btn-success btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- View -->
<div class="modal fade" id="view_desc" style="background: rgba(0, 0, 0, .7);">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b>View Benefit</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row">
          <label class="col-2 float-label">Title</label>
          <div class="col-10">
            <input type="text" class="form-control border border-secondary edit_title" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-2 float-label">Description</label>
          <div class="col-10">
            <textarea class="form-control border border-secondary edit_description" readonly rows="8" ></textarea>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
      </div>
    </div>
  </div>
</div>


<!-- Delete -->
<div class="modal fade" id="removeBene" style="background: rgba(0, 0, 0, .7);">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b>Delete</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" method="POST" id="deleteBeneForm">
        <input type="hidden" id="del_beneid" name="id">
        <input type="hidden" class="emp_id_ben">
        <div class="modal-body">
          <div class="text-center">
            <p>Are you sure you want to delete this benefit record?</p>
            <h2 id="del_benefit" class="bold"></h2>
            <label id="del_applied"></label>
            <div class="text-center text-danger" >
              <i class="fa fa-exclamation-circle mx-1" aria-hidden="true"></i>
              <label> Note: This process cannot be undone</label>
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
