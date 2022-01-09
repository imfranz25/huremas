
<button type="button" class="btn btn-mat waves-effect waves-light btn-success" id="add_tax" data-toggle="modal" data-target="#taxNew"><i class="fa fa-plus"></i>New</button>
<button type="button" class="btn btn-mat waves-effect waves-light btn-danger" data-toggle="modal" id="deleteAlltax"><i class="fa fa-trash"></i>Delete</button>

                            <br>
                            <div class="card">
                            <div class="card-header">
                                                <h5>Tax List</h5>
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
                                <table id="table3" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>
                                            <div class="custom-control custom-checkbox m-0 p-0">
                                                <input type="checkbox" class="custom-control-input" id="globalcheck" />
                                                <label class="custom-control-label d-flex align-items-center text-center" for="globalcheck"></label>
                                            </div>
                                        </th>
                                        <th>Tax Code</th>
                                        <th>Name</th>
                                        <th>Vendor</th>
                                        <th>Amount/Rate</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="tbody_tax">
                                        <?php
                                     
                                            $sql = "SELECT *, tax.id as tid FROM tax LEFT JOIN deduction_vendor ON deduction_vendor.id=tax.tax_vendor";
                                            $query = $conn->query($sql);
                                            while($row = $query->fetch_assoc()){
                                                if ($row['tax_type'] =="Fixed Amount") {
                                                    $amt_rate = "&#8369; ".number_format($row['tax_amount'],2);
                                                }else{$amt_rate = $row['tax_amount']."%";}
                                              
                                            echo "
                                                <tr>
                                                    <td>
                                                        <div class='custom-control custom-checkbox m-0 p-0'>
                                                          <input type='checkbox' class='custom-control-input toggle-check' data-id='".$row['tid']."' id='t".$row['tid']."' />
                                                          <label class='custom-control-label d-flex align-items-center' for='t".$row['tid']."'>&nbsp;</label>
                                                        </div>
                                                    </td>
                                                    <td>".$row['tax_code']."</td>
                                                    <td>".ucfirst($row['tax_name'])."</td>
                                                    <td>".$row['vendor_name']."</td>
                                                    <td class='text-center'>".$amt_rate."</td>
                                                    <td>".ucfirst($row['tax_status'])."</td>
                                                    <td>
                                                      <button class='btn btn-success btn-sm edittax btn-round' data-id='".$row['tid']."'><i class='fa fa-edit'></i> Edit</button>
                                                      <button class='btn btn-danger btn-sm deletetax btn-round' data-id='".$row['tid']."'><i class='fa fa-trash'></i> Delete</button>
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

