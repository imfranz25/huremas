
<button type="button" class="btn btn-mat waves-effect waves-light btn-success" id="add_dtype" data-toggle="modal" data-target="#deducNew"><i class="fa fa-plus"></i>New</button>
<button type="button" class="btn btn-mat waves-effect waves-light btn-danger" data-toggle="modal" id="deleteAlldeduc"><i class="fa fa-trash"></i>Delete</button>

                            <br>
                            <div class="card">
                            <div class="card-header">
                                                <h5>Deduction Type List</h5>
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
             
                                <div class="table-responsive">
                                <table id="table2" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>
                                            <div class="custom-control custom-checkbox m-0 p-0">
                                                <input type="checkbox" class="custom-control-input" id="globalcheck" />
                                                <label class="custom-control-label d-flex align-items-center text-center" for="globalcheck"></label>
                                            </div>
                                        </th>
                                        <th>Deduction Code</th>
                                        <th>Name</th>
                                        <th>Vendor</th>
                                        <th>Amount/Rate</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="tbody_deduc">
                                        <?php
                                            $sql = "SELECT *, deduction.id as did FROM deduction LEFT JOIN deduction_vendor ON deduction_vendor.id=deduction.deduction_vendor";
                                            $query = $conn->query($sql);
                                            while($row = $query->fetch_assoc()){
                                                if ($row['deduction_type'] =="Fixed Amount" ||
                                                    $row['deduction_type'] =="Hour Amount") {
                                                    $amt_rate = "&#8369; ".number_format($row['amount_rate'],2);
                                                }else{$amt_rate = $row['amount_rate']."%";}
                                            echo "
                                                <tr>
                                                    <td>
                                                        <div class='custom-control custom-checkbox m-0 p-0'>
                                                          <input type='checkbox' class='custom-control-input toggle-check' data-id='".$row['did']."' id='d".$row['did']."' />
                                                          <label class='custom-control-label d-flex align-items-center' for='d".$row['did']."'>&nbsp;</label>
                                                        </div>
                                                    </td>
                                                    <td>".$row['deduction_code']."</td>
                                                    <td>".$row['deduction_name']."</td>
                                                    <td>".$row['vendor_name']."</td>
                                                    <td class='text-center'>".$amt_rate."</td>
                                                    <td>
                                                      <button class='btn btn-success btn-sm editdeduc btn-round' data-id='".$row['did']."'><i class='fa fa-edit'></i> Edit</button>
                                                      <button class='btn btn-danger btn-sm deletededuc btn-round' data-id='".$row['did']."'><i class='fa fa-trash'></i> Delete</button>
                                                    </td>
                                                </tr>
                                            ";
                                            }
                                        ?>
                                        </tbody>
                                </table>
                                    </div>
                                    </div>
                                </div>
                                </div>

