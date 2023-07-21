<?php
include("../../connect.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM `enrollment` WHERE `id`='$id'";
    $result = $conn->query($sql);

    // Check if the record exists
    if ($result->num_rows > 0) {
        // Fetch the details for the selected ID
    $row = $result->fetch_assoc();
        $enr_id = $row['enr_id'];
        $student_name = $row['student_name'];
        $father_name = $row['father_name'];
        $package = $row['package'];
        $class_time = $row['class_time'];
        $classname = $row['classname'];
        $fees = $row['fees'];
        $llr = $row['llr'];
        $amount_paid = $row['amount_paid'];
        $phoneno = $row['phoneno'];
        $address = $row['address'];
        $photo = $row['photo'];
        $prev_paid = $row['previous_paid'];
        $balance_amount = $row['balance_amount'];



}
        // Rest of your code for HTML template
?>

<?php
include("../../connect.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM `student_attendance` WHERE `id`='$id'";
    $result = $conn->query($sql);

    // Check if the record exists
    if ($result->num_rows > 0) {
        // Fetch the details for the selected ID
    $row = $result->fetch_assoc();
        $student_id = $row['student_id'];
        $date = $row['date'];
        $status = $row['status'];




}
        // Rest of your code for HTML template
?>

<!-- Your HTML template code here, using the retrieved variables -->

<?php
    } else {
        // Handle if no matching record is found
        echo "No record found for the selected ID.";
    }
} else {
    // Handle if no ID is passed through the URL
    echo "Please select an ID to show details.";
}
?>




<!DOCTYPE html>
<html>

<head>
    <title>Receipt</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
              .receipt-main {
            background: #ffffff;
            border-bottom: 12px solid #333333;
            border-top: 12px solid #9f181c;
            margin-top: 50px;
            margin-bottom: 50px;
            padding: 40px 30px !important;
            position: relative;
            box-shadow: 0 1px 21px #acacac;
            color: #333333;
            font-family: "Arial", sans-serif;
        }

        .receipt-table th,
        .receipt-table td {
            padding: 8px 15px;
            font-size: 14px;
        }

        .receipt-table th {
            text-align: left;
        }

        .receipt-table.table-bordered {
             border: 2px solid red;
        }

        .receipt-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .receipt-header .receipt-table {
            flex: 1;
        }

        .receipt-header img {
            max-width: 200px;
            max-height: 150px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .receipt-footer {
            margin-top: 30px;
        }

        .receipt-footer h5 {
            font-size: 15px;
            font-weight: 400;
            color: #8c8c8c;
        }

        .receipt-footer .receipt-left h1 {
            font-size: 25px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .signature {
            border-top: 1px solid #ccc;
            padding-top: 10px;
            margin-top: 30px;
        }

        /* Custom CSS to position the image */
        .receipt-image-container {
            display: flex;
            justify-content: flex-end;
        }

        .receipt-image-container img {
            width: 200px;
            height: 150px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>


  
</head>

<body>
    <div class="container" >
        <div class="row justify-content-center">

            <div class="receipt-main col-md-8">
            	        	<img src="../images/logo.png" alt="logo" style="width:150px;height: 100px;margin-left: 18rem;"/>
                      	<h2 style="text-align: center;">Indira Driving School</h2>
                      	<h6 style="text-align: center;"> Anna Nagar, Madurai.</h6>
                      	 <h1 style="text-align: center;">Receipt</h1>

                <div class="receipt-header">

                      <div class="receipt-table mt-5">

                      	
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>Student Name:</th>
                                <td><?php echo $student_name; ?></td>
                            

                                <th>Enrol Id:</th>
                                <td><?php echo $enr_id; ?></td>
                            </tr>
                            <tr>
                                <th>Father Name:</th>
                                <td><?php echo $father_name; ?></td>
                            
                                <th>Class Type:</th>
                                <td><?php echo $package; ?></td>
                            </tr>
                            <tr>
                                <th>Class Name:</th>
                                <td><?php echo $classname; ?></td>
                           		 <th>Class Time:</th>
                                <td><?php echo $class_time; ?></td>
                                
                            </tr>
                            <tr>
                                <th>LLR Date:</th>
                                <td><?php echo $llr; ?></td>
                              
								<th>Fees:</th>
                                <td><?php echo $fees; ?></td>
                                
                            </tr>
                        </tbody>
                    </table>
                </div>

                  <div class="receipt-image-container">
                        <?php
                        $imageURL = 'uploads/' . $row["photo"];
                        if (!empty($row["photo"]) && file_exists($imageURL)) {
                            echo '<img src="' . $imageURL . '" class="img-thumbnail mt-4" width="100%" height="100%"/>';
                        } else {
                            echo 'Image not available';
                        }
                        ?>
                    </div>

                </div>


                <div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Description</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Example: Display the fetched data -->
                            <tr>
                                <td>Amount Paid </td>
                                <td><i class="fa fa-inr"></i><?php echo $amount_paid; ?>/-</td>
                            </tr>
                           
                            
                            <tr>
                                <td class="text-right">
                                 
                                    <p><strong>Previous Payable Amount: </strong></p>
                                    <p><strong>Balance Due: </strong></p>
                                </td>
                                <td>
                                  
                                    <p><strong><i class="fa fa-inr"></i> <?php echo $amount_paid; ?>/-</strong></p>
                                    <p><strong><i class="fa fa-inr"></i> <?php echo $balance_amount; ?>/-</strong></p>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-right"><h2><strong>Total: </strong></h2></td>
                                <td class="text-left text-danger"><h2><strong><i class="fa fa-inr"></i> <?php echo $amount_paid; ?>/-</strong></h2></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

              

<?php
include("../../connect.php");

// Check if the ID is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM `student_attendance` WHERE `student_id`='$id'";
    $result = $conn->query($sql);

    // Check if the record exists
    if ($result->num_rows > 0) {
        // Fetch the attendance data for the selected ID
        $row = $result->fetch_assoc();

        // Convert the serialized attendance data to an array
        $attendanceData = unserialize($row['attendance_data']);

        // Make sure $attendanceData is an array before proceeding
        if (is_array($attendanceData)) {
            // Now we have the attendance data in the $attendanceData array
            // Check if the attendance data is not empty
            if (!empty($attendanceData)) {
                echo '<div class="container">';
                echo '  <div class="row justify-content-center">';
                echo '      <div class="col-md-8">';
                echo '          <table class="table table-bordered">';
                echo '              <thead>';
                echo '                  <tr>';
                echo '                      <th>Column 1</th>';
                echo '                      <th>Column 2</th>';
                echo '                      <th>Column 3</th>';
                echo '                      <th>Column 4</th>';
                echo '                      <th>Column 5</th>';
                echo '                      <th>Column 6</th>';
                echo '                  </tr>';
                echo '              </thead>';
                echo '              <tbody>';

                // Loop through the attendance data and display it in the table
                foreach ($attendanceData as $rowData) {
                    echo '<tr>';
                    foreach ($rowData as $status) {
                        echo '<td>' . $status . '</td>';
                    }
                    echo '</tr>';
                }

                echo '              </tbody>';
                echo '          </table>';
                echo '      </div>';
                echo '  </div>';
                echo '</div>';
            } else {
                echo 'Attendance data is empty.';
            }
        } else {
            echo 'Failed to unserialize attendance data.';
        }
    } else {
        echo 'No record found for the selected ID.';
    }
} else {
    echo 'Please select an ID to show attendance details.';
}
?>

  <div class="row">
                    <div class="receipt-footer col-md-8">
                        <div class="receipt-right">
                            <p><b>Date :</b> 15 Aug 2016</p>
                            <h5>Thank you for your business!</h5>
                        </div>
                    </div>
                    <div class="signature col-md-4">
                        <h1>Signature</h1>
                    </div>
                </div>
        </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
