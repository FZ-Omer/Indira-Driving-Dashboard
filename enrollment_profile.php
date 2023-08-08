
<?php

include("../../connect.php");

// Check if the 'id' parameter is present in the URL
if (isset($_GET['id'])) {
    // Get the student ID from the URL parameter
	$student_id = $_GET['id'];

    // Prepare the SQL query to fetch the student details based on the provided student ID
	$sql = "SELECT * FROM enrollment WHERE id = '$student_id'";

	$result = $conn->query($sql);
}

// Check if the 'id' parameter is present in the URL
if (isset($_GET['id'])) {
    // Get the student ID from the URL parameter
    $student_id = $_GET['id'];

    // Prepare the SQL query to fetch the student details based on the provided student ID
    $sql = "SELECT * FROM enrollment WHERE id = '$student_id'";

    $result = $conn->query($sql);

    // Check if the query was successful and the student was found
    if ($result && $result->num_rows > 0) {
        // Fetch the student details for the selected student ID
        $row = $result->fetch_assoc();
        // Now you can access the student details like this:
        $enr_id = $row['enr_id'];
        $student_name = $row['student_name'];
     
        // ... other student details ...

        // Prepare the SQL query to fetch the payment details based on the provided student ID
        $payment_sql = "SELECT * FROM payment WHERE student_id = '$student_id'";
        $payment_result = $conn->query($payment_sql);
    } else {
        // Student not found with the specified ID
        echo "<p>No student found with ID: $student_id</p>";
    }
}
	?>

<?php
// Assuming $student_id is already defined somewhere in your code
if (isset($_GET['id'])) {
  // Get the student ID from the URL parameter
$student_id = $_GET['id'];

// Include the database connection code
include("../../connect.php");

// Query to retrieve the test_ground_date based on student_id
$query = "SELECT test_ground_date FROM payment WHERE student_id = $student_id";

// Execute the query
$result = mysqli_query($conn, $query);

// Initialize a variable to store the test date
$testDate = "";

// Check if the query was successful
if ($result) {
    // Fetch the data as an associative array
    $row = mysqli_fetch_assoc($result);

    // Check if a row was fetched
    if ($row) {
        // Output the test_ground_date in the desired HTML format
        $testDate = $row['test_ground_date'];
         // Free the result set
  
    } else {
        echo "No data found for the given student ID.";
    }

    // Free the result set
    mysqli_free_result($result);
} else {
    echo "Error executing the query: " . mysqli_error($conn);
}
}
// Close the database connection
mysqli_close($conn);
?>

	<?php 
  include("../../connect.php");
  $sql = "SELECT * FROM enrollment";
  $result = $conn->query($sql);
  ?>

  <?php
  include("admin-header.php");
  ?>        


  <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>


  <style type="text/css">
/* Custom button styles */
.fc-button-primary {
  background-color: #007bff;
  border-color: #007bff;
}

.fc-button-primary:hover {
  background-color: #0056b3;
  border-color: #0056b3;
}

.fc-button-primary:active {
  background-color: #003a80;
  border-color: #003a80;
}
.fc-toolbar h2 {
  background-color: green;
  color: white;
  padding: 10px;
  margin: 0;
  font-size: 20px;

}

.rounded-btn {
  border-radius: 50%;
  width: 40px;
  height: 40px;
  padding: 0;
  font-size: 20px;
}
.rounded-btn i {
  line-height: 40px;
}

</style>

<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
   <div class="content-wrapper">


    <div class="row">
      <div class="col-lg-8">


<div class="card shadow-sm">
  <div class="card-header text-dark">
    <h1 class="mb-0">Courses</h1>
    <button style="float: right;" type="button" class="btn btn-primary rounded-btn" data-toggle="modal" data-target="#editClass">
          <i class="mdi mdi-pencil-lock"></i>
        </button>
       
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Course Package</th>
            <th>Class Name</th>
            <th>Class Time</th>
            <th>Class Date</th>
            <th>No Of Days</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // Check if the 'id' parameter is present in the URL
          if (isset($_GET['id'])) {
            // Get the student ID from the URL parameter
            $student_id = $_GET['id'];

            // Prepare the SQL query to fetch the student details for the specific student ID
            $sql = "SELECT * FROM enrollment WHERE id = '$student_id'";

            // Execute the query
            $result = $conn->query($sql);

            // Check if the query was successful and the student was found
            if ($result && $result->num_rows > 0) {
              // Fetch the student details for the selected student ID
              $row = $result->fetch_assoc();
              // Now you can access the student details like this:
              $enr_id = $row['enr_id'];
              $student_name = $row['student_name'];
              $father_name = $row['father_name'];
              $point = $row['point'];
              $nfd = $row['nfd'];
              $package = $row['package'];
              $class_time = $row['class_time'];
              $classname = $row['classname'];
              $fees = $row['fees'];
              $class_time = $row['class_time'];
              $class_date = $row['classdate'];
              $date = $row['payment_date'];
              $amount_paid = $row['amount_paid'];
              $photo = $row['photo'];
              ?>
              <tr>
                <td><?php echo $package; ?></td>
                <td><?php echo $classname; ?></td>
                <td><?php echo $class_time; ?></td>
                <td><?php echo date('d/m/Y', strtotime($row['classdate'])); ?></td>
                <td><?php echo $nfd; ?></td>
                <td><a href="delete.php?id=<?php echo $student_id; ?>"><i class="mdi mdi-delete"></i></a></td><?php echo date('d/m/Y', strtotime($row['classdate'])); ?>
              </tr>
              <?php
            } else {
              // Student not found with the specified ID
              echo "<tr><td colspan='6'>No student found with ID: $student_id</td></tr>";
            }
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>






      <?php
// Your PHP code to connect to the database and fetch the student attendance data
      include("../../connect.php");

// Check if the 'id' parameter is present in the URL
      if (isset($_GET['id'])) {
    // Get the student ID from the URL parameter
        $student_id = $_GET['id'];

    // Prepare the SQL query to fetch the student attendance data based on the provided student ID
        $sql = "SELECT * FROM student_attendance WHERE student_id = '$student_id'";

        $result = $conn->query($sql);
      }

// Rest of your PHP code...
      ?>


     <div class="card shadow-sm mt-4">
  <div class="card-header">
    <h1 class="mb-0">Attendance Details</h1>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col">
        <!-- Here is where you include the FullCalendar -->
        <div id="calendar"></div>
      </div>
    </div>
  </div>
</div>



</div>


<!--Class Modal Box-->
<div class="modal fade " id="editClass" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true"  >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Update Course Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Add your form fields here to allow users to edit the details -->
         <h4 class="card-title">Class details</h4>
          <form id="editForm" action="enrollment_class_edit.php" method="post">
          <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
         <div class="row">
        <div class="col-12 form-group">
          <!-- LLR Date Input -->
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text text-white" style="background-color: #631e38;"><i class="mdi mdi-account-switch"></i></span>
            </div>
            <input name="package" id="package" type="text" class="form-control" placeholder="Package" aria-label="classdetails" value="<?php echo $row['package']; ?>">
          </div>
        </div>


         <div class="col-6 form-group">
          <!-- LLR Date Input -->
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text text-white" style="background-color: #631e38;"><i class="mdi mdi-account-switch"></i></span>
            </div>
            <input name="classname" id="className" type="text" class="form-control" placeholder="Class Name" aria-label="classdetails" value="<?php echo $row['classname']; ?>">
          </div>
        </div>

           <div class="col-6 form-group">
    <!-- Date After 6 Months Input -->
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text text-white" style="background-color: #631e38;"><i class="mdi mdi-clock"></i></span>
      </div>
      <input name="class_time" id="classTime" type="text" class="form-control" placeholder="Class Time" aria-label="classtime" value="<?php echo $row['class_time']; ?>">
    </div> 
  </div>

        <div class="col-6 form-group">
          <!-- Father Name Input -->
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text text-white" style="background-color: #631e38;" ><i class="mdi mdi-clock"></i></span>
            </div>
            <input name="nfd" type="text" class="form-control" placeholder="No Of Days" aria-label="No of days" id="nfd" value="<?php echo $row['nfd']; ?>">
          </div>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="update_class" class="btn btn-primary">Update Class</button>
      </div>
        </form>
      </div>
      
    </div>
  </div>
</div>

<!--Profile Modal Box-->
<div class="modal fade" id="editProfile" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true"  >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Update Personal Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Add your form fields here to allow users to edit the details -->
         <h4 class="card-title">Class details</h4>
          <form id="editForm" action="personal_edit.php" method="post">
          <input type="hidden" name="enr_id" value="<?php echo $row['id']; ?>">
         <div class="row">
        <div class="col-12 form-group">
          <!-- LLR Date Input -->
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text text-white" style="background-color: #631e38;"><i class="mdi mdi-account-switch"></i></span>
            </div>
            <input name="llr_no" id="llr_no" type="text" class="form-control" placeholder="LLR NO" aria-label="classdetails" value="<?php echo $row['llr_no']; ?>">
          </div>
        </div>


         <div class="col-6 form-group">
          <!-- LLR Date Input -->
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text text-white" style="background-color: #631e38;"><i class="mdi mdi-account-switch"></i></span>
            </div>
            <input name="llr" id="llrdate" type="text" class="form-control" placeholder="LLR Date" aria-label="classdetails" value="<?php echo $row['llr']; ?>">
          </div>
        </div>

           <div class="col-6 form-group">
    <!-- Date After 6 Months Input -->
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text text-white" style="background-color: #631e38;"><i class="mdi mdi-account-switch"></i></span>
      </div>
      <input name="validity" id="llr_after_6_months" type="text" class="form-control" placeholder="Date After 6 Months" aria-label="classdetails" readonly value="<?php echo $row['validity']; ?>">
    </div> 
  </div>

           <h4 class="card-title"> Personal details</h4>
        <div class="col-6 form-group">
          <!-- Father Name Input -->
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text text-white" style="background-color: #631e38;" ><i class="mdi mdi-clock"></i></span>
            </div>
            <input name="father_name" type="text" class="form-control" placeholder="Father_name" aria-label="father_name" id="father_name" value="<?php echo $row['father_name']; ?>">
          </div>
        </div>
        <div class="col-6 form-group">
          <!-- Address Input -->
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text text-white" style="background-color: #631e38;" ><i class="mdi mdi-account-key"></i></span>
            </div>
            <input name="address" id="address"  class="form-control" placeholder="Address" aria-label="address" value="<?php echo $row['address']; ?>">
          </div>
        </div>

        <div class="col-6 form-group">
          <!-- Date of Birth Input -->
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text text-white" style="background-color: #631e38;"><i class="mdi mdi-chevron-double-up"></i></span>
            </div>
            <input id="dob" name="dob" type="text" class="form-control" placeholder="Date Of Birth" aria-label="dob" value="<?php echo date('d/m/Y', strtotime($row['dob'])); ?>">

          </div>
        </div>

        <div class="col-6 form-group">
          <!-- Phone Number Input -->
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text text-white" style="background-color: #631e38;"><i class="mdi mdi-account-switch"></i></span>
            </div>
            <input name="phoneno" id="phoneno" type="text" class="form-control" placeholder="Phone Number" aria-label="phoneno" value="<?php echo $row['phoneno']; ?>">

          </div>
        </div>
        <div class="col-6 form-group">
          <!-- Blood Group Input -->
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text text-white" style="background-color: #631e38;"><i class="mdi mdi-account-switch"></i></span>
            </div>
            <input name="blood" id="blood" type="text" class="form-control" placeholder="Blood Group" aria-label="blood" value="<?php echo $row['blood']; ?>">

          </div>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="update_student" class="btn btn-primary">Save changes</button>
      </div>
        </form>
      </div>
      
    </div>
  </div>
</div>

<div class="col-md-4">
  <div class="card card-01 text-center">
    <div class="row d-flex justify-content-center">
      <div class="col-2 text-center">
        <!-- Profile Image -->
        <div class="profile-box">
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
      </div>
      <div class="col-2 text-center">
        <!-- Button to trigger the modal -->
        <button type="button" class="btn btn-primary rounded-btn" data-toggle="modal" data-target="#editProfile">
          <i class="mdi mdi-pencil-lock"></i>
        </button>
      </div>
    </div>

    <div class="card-body text-center">
      <span class="badge-box"><i class="fa fa-check"></i></span>
      <h4 class="card-title"> <?php echo $row['enr_id']; ?></h4>
      <h4 class="card-title">Status: <?php echo $row['status']; ?></h4>

      <h5 class="card-text "><b>Name : </b><?php echo $row['student_name']; ?></h5>
      <p class="card-text"><b>Phone Number : </b> <?php echo $row['phoneno']; ?></p>
      <p class="card-text"><b>DOB : </b> <?php echo date('d/m/Y', strtotime($row['dob'])); ?></p>
      <p class="card-text"><b>Address : </b> <?php echo $row['address']; ?></p>
      <p class="card-text"><b>Father Name : </b> <?php echo $row['father_name']; ?></p>
      <p class="card-text"><b>Referencer : </b> <?php echo $row['referencer']; ?></p>
      <p class="card-text"><b>Blood Group : </b> <?php echo $row['blood']; ?></p>
      <p class="card-text"><b>Test Date : </b> <?php echo date('d/m/Y', strtotime($testDate)); ?></p>
      <p class="card-text"><b>LLR NO : </b> <?php echo $row['llr_no']; ?></p>
      <div class="row">
        <div class="col"><p class="card-text"><b>LLR Date: </b> <br> <?php echo $row['llr']; ?></p></div>
        <div class="col"><p class="card-text"><b>LLR Validity : </b> <br> <?php echo $row['validity']; ?></p></div>
      </div>
    </div>

<div class="card-footer text-center d-flex justify-content-center">
  <a href="profile.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-lg">Send SMS</a>
  <a class="btn btn-warning btn-lg" href="receipt.php?id=<?php echo $row['id']; ?>">Driving Card</a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>



<script>
  $(document).ready(function () {
    // Initialize the FullCalendar
    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
      },
      events: function (start, end, timezone, callback) {
        // Get the student ID from the URL parameter (you may need to adjust this based on your URL structure)
        var studentId = <?php echo $_GET['id']; ?>;

        // Make an AJAX call to fetch the attendance data
        $.ajax({
          url: 'fetch_attendance.php',
          dataType: 'json',
          data: {
            id: studentId
          },
          success: function (response) {
            // Pass the fetched attendance data to the FullCalendar callback function
            callback(response);
          }
        });
      },
      eventRender: function (event, element) {
        // Customize the appearance of each event on the calendar
        element.css('background-color', 'green');

        // Display only the class name as the event title
        element.find('.fc-title').text(event.classNameData);
      }
    });
  });
</script>

<script>
  
  const llrdate = document.getElementById('llrdate');


  llrdate.addEventListener('focus', function() {
    llrdate.type = 'date';
    llrdate.setAttribute('min', '1970-01-01'); // Optional: Set a minimum date if needed
  });
  llrdate.addEventListener('blur', function() {
    if (llrdate.value === '') {
      llrdate.type = 'text';
      llrdate.value = 'LLR Date';
    }
  });
</script>
<script>
  $(document).ready(function () {
    // Attach an event listener to the "LLR Date" input field
    $("#llrdate").change(function () {
      // Get the selected date value
      var llrDateValue = $(this).val();

      // Check if a date is selected
      if (llrDateValue) {
        // Convert the selected date to a JavaScript Date object
        var llrDate = new Date(llrDateValue);

        // Calculate the date after six months
        var afterSixMonths = new Date(llrDate);
        afterSixMonths.setMonth(afterSixMonths.getMonth() + 6);

        // Format the date after six months in YYYY-MM-DD format
        var formattedDate = afterSixMonths.toISOString().slice(0, 10);

        // Set the formatted date as the value of the "Date After 6 Months" input field
        $("#llr_after_6_months").val(formattedDate);
      }
    });
  });
</script>


    <?php
    include("admin-footer.php");
    ?>        




    <!-- Required Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
