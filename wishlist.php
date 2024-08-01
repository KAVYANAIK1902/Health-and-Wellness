<?php
include './includes/config.php';
include './includes/functions.php';

if (isset($_SESSION['uid'])) {
    $uid = $_SESSION['uid'];
} else {
    echo "<script>if (confirm('Please login or register to open your wishlist.')) { window.location.href = './login.php';} ;</script>";
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favourites</title>
</head>

<body>
    <?php include './includes/header.php'; ?>
    <?php include './includes/nav.php'; ?>

    <div class="container mt-5">
        <div class="row">

            <?php
            $sql = "SELECT p.*,w.id as w_id from products p join wishlist w on w.product_id = p.id where w.user_id = '$uid'";
            $result = $conn->query($sql);
            if ($result) :
                while ($data = $result->fetch_assoc()) :
            ?>
                    <div class="col-md-4 mb-4">
                        <div class="card" style="width: 70%;">
                            <a href="./product-view.php?pid=<?php echo $data['id']; ?>"><img src="./includes/img/products/<?php echo $data['image']; ?>" class="card-img-top" alt="Product Image"></a>
                            <div class="card-body bg-success text-light">
                                <a href="./product-view.php?pid=<?php echo $data['id']; ?>" style="text-decoration:none">
                                    <h5 class="card-title text-light"><?php echo $data['name']; ?></h5>
                                </a>
                                <p class="card-text">
                                    <span class="text-light font-weight-bold">₹<?php echo $data['price']; ?></span>
                                    <span class="text- text-dark ms-1"><s>₹<?php echo $data['discount_price']; ?></s></span>
                                </p>
                                <div class="mb-3">
                                    <a href="./product-view.php?pid=<?php echo $data['id']; ?>" class="btn btn-outline-light">Add to Cart</a>
                                    <a href="./includes/remove_item_wishlist.php?wid=<?php echo $data['w_id']; ?>" class="btn btn-outline-warning">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                endwhile;
            endif;
            ?>

        </div>
    </div>

    <?php include './includes/footer.php' ?>
    <?php include './includes/bundle.php'; ?>
</body>

</html>