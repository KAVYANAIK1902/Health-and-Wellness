<?php

include '../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['productId'];
    $name = $_POST['p_name'];
    $description = $_POST['editDescription'];
    $price = $_POST['price'];
    $d_price = $_POST['d_price'];
    $stock = $_POST['stock'];

    $sql = "UPDATE `products` SET `name`='$name',`description`='$description',`price`='$price',`discount_price`='$d_price',`stock`='$stock' WHERE id = '$id'";
    $res = $conn->query($sql);
    if ($res)
        header("Location: ../../manage_products.php");
    else
        echo "Error while executing : " . $conn->error;
}
