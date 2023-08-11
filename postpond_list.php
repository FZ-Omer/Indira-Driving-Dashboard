<?php

include("../../connect.php");

$sql = "SELECT * FROM enrollment WHERE status = 'Postponed' ORDER BY id DESC";


$result = $conn->query($sql);

?>



<?php
include("admin-header.php");
?>        
<!-- partial -->
<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
  
    <div class="content-wrapper">
      
      <div class="row" >

      <div class="col-md-8 mx-auto mt-5">
          <div class="card" style="box-shadow: rgba(0, 0, 0, 0.56) 0px 22px 70px 4px; ">
            <div class="card-header bg-danger text-white">
              <h1 class="mb-0">Postpond</h1>
            </div>
          <div class="card-body table-responsive">
            
          <?php
                   if(isset($_GET['error'])) {
                    $error = $_GET['error'];
                    echo '<div class="alert alert-success alert-dismissible" role="alert">
                    ' . $error . '
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>'; 
                     }
                ?>
          <table id="myTable" class="table table-striped table-bordered">
            <thead>
              <tr>
              <th>Status</th>
        
              <th>Enrollment ID</th>
              <th>Photo</th>
                     
              <th>Student Name</th>
             
              <th>Phone Number</th>
             
              <th>Package</th>
              <th>Class Name</th>
              <th>NFD</th>
              <th>Fees</th>
              <th>Working</th>
              
              </tr>
            </thead>
            <tbody>
            <?php

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
      $enr_id = $row['enr_id']

?>          <tr>
            <td><button class="button-33" role="button"><?php echo $row['status']; ?></button></td>
            
              <td><?php echo $row['enr_id']; ?></td>
              <td>
                <?php
                $imageURL = 'uploads/' . $row["photo"];
                if (!empty($row["photo"]) && file_exists($imageURL)) {
                  echo '<img src="' . $imageURL . '" class="img-responsive" width="300" height="300" />';
                } else {
                  echo 'Image not available';
                }
                ?>
              </td>
         
              <td><?php echo $row['student_name']; ?></td>
             
              <td><?php echo $row['phoneno']; ?></td>
             
              <td><?php echo $row['package']; ?></td>
              <td><?php echo $row['classname']; ?></td>
              <td><?php echo $row['nfd']; ?></td>
              <td><?php echo $row['fees']; ?></td>
              <td><?php echo $row['working']; ?></td>
    
              </tr>                       
              <?php       }

                  }

                  ?>
            </tbody>
          </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->

    <!-- partial -->
  </div>
  <!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->

<?php
include("admin-footer.php");
?>
