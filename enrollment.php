<?php
 include("admin-header.php");

 ?>

<?php
    require_once '../../connect.php';
  
    $query2 = "SELECT enr_id FROM enrollment ORDER BY id DESC LIMIT 1";
    $result2 = mysqli_query($conn, $query2);
  
    if ($result2 && mysqli_num_rows($result2) > 0) {
        $row = mysqli_fetch_array($result2);
        $last_id = $row['enr_id'];
    } else {
        $last_id = "";
    }
  
    if ($last_id == "") {
        $customer_ID = "IND-EN001";
    } else {
        $customer_ID = substr($last_id, 7);
        $customer_ID = intval($customer_ID);
        $customer_ID = "IND-EN00" . ($customer_ID + 1);
    }
?>

<?php
/* This Makes Connection with DB Server Page */
include("../../connect.php");
/* It Query the data from the required DB and Stores In Option keyword */

$query = "SELECT id,student_name FROM enrollment";
$result = $conn->query($query);

if ($result->num_rows > 0) {
  $customer = mysqli_fetch_all($result, MYSQLI_ASSOC);

}
?>

<?php
/* This Makes Connection with DB Server Page */
include("../../connect.php");
/* It Query the data from the required DB and Stores In Option keyword */

$query2 = "SELECT id,class_name FROM classes_rc";
$result2 = $conn->query($query2);

if ($result2->num_rows > 0) {
  $customer = mysqli_fetch_all($result2, MYSQLI_ASSOC);

}
?>

<style>
  .card-header {
    background-color: #c55a0c;
  }

  .card-body {
    background-color: #f8f9fa;
  }
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
 <!-- partial -->
<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card shadow-sm">
            <div class="card-header text-white"  style="background-color: #c55a0c;">
              <h1 class="mb-0">Enrollment</h1>
            </div>
            <div class="card-body">
              <form action="enrollment_post.php" method="post" enctype="multipart/form-data">
                <div class="row">
                     <h4 class="card-title">Enquiry Status</h4>

                  <div class="col-md-6 form-group">
                    <!-- Existing Student Toggle -->
                     <div class="row">
                    <label class="col-8 col-form-label" for="toggle-switch">Existing Student:</label>
                    <div class="col-4 form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="toggle-switch">
                    </div>
                  </div>
                  </div>
                  <div class="col-md-6 form-group">
                    <!-- If you are Enquiry? Radio Buttons -->
                    <label class="col-8">If you are Enquiry ?</label>
                  <div class="input-group">

                   <div class="col-4 form-check-inline">
                    <input class="form-check-input" type="radio" name="enquiry" id="option1" value="Yes" checked>
                    <label class="form-check-label" for="option1">
                      Yes
                    </label>
                  </div>
                  <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="enquiry" id="option2" value="No">
                    <label class="form-check-label" for="option2">
                      No
                    </label>
                  </div>
                </div>
                  </div>
                </div>
                <div class="row">

              <div class="col-6">
                    <div class="card" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;">
                      <div class="card-body">

                      <label for="enrollmentID">Enrollment ID:</label>
                        <input type="text" id="enrollmentID" class="form-control" name="enrollmentID" value="<?php echo $customer_ID; ?>" readonly>
              </div>
            </div>
          </div>
                  <div class="col-6">
                    <div class="card" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;">
                      <div class="card-body">
                        <!-- Existing Student Select and New Student Input -->
                         <div class="form-group input-list" id="existing-client">
                      <label for="existing-client-select">Existing Student:</label>
                   <select id="customerDetails" name="student_name" class="form-control">
  <option value="">Search For Student Name</option>
  <?php
  include("../../connect.php");

  $query = "SELECT student_name FROM enrollment";
  $result = mysqli_query($conn, $query);

  if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $name = $row['student_name'];
      echo '<option value="' . $name . '">' . $name . '</option>';
    }
  } else {
    echo '<option value="">No student names found</option>';
  }

  mysqli_close($conn);
  ?>
</select>
                      </select>

                    </div>

                    <div id="new-client" class="input-list form-group">
                      <label for="new-client-input">New Student:</label>
                      <input type="text" name="student_name" id="new-client-input" class="form-control" placeholder="Student Name">
                </div>
                      </div>
                    </div>
                  </div>
                </div>

                 <div class="card border mt-5" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;">
                      <div class="card-body">
                        <h4 class="card-title">Image Upload</h4>
                <div class="row align-items-center">
                  <div class="col-md-6 form-group">
                    <label>Upload Image</label>
                    <input type="file" id="photo" name="photo" onchange="loadFile(event)">
                  </div>
                  <div class="col-md-6 form-group text-center">
                    <p><img id="output" width="180" height="170" class="border rounded-circle" src="http://via.placeholder.com/700x500"></p>
                  </div>
                </div>
              </div>
            </div>


              <div class="card border mt-5" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;">
                      <div class="card-body">
                        <div class="row">
                          <h4 class="card-title">Personal Details</h4>
                          <div class="col-6 form-group">
                            <!-- Father Name Input -->

                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text text-white" style="background-color: #631e38;" ><i class="mdi mdi-clock"></i></span>
                              </div>
                              <input name="father_name" type="text" class="form-control" placeholder="Father_name" aria-label="father_name" id="father_name">
                            </div>
                          </div>
                          <div class="col-6 form-group">
                            <!-- Date of Birth Input -->
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text text-white" style="background-color: #631e38;"><i class="mdi mdi-chevron-double-up"></i></span>
                              </div>
                              <input id="dob" name="dob" type="text" class="form-control" placeholder="Date Of Birth" aria-label="dob">

                            </div>
                          </div>
                        </div>

                <div class="row">
                  <div class="col-6 form-group">
                    <!-- Address Input -->
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text text-white" style="background-color: #631e38;" ><i class="mdi mdi-account-key"></i></span>
                      </div>
                      <input name="address" id="address"  class="form-control" placeholder="Address" aria-label="address">
                    </div>
                  </div>
                  <div class="col-6 form-group">
                    <!-- Referencer Input -->
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text text-white" style="background-color: #631e38;"><i class="mdi mdi-eye-off"></i></span>
                      </div>
                      <input name="referencer" id="referencer" type="text" class="form-control" placeholder="Referencer Name" aria-label="Referencer">

                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-6 form-group">
                    <!-- Phone Number Input -->
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text text-white" style="background-color: #631e38;"><i class="mdi mdi-account-switch"></i></span>
                      </div>
                      <input name="phoneno" id="phoneno" type="text" class="form-control" placeholder="Phone Number" aria-label="phoneno">

                    </div>
                  </div>
                  <div class="col-6 form-group">
                    <!-- Blood Group Input -->
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text text-white" style="background-color: #631e38;"><i class="mdi mdi-account-switch"></i></span>
                      </div>
                      <input name="blood" id="blood" type="text" class="form-control" placeholder="Blood Group" aria-label="blood">

                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-6 form-group">
                    <!-- Point Input -->
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text text-white" style="background-color: #631e38;"><i class="mdi mdi-account-switch"></i></span>
                      </div>
                      <input name="point" type="text" class="form-control" placeholder="Point" aria-label="point">

                    </div>
                  </div>
                  <div class="col-6 form-group">
                    <!-- Enroll 14 Number Input -->
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text text-white" style="background-color: #631e38;"><i class="mdi mdi-account-switch"></i></span>
                      </div>
                      <input name="enroll14" type="text" class="form-control" placeholder="Enroll 14 Number" aria-label="enroll14">

                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-6 form-group">
                    <!-- LLR Date Input -->
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text text-white" style="background-color: #631e38;"><i class="mdi mdi-account-switch"></i></span>
                      </div>
                      <input id="llr" name="llr" type="text" class="form-control" placeholder="LLR Date" aria-label="llr">

                    </div>
                  </div>
                  <div class="col-6 form-group">
                    <!-- LLR Validity Date Input -->
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text text-white" style="background-color: #631e38;"><i class="mdi mdi-account-switch"></i></span>
                      </div>
                      <input id="llrValid" name="validity" type="text" class="form-control" placeholder="LLR Validity Date" aria-label="validity">

                    </div>
                  </div>
                </div>

           </div>
            </div>

            <div class="card mt-5" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;">
              <div class="card-body">

              <div class="row">
                <div class="col-12 form-group">

                  <label for="package">Classes Package</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text text-white" style="background-color: #631e38;"><i class="mdi mdi-contact-mail"></i></span>
                    </div>
                    
                   <select class="form-control" id="package" name="package" aria-placeholder="Select Classes">
                        <option>Select Classes</option>
                        <option value="RC">Registration Certificate</option>
                        <option value="DL">Driving Licence</option>
                  </select>

            
                  </div>
                </div>
              </div>

                <div class="row">
                
                  <h4 class="card-title">Select Class details</h4>

                  <div class="col-12 form-group">
                    <!-- Course Select -->
                    <div class="input-group">
                      <div class="input-group-prepend">
                      
                      </div>
                     
                      <div id="class_details"></div>  
     
       

                    </div>
                  </div>

                </div>

                    
                <div class="row">
                  <div class="col-6 form-group">
                    <!-- LLR Date Input -->
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text text-white" style="background-color: #631e38;"><i class="mdi mdi-account-switch"></i></span>
                      </div>
                      <input id="className" name="classname" type="text" class="form-control" placeholder="Class Name" aria-label="classname">

                    </div>
                  </div>
                  <div class="col-6 form-group">
                    <!-- LLR Validity Date Input -->
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text text-white" style="background-color: #631e38;"><i class="mdi mdi-account-switch"></i></span>
                      </div>
                      <input name="nfd" type="text" class="form-control" placeholder="No Of Days" aria-label="nfd">

                    </div>
                  </div>
                </div>



                <div class="row">
                  <div class="col-6 form-group">
                    <!-- LLR Date Input -->
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text text-white" style="background-color: #631e38;"><i class="mdi mdi-account-switch"></i></span>
                      </div>
                      <input name="fees" type="text" class="form-control" placeholder="Fees" aria-label="classdetails" ></input>
                    </div>
                  </div>

                  <div class="col-6 form-group">
                    <!-- LLR Date Input -->
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text text-white" style="background-color: #631e38;"><i class="mdi mdi-account-switch"></i></span>
                      </div>
                      <input name="working" type="text" class="form-control" placeholder="Working" aria-label="working" ></input>
                    </div>
                  </div>

                </div>

                <div class="row">

                <h4 class="card-title">Select Class Timing</h4>
                  <div class="col-6 form-group">
                    <!-- LLR Date Input -->
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text text-white" style="background-color: #631e38;"><i class="mdi mdi-account-switch"></i></span>
                      </div>
                          <input id="classdate" name="llr" type="text" class="form-control" placeholder="Class Start Date" aria-label="llr">
                    </div>
                  </div>

                   <div class="col-6 form-group">
                    <!-- LLR Date Input -->
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text text-white" style="background-color: #631e38;"><i class="mdi mdi-account-switch"></i></span>
                      </div>
                      <input name="ad_date" type="" id="timeInput" class="form-control flatpickr" data-enable-time="true" data-no-calendar="true" data-date-format="h:i K">
                    </div>
                  </div>

                </div>

        <div class="row">
          <div class="col-12 form-group d-flex justify-content-center align-items-center">
              <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="discountCheckbox" name="discount">
                  <label class="form-check-label" for="discountCheckbox">Apply Discount</label>
              </div>
          </div>
        </div>


               


            
                <div class="row">
                  <div class="col-12 text-center mt-5">
                    <button type="submit" name="staff_details" class="btn btn-success">Save</button>
                    <a href="enrollment_list.php" class="btn btn-danger">Cancel</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- page-body-wrapper ends -->

<script>
flatpickr("#timeInput", {});
</script>


<script>
  $(document).ready(function() {
    // Hide the existing student dropdown
    $('#existing-client').hide();

    // Show the new student input
    $('#new-client').show();

    // Initialize the toggle switch
    $('#toggle-switch').change(function() {
      var isChecked = $(this).prop('checked');
      toggleInputList(isChecked);
    });

    // Function to toggle the visibility of input field list
    function toggleInputList(isChecked) {
      if (isChecked) {
        $('#new-client').hide();
        $('#existing-client').show();
      } else {
        $('#existing-client').hide();
        $('#new-client').show();
      }
    }
  });
</script>
<script>
  var loadFile = function(event) {
    var image = document.getElementById('output');
    image.src=URL.createObjectURL(event.target.files[0]);
  };
</script>
 <script>
        // Fetch course data using AJAX
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var courses = JSON.parse(xhr.responseText);
                populateDropdown(courses);
            }
        };
        xhr.open('GET', 'get_package_names.php', true);
        xhr.send();

        // Populate the dropdown list with course names
        function populateDropdown(courses) {
            var select = document.getElementById('courseList');
            for (var i = 0; i < courses.length; i++) {
                var option = document.createElement('option');
                option.value = courses[i];
                option.textContent = courses[i];
                select.appendChild(option);
            }
        }
    </script>

<script>
$(document).ready(function() {
  // When the class selection changes
  $("#package").on("change", function() {
    var selectedClass = $(this).val();
    if (selectedClass === "RC" || selectedClass === "DL") {
      // Make an AJAX request to fetch the class details and class names
      $.ajax({
        url: "get_class_details.php", // Replace with the actual PHP file name
        type: "POST",
        data: { class: selectedClass },
        dataType: 'json',
        success: function(response) {
          $("#class_details").html(response.table);
          $("#className").replaceWith(response.dropdown);

          // When a class name is selected from the dropdown
          $("#className").on("change", function() {
            var selectedClassName = $(this).val();

            // Find the selected class details from the response
            var selectedClassDetails = response.classDetails.find(function(classDetail) {
              return classDetail.class_name === selectedClassName;
            });

            if (selectedClassDetails) {
              // Update the remaining fields with the class details
              $("input[name='working']").val(selectedClassDetails.working);
              $("input[name='fees']").val(selectedClassDetails.fees);
              $("input[name='nfd']").val(selectedClassDetails.nfd);
            }
          });
        }
      });
    } else {
      $("#class_details").html(""); // Clear the details if no class is selected
      $("#className").replaceWith('<input id="className" name="classname" type="text" class="form-control" placeholder="Class Name" aria-label="classname">');
    }
  });
});


</script>

<script>
$(document).ready(function() {
  // When the class selection changes
  $("#package").on("change", function() {
    var selectedClass = $(this).val();
    if (selectedClass === "RC" || selectedClass === "DL") {
      // Make an AJAX request to fetch the class details and class names
      $.ajax({
        url: "get_class_dl_details.php", // Replace with the actual PHP file name
        type: "POST",
        data: { class: selectedClass },
        dataType: 'json',
        success: function(response) {
          $("#class_details").html(response.table);
          $("#className").replaceWith(response.dropdown);

          // When a class name is selected from the dropdown
          $("#className").on("change", function() {
            var selectedClassName = $(this).val();

            // Find the selected class details from the response
            var selectedClassDetails = response.classDetails.find(function(classDetail) {
              return classDetail.class_name === selectedClassName;
            });

            if (selectedClassDetails) {
              // Update the remaining fields with the class details
              $("input[name='fees']").val(selectedClassDetails.fees);
              $("input[name='nfd']").val(selectedClassDetails.nfd);
            }
          });
        }
      });
    } else {
      $("#class_details").html(""); // Clear the details if no class is selected
      $("#className").replaceWith('<input id="className" name="classname" type="text" class="form-control" placeholder="Class Name" aria-label="classname">');
    }
  });
});


</script>
  
 <script>
  $(document).ready(function() {
    $('#customerDetails').on('change', function() {
      var selectedName = $(this).val();

      $.ajax({
        type: 'POST',
        url: 'fetch_student_data.php',
        data: { student_name: selectedName },
        dataType: 'json',
        success: function(data) {
         
          $('#father_name').val(data.father_name);
          $('#dob').val(data.dob);
        
          $('#address').val(data.address);
          $('#referencer').val(data.referencer);
        
          $('#phoneno').val(data.phoneno);
          $('#blood').val(data.blood);
         
        },
        error: function() {
          alert('Error retrieving student data.');
        }
      });
    });
  });
</script>

<script>
  // JavaScript code to provide placeholder-like behavior for the date input fields
  const dobInput = document.getElementById('dob');
  const llrInput = document.getElementById('llr');
  const llrValidInput = document.getElementById('llrValid');
  const classdate = document.getElementById('classdate');


  dobInput.addEventListener('focus', function() {
    dobInput.type = 'date';
    dobInput.setAttribute('min', '1970-01-01'); // Optional: Set a minimum date if needed
  });
  dobInput.addEventListener('blur', function() {
    if (dobInput.value === '') {
      dobInput.type = 'text';
      dobInput.value = 'Date of Birth';
    }
  });

  llrInput.addEventListener('focus', function() {
    llrInput.type = 'date';
    llrInput.setAttribute('min', '1970-01-01'); // Optional: Set a minimum date if needed
  });
  llrInput.addEventListener('blur', function() {
    if (llrInput.value === '') {
      llrInput.type = 'text';
      llrInput.value = 'LLR Date';
    }
  });

  llrValidInput.addEventListener('focus', function() {
    llrValidInput.type = 'date';
    llrValidInput.setAttribute('min', '1970-01-01'); // Optional: Set a minimum date if needed
  });
  llrValidInput.addEventListener('blur', function() {
    if (llrValidInput.value === '') {
      llrValidInput.type = 'text';
      llrValidInput.value = 'LLR Validity Date';
    }
  });


  classdate.addEventListener('focus', function() {
    classdate.type = 'date';
    classdate.setAttribute('min', '1970-01-01'); // Optional: Set a minimum date if needed
  });
classdate.addEventListener('blur', function() {
    if (classdate.value === '') {
      classdate.type = 'text';
      classdate.value = 'classdate';
    }
  });
</script>
