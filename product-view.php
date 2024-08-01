<?php
include './includes/config.php';
include './includes/functions.php';

$pid = $_GET['pid'];
$sql = "SELECT * from products where id = '$pid'";
$res = $conn->query($sql);
if ($res) {
    $data = $res->fetch_assoc();
}
if ($data['stock'] > 0)
    $stock = "Available.";
else
    $stock = "Out of stock.";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>product - view</title>
</head>

<body>
    <?php include './includes/header.php'; ?>
    <?php include './includes/nav.php'; ?>

    <!-- Product Details Page -->
    <div class="container mt-5">
        <div class="row">
            <!-- Product Image -->
            <div class="col-md-6 shadow">
                <!-- Swiper -->
                <div class="swiper mySwiper4">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide"><img src="./includes/img/products/<?php echo $data['image']; ?>" class="img-fluid" alt="Product Image"></div>
                        <div class="swiper-slide"><img src="./includes/img/products/<?php echo $data['image2']; ?>" class="img-fluid" alt="Product Image"></div>
                        <div class="swiper-slide"><img src="./includes/img/products/<?php echo $data['image3']; ?>" class="img-fluid" alt="Product Image"></div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
            <!-- Product Information -->
            <div class="col-md-6">
                <h2><?php echo $data['name']; ?></h2>
                <p><strong>Description:</strong> <?php echo $data['description']; ?></p>
                <p><strong>Price:</strong> <span class="text-danger font-weight-bold">₹<?php echo $data['price']; ?></span> <span class="text-muted"><s>₹<?php echo $data['discount_price']; ?></s></span></p>
                <p class="text-muted">Status: <?php echo $stock; ?></p>
                <p class="text-muted">In Stock: <?php echo $data['stock']; ?></p>
                <form method="POST">
                    <input type="hidden" name="pid" value="<?php echo $pid; ?>">
                    <input type="hidden" name="uid" value="<?php echo $uid; ?>">
                    <div class="form-group">
                        <label for="quantity">Quantity:</label>
                        <input type="number" name="qty" class="form-control" id="quantity" value="1" min="1" max="<?php echo $data['stock']; ?>" <?php if ($data['stock'] == 0) echo "disabled"; ?> style="max-width: 100px;">
                    </div>
                    <?php if ($data['stock'] != 0) { ?>
                        <button type="submit" name="add_cart" class="btn btn-warning mt-3">Add to Cart</button>
                    <?php } ?>
                    <button type="submit" name="add_wishlist" class="btn btn-danger mt-3">Add to Favourites</button>
                </form>
            </div>
        </div>
    </div>

    <?php include './includes/footer.php' ?>
    <?php include './includes/bundle.php'; ?>
    <script src="./includes//js/main.js"></script>
</body>

</html>