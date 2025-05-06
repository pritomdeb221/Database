<?php
// DB connection
$conn = new mysqli("localhost", "root", "", "super_shop");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query delivery data
$sql = "SELECT delivery_id, name, contact, status, area FROM delivery_personnel";
$result = $conn->query($sql);

// Output table
if ($result->num_rows > 0) {
    echo "<table class='table w-full'>
            <thead>
                <tr>
                    <th>Delivery ID</th>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Status</th>
                    <th>Area</th>
                </tr>
            </thead>
            <tbody>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['delivery_id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['contact']}</td>
                <td>{$row['status']}</td>
                <td>{$row['area']}</td>
              </tr>";
    }
    echo "</tbody></table>";
} else {
    echo "<p>No delivery data found.</p>";
}

$conn->close();
?>
