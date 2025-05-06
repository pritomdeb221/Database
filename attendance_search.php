<?php
// attendance_search.php
$host = "localhost";
$user = "root";
$pass = "";
$db = "super_shop"; // Change this if needed

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT emp_id, date, status FROM attendance ORDER BY date DESC"; // Change if needed
$result = $conn->query($sql);

echo "<h2 class='text-xl font-bold mb-4'>Attendance Records</h2>";
if ($result->num_rows > 0) {
    echo "<div class='overflow-x-auto'>";
    echo "<table class='table w-full border'>";
    echo "<thead><tr><th>Employee ID</th><th>Date</th><th>Status</th></tr></thead><tbody>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['emp_id']}</td>
                <td>{$row['date']}</td>
                <td>{$row['status']}</td>
              </tr>";
    }
    echo "</tbody></table></div>";
} else {
    echo "<p>No attendance records found.</p>";
}

$conn->close();
?>
