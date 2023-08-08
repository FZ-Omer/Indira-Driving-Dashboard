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
include("../../connect.php");
$sql = "SELECT * FROM enrollment";
$result = $conn->query($sql);
?>

<?php
// filter_enrollment.php
// Ensure you have the database connection code included
include("../../connect.php");

// Check if the phone number and name are provided via POST
if (isset($_POST['phone']) && isset($_POST['name'])) {
    // Sanitize the input to prevent SQL injection
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);

    // Filter the data based on phone number and name
    $query = "SELECT * FROM enrollment WHERE phoneno = '$phone' AND student_name = '$name'";
    $result = mysqli_query($conn, $query);

    // Check if any records are found
    if (mysqli_num_rows($result) > 0) {
        // Loop through the result set and display the filtered data in a table
        echo '<div class="container mt-5">';
        echo '<div class="row">';
        echo '<div class="col-md-8 offset-md-2">';
        echo '<h2 class="text-center mb-4">Filtered Enrollment Data</h2>';
        echo '<table class="table table-bordered table-striped">';
        echo '<thead><tr><th>Enquiry</th><th>Enrollment ID</th><th>Student Name</th></tr></thead>';
        echo '<tbody>';
        while ($row = mysqli_fetch_assoc($result)) {
            // Access the data fields for each filtered record
            $enquiry = $row['enquiry'];
            $enr_id = $row['enr_id'];
            $student_name = $row['student_name'];

            // Display the data in the table rows
            echo "<tr><td>$enquiry</td><td>$enr_id</td><td>$student_name</td></tr>";
        }
        echo '</tbody>';
        echo '</table>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    } else {
        echo '<div class="container mt-5">';
        echo '<div class="row">';
        echo '<div class="col-md-8 offset-md-2">';
        echo '<h2 class="text-center">No records found for the provided phone number and name.</h2>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
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
    <div class="col-md-6 offset-md-3">
           <div class="row">
        <div class="col-md-6 offset-md-2 d-flex justify-content-end">
          <!-- Add Enrollment Button (Right-aligned) -->
          <a href="enrollment.php"><button class="btn btn-primary">+ Add Enrollment</button></a>&nbsp;
          <!-- Show Filter Button (Right-aligned) -->
          <button class="btn btn-primary" data-toggle="collapse" data-target="#searchFilterCollapse">Filter</button>
        </div>
      </div>

      <div id="searchFilterCollapse" class="collapse">
        <form action="filter_enrollment.php" method="post">
          <div class="row">
            <div class="col form-group">
              <label for="phone">Phone Number:</label>
              <input type="text" class="form-control" id="phone" name="phone" >
            </div>
            <div class="col form-group">
              <label for="name">Name:</label>
              <input type="text" class="form-control" id="name" name="name" >
            </div>
            <div class="col">
              <div class="text-center">
                <button type="submit" class="btn btn-success" formaction="search_enrollment.php">Search Data</button>                   
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="content-wrapper">
      <div class="container mt-5">
        <div class="row">

        </div>
      </div>
      <div class="col-md-12 mx-auto mt-5">
        <div class="row">
          <?php
          // Check if there are any search results
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              // Fetch data for each enrollment
              $class_id = $row['id']; // Get the class ID
              $enr_id = $row['enr_id'];
          ?>
          <div class="col-md-6 col-lg-3 mb-3">
            <div class="card card-01">
              <div class="profile-box text-center d-flex align-items-center justify-content-center">
    <?php
  // Display student's profile image if available, otherwise display "Image not available"
  $imageURL = 'uploads/' . $row["photo"];
  if (!empty($row["photo"]) && file_exists($imageURL)) {
    echo '<img src="' . $imageURL . '" class="rounded-circle mr-3" width="100" height="100" />';
  } else {
    echo '<div class="rounded-circle bg-secondary text-white mr-3" style="width: 100px; height: 100px; line-height: 100px;">';
    echo '<img src="uploads/default.jpg" alt="Image not available" style="width: 100%; height: 100%; object-fit: cover;">';
    echo '</div>';
  }
  ?>
  
</div>


              <div class="card-body text-center">
                <span class="badge-box"><i class="fa fa-check"></i></span>
                <h4 class="card-title"> <?php echo $row['enr_id']; ?></h4>
                <h5 class="card-text "><?php echo $row['student_name']; ?></h5>
                <p class="card-text"> <?php echo $row['phoneno']; ?></p>
                <h3 class="text-danger"><b> <?php echo $row['status']; ?></b></h3>
              </div>

             <div class="card-footer d-flex justify-content-between">
  <!-- Button to view the enrollment profile -->
  <a href="enrollment_profile.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Profile</a>

  <!-- Button to view the driving card -->
  <a class="btn btn-warning" href="receipt.php?id=<?php echo $row['id']; ?>">Driving Card</a>

 <!-- Button to trigger the modal -->
 <div>
  <a type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-id="<?php echo $row['id']; ?>" data-target="#myModal">
    <i class="mdi mdi-pencil"></i>
  </a>
</div>
</div>

            </div>
          </div>

          <?php
            }
          } else {
            // Display a message if no enrollments are found based on the search criteria
            echo "<p>No enrollments found</p>";
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- page-body-wrapper ends -->

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

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><h1>Work Status</h1></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Add your form elements here -->
        <div class="container mt-5">
          <div class="form-group">
            <label for="status">Select Status:</label>
            <select class="form-control" id="status">
              <option value="none">Select Status</option>
              <option value="Dispatched">Dispatched</option>
              <option value="WorkPending">Work Pending</option>
              <option value="Postponed">Postponed</option>
              <option value="Cancelled">Cancelled</option>
            </select>
          </div>

          <form id="dispatchedForm" action="enrollment_dispatch_edit.php" method="post" style="display: none;">
          <div class="form-group">
            <label for="license_number">License Number:</label> 
            <input type="hidden" name="id" id="dispatchedFormId">
            <input type="hidden" name="status" value="dispatched">
            <input name="license_no" type="text" class="form-control" id="license_number">
          </div>
          <div class="form-group">
            <label>Transport Status:</label><br>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="transport_type" id="transportYes" value="Transport">
              <label class="form-check-label" for="transportYes">Transport</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="transport_type" id="transportNo" value="Non Transport">
              <label class="form-check-label" for="transportNo">Non Transport</label>
            </div>
          </div>
          <div class="form-group">
            <label for="license_validity_date">License Validity Date:</label>
            <input name="license_validity" type="date" class="form-control" id="license_validity_date">
          </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="update_dispatch" class="btn btn-primary">Save as Dispatched</button>
        </div>
      </form>

      <form id="workPendingForm" action="enrollment_workingpending_edit.php" method="post" style="display: none;">
          <div class="form-group">
          
            <label for="license_validity_date">Pending Date:</label>
            <input type="hidden" name="status" value="Work Pending">
            <input type="hidden" name="id" id="workPendingFormId">
            <input name="work_pending_date" type="date" class="form-control" id="work_pending_date">
          </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="update_workpending" class="btn btn-primary">Save as Work Pending</button>
        </div>
        </form>

        <form id="postponedForm" action="enrollment_postponed_edit.php" method="post" style="display: none;">
          <div class="form-group">
            <label for="license_validity_date">Postponded Date:</label>
            <input type="hidden" name="status" value="Postponed">
            <input type="hidden" name="id" id="postponedFormId">
            <input name="postponed_date" type="date" class="form-control" id="postponed_date">
          </div> 
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="update_postponed" class="btn btn-primary">Save as Postponed</button>
        </div>
        </form>

        <form id="cancelledForm" action="enrollment_cancelled_edit.php" method="post" style="display: none;">
          
          <div class="modal-footer">
          <input type="hidden" name="status" value="Cancelled">
          <input type="hidden" name="id" id="cancelledFormId">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="update_cancelled" class="btn btn-primary">Save as Cancelled</button>
        </div>
        </form>

          <div id="details" class="mt-3">
            <!-- Details will be populated here based on the selected status -->
          </div>
        </div>
      </div>
     
    </div>
  </div>
</div>
<?php
include("admin-footer.php");
?>


<script>
  document.addEventListener("DOMContentLoaded", function() {
    const statusDropdown = document.getElementById("status");
    const forms = {
      Dispatched: document.getElementById("dispatchedForm"),
      WorkPending: document.getElementById("workPendingForm"),
      Postponed: document.getElementById("postponedForm"),
      Cancelled: document.getElementById("cancelledForm"),
    };

    const idInput = document.getElementById("dispatchedFormId");

    document.querySelectorAll('a[data-toggle="modal"]').forEach(function(button) {
      button.addEventListener("click", function() {
        const id = this.getAttribute("data-id");
        idInput.value = id;
        
        // Set the id value in the other form input fields
        document.getElementById("workPendingFormId").value = id;
        document.getElementById("postponedFormId").value = id;
        document.getElementById("cancelledFormId").value = id;
      });
    });

    statusDropdown.addEventListener("change", function() {
      for (const formId in forms) {
        if (forms.hasOwnProperty(formId)) {
          forms[formId].style.display = "none";
        }
      }
      
      const selectedForm = forms[this.value];
      if (selectedForm) {
        selectedForm.style.display = "block";
      }
    });
  });
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

<script>
    function showDetails() {
      var status = document.getElementById("status").value;
      var detailsDiv = document.getElementById("details");
      var id = $('#myModal').data('id');
 // Retrieve the data-id value from the button

      if (status === "dispatched") {
        detailsDiv.innerHTML = `
        <form action="enrollment_dispatch_edit.php?id=${id}" method="post">
          <div class="form-group">
            <label for="license_number">License Number:</label> 
            <input name="license_no" type="text" class="form-control" id="license_number">
          </div>
          <div class="form-group">
            <label>Transport Status:</label><br>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="transport_type" id="transportYes" value="Transport">
              <label class="form-check-label" for="transportYes">Transport</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="transport_type" id="transportNo" value="Non Transport">
              <label class="form-check-label" for="transportNo">Non Transport</label>
            </div>
          </div>
          <div class="form-group">
            <label for="license_validity_date">License Validity Date:</label>
            <input name="license_validity" type="date" class="form-control" id="license_validity_date">
          </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
        `;
      } else if (status === "work_pending") {
        detailsDiv.innerHTML = `
            <form action="enrollment_workingpending_edit.php?id=${id}" method="post">
          <div class="form-group">
          
            <label for="license_validity_date">Pending Date:</label>
            <input name="wrk_pending_date" type="date" class="form-control" id="work_pending_date">
          </div>
          </form>
        `;
      } else if (status === "Postponed") {
        detailsDiv.innerHTML = `
         <form action="enrollment_postponed_edit.php?id=${id}" method="post">
          <div class="form-group">
            <label for="license_validity_date">Postponded Date:</label>
            <input name="postpond_date" type="date" class="form-control" id="postpond_date">
          </div> 
          </form>
        `;
      }else {
        // If no status is selected or "Select Status" is chosen, clear the detailsDiv.
        detailsDiv.innerHTML = "";
      }
    }
  </script>


  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


  