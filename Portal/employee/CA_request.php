<button type="button" class="btn btn-mat waves-effect waves-light btn-success" data-toggle="modal" data-target="#reqCA"><i class="fa fa-plus"></i>Request Cash Advance</button>
                            <div class="card">
                            <div class="card-header">
                                                <h5>Request Cash Advance List</h5>
                                                <div class="card-header-right">
                                                    <ul class="list-unstyled card-option">
                                                        <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                                        <li><i class="fa fa-window-maximize full-card"></i></li>
                                                        <li><i class="fa fa-refresh reload-card"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                            <div class="box-body">
                            <div class="card-block table-border-style">
             
                                <div class="table-responsive" style="overflow: hidden !important;">
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
                                                <td><?php echo $row['req_date']; ?></td>
                                                <td><?php echo $row['ca_type']; ?></td>
                                                <td><?php echo $row['amount']; ?></td>
                                                <td style='overflow: hidden;white-space: nowrap;text-overflow: ellipsis;max-width: 250px;'>
                                                    <a href='#view_req' data-toggle='modal' class='pull-right desc' data-id='<?php echo $row['id']; ?>'><span class='fa fa-eye'></span></a>
                                                    <?php echo $row['ca_reason']; ?>
                                                </td>
                                                <td>
                                                    <button class='btn btn-success btn-sm edit_req btn-round' data-id='<?php echo $row['id']; ?>'><i class='fa fa-edit'></i> Edit</button>
                                                      <button class='btn btn-danger btn-sm cancel_req btn-round' data-id='<?php echo $row['id']; ?>'><i class='fa fa-ban'></i> Cancel</button>
                                                </td>
                                            </tr>

                                        <?php } ?>
                                        </tbody>
                                </table>
                                    </div>
                                    </div>
                                </div>
                                </div>

