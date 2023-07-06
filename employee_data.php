<?php
include '../../connect.php';
// Assuming you have established a database connection
$name = $_POST['name'];
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$role = $_POST['role'];
$phone = $_POST['phone'];
$dateOfJoining = $_POST['date_of_joining'];
$salaryAmount = $_POST['salary_amount'];
$salaryDate = $_POST['salary_date'];
$dailyAllowance = $_POST['daily_allowance'];
$bonus = $_POST['bonus'];
$workingTime = $_POST['working_time'];
$increment = $_POST['increment'];

$sql = "INSERT INTO users (name, username, password, role, phone, date_of_joining, salary_amount, salary_date, daily_allowance, bonus, working_time, increment) VALUES ('$name', '$username', '$password', '$role', '$phone', '$dateOfJoining', '$salaryAmount', '$salaryDate', '$dailyAllowance', '$bonus', '$workingTime', '$increment')";
$result = mysqli_query($conn, $sql);

if ($result) {
  echo "User registered successfully.";
} else {
  echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
