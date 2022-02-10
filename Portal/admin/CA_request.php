
<div class="card" style="min-height: 400px;">
  <!-- Header -->
  <div class="card-header">
    <h5>Cash Advance Request List</h5>
  </div>
  <!-- Body -->
  <div class="box-body">
    <div class="card-block table-border-style">
      <div class="table-responsive">
        <table id="table1" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Reference ID</th>
              <th>Request Date</th>
              <th>Employee Name</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $sql = "SELECT *, cash_advance.id AS ca_id FROM cash_advance LEFT JOIN employees ON employees.employee_id=cash_advance.employee_id  WHERE status = 'Pending' ";
              $query = $conn->query($sql);
              while($row = $query->fetch_assoc()){
            ?>
            <tr>
              <td><?php echo $row['reference_id']; ?></td>
              <td><?php echo (new Datetime($row['req_date']))->format('F d, Y'); ?></td>
              <td><?php echo $row['firstname'].' '.$row['lastname']; ?></td>
              <td>
                <button class='btn btn-success btn-sm review_req btn-round' data-id='<?php echo $row['ca_id']; ?>'>
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
</div>

