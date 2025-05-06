<?php
include 'db.php';

$data = json_decode(file_get_contents("php://input"), true);

$id = $data['id'];
$name = $data['name'];
$quantity = $data['quantity'];
$price = $data['price'];

$sql = "INSERT INTO products (id, name, quantity, price) VALUES ('$id', '$name', '$quantity', '$price')";

if ($conn->query($sql) === TRUE) {
    echo "Product added successfully!";
} else {
    echo "Error: " . $conn->error;
}
$conn->close();
?>
