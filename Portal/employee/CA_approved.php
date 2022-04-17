
<div class="card">
  <div class="card-header">
    <h5>Approved Cash Advance List</h5>
  </div>
  <div class="box-body">
    <div class="card-block table-border-style">
      <div class="table-responsive">
        <table id="table2" class="table table-striped table-bordered" style="width:100%">
          <thead>
            <tr>
              <th>View</th>
              <th>Reference ID</th>
              <th>Request Date</th>
              <th>Type</th>
              <th>Amount</th>
              <th>Reason</th>
              <th>Notes</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $id = $user['employee_id'];
              $sql = "SELECT * FROM cash_advance WHERE employee_id = '$id' AND status = 'Approved' ";
              $query = $conn->query($sql);
              while($row = $query->fetch_assoc()){
            ?>
            <tr>
              <td class="d-flex justify-content-center">
                <a href='#status_req' data-toggle='modal' class='stat_desc' data-id='<?php echo $row['id']; ?>'>
                  <i class='fa fa-eye'></i>
                </a>
              </td>
              <td><?php echo $row['reference_id']; ?></td>
              <td>
                <?php echo (new Datetime($row['req_date']))->format('F d, Y'); ?>
              </td>
              <td><?php echo $row['ca_type']; ?></td>
              <td><?php echo $row['amount']; ?></td>
              <td style='overflow: hidden;white-space: nowrap;text-overflow: ellipsis;max-width: 250px;'>
                  <?php echo $row['ca_reason']; ?>
              </td>
              <td><?php echo $row['notes']; ?></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

