<?php
include("../../connect.php");

$sql = "SELECT * FROM enrollment ORDER BY id DESC";
$result = $conn->query($sql);

function getButtonColor($status)
{
    switch ($status) {
        case 'Discount Rejected':
        case 'Cancelled':
            return '#F8CECC'; // Mild red color
        case 'Discount':
        case 'Payment':
            return '#C6E0FF'; // Mild blue color
        case 'Dispatched':
        case 'Payment Completed':
            return '#D7F8C2'; // Mild green color
        default:
            return '#C2FBD7'; // Default mild color
    }
}
?>

<?php
include("admin-header.php");
?>        
<!-- partial -->
<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row" >


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
         
       <div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 mx-auto mt-5">
          <div class="row">
            <?php
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                $class_id = $row['id']; // Get the class ID
                $enr_id = $row['enr_id'];
            ?>
                <div class="col-md-3">
                  <div class="card card-01">
                    <div class="profile-box text-center" >
                      <?php
                      $imageURL = 'uploads/' . $row["photo"];
                      if (!empty($row["photo"]) && file_exists($imageURL)) {
                        echo '<img src="' . $imageURL . '" class="rounded-circle" width="100" height="100" />';
                      } else {
                        echo 'Image not available';
                      }
                      ?>
                    </div>
                    <div class="card-body text-center">
                      <span class="badge-box"><i class="fa fa-check"></i></span>
                      <h4 class="card-title"> <?php echo $row['enr_id']; ?></h4>
                      <h5 class="card-text "><?php echo $row['student_name']; ?></h5>
                      <p class="card-text"> <?php echo $row['phoneno']; ?></p>
                    </div>
                   <div class="card-footer">
  <a href="#" class="btn btn-success">Profile</a>
  <a href="#" class="btn btn-primary"><?php echo $row['status']; ?></a>
</div>

                  </div>
                </div>
            <?php
              }
            } else {
              echo "<p>No enrollments found</p>";
            }
            ?>
          </div>
       
        </div>
      </div>
    </div>
  </div>
</div>

<!-- page-body-wrapper ends -->

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
           

        </div>
        <div class="card-footer text-center">
        <a href="enrollment.php"><button class="button-34">+ Add Enrollment</button></a>
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

<script>
function confirmDelete(event) {
  event.preventDefault(); // Prevent the default behavior of the anchor element

  Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert the Enrollment Data!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#17c1e8',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = event.target.href; // Proceed with the deletion by redirecting to ad-customer-delete.php
    }
  });
}
</script>