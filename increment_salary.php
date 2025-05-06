<?php
include 'db.php';

$id = $_POST['salaryEmpID'];
$increment = $_POST['incrementAmount'];

$sql = "UPDATE employees SET salary = salary + $increment WHERE emp_id = '$id'";

if ($conn->query($sql) === TRUE) {
    echo "Salary incremented successfully.";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
