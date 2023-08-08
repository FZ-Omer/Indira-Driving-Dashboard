<?php
// personal_edit.php

// Include your database connection code
include("../../connect.php");



// Check if the form was submitted and the student ID is provided
if (isset($_POST['update_cancelled'])) {
    // Get the student ID from the form data

    $enroll_id = $_POST['id'];
    // Get the form data


    $new_status = $_POST['status'];

    // Perform the SQL update query to update the enrollment details in the database
    $sql = "UPDATE enrollment SET status = '$new_status' WHERE id = $enroll_id";

    // Execute the update query
    if ($conn->query($sql) === TRUE) {
        // Update successful, redirect to a success page or show a success message
        header("Location: enrollment_list.php");
        exit();
    } else {
        // Update failed, display an error message or redirect to an error page
        echo "Error updating enrollment details: " . $conn->mysqli_error($conn);
    }
    
}
?>