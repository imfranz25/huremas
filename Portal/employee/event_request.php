
<!-- Header Request -->
<div class="card-header mt-0">
  <h5>
    <a type="button" class="btn btn-mat waves-effect waves-light btn-default">
      Event Request List
    </a>
  </h5>
  <button type="button" class="btn btn-mat waves-effect waves-light btn-success m-0 float-right" data-target="#eventRequest" data-toggle="modal" >
    <i class="fa fa-plus"></i>Request Event
  </button>
</div>
<!-- Body Request-->
<div class="box-body">
  <div class="card-block table-border-style">
    <div class="table-responsive">
      <table id="table2" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Reference ID</th>
            <th>Date Requested</th>
            <th>Name</th>
            <th>Date</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $sql = "SELECT * FROM event_request LEFT JOIN employees 
                    ON employees.employee_id=event_request.employee_id 
                    WHERE request_status = 'Pending' ";
            $query = $conn->query($sql);
            while($row = $query->fetch_assoc()){
          ?>
          <tr>
            <td><?php echo $row['reference_id']; ?></td>
            <td><?php echo (new Datetime($row['request_date']))->format('F d, Y'); ?></td>
            <td><?php echo $row['event_name']; ?></td>
            <td class="text-center">
              <?php echo (new Datetime($row['event_date']))->format('F d, Y').'<br>'; ?>
              <?php echo (new Datetime($row['event_from']))->format('h:i A').' - '.(new Datetime($row['event_to']))->format('h:i A'); ?>
            </td>
            <td>
              <?php if($row['request_status']=='0'){?>
                <span class='badge badge-info'>Pending</span>
              <?php }else if($row['request_status']=='1'){?>
                <span class='badge badge-success'>Approved</span>
              <?php }else{?>
                <span class='badge badge-danger'>Rejected</span>
              <?php } ?>
            </td>
            <td>
              <button type="button" class="btn btn-default btn-sm btn-flat border-success wave-effect dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                Action
              </button>
              
              <div class="dropdown-menu" style="">
                <?php if($row['request_status']=='0'): ?>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item edit" href="javascript:void(0)" data-id="<?php echo $row['reference_id'] ?>"><i class="fa fa-edit"></i>Edit</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item delete" href="javascript:void(0)" data-id="<?php echo $row['reference_id'] ?>"><i class="fa fa-trash"></i>Delete</a>
                <?php endif; ?>

                <div class="dropdown-divider"></div>
                <a class="dropdown-item view" href="javascript:void(0)" data-id="<?php echo $row['reference_id'] ?>"><i class="fa fa-eye"></i>View</a>
              </div>

            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

