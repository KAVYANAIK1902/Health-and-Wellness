<?php
include './config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get cart_id and new quantity from POST data
    $cartId = $_POST['cart_id'];
    $newQuantity = $_POST['quantity'];

    // Prepare and execute the update query
    $stmt = $conn->prepare("UPDATE cart SET quantity = '$newQuantity' WHERE id = ?");
    $stmt->bind_param("s", $cartId);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Quantity updated successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to update quantity']);
    }
}
