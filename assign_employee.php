<?php
include 'db.php';

$name = $_POST['empName'];
$id = $_POST['empID'];
$age = $_POST['empAge'];
$sex = $_POST['empSex'];

// File upload
$photo = $_FILES['empPhoto'];
$target = "uploads/" . basename($photo["name"]);
move_uploaded_file($photo["tmp_name"], $target);

$sql = "INSERT INTO employees (emp_id, name, age, sex, photo) VALUES ('$id', '$name', '$age', '$sex', '$target')";

if ($conn->query($sql) === TRUE) {
    echo "Employee assigned successfully.";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>