<?php
if (isset($_SESSION['uid'])) {
    $url = "./dashboard.php";
} else {
    $url = "./login.php";
}
?>
<header class="bg-success py-3">
    <div class="container">
        <div class="row align-items-center">
            <!-- Title -->
            <div class="col-md-7 col-8">
                <a href="./index.php" style="text-decoration: none;">
                    <h1 class="text-light h4 mb-0">Health & Wellness</h1>
                </a>
            </div>
            <!-- Account Icon -->
            <div class="col-md-2 text-right">
                <a href="<?php echo $url; ?>" class="btn btn-outline-dark mr-2">
                    <i class="fas fa-user" style="color: #fff;"></i>
                </a>
                <a href="./wishlist.php" class="btn btn-outline-dark mr-2">
                    <i class="fa-regular fa-heart" style="color: #fff;"></i>
                </a>
                <a href="./cart.php" class="btn btn-outline-dark">
                    <i class="fa-solid fa-cart-shopping" style="color: #fff;"></i>
                </a>
            </div>
            <!-- Search Bar -->
            <div class="col-md-3">
                <form class="d-flex float-right" method="GET" action="products.php">
                    <div class="input-group">
                        <input class="form-control" name="search" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-outline-dark" type="submit">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</header>