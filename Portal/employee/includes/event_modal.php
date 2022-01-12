

<!-- Request Event -->
<div class="modal fade" id="eventRequest">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">   	
        <h4 class="modal-title"><b>Request Event</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="function/event_add.php" enctype="multipart/form-data" >
          <div class="form-group row">
            <label class="col-sm-2 col-form-label req">Expected Date</label>
            <div class="col-sm-10">
              <input type="date" class="form-control border border-secondary" min="<?php echo date('Y-m-d'); ?>" name="event_date" required />
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label req">Image</label>
            <div class="col-sm-10">
              <input type="file" name="display" class="form-control border border-secondary" accept="image/*" onchange="check_image(this)"  required="" >
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label req">Event Name</label>
            <div class="col-sm-10">
              <input type="text" name="event_name" class="form-control border border-secondary"  required="" autocomplete="off" >
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label req">Time</label>
            <div class="col-sm-5">
              <input type="time" name="event_from" class="form-control border border-secondary event_from"  required="" placeholder="From">
            </div>
            <div class="col-sm-5">
              <input type="time" name="event_to" class="form-control border border-secondary event_to"  required="" placeholder="To">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label req">Venue</label>
            <div class="col-sm-10">
              <input type="text" name="venue" class="form-control border border-secondary"  required="" autocomplete="off"  >
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label req">Details</label>
            <div class="col-sm-10">
              <textarea name="details" required="" class="form-control border border-secondary" rows="8"></textarea>
            </div>
          </div>

      </div>
    	<div class="modal-footer">
      	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
      	<button type="submit" class="btn btn-success btn-flat" name="save"><i class="fa fa-save"></i> Save</button>
        </form>
      </div>
    </div>
  </div>
</div>




<!-- Request Event -->
<div class="modal fade" id="editRequest">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">    
        <h4 class="modal-title"><b>Edit Request</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="function/event_edit.php" enctype="multipart/form-data" >
          <input type="hidden" name="reference_id" class="event_reference" />
          <div class="form-group row">
            <label class="col-sm-2 col-form-label req">Expected Date</label>
            <div class="col-sm-10">
              <input type="date" class="form-control border border-secondary event_date" min="<?php echo date('Y-m-d'); ?>" name="event_date" required />
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label req">Image</label>
            <div class="col-sm-10">
              <a target="_blank" class="event_display" href=""></a>
              <input type="file" name="display" class="form-control border border-secondary" accept="image/*" onchange="check_image(this)"  >
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label req">Event Name</label>
            <div class="col-sm-10">
              <input type="text" name="event_name" class="form-control border border-secondary event_name"  required="" autocomplete="off" >
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label req">Time</label>
            <div class="col-sm-5">
              <input type="time" name="event_from" class="form-control border border-secondary event_from"  required="" placeholder="From">
            </div>
            <div class="col-sm-5">
              <input type="time" name="event_to" class="form-control border border-secondary event_to"  required="" placeholder="To">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label req">Venue</label>
            <div class="col-sm-10">
              <input type="text" name="venue" class="form-control border border-secondary event_venue"  required="" autocomplete="off"  >
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label req">Details</label>
            <div class="col-sm-10">
              <textarea name="details" required="" class="form-control border border-secondary event_details" rows="8"></textarea>
            </div>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
        <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-save"></i> Save Changes</button>
        </form>
      </div>
    </div>
  </div>
</div>



<!-- Request View -->
<div class="modal fade" id="viewRequest">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">    
        <h4 class="modal-title"><b>View Request</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Status</label>
          <div class="col-sm-10">
            <input type="text" class="form-control border border-secondary event_status" readonly />
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Date</label>
          <div class="col-sm-10">
            <input type="text" class="form-control border border-secondary event_date" readonly />
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Image</label>
          <div class="col-sm-10">
            <a target="_blank" class="event_display" href=""></a>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Event Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control border border-secondary event_name"  readonly >
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Time</label>
          <div class="col-sm-5">
            <input type="text" class="form-control border border-secondary event_from"  readonly>
          </div>
          <div class="col-sm-5">
            <input type="text" class="form-control border border-secondary event_to"  readonly>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Venue</label>
          <div class="col-sm-10">
            <input type="text" class="form-control border border-secondary event_venue"  readonly >
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Details</label>
          <div class="col-sm-10">
            <textarea readonly class="form-control border border-secondary event_details" rows="8"></textarea>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
      </div>
    </div>
  </div>
</div>












<!-- Delete Event -->
<div class="modal fade" id="retreiveModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><b>Delete</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                  <label>Are you sure you want to retrieve this archive?</label>
                  <h2 id="del_events" class="bold"></h2>
                  <label id="del_reference"></label>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="button" class="btn btn-danger btn-flat" id="retrieve_archive"><i class="fa fa-archive"></i> Retrieve</button>
            </div>
        </div>
    </div>
</div>



<!-- Event Request -->
<div class="modal fade" id="eRequest">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b>Event Request</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <!-- Card Block -->
        <div class="card">
          <div class="card-block mb-0">
            <div class="col-xl-12">
              <!-- Nav tabs -->
              <ul class="nav nav-tabs md-tabs" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="#CAreq" role="tab">Pending</a>
                  <div class="slide"></div>
                </li>
                <li class="nav-item">
                  <a class="nav-link " data-toggle="tab" href="#CAapp" role="tab">Approved</a>
                  <div class="slide"></div>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#CArej" role="tab">Rejected</a>
                  <div class="slide"></div>
                </li>
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane active" id="CAreq" role="tabpanel">
                  <br><?php include 'event_request.php'; ?>  
                </div>
                <div class="tab-pane " id="CAapp" role="tabpanel">
                  <br><?php include 'event_approved.php'; ?>   
                </div>
                <div class="tab-pane " id="CArej" role="tabpanel">
                  <br><?php include 'event_rejected.php'; ?>   
                </div>
              </div>

            </div>
          </div>
          <!-- Main-body end -->
        </div>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
      </div>

    </div>
  </div>
</div>








