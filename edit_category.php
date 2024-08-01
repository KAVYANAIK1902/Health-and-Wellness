<?php

include '../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $desc = $_POST['desc'];

    $sql = "UPDATE categories set name = '$name' , description = '$desc' where id = '$id'";
    $res = $conn->query($sql);
    if ($res)
        header("Location: ../../manage_category.php");
    else
        echo "Error happened : " . $conn->error;
}
