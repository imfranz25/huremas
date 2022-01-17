
                            <div class="card">
                            <div class="card-header">
                                <h5>
                                    <a type="button" class="btn btn-mat waves-effect waves-light btn-default">
                                      My Document Request List
                                    </a>
                                </h5>
                                <button type="button" class="btn btn-mat waves-effect waves-light btn-success pull-right" data-toggle="modal" data-target="#emp_request"><i class="fa fa-plus"></i>Request Document</button>
                            </div>
                            <div class="box-body">
                            <div class="card-block table-border-style">
             
                                <div class="table-responsive" >
                                <table id="table1" class="table table-striped table-bordered">
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
                                            $sql = "SELECT * FROM document_request WHERE employee_id = '$id' AND request_by = 'employee' ";
                                            $query = $conn->query($sql);
                                            while($row = $query->fetch_assoc()){
                                                $req_status=$row['request_status'];
                                                if ($req_status==0) {
                                                    $status ='Pending';
                                                    $badge = 'badge-info';
                                                }else if ($req_status==1) {
                                                    $status ='Document sent';
                                                    $badge = 'badge-warning';
                                                }else if ($req_status==2) {
                                                    $status ='Rejected';
                                                    $badge = 'badge-danger';
                                                }else{
                                                    $status ='Validated';
                                                    $badge = 'badge-success';
                                                }
                                        ?>
                                            <tr>
                                                <td><?php echo $row['reference_id']; ?></td>
                                                <td><?php echo (new Datetime($row['request_date']))->format('F d, Y'); ?></td>
                                                <td><?php echo $row['request_name']; ?></td>
                                                <td><span class="badge <?php echo
                                                $badge; ?>"><?php echo $status; ?></span></td>
                                                <td>

                                                    <button type="button" class="btn btn-default btn-sm btn-flat border-success wave-effect dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                                    Action
                                                  </button>
                                                  
                                                  <div class="dropdown-menu" style="">
                                                    
                                                    <a class="dropdown-item review_req" href="javascript:void(0)" data-id="<?php echo $row['reference_id'] ?>"><i class="fa fa-eye"></i>Review</a>
                                                    
                                                    <?php if ($req_status==0) { ?>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item edit_req" href="javascript:void(0)" data-id="<?php echo $row['reference_id'] ?>"><i class="fa fa-edit"></i>Edit</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item cancel_req text-danger" href="javascript:void(0)" data-id="<?php echo $row['reference_id'] ?>"><i class="fa fa-ban"></i>Cancel Request</a>
                                                    <?php } ?>

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

