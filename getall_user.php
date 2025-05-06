<?php
// getall_user.php
$host = "localhost";
$user = "root";
$pass = "";
$db = "super_shop"; // Change this to your DB name

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT emp_id, name, age, sex FROM employee"; // Adjust column names as per your table
$result = $conn->query($sql);

echo "<h2 class='text-xl font-bold mb-4'>All Employees</h2>";
if ($result->num_rows > 0) {
    echo "<div class='overflow-x-auto'>";
    echo "<table class='table w-full border'>";
    echo "<thead><tr><th>ID</th><th>Name</th><th>Age</th><th>Sex</th></tr></thead><tbody>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['emp_id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['age']}</td>
                <td>{$row['sex']}</td>
              </tr>";
    }
    echo "</tbody></table></div>";
} else {
    echo "<p>No employees found.</p>";
}

$conn->close();
?>
