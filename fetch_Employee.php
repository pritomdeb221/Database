<?php
// DB connection
$conn = new mysqli("localhost", "root", "", "super_shop");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query employee data
$sql = "SELECT employee_id, name, role, contact, email, salary FROM employees";
$result = $conn->query($sql);

// Output table
if ($result->num_rows > 0) {
    echo "<table class='table w-full'>
            <thead>
                <tr>
                    <th>Employee ID</th>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Salary</th>
                </tr>
            </thead>
            <tbody>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['employee_id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['role']}</td>
                <td>{$row['contact']}</td>
                <td>{$row['email']}</td>
                <td>{$row['salary']}</td>
              </tr>";
    }
    echo "</tbody></table>";
} else {
    echo "<p>No employee data found.</p>";
}

$conn->close();