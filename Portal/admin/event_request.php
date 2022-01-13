
<!-- Header Request -->
<div class="card-header mt-0">
  <h5>Pending Request List</h5>
</div>
<!-- Body Request-->
<div class="box-body">
  <div class="card-block table-border-style">
    <div class="table-responsive">
      <table id="table2" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Reference ID</th>
            <th>Request Date</th>
            <th>Request By</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $sql = "SELECT * FROM event_request LEFT JOIN employees 
                    ON employees.employee_id=event_request.employee_id 
                    WHERE request_status = 0 ";
            $query = $conn->query($sql);
            while($row = $query->fetch_assoc()){
          ?>
          <tr>
            <td><?php echo $row['reference_id']; ?></td>
            <td><?php echo (new Datetime($row['request_date']))->format('F d, Y'); ?></td>
            <td><?php echo $row['firstname'].' '.$row['lastname']; ?></td>
            <td>
              <button class='btn btn-success btn-sm review_req btn-round' data-id='<?php echo $row['reference_id']; ?>'>
                <i class='fa fa-edit'></i> Review
              </button>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

