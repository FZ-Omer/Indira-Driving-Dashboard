<?php 
include("../../connect.php");
$sql = "SELECT * FROM enquiry";
$result = $conn->query($sql);
?>

<?php
include("admin-header.php");
?>


<!-- partial -->
<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-8 mx-auto mt-5">
          <div class="card" style="box-shadow: rgba(0, 0, 0, 0.56) 0px 22px 70px 4px; ">
            <div class="card-header bg-danger text-white">
              <h1 class="mb-0">Enquiry</h1>
            </div>
            <div class="card-body table-responsive">
              <table id="myTable" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Student Name</th>
                    <th>Mobile Number</th>
                    <th>Email Id</th>
                    <th>Start Date</th>
                    <th>Time</th>
                    <th>Classes</th>
                    <th>Remarks</th>
                    <th>Interest</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    
                  <?php
                  if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                      $class_id = $row['id']; // Get the class ID
                      ?>
                      <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td><?php echo $row['date_of_joining']; ?></td>
                        <td><?php echo $row['time']; ?></td>
                        <td><?php echo $row['emailid']; ?></td>
                        <td><?php echo $row['class']; ?></td>
                        <td><?php echo $row['remarks']; ?></td>
                        <td><?php echo $row['enquiry_interest']; ?></td>

                        <td>
                        <a class="btn btn-info edit-enquiry-btn" data-bs-toggle="modal" data-bs-target="#editEnquiry" data-class-id="<?php echo $row['id']; ?>">Edit</a><br><br>
                          <a class="btn btn-danger" href="employee_delete.php?id=<?php echo $row['id']; ?>" onclick="confirmDelete(event)">Delete</a>
                        </td>
                      </tr>
                       <?php
    }
  } else {
    echo "<tr><td colspan='6'>No classes found</td></tr>";
  }
  ?>
                </tbody>
              </table>
            </div>
            <div class="card-footer text-center">
              <a href="enquiry.php"><button class="button-34">+ Add Enquiry</button></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!--enquiry Modal Box-->
<div class="modal fade" id="editEnquiry" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Update Enquiry Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Add your form fields here to allow users to edit the details -->
         <h4 class="card-title">Enquiry Details</h4>
          <form id="editForm" action="enquiry_interest_update.php" method="post">
          <input type="hidden" name="id" id="modalInputId" value="">
         <div class="row">
        <div class="col-12 form-group">
          <!-- LLR Date Input -->
          <label for="status">Select Status:</label>
            <select required name="enquiry_interest" class="form-control" id="status">
              <option>Select Interest</option>
              <option value="Interested">Interested</option>
              <option value="Not Interested">Not Interested</option>
            </select>
        </div>
      </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="update_enquiry" class="btn btn-primary">Update Enquiry</button>
    </div>
        </form>
      </div>
      
    </div>
  </div>

<?php
include("admin-footer.php");
?>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var editEnquiryButtons = document.querySelectorAll(".edit-enquiry-btn");
        var modalInputId = document.getElementById("modalInputId");
        
        editEnquiryButtons.forEach(function(button) {
            button.addEventListener("click", function() {
                var classId = button.getAttribute("data-class-id");
                modalInputId.value = classId;
            });
        });
    });
</script>

