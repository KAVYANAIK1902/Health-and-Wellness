<?php
include '../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name  = $_POST['name'];
    $email  = $_POST['email'];
    $password  = $_POST['password'];
    $phone  = $_POST['phone'];

    $sql = "INSERT into users (name,phone,email,password) values ('$name','$phone','$email','$password')";
    $res = $conn->query($sql);
    if ($res)
        header('Location: ../../manage_users.php');
    else
        echo "Error while creating user account : " . $conn->error;
}
