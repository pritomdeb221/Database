<?php
include 'db.php';

$id = $_POST['searchEmpID'];
$name = $_POST['searchEmpName'];

$sql = "SELECT * FROM employees WHERE emp_id = '$id' OR name LIKE '%$name%'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["emp_id"] . " - Name: " . $row["name"] . " - Age: " . $row["age"] . "<br>";
    }
} else {
    echo "No employee found.";
}

$conn->close();
?>
