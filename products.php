<?php
include './includes/config.php';


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
</head>

<body>
    <?php include './includes/header.php'; ?>
    <?php include './includes/nav.php'; ?>

    <div class="container" style="display: flex;align-items:center;justify-content:center;gap:10px">
        <i class="fa-solid fa-filter" style="font-size: 16px;"></i>
        <p class="mb-0 fs-5 lh-1">Categories</p>
    </div>

    <div class="container mt-2" style="display: flex;align-items:center;justify-content:center;gap:10px">
        <?php
        $sql = "SELECT * from categories";
        $result = $conn->query($sql);
        if ($result) :
            while ($data = $result->fetch_assoc()) :
        ?>
                <a href="./products.php?category=<?php echo $data['id']; ?>">
                    <div class="btn btn-outline-success"><?php echo $data['name']; ?></div>
                </a>
            <?php
            endwhile;
        endif;

        if (isset($_GET['category']) or isset($_GET['search'])) {
            ?>
            <a href="./products.php"><button class="btn btn-close btn-close-dark"></button></a>
        <?php } ?>

    </div>

    <div class="container mt-5">
        <div class="row">

            <?php
            if (isset($_GET['category'])) {
                $sql = "SELECT * from products where category_id = " . $_GET['category'];
            } elseif (isset($_GET['search'])) {
                $sql = "SELECT id, name, description, price, discount_price, category_id, image, created_at FROM products WHERE name LIKE CONCAT('%', '" . $_GET['search'] . "', '%') OR description LIKE CONCAT('%', '" . $_GET['search'] . "', '%');";
            } else {
                $sql = "SELECT * from products";
            }
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
                                <a href="./product-view.php?pid=<?php echo $data['id']; ?>" class="btn btn-outline-light">Add to Cart</a>
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