<?php
include '../config.php';

$pid = $_GET['id'];

$sql = "DELETE from categories where id = '$pid'";

$res = $conn->query($sql);
if ($res) {
    header("Location: ../../manage_category.php");
}
