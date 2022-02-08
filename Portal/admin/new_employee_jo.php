 <a href="employee.php?page=employee_list"><button type="button" class="btn btn-mat waves-effect waves-light btn-success" ><i class="fa fa-plus"></i>Back</button></a>

<!-- Main-body start -->

<div class="card">
  <div class="card-body">
    <form class="form-material" method="POST" action="function/employee_add.php" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-12">
          <h2 class="text-center">New Employee Form (JO)</h2>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-md-12">
          <h4>Profile Details</h4>
        </div>
      </div>
      <hr>
      <div class="row">

        <div class="col-md-6">
          <div class="form-group">
            <label for="" class="control-label req">First Name</label>
            <input type="text" name="firstname" class="form-control border border-secondary" required >
          </div>
          <div class="form-group">
            <label for="" class="control-label">Middle Name (optional)</label>
            <input type="text" name="middlename" class="form-control border border-secondary" >
          </div>
          <div class="form-group">
            <label for="" class="control-label req">Last Name</label>
            <input type="text" name="lastname" class="form-control border border-secondary" required >
          </div>
          <div class="form-group">
            <label for="" class="control-label">Suffix (optional)</label>
            <input type="text" name="suffix" class="form-control border border-secondary">
          </div>
          <div class="form-group">
            <label for="" class="control-label req">Date of Birth</label>
            <input type="date" onchange="getAge(this.value)" value="2000-01-01"  id="bdays" name="bday" class="form-control border border-secondary" required >
          </div>
          <div class="form-group">
            <label for="" class="control-label">Age</label>
            <input type="text" id="age" name="age" class="form-control border border-secondary" readonly="" >
          </div>
          <div class="form-group">
            <label for="" class="control-label req">Sex</label>
            <select name="sex" id="designation_id" class="form-control border border-secondary select2">
              <option value="">--Select--</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
          </div>
          <div class="form-group">
            <label class="control-label req">Address</label>
            <textarea class="form-control border border-secondary" rows="2"  name="address" required=""></textarea>
          </div>
          <div class="form-group">
            <label for="" class="control-label req">Mobile Number</label>
            <input type="text" name="mobile" class="form-control border border-secondary" >
          </div>
          <div class="form-group">
            <label for="" class="control-label req">Contact Number</label>
            <input type="text" name="contact" class="form-control border border-secondary" >
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group d-flex justify-content-center align-items-center mb-3">
            <img src="../assets/profile/avatar-blank.jpg" alt="Avatar" id="cimg" class="img-thumbnail img-fluid" width="143" height="143">
          </div>
          <hr>
          <div class="form-group ">
            <label for="" class="control-label">Profile Photo</label>
            <div class="custom-file">
              <input type="file" class="" id="customFile" name="img" onchange="displayImg(this,$(this))" accept="image/*">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label req">Email</label>
            <input type="email" class="form-control border border-secondary" name="email" required >
            <small id="#msg"></small>
          </div>

          <div class="form-group">
            <label for="" class="control-label">Category</label>
            <?php
              $sql = "SELECT * FROM employment_category WHERE id='2'";
              $query = $conn->query($sql);
              while($prow = $query->fetch_assoc()): ?>
                <input type="text"  name="" class="form-control border border-secondary" readonly="" value="<?php echo $prow['cat'].' ('.$prow['code'].')'; ?>" >
                <input type="hidden" id="Category" name="category" value="<?php echo $prow['id']; ?>">
            <?php endwhile;?>
          </div>
          <div class="form-group">
            <label for="" class="control-label req">Department</label>
            <select class="form-control border border-secondary" id="department" name="department" required>
              <option value="" selected>--Select--</option>
              <?php
                $sql = "SELECT * FROM department_category";
                $query = $conn->query($sql);
                while($srow = $query->fetch_assoc()): 
              ?>
                <option value='<?php echo $srow['id']; ?>'>
                  <?php echo $srow['title'].' ('.$srow['code'].')'; ?> 
                </option>
              <?php endwhile; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="" class="control-label req">Designation</label>
            <select class="form-control border border-secondary" name="position" id="position" onchange="getSalary()" required>
              <option value="" selected>--Select--</option>
              <?php
                $sql = "SELECT * FROM position WHERE type = '2'";
                $query = $conn->query($sql);
                while($prow = $query->fetch_assoc()):
              ?>
                <option value='<?php echo $prow['id']; ?>' 
                  data-rate='<?php echo $prow['rate']; ?>'>
                  <?php echo $prow['description']; ?>
                </option>
              <?php endwhile; ?>
            </select>
          </div>    
          <div class="form-group">
            <label for="" class="control-label req">Date Hired</label>
            <input type="date" name="date_hired" class="form-control border border-secondary" value="<?php echo date('Y-m-d'); ?>" required >
          </div>
          <br><br><br>
          <h4>SALARY</h4>
          <hr>
          <div class="form-group">
            <label for="" class="control-label">Rate per hour</label>
            <input type="text" id="daily_wage" name="daily_wage" class="form-control border border-secondary" readonly="" >
          </div>
        </div>
      </div>

      <br>
      <div class="row">
        <div class="col-md-6 border-bottom">
          <h4>GOVENMENT ISSUED ID'S</h4>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-md-6 border-right">
        	<div class="form-group">
              <label for="" class="control-label req">TIN NUMBER</label>
              <input type="text" name="tin" class="form-control border border-secondary" required="" >
            </div>
            <div class="form-group">
              <label for="" class="control-label ">SSS</label>
              <input type="text" name="sss" class="form-control border border-secondary" >
            </div>
        </div>
        <div class="col-md-6 border-right">
          <div class="form-group">
            <label for="" class="control-label ">PAGIBIG</label>
            <input type="text" name="pagibig" class="form-control border border-secondary" >
          </div>
          <div class="form-group">
            <label for="" class="control-label ">PHILHEALTH</label>
            <input type="text" name="phealth" class="form-control border border-secondary" >
          </div>
        </div>
      </div>
      <hr>
      <div class="col-lg-12 text-right justify-content-center d-flex">
        <button type="submit" name="add" class="btn btn-primary mr-2">Save</button>
        <button class="btn btn-secondary" type="button" onclick="location.href = 'employee.php?page=employee_list'">Cancel</button>
      </div>
    </form>
  </div>
</div>

 
<script>
  function displayImg(input,_this) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
          $('#cimg').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
  function getAge(vale){
    $('#age').val(getAge1(vale));
  }

  function getAge1(dateString) {
    var today = new Date();
    var birthDate = new Date(dateString);
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }
    return age;
  }
    
  function getSalary(){
    var sal = $('#position').find(':selected').data('rate');
    $('#daily_wage').val(sal);
  }

  function getSalary2(){
    var sal = $('#position').find(':selected').data('rate');
    var d1 = $('#schedule').find(':selected').data('in');
    var d2 = $('#schedule').find(':selected').data('out');
    if(sal!=null){
      //create date format          
      var timeStart = new Date("01/01/2007 " + d1).getHours();
      var timeEnd = new Date("01/01/2007 " + d2).getHours();
      var hourDiff = timeEnd - timeStart;

      $('#daily_wage').val(sal);
      $('#basic_salary').val(sal*26*hourDiff);
    }
  }
</script>