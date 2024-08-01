<?php

include '../config.php';
$id = $_GET['id'];

$sql = "SELECT * from categories where id = '$id'";
$res = $conn->query($sql);
$data = $res->fetch_assoc();
echo json_encode($data);
