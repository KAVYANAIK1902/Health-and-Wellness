<?php
include '../config.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['p_name'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $d_price = $_POST['d_price'];
    $stock = $_POST['stock'];
    $img1 = $_FILES['img1'];
    $img2 = $_FILES['img2'];
    $img3 = $_FILES['img3'];

    $target_dir = '../../../includes/img/products/';
    $target_file = $target_dir . basename($_FILES["img1"]["name"]);
    $target_file2 = $target_dir . basename($_FILES["img2"]["name"]);
    $target_file3 = $target_dir . basename($_FILES["img3"]["name"]);

    $img1_status = move_uploaded_file($_FILES["img1"]["tmp_name"], $target_file);
    $img2_status = move_uploaded_file($_FILES["img2"]["tmp_name"], $target_file2);
    $img3_status = move_uploaded_file($_FILES["img3"]["tmp_name"], $target_file3);

    if ($img1_status and $img2_status and $img3_status) {
        $img1_name = basename($_FILES["img1"]["name"]);
        $img2_name = basename($_FILES["img2"]["name"]);
        $img3_name = basename($_FILES["img3"]["name"]);

        $sql = "INSERT INTO `products`( `name`, `description`, `price`, `discount_price`, `category_id`, `image`, `image2`, `image3`, `stock`) 
        VALUES ('$name','$description','$price','$d_price','$category','$img1_name','$img2_name','$img3_name', '$stock')";

        $res = $conn->query($sql);
        if ($res) {
            header("Location: ../../manage_products.php");
        } else {
            echo "An error occured while inserting into database: " . $conn->error;
        }
    } else {
        echo "Image was not uploaded hence the product is not added.";
    }
}
