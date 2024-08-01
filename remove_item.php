<?php
include './config.php';

$cart_id = $_GET['id'];

$sql = "DELETE from cart where id = '$cart_id'";
$res = $conn->query($sql);

if ($res) header("Location: ../cart.php");
