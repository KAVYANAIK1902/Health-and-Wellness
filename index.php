<?php
include './includes/config.php';


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    <?php include './includes/header.php'; ?>
    <?php include './includes/nav.php'; ?>


    <!-- Swiper -->
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="./includes/img/carousel6.webp" alt="image"></div>
            <div class="swiper-slide"><img src="./includes/img/carousel5.webp" alt="image"></div>
            <div class="swiper-slide"><img src="./includes/img/carousel4.webp" alt="image"></div>
            <div class="swiper-slide"><img src="./includes/img/hel.jpg" alt="image"></div>

        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div>

    <div class="container" style="display: flex;align-items:center;justify-content:center;gap:10px">
        <i class="fa-solid fa-filter" style="font-size: 24px;"></i>
        <p class="mb-0 fs-2 lh-1">Select Category</p>
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
        ?>

    </div>

    <div class="container shadow" style="margin-top: 50px; width:80%">
        <h1 class="text-center">Top Deals & Offers</h1>
        <div class="swiper mySwiper2">
            <div class="swiper-wrapper">

                <?php
                $sql = "SELECT id, name, description, price, discount_price, (price - discount_price) AS discount_amount,category_id,image, created_at FROM products WHERE discount_price IS NOT NULL ORDER BY discount_amount DESC LIMIT 5;";
                $result = $conn->query($sql);
                if ($result) :
                    while ($data = $result->fetch_assoc()) :
                ?>
                        <div class="swiper-slide">
                            <div class="card" style="width: 18rem;">
                                <a href="./product-view.php?pid=<?php echo $data['id']; ?>"><img src="./includes/img/products/<?php echo $data['image']; ?>" class="card-img-top" alt="Product Image"></a>
                                <div class="card-body">
                                    <a href="./product-view.php?pid=<?php echo $data['id']; ?>" style="text-decoration:none">
                                        <h5 class="card-title"><?php echo $data['name']; ?></h5>
                                    </a>
                                    <p class="card-text">
                                        <span class="text-danger font-weight-bold">₹<?php echo $data['price']; ?></span>
                                        <span class="text-muted ms-1"><s>₹<?php echo $data['discount_price']; ?></s></span>
                                    </p>
                                    <a href="./product-view.php?pid=<?php echo $data['id']; ?>" class="btn btn-outline-success">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                <?php
                    endwhile;
                endif;
                ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>

    <div class="container shadow" style="margin-top: 50px; width:80%">
        <h1 class="text-center">New Arrivals</h1>
        <div class="swiper mySwiper3">
            <div class="swiper-wrapper">

                <?php
                $sql = "SELECT id, name, description, price, discount_price, category_id, image, created_at FROM products ORDER BY created_at DESC LIMIT 5;";
                $result = $conn->query($sql);
                if ($result) :
                    while ($data = $result->fetch_assoc()) :
                ?>
                        <div class="swiper-slide">
                            <div class="card" style="width: 18rem;">
                                <a href="./product-view.php?pid=<?php echo $data['id']; ?>"><img src="./includes/img/products/<?php echo $data['image']; ?>" class="card-img-top" alt="Product Image"></a>
                                <div class="card-body">
                                    <a href="./product-view.php?pid=<?php echo $data['id']; ?>" style="text-decoration:none">
                                        <h5 class="card-title"><?php echo $data['name']; ?></h5>
                                    </a>
                                    <p class="card-text">
                                        <span class="text-danger font-weight-bold">₹<?php echo $data['price']; ?></span>
                                        <span class="text-muted ms-1"><s>₹<?php echo $data['discount_price']; ?></s></span>
                                    </p>
                                    <a href="./product-view.php?pid=<?php echo $data['id']; ?>" class="btn btn-outline-success">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                <?php
                    endwhile;
                endif;
                ?>

            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>

    <?php include './includes/footer.php' ?>

    <?php include './includes/bundle.php' ?>
    <script src="./includes/js/main.js"></script>
</body>

</html>