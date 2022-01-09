

<!-- Create Event -->
<div class="modal fade" id="addEvents">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
          	<div class="modal-header">
            	
            	<h4 class="modal-title"><b>Create Event</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
          	</div>
          	<div class="modal-body">

            <form class="form-horizontal" method="POST" action="function/events_add.php" enctype="multipart/form-data" >

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label req">Date</label>
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
                  <label class="col-sm-2 col-form-label req">Name</label>
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


          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-flat" name="add"><i class="fa fa-save"></i> Post</button>
            	</form>
          	</div>
        </div>
    </div>
</div>



<!-- Edit Event -->
<div class="modal fade" id="editEvents">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
              
              <h4 class="modal-title"><b>Edit Event</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

            <form class="form-horizontal" method="POST" action="function/events_edit.php" enctype="multipart/form-data" >

              <input type="hidden" name="reference_id" class="reference_id">

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label req">Date</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control border border-secondary event_date" name="event_date" required />
                  </div>

                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label req">Image</label>
                  <div class="col-sm-10">
                    <label class="col-form-label"><a class="event_image" target="_blank" href=""></a></label>
                    <input type="file" name="display" class="form-control border border-secondary" accept="image/*" onchange="check_image(this)" >
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label req">Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="event_name" class="form-control border border-secondary event_name"  required="" autocomplete="off" >
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label req">Time</label>
                  <div class="col-sm-5">
                    <input type="time" name="event_from" class="form-control border border-secondary from event_timefrom event_from" required="" placeholder="From">
                  </div>
                  <div class="col-sm-5">
                    <input type="time" name="event_to" class="form-control border border-secondary to event_timeto event_to" required="" placeholder="To">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label req">Venue</label>
                  <div class="col-sm-10">
                    <input type="text" name="venue" class="form-control border border-secondary event_venue"  required="" autocomplete="off"  >
                  </div>
                </div>


            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-save"></i> Update Event</button>
              </form>
            </div>
        </div>
    </div>
</div>




<!-- Delete Event -->
<div class="modal fade" id="eventsDelete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><b>Delete</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="function/events_delete.php">
                <input type="hidden" class="reference_id" name="id">
                <div class="text-center">
                    <label>Are you sure you want to delete the following event(s)?</label>
                    <h2 id="del_events" class="bold"></h2>
                    <label id="del_reference"></label>
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







