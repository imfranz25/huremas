
<!-- Header Request -->
<div class="card-header mt-0">
  <h5>Approved Request List</h5>
</div>
<!-- Body Request-->
<div class="box-body">
  <div class="card-block table-border-style">
    <div class="table-responsive">
      <table id="table3" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th style="min-width: 25px;">View</th>
            <th>Reference ID</th>
            <th>Request Date</th>
            <th>Request By</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $sql = "SELECT * FROM event_request LEFT JOIN employees 
                    ON employees.employee_id=event_request.employee_id 
                    WHERE request_status = 1 ";
            $query = $conn->query($sql);
            while($row = $query->fetch_assoc()){
          ?>
          <tr>
            <td class="d-flex justify-content-center">
              <a href='#view_req' data-toggle='modal' class='view_req' data-id='<?php echo $row['reference_id']; ?>'>
                <i class='fa fa-eye'></i>
              </a>
            </td>
            <td><?php echo $row['reference_id']; ?></td>
            <td><?php echo (new Datetime($row['request_date']))->format('F d, Y'); ?></td>
            <td><?php echo $row['firstname'].' '.$row['lastname']; ?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

