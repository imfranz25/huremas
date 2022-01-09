

                           <div class="card" style="min-height: 400px;">
                                <div class="card-header">
                                    <h5>
                                        <a type="button" class="btn btn-mat waves-effect waves-light btn-default training_title">My Training List</a>
                                    </h5>
                                  <!--data-toggle="modal" data-target="#addAtt"-->
                                </div>  
                            <div class="box-body">
                            <div class="card-block table-border-style">
             
                                <div class="table-responsive">
                                <table id="table2" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>Reference No</th>
                                        <th>Request Date</th>
                                        <th>Training</th>
                                        <th>Schedule</th>
                                        <th>Status</th>
                                        <th>Tools</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                            $emp_id = $user['employee_id'];
                                            $sql = "SELECT * FROM training_record LEFT JOIN training_list ON training_list.training_code=training_record.training_code WHERE (status='On-going' OR status='Finished' OR status='Reviewed') AND training_record.employee_id='$emp_id' ORDER BY CASE WHEN status='On-going' THEN 1 WHEN status='Finished' THEN 2 ELSE 3 END ";
                                            $query = $conn->query($sql); 
                                            while($row = $query->fetch_assoc()){
                                        ?>
                                            <tr>
                                                <td><?php echo $row['reference_no']; ?></td>
                                                <td><?php echo (new Datetime($row['request_date']))->format('F d, Y'); ?></td>
                                                <td><?php echo $row['training_title'] ?></td>
                                                <td>
                                                    <?php echo (new Datetime($row['schedule_from']))->format('M d, Y h:i a').' - '.(new Datetime($row['schedule_to']))->format('M d, Y h:i a'); ?>
                                                </td>
                                                <td><?php echo $row['status']; ?></td>
                                                <td>
                                                    <?php
                                                        if ($row['status']=='Finished') {
                                                            ?>
                                                            <button class="btn btn-warning btn-sm rev_training btn-round text-dark" data-id="<?php echo $row['reference_no']; ?>"><i class="fa fa-eye"></i> Review</button>
                                                            <?php
                                                        }else if ($row['status']=='Reviewed') {
                                                             ?>
                                                            <button class="btn btn-warning btn-sm rev_edit btn-round text-dark" data-id="<?php echo $row['reference_no']; ?>"><i class="fa fa-eye"></i> Edit Review</button>
                                                            <?php
                                                        }else{
                                                            ?>
                                                            <button class="btn btn-info btn-sm view_training btn-round" data-id="<?php echo $row['training_code']; ?>"><i class="fa fa-info-circle"></i> Details</button>
                                                            <?php
                                                        }
                                                    ?>
                                                </td>
                                            </tr>

                                        <?php } ?>
                                        </tbody>
                                </table>
                                    </div>
                                    </div>
                                </div>
                                </div>

