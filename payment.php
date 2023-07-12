


<?php
include("admin-header.php");
?>

<!-- partial -->
<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row" >
        
        
       
       
        <div class="col-md-8 grid-margin stretch-card" >
          <div class="card offset-3 " style="box-shadow: rgba(0, 0, 0, 0.56) 0px 22px 70px 4px;">
            <div class="card-header" style="background-color: #c55a0c;">
              <h1 class="text-white">Payment</h1>
              
            </div>
            <div class="card-body">
              <h4 class="card-title">Payment Details</h4>
              <form action="employee_post.php" method="post">
                <div class="row">
                  <div class="col-6 form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text text-white" style="background-color: #631e38;" ><i class="mdi mdi-account"></i></span>
                      </div>
                      <input name="name" type="text" class="form-control" placeholder="Full Name" aria-label="Full name">
                    </div>
                  </div>
                  <div class="col-6 form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text text-white" style="background-color: #631e38;"><i class="mdi mdi-phone-plus"></i></span>
                      </div>
                      <input name="class_name" type="text" class="form-control" placeholder="Class Name" aria-label="class_name">
                      
                    </div>
                  </div>
                </div>

                <div class="row">
                 
                  <div class="col-12 form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text text-white" style="background-color: #631e38;"><i class="mdi mdi-calendar-check"></i></span>
                      </div>
                      <input type="text" class="form-control" placeholder="Total Amount" id="total_amt" name="total_amt" required> 
                    </div>
                  </div>
                </div>


                <h4 class="card-title">Payment Remarks</h4>
                
                <div class="row">
                  <div class="col-6 form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text text-white" style="background-color: #631e38;" ><i class="mdi mdi-cash"></i></span>
                      </div>
                      <input name="paid_amt" type="text" class="form-control" placeholder="Paid Amount" aria-label="paid_amt">
                    </div>
                  </div>
                  <div class="col-6 form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text text-white" style="background-color: #631e38;"><i class="mdi mdi-calculator"></i></span>
                      </div>
                      <input type="text" class="form-control" placeholder="Remarks" id="remarks" name="remarks" required> 
                      
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-6 form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text text-white" style="background-color: #631e38;" ><i class="mdi mdi-clipboard-check"></i></span>
                      </div>
                      <input name="bal_amt" type="text" class="form-control" placeholder="Balance Amount" aria-label="bal_amt">
                    </div>
                  </div>

                   <div class="col-6 form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text text-white" style="background-color: #631e38;" ><i class="mdi mdi-clipboard-check"></i></span>
                      </div>
                      <select>
                        <option value="pending">Pending</option>
                        <option value="cancel">Cancel</option>
                        <option value="completed">Completed</option>
                      </select>
                    </div>
                  </div>
                 
                </div>

             
                

            
                
               
               

                <button type="submit" name="staff_details" class="btn btn-success ">Save</button>
              </form>
              <br>
              <a href="employee_list.php"> <button  class="btn btn-danger">Cancel</button></a> 
              
              
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
<!-- End custom js for this page-->
<script>
    // JavaScript code to provide placeholder-like behavior for the date input field
    const dateInput = document.getElementById('date_of_joining');
    dateInput.addEventListener('focus', function() {
      dateInput.type = 'date';
      dateInput.setAttribute('min', '1970-01-01'); // Optional: Set a minimum date if needed
    });
    dateInput.addEventListener('blur', function() {
      if (dateInput.value === '') {
        dateInput.type = 'text';
        dateInput.value = 'date_of_joining';
      }
    });
  </script>
  <script>
    // JavaScript code to provide placeholder-like behavior for the date input field
    const dateInput1 = document.getElementById('salary_date');
    dateInput1.addEventListener('focus', function() {
      dateInput1.type = 'date';
      dateInput1.setAttribute('min', '1970-01-01'); // Optional: Set a minimum date if needed
    });
    dateInput.addEventListener('blur', function() {
      if (dateInput1.value === '') {
        dateInput1.type = 'text';
        dateInput1.value = 'salary_date';
      }
    });
  </script>



