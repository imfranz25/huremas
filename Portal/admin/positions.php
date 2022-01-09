 <button type="button" class="btn btn-mat waves-effect waves-light btn-success" data-toggle="modal" data-target="#addnew"><i class="fa fa-plus"></i>New</button>
                            

                            <div class="card">
                            <div class="card-header">
                                                <h5>Designation List</h5>
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
                                    <th>Designation Title</th>
                                    <th>Rate per Hour</th>
                                    <th>Tools</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sql = "SELECT * FROM position";
                                            $query = $conn->query($sql);
                                            while($row = $query->fetch_assoc()){
                                            echo "
                                                <tr>
                                                <td>".$row['description']."</td>
                                                <td>".number_format($row['rate'], 2)."</td>
                                                <td>
                                                    <button class='btn btn-success btn-sm edit btn-round' data-id='".$row['id']."'><i class='fa fa-edit'></i> Edit</button>
                                                    <button class='btn btn-danger btn-sm delete btn-round' data-id='".$row['id']."'><i class='fa fa-trash'></i> Delete</button>
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