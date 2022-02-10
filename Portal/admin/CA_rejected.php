
<div class="card" style="min-height: 400px;">
  <div class="card-header">
     <h5>Rejected Cash Advance List</h5>           
  </div>
  <div class="box-body">
    <div class="card-block table-border-style">
      <div class="table-responsive">
        <table id="table3" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th style="max-width: 15px;">View</th>
              <th>Reference ID</th>
              <th>Request Date</th>
              <th>Employee Name</th>
              <th>Type</th>
              <th>Amount</th>
            </tr>
          </thead>
          <tbody>
            <?php
               $sql = "SELECT *, cash_advance.id AS ca_id FROM cash_advance 
                      LEFT JOIN employees ON employees.employee_id=cash_advance.employee_id  
                      WHERE status = 'Rejected' ";
              $query = $conn->query($sql);
              while($row = $query->fetch_assoc()){
            ?>
            <tr>
              <td class="d-flex justify-content-center">
                <a href='#view_req' data-toggle='modal' class='view_desc' data-id='<?php echo $row['ca_id']; ?>'><i class='fa fa-eye'></i></a>
              </td>
              <td><?php echo $row['reference_id']; ?></td>
              <td><?php echo (new Datetime($row['req_date']))->format('F d, Y'); ?></td>
              <td><?php echo $row['firstname'].' '.$row['lastname']; ?></td>
              <td><?php echo $row['ca_type']; ?></td>
              <td><?php echo $row['amount']; ?></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

