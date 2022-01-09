
                           <div class="card" style="min-height: 400px;" id="refresh_request">
                                <div class="card-header">
                                    <h5>
                                        <a type="button" class="btn btn-mat waves-effect waves-light btn-default training_title">My Training Request</a>
                                    </h5>
                                    <button type="button" class="btn btn-mat waves-effect waves-light btn-success m-0 float-right" data-target="#training_list_modal" data-toggle="modal"  id="addAtt"><i class="fa fa-plus"></i>Request Training</button>
                                  <!--data-toggle="modal" data-target="#addAtt"-->
                                </div>  
                            <div class="box-body">
                            <div class="card-block table-border-style">
             
                                <div class="table-responsive">
                                <table id="table1" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>Reference No</th>
                                        <th>Request Date</th>
                                        <th>Training</th>
                                        <th>Internal Note</th>
                                        <th>Tools</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $emp_id = $user['employee_id'];
                                            $sql = "SELECT * FROM training_record LEFT JOIN training_list ON training_list.training_code=training_record.training_code WHERE status='Pending' AND training_record.employee_id='$emp_id' ";
                                            $query = $conn->query($sql); 
                                            while($row = $query->fetch_assoc()){
                                        ?>
                                            <tr>
                                                <td><?php echo $row['reference_no']; ?></td>
                                                <td><?php echo (new Datetime($row['request_date']))->format('F d, Y'); ?></td>
                                                <td><?php echo $row['training_title'] ?></td>
                                                <td style='overflow: hidden;white-space: nowrap;text-overflow: ellipsis;max-width: 250px;'>
                                                    <a href='#reqview'class='pull-right view_req' data-id='<?php echo $row['reference_no']; ?>'><span class='fa fa-eye ml-5'></span></a>
                                                     <?php echo $row['internal_note']; ?>
                                                </td>
                                                <td>
                                                    <button class="btn btn-success btn-sm edit_req btn-round" data-id="<?php echo $row['reference_no']; ?>"><i class="fa fa-edit"></i> Edit</button>
                                                    <button class="btn btn-danger btn-sm cancel_req btn-round" data-id="<?php echo $row['reference_no']; ?>"><i class="fa fa-ban"></i> Cancel Request</button>
                                                </td>
                                            </tr>

                                        <?php } ?>
                                        </tbody>
                                </table>
                                    </div>
                                    </div>
                                </div>
                                </div>

