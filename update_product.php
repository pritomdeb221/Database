<?php
include 'db.php';

$data = json_decode(file_get_contents("php://input"), true);

$id = $data['id'];
$name = $data['name'];
$quantity = $data['quantity'];
$price = $data['price'];

$sql = "UPDATE products SET name='$name', quantity='$quantity', price='$price' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Product updated successfully!";
} else {
    echo "Error: " . $conn->error;
}
$conn->close();
?>
