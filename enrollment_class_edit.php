<?php
// personal_edit.php

// Include your database connection code
include("../../connect.php");

// Check if the form was submitted and the student ID is provided
if (isset($_POST['update_class'])) {
    // Get the student ID from the form data
    $student_id = $_POST['id'];

    // Get the form data
    $course_package = $_POST['package'];
    $class_name = $_POST['classname'];
    $class_time = $_POST['class_time'];
    $nfd = $_POST['nfd'];

    // Perform the SQL update query to update the enrollment details in the database
    $sql = "UPDATE enrollment SET package = '$course_package', classname = '$class_name', class_time = '$class_time', nfd = '$nfd' WHERE id = $student_id";

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