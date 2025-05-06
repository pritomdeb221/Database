<?php
session_start();

// Check if there is a cart and if it's not empty
if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
    // Process the cart (save to database or send an email, etc.)
    
    // For now, just clear the cart and return a success message
    $_SESSION['cart'] = [];
    echo json_encode(["status" => "success", "message" => "Purchase completed successfully!"]);
} else {
    echo json_encode(["status" => "error", "message" => "No items in cart."]);
}
?>
