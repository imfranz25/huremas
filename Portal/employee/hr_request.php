
                            <div class="card">
                                <div class="card-header">
                                    <h5>My Document Request List</h5>

                                </div>
                            <div class="box-body">
                            <div class="card-block table-border-style">
             
                                <div class="table-responsive" style="overflow: hidden !important;">
                                <table id="table2" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Reference No</th>
                                        <th>Request Date</th>
                                        <th>Request Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $id = $user['employee_id'];
                                            $sql = "SELECT * FROM document_request WHERE employee_id = '$id' AND request_by = 'admin' ";
                                            $query = $conn->query($sql);
                                            while($row = $query->fetch_assoc()){
                                                $req_status=$row['request_status'];
                                                if ($req_status==0) {
                                                    $status ='Pending';
                                                }else if ($req_status==1) {
                                                    $status ='Document sent';
                                                }else if ($req_status==2) {
                                                    $status ='Rejected';
                                                }else{
                                                    $status ='Validated';
                                                }
                                        ?>
                                            <tr>
                                                <td><?php echo $row['reference_id']; ?></td>
                                                <td><?php echo (new Datetime($row['request_date']))->format('F d, Y'); ?></td>
                                                <td><?php echo $row['request_name']; ?></td>
                                                <td><?php echo $status; ?></td>
                                                <td>
                                                    <button class='btn btn-warning text-dark btn-sm review_req_admin btn-round' data-id='<?php echo $row['reference_id']; ?>'><i class='fa fa-eye'></i> Review</button>
                                                </td>
                                            </tr>

                                        <?php } ?>
                                        </tbody>
                                </table>
                                    </div>
                                    </div>
                                </div>
                                </div>

