<?php 
  $title ="Attendance";
  require_once '../includes/path.php';
  require_once("../admin/includes/session.php");
  require_once("../admin/includes/header.php");
?>

<body>
  <?php include_once("../admin/includes/preloader.php");  ?>
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
                  <h5 class="m-b-10">Attendance</h5>
                  <p class="m-b-0">Welcome to HUREMAS - CvSU IMUS</p>
                </div>
              </div>
              <div class="col-md-4">
                <ul class="breadcrumb-title">
                  <li class="breadcrumb-item">
                    <a href="index.php"> <i class="fa fa-home"></i> </a>
                  </li>
                  <li class="breadcrumb-item">
                    <a href="#!">Attendance</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!-- Page-header end -->
                    
        <div class="pcoded-inner-content">

          <!-- JS ALERT -->
          <div class='alert alert-danger alert-dismissible' hidden="" id="showdanger">
            <button type='button' class='close' data-hide='alert' aria-hidden='true'>&times;</button>
            <h4>
              <i class='icon fa fa-warning'></i> Note !
            </h4>
            <label id="warning"></label>
          </div>

          <!-- SESSION ALERTS -->
          <?php include_once '../admin/includes/session_alert.php'; ?>         
                       
          <?php
            //check if already timein/out
            $eid = $user['employee_id'];
            $sql = "SELECT * FROM attendance a WHERE a.employee_id='$eid'";
            $query = $conn->query($sql);
            $ins = "";
            $outs ="";
            $logs = False;
            $logs2 = False;
            $today = date('Y-m-d');
            $aids = "";

            if (mysqli_num_rows($query)>0) {  
              while($row = $query->fetch_assoc()){
                $ins =$row['time_in'];
                $outs =$row['time_out'];
                $aids = $row['id'];
              }
              if($ins < $today){
                $logs = True;
              }
              if((strlen($outs)<=0)&&!$logs){
                $logs2 = True;
              }
            }else{
              $logs = True;
            }
            
        ?>

          <!-- Main-body start -->
          <?php if($logs){ ?>
            <button type="button" class="btn btn-mat waves-effect waves-light btn-success" data-toggle="modal" data-target="#addIn" >
              <i class="fa fa-timer"></i>Time - In
            </button>
          <?php } if($logs2){ ?>
            <button class='btn btn-mat waves-effect waves-light btn-warning time_out' data-id='<?php echo $aids; ?>'>
              <i class='fa fa-timer'></i> Time - Out
            </button>
          <?php } ?>


          <div class="card">
            <div class="card-header">
              <h5>Attendance History List </h5>
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
                        <th>Date</th>
                        <th>Time-in</th>
                        <th>Time-out</th>
                        <th>Duration</th>
                        <th class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody id="tbody">
                      <?php
                        $sql = "SELECT a.*,a.id as aid FROM attendance a WHERE a.employee_id='$eid' order by time_in desc";
                        $query = $conn->query($sql);
                        while($row = $query->fetch_assoc()){
                      ?>
                      <tr>
                        <td><?php echo date('M d, Y',strtotime($row['time_in']));   ?></td>
                        <td><?php echo date('H:m:s',strtotime($row['time_in']));?></td>
                        <td>
                          <?php if($row['time_out']!=null){echo date('H:m:s',strtotime($row['time_out']));}?>
                        </td>
                        <td>
                          <?php
                            $t1 = strtotime( $row['time_in'] );
                            $t2 = strtotime( $row['time_out'] );
                            $diff = $t2 - $t1;
                            $hours = $diff / 3600 ;
                            if($row['time_out']==null){$hours=0;}
                            echo round($hours,2) 
                          ?>
                        </td>
                        <td class="text-center">
                          <button type="button" class="btn btn-default btn-sm btn-flat border-success wave-effect dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                            Action
                          </button>
                          <div class="dropdown-menu" style="">
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item edit" href="javascript:void(0)" data-id="<?php echo $row['aid'] ?>">
                              <i class="fa fa-edit"></i>Request Time Correction
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item view" href="javascript:void(0)" data-id="<?php echo $row['aid'] ?>">
                              <i class="fa fa-eye"></i>View Request
                            </a>
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

  <?php include 'includes/dtr_modal.php'; ?>
  <?php require_once("../admin/includes/alert_modal.php"); ?>
  <?php require_once("../admin/includes/scripts.php"); ?>
 
<script>

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'function/dtr_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      //edit
      $('#edit_id').val(response.id);
      $('#timein').val(""); 
      $('#timeout').val(""); 
      $('#timein').val(response.time_in.replace(/ /g,"T").substr(0,16)); 
      $('#timeout').val(response.time_out.replace(/ /g,"T").substr(0,16)); 
    }
  });
}

function getRow2(id){
  $.ajax({
    type: 'POST',
    url: 'function/dtr_row2.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      //view progress
      var block ="";
      if(response.length>0){
        block ="<table class='table table-striped table-bordered'><th width='5%'>#</th><th width='20%'>Req. Time-in</th><th  width='20%'>Req. Time-out</th><th width='40%'>Reason</th><th>Status</th>";
         for (var i = 0; i < response.length; i = i + 1) {
          var stats = "";
          if(response[i].status==0){
            stats="<span class='badge badge-info'>Pending</span>";
          }else if(response[i].status==1){
            stats="<span class='badge badge-success'>Approved</span>";
          }else{
            stats="<span class='badge badge-danger'>Rejected</span>";
          }
          block = block+  "<tr><td>"+(i+1)+"</td><td>"+response[i].req_in+"</td><td>"+response[i].req_out+"</td><td>"+response[i].reason+"</td><td>"+stats+"</td></tr>";
         }
      }else{
        block = "<div class='mb-2'><center><i>No Request Yet</i></center></div>";
      }
      block  = block+"</table>";
      $('#VP').html(block);
    }
  });
}

$(document).ready(function() {

  // to avoid the re-initialization of datatable
  if ( ! $.fn.DataTable.isDataTable( '#table1' ) ) {
    $('#table1').DataTable({
      "order": [[ 0, "desc" ]]
    });
  }//**end**

  //select all
  $(document).on('click','#globalcheck',function(e){
    if(this.checked) {
      $(':checkbox').each(function() {
        this.checked = true;                        
      });
    }else {
      $(':checkbox').each(function() {
        this.checked = false;                       
      });
    }
  });

  $(document).on('click','.edit',function(e){
    e.preventDefault();
    $('#editDTR').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click','.view',function(e){
    e.preventDefault();
    $('#viewReq').modal('show');
    var id = $(this).data('id');
    getRow2(id);
  });

  $(document).on('click','.time_out',function(e){
    e.preventDefault();
    $('#addOut').modal('show');
    var id = $(this).data('id');
    $('#timeouts').val(id);
  });

  $(document).on('change','#shown_date',function(e){
    $('#date_form').submit();
  });

});

</script>

</body>
</html>

