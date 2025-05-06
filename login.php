<?php
$servername = "localhost";
$username = "root"; // Change this if needed
$password = "";     // Change this if needed
$dbname = "super_shop";

// Connect to DB
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$userId = $_POST['userId'];
$pass = $_POST['password'];

$sql = "SELECT * FROM users WHERE user_id = ? AND password = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $userId, $pass);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    // Successful login
    header("Location: dashboard.html");
    exit();
} else {
    // Failed login
    echo "<script>
            alert('Invalid credentials. Please try again.');
            window.history.back();
          </script>";
}

$stmt->close();
$conn->close();
?>
