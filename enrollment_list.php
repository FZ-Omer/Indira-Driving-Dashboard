<?php

include("../../connect.php");

$sql = "SELECT * FROM enrollment ORDER BY id DESC";

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

        <div class="col-8 mt-5 offset-2" style="box-shadow: rgba(0, 0, 0, 0.56) 0px 22px 70px 4px; ">

          <div class="table-responsive">
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
            <a href="enrollment.php"><button class="btn  offset-10 text-white" style="background-color: #9e1017;">+ Add Enrollment</button></a>
            <thead>
              <tr>
              <th>Enquiry</th>
              <th>Enrollment ID</th>
              <th>Photo</th>
              <th>Student Name</th>
              <th>Father's Name</th>
              <th>Date of Birth</th>
              <th>Address</th>
              <th>Referencer</th>
              <th>Phone Number</th>
              <th>Blood Group</th>
              <th>Point</th>
              <th>Enroll 14</th>
              <th>LLR</th>
              <th>Validity</th>
              <th>Package</th>
              <th>Class Name</th>
              <th>NFD</th>
              <th>Fees</th>
              <th>Working</th>
              <th>Status</th>
              <th>Action</th>
              </tr>
            </thead>
            <tbody>
            <?php

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
      $class_id = $row['id']; // Get the class ID
      $enr_id = $row['enr_id']

?>          <tr>
              <td><?php echo $row['enquiry']; ?></td>
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
              <td><?php echo $row['father_name']; ?></td>
              <td><?php echo $row['dob']; ?></td>
              <td><?php echo $row['address']; ?></td>
              <td><?php echo $row['referencer']; ?></td>
              <td><?php echo $row['phoneno']; ?></td>
              <td><?php echo $row['blood']; ?></td>
              <td><?php echo $row['point']; ?></td>
              <td><?php echo $row['enroll14']; ?></td>
              <td><?php echo $row['llr']; ?></td>
              <td><?php echo $row['validity']; ?></td>
              <td><?php echo $row['package']; ?></td>
              <td><?php echo $row['classname']; ?></td>
              <td><?php echo $row['nfd']; ?></td>
              <td><?php echo $row['fees']; ?></td>
              <td><?php echo $row['working']; ?></td>
              <td><?php echo $row['status']; ?></td>
              <td> <a class="btn btn-info" href="#" data-bs-toggle="modal" data-bs-target="#dlModal<?php echo $class_id; ?>">Status</a></td>
              </tr>                       
            <!-- Modal form -->
            <div class="modal fade" id="dlModal<?php echo $class_id; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="editModalLabel">Edit Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <!-- Form fields for editing class data -->
                    <form action="enroll-status-edit.php" method="post">
                      <fieldset>
                        <legend>Edit Status:</legend>
                        <div class="mb-3">
                          <label for="status" class="form-label">Change Status:</label>
                          <select name="status" id="statusChange-<?php echo $class_id; ?>" class="form-control" required onchange="toggleLicenseField(<?php echo $class_id; ?>)">
                            <option>Select Status</option>
                            <option value="Payment">Payment</option>
                            <option value="Discount">Discount</option>
                            <option value="Postponed">Postponed</option>
                            <option value="Dispatched">Dispatched</option>
                            <option value="Cancelled">Cancelled</option>
                          </select>
                        </div>
                        <div class="mb-3" id="licenseField-<?php echo $class_id; ?>" style="display: none;">
                          <label for="licenseNo" class="form-label">License No:</label>
                          <input type="text" name="license_no" id="licenseNo" class="form-control">
                        </div>
                        <input type="hidden" name="class_id" value="<?php echo $class_id; ?>">
                        <input type="submit" value="Update" name="update_status" class="btn btn-primary">
                      </fieldset>
                    </form>
                  </div>
                </div>
              </div>
            </div>
           
      <?php
    }
  } else {
    echo "<tr><td colspan='6'>No classes found</td></tr>";
  }
  ?>
                
            </tbody>
          </table>
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

<script>
function toggleLicenseField(classId) {
  var status = document.getElementById('statusChange-' + classId).value;
  var licenseField = document.getElementById('licenseField-' + classId);
  if (status === 'Dispatched') {
    licenseField.style.display = 'block';
  } else {
    licenseField.style.display = 'none';
  }
}
</script>