<?php
include 'db.php';

// Get category from the request, default to 'All' if no category is provided
$category = isset($_GET['category']) ? $_GET['category'] : 'All';

// SQL query to fetch products based on category
if ($category == 'All') {
    $sql = "SELECT * FROM products";
} else {
    $sql = "SELECT * FROM products WHERE category = '$category'";
}

$result = $conn->query($sql);
$products = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}

// Return products as JSON
echo json_encode($products);

$conn->close();
?>
