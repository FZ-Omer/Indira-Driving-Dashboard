<?php
include("../../connect.php");

if (isset($_POST['update_status'])) {
  $class_id = $_POST['class_id'];
  $status = $_POST['status'];

  // Update the class details in the database
  $sql = "UPDATE enrollment SET status = '$status' WHERE id = '$class_id'";
  $result = $conn->query($sql);

  if ($result === TRUE) {
    if ($status === 'Dispatched') {
      $license_no = $_POST['license_no'];

      // Insert the license number into the same table
      $sql2 = "UPDATE enrollment SET license_no = '$license_no' WHERE id = '$class_id'";
      $result2 = $conn->query($sql2);

      if ($result2 === TRUE) {
        $error = 'Your Status and License Number Updated Successfully!';
      } else {
        $error = 'Error updating License Number: ' . $conn->errormysqli_error($conn);
      }
    } else {
      $error = 'Your Status Updated Successfully!';
    }

    header("Location: enrollment_list.php?error=" . urlencode($error));
    exit;
  } else {
    echo "Error: " . $sql . "<br>" . $conn->errormysqli_error($conn);
  }
}
?>
