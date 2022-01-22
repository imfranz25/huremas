
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
              <h5>Approved Request List</h5>
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
