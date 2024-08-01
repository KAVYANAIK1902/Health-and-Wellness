<?php
include './config.php';

$w_id = $_GET['wid'];

$sql = "DELETE from wishlist where id = '$w_id'";
$res = $conn->query($sql);

if ($res) header("Location: ../wishlist.php");
