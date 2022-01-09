
<button type="button" class="btn btn-mat waves-effect waves-light btn-success" data-toggle="modal" data-target="#vendorNew"><i class="fa fa-plus"></i>New</button>
<button type="button" class="btn btn-mat waves-effect waves-light btn-danger" data-toggle="modal" id="deleteAllvendor"><i class="fa fa-trash"></i>Delete</button>

                            <br>
                            <div class="card">
                            <div class="card-header">
                                                <h5>Vendor List</h5>
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
                                <table id="table1" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>
                                            <div class="custom-control custom-checkbox m-0 p-0">
                                                <input type="checkbox" class="custom-control-input" id="globalcheck" />
                                                <label class="custom-control-label d-flex align-items-center text-center" for="globalcheck"></label>
                                            </div>
                                        </th>
                                        <th>Vendor Code</th>
                                        <th>Name</th>
                                        <th>Details</th>
                                        <th>Type</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="tbody_vendor">
                                        <?php
                                            $sql = "SELECT * FROM deduction_vendor";
                                            $query = $conn->query($sql);
                                            while($row = $query->fetch_assoc()){
                                            echo "
                                                <tr>
                                                    <td>
                                                        <div class='custom-control custom-checkbox m-0 p-0'>
                                                          <input type='checkbox' class='custom-control-input toggle-check' data-id='".$row['id']."' id='v".$row['id']."' />
                                                          <label class='custom-control-label d-flex align-items-center' for='v".$row['id']."'>&nbsp;</label>
                                                        </div>
                                                    </td>
                                                    <td>".$row['vendor_code']."</td>
                                                    <td>".$row['vendor_name']."</td>
                                                    <td style='overflow: hidden;white-space: nowrap;text-overflow: ellipsis;max-width: 290px;'>
                                                    <a href='#view_desc' data-toggle='modal' class='pull-right desc' data-id='".$row['id']."'><span class='fa fa-eye ml-5'></span></a>
                                                    
                                                    ".$row['vendor_details']."
                                                    </td>
                                                    <td>".$row['vendor_type']."</td>
                                                    <td>
                                                      <button class='btn btn-success btn-sm editvendor btn-round' data-id='".$row['id']."'><i class='fa fa-edit'></i> Edit</button>
                                                      <button class='btn btn-danger btn-sm deletevendor btn-round' data-id='".$row['id']."'><i class='fa fa-trash'></i> Delete</button>
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

