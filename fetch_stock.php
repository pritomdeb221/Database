<?php
include 'db.php';

$sql = "SELECT item_id, item_name, quantity, price_per_unit FROM stock";
$result = $conn->query($sql);

echo "<table class='table w-full'>";
echo "<thead><tr><th>Item ID</th><th>Item Name</th><th>Quantity</th><th>Price</th></tr></thead><tbody>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['item_id']}</td>
                <td>{$row['item_name']}</td>
                <td>{$row['quantity']}</td>
                <td>{$row['price_per_unit']}</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='4' class='text-center'>No stock available</td></tr>";
}
echo "</tbody></table>";
$conn->close();
?>
