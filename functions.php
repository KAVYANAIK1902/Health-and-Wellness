<?php

if (isset($_POST['add_cart'])) {
    if (!isset($_SESSION['uid'])) {
        echo "<script>alert('Please login or register to add to cart.');</script>";
    } else {
        $uid = $_SESSION['uid'];
        $pid = $_POST['pid'];
        $qty = $_POST['qty'];

        $sql = "SELECT * from cart where product_id = '$pid' and user_id = '$uid'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<script>alert('Product is already in cart.');</script>";
        } else {
            $sql = "INSERT into cart (user_id,product_id,quantity) values('$uid','$pid','$qty')";
            $result = $conn->query($sql);
            if ($result) {
                echo "<script>alert('Product added to cart.');</script>";
            } else {
                echo "<script>alert('Product couldn't be added to cart.');</script>";
            }
        }
    }
}

if (isset($_POST['add_wishlist'])) {
    if (!isset($_SESSION['uid'])) {
        echo "<script>alert('Please login or register to add to cart.');</script>";
    } else {
        $uid = $_SESSION['uid'];
        $pid = $_POST['pid'];

        $sql = "SELECT * from wishlist where product_id = '$pid' and user_id = '$uid'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<script>alert('Product is already in wishlist.');</script>";
        } else {
            $sql = "INSERT into wishlist (user_id,product_id) values('$uid','$pid')";
            $result = $conn->query($sql);
            if ($result) {
                echo "<script>alert('Product added to Favourites.');</script>";
            } else {
                echo "<script>alert('Product couldn't be added to Favourites.');</script>";
            }
        }
    }
}

if (isset($_POST['place_order'])) {
    if (!isset($_SESSION['uid'])) {
        echo "<script>alert('Please login or register to add to cart.');</script>";
    } else {
        $uid = $_SESSION['uid'];
        $total = $_POST['total_grand'];
        $address = $_POST['address'];
        $p_method = $_POST['payment'];
        if ($p_method == 'upi' or $p_method == 'card')
            $p_status = 'completed';
        else
            $p_status = 'pending';
        $status = 'In process';

        $sql = "INSERT into orders (user_id,total,address,payment_method,payment_status,status) values ('$uid','$total','$address','$p_method','$p_status','$status')";
        $conn->query($sql);
        $o_id = $conn->insert_id;
        if ($o_id != null) {
            $sql2 = "SELECT * from cart where user_id = '$uid'";
            $res2 = $conn->query($sql2);

            while ($data = $res2->fetch_assoc()) {
                $pid = $data['product_id'];
                $qty = $data['quantity'];
                $sql4 = "SELECT discount_price from products where id = '$pid'";
                $res4 = $conn->query($sql4);
                $d_price = $res4->fetch_assoc();
                $price = $d_price['discount_price'] * $qty;
                $sql3 = "INSERT into order_items(order_id,product_id,price,quantity) values ('$o_id','$pid','$price','$qty')";
                $conn->query($sql3);
            }

            $sql3 = "DELETE from cart where user_id = '$uid'";
            $res3 = $conn->query($sql3);
            if ($res3)
                header('Location: bill.php?id=' . $o_id);
            else
                echo "Error while placing your order: " . $conn->error;
        }
    }
}
