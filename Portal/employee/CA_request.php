
<div class="card">
  <!-- Header -->
  <div class="card-header">
    <h5>
      <a type="button" class="btn btn-default">
        Request Cash Advance List
      </a>
    </h5>
    <button type="button" class="btn btn-mat waves-effect waves-light btn-success m-0 float-right" data-target="#reqCA" data-toggle="modal" >
      <i class="fa fa-exchange"></i>Request Cash Advance
    </button>
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
              <th>Type</th>
              <th>Amount</th>
              <th>Reason</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $id = $user['employee_id'];
              $sql = "SELECT * FROM cash_advance WHERE employee_id = '$id' AND status = 'Pending' ";
              $query = $conn->query($sql);
              while($row = $query->fetch_assoc()){
            ?>
            <tr>
              <td><?php echo $row['reference_id']; ?></td>
              <td><?php echo (new Datetime($row['req_date']))->format('F d, Y'); ?>
              </td>
              <td><?php echo $row['ca_type']; ?></td>
              <td><?php echo $row['amount']; ?></td>
              <td style='overflow: hidden;white-space: nowrap;text-overflow: ellipsis;max-width: 250px;'>
                  <a href='#view_req' data-toggle='modal' class='pull-right desc' data-id='<?php echo $row['id']; ?>'><span class='fa fa-eye'></span></a>
                  <?php echo $row['ca_reason']; ?>
              </td>
              <td>
                <button type="button" class="btn btn-default btn-sm btn-flat border-success wave-effect dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Action
                </button>
                <div class="dropdown-menu" style="">
                  <a class="dropdown-item edit_req" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">
                    <i class="fa fa-edit"></i>Edit
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item cancel_req" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">
                    <i class="fa fa-trash"></i>Delete
                  </a>
                </div>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

