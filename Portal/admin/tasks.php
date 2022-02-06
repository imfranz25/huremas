<?php 
$title ="Tasks";
include 'includes/session.php';
include 'includes/header.php';
?>
  <body>
  <?php include 'includes/preloader.php'; ?>
  
  <div id="pcoded" class="pcoded">
        <div class="pcoded-container navbar-wrapper">         
        <?php include 'includes/navbar.php'?>
        <?php include 'includes/sidebar.php'?>
        
        
                  <div class="pcoded-content">
                      <!-- Page-header start -->
                      <div class="page-header">
                          <div class="page-block">
                              <div class="row align-items-center">
                                  <div class="col-md-8">
                                      <div class="page-header-title">
                                          <h5 class="m-b-10">Task</h5>
                                          <p class="m-b-0">Welcome to HUREMAS - CvSU IMUS</p>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <ul class="breadcrumb-title">
                                          <li class="breadcrumb-item">
                                              <a href="index.php"> <i class="fa fa-home"></i> </a>
                                          </li>
                                          <li class="breadcrumb-item"><a href="#!">Tasks & Evaluation</a>
                                          </li>
                                          <li class="breadcrumb-item"><a href="#!">Task</a>
                                          </li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <!-- Page-header end -->
                        <div class="pcoded-inner-content">

                          <div class='alert alert-danger alert-dismissible' hidden="" id="showdanger">
                            <button type='button' class='close' data-hide='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-warning'></i> Note !</h4>
                             <label id="warning"></label>
                          </div>

                        <?php
                            if(isset($_SESSION['error'])){
                            echo "
                                <div class='alert alert-danger alert-dismissible'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                <h4><i class='icon fa fa-warning'></i> Error!</h4>
                                ".$_SESSION['error']."
                                </div>
                            ";
                            unset($_SESSION['error']);
                            }
                            if(isset($_SESSION['success'])){
                            echo "
                                <div class='alert alert-success alert-dismissible'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                <h4><i class='icon fa fa-check'></i> Success!</h4>
                                ".$_SESSION['success']."
                                </div>
                            ";
                            unset($_SESSION['success']);
                            }
                        ?>
                            <!-- Main-body start -->

                           

                            <div class="card">
                            <div class="card-header">
    
                                <h5>
                                  <a type="button" class="btn btn-mat waves-effect waves-light btn-default">Task List</a>
                                </h5>
                                
                                 <button type="button" class="btn btn-mat waves-effect waves-light btn-success float-right" data-toggle="modal" data-target="#addTask"><i class="fa fa-plus"></i>New</button>
       
                                                <!--<div class="card-header-right">-->
                                                <!--    <ul class="list-unstyled card-option">-->
                                                <!--        <li><i class="fa fa fa-wrench open-card-option"></i></li>-->
                                                <!--        <li><i class="fa fa-window-maximize full-card"></i></li>-->
                                                <!--        <li><i class="fa fa-refresh reload-card"></i></li>-->
                                                <!--    </ul>-->
                                                <!--</div>-->
                                            </div>
                            <div class="box-body">
                            <div class="card-block table-border-style">
             
                                <div class="table-responsive">
                                <table id="table1" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th><b>#</b></th>
                                        <th>Task</th>
                                        <th>Due Date</th>
                                        <th>Assigned To</th>
                                        <th>Department</th>
                                        <th>Status</th>
                                        <th>Tools</th>
                                    </tr>
                                    </thead>
                                    <tbody id="tbody">
                                    <?php
                                        
                                        $sql = "SELECT *, task.id as tid FROM task left join employees e on e.employee_id=task.employee_id order by unix_timestamp(task.date_created) asc";
                                        $query = $conn->query($sql);
                                        $count=1;
                                        while($row = $query->fetch_assoc()){
                                          $trans = get_html_translation_table(HTML_ENTITIES,ENT_QUOTES);
                                          unset($trans["\""], $trans["<"], $trans[">"], $trans["<h2"]);
                                          $desc = strtr(html_entity_decode($row['description']),$trans);
                                          $desc=str_replace(array("<li>","</li>"), array("",", "), $desc);

                                        ?>
                                            <tr>
                                              <td>
                                                <?php echo $count;$count++; ?>
                                              </td>
                                              <td>
                                                <p><b><?php echo ucwords($row['task']) ?></b></p>
                                                <p class="truncate"><?php echo strip_tags($desc) ?></p>
                                              </td>
                                              <td><b><?php echo date("M d, Y",strtotime($row['due_date'])) ?></b></td>
                                              <td><?php echo $row['lastname'].' '.$row['suffix'].' '.$row['firstname'].'  '.$row['middlename']; ?></td>
                                              <td><?php 
                                                $did = $row['department_id'];
                                                if(isset($did)){
                                                  $sql2 = "SELECT * FROM `department_category` where id = $did";
                                                  $query2 = $conn->query($sql2);
                                                  $row2 = $query2->fetch_assoc();
                                                  echo $row2['title'];
                                                  }
                                                
                                                ?>
                                                  
                                                </td>
                                              <td><?php 
                                                        if($row['status'] == 0){
                                                echo "<span class='badge badge-info'>Pending</span>";
                                                        }elseif($row['status'] == 1){
                                                echo "<span class='badge badge-primary'>On-Progress</span>";
                                                        }elseif($row['status'] == 2){
                                                echo "<span class='badge badge-success'>Complete</span>";
                                                        }
                                                        if(strtotime($row['due_date']) < strtotime(date('Y-m-d'))){
                                                echo "<span class='badge badge-danger mx-1'>Over Due</span>";
                                                        }
                                                        ?></td>
                                              <td class="text-center">
                                                <button type="button" class="btn btn-default btn-sm btn-flat border-success wave-effect text-success dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                                            Action
                                                          </button>
                                                            <div class="dropdown-menu" style="">
                                                            <a class="dropdown-item view_task" href="javascript:void(0)" data-id="<?php echo $row['tid'] ?>"><i class="fa fa-eye"></i>View Task</a>
                                                             <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item edit_task" href="javascript:void(0)" data-id="<?php echo $row['tid'] ?>"><i class="fa fa-edit"></i>Edit</a>
                                                             <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item view_progress"  data-id = '<?php echo $row['tid'] ?>' data-task = '<?php echo ucwords($row['task']) ?>'   href="javascript:void(0)" onclick='getids()' ><i class="fa fa-eye"></i>View Progress</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item delete_task text-danger" href="javascript:void(0)" data-id="<?php echo $row['tid'] ?>"><i class="fa fa-trash"></i>Delete</a>
                                                  </div>
                                              </td>
                                            </tr>
                                      <?php }?>
                                      </tbody>
                                </table>
                                </div>
                                </div>
                                </div>
                                </div>
                             <!-- Main-body end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'includes/tasks_modal.php'; ?>

    <?php include 'includes/scripts.php'; ?>

    

<script>

$(function(){
  $('.edit_task').click(function(e){
    e.preventDefault();
    $('#updateTask').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
  $('.view_task').click(function(e){
    e.preventDefault();
    $('#viewTask').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });


  $('.delete_task').click(function(e){
    e.preventDefault();
    $('#deleteOT').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
  $("[data-hide]").on("click", function(){
      $("#showdanger").attr('hidden',true);
    });

  $('.view_progress').click(function(e){
    e.preventDefault();
    $('#viewProg').modal('show');
    var id = $(this).data('id');
    getRow2(id);
    getRow(id);
    
  });
});

function getRow2(id){
  $.ajax({
    type: 'POST',
    url: 'function/tasks_row2.php',
    data: {id:id},
    dataType: 'json',
    error:err=>{
                console.log()
                alert("An error occured")
            },
    success: function(response){
      //view progress
      var block ="";
      
      if(response.length>0){
         for (var i = 0; i < response.length; i = i + 1) {

          let dayy = new Date(response[i].data_created);
          var d = dayy.toDateString();
          block = block+  "<div class='accordion-desc'>"
          +"</span><div><img class='img-radius img-thumbnail' style='border:solid gray 2px ;padding:1px;max-width: 40px;height: auto;' src='images/"+response[i].photo+"' alt='user image'><span class='username'><a href='#'>"+response[i].uname+"</a></span><br><span class='fa fa-calendar'></span><span><b>"+d+"</b></span></div></div><div><br><span class='description'>"+response[i].progress+"</span></div></div><p></p>";
         }
       }else{
        block = block = "<div class='mb-2'><center><i>No Progress Yet</i></center></div>";
       }
        $('#VP').html(block);


}
  });
}


function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'function/tasks_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      //view
      
      $('#task').html(response.task);
      $('#due').html(response.due_date);
      $('#name').html(response.lastname+" "+response.suffix+", "+response.firstname+" "+response.middlename);
     
     var stats = parseInt(response.status);
      var statsstring="";

      if (stats==0){
        statsstring="<span class='badge badge-info'>Pending</span>";
      }else if(status==1){
        statsstring="<span class='badge badge-primary'>On-Progress</span>";
      }else if(status==2){
        statsstring="<span class='badge badge-success'>Complete</span>";
      }

      var dateOne = new Date(response.due_date);
      var today = new Date();

      if(dateOne<today){
       statsstring = statsstring + "<span class='badge badge-danger mx-1'>Over Due</span>";
      }
      $('#status').html(statsstring);
      $('#desc').html(response.description);

      //delete
      $('#tid').val(response.tid);
      $('#taskname').html(response.task);

      //edit

      $('#tid2').val(response.tid);
      $('#task1').val(response.task);
      $('#employee_id').html(response.lastname+" "+response.suffix+", "+response.firstname+" "+response.middlename);
      $('#due_date').val(response.due_date);
      $('#decs').val(response.description);

      //
      $('#viewtitle').html("Progress for "+response.task);
     $('#ttidd').val(response.tid);


    }
  });
}


$(document).ready(function() {

  // to avoid the re-initialization of datatable
  if ( ! $.fn.DataTable.isDataTable( '#table1' ) ) {
    $('#table1').DataTable();
  }//**end**
} );
</script>

</body>
</html>

