<?php
include './includes/config.php';

if (!isset($_SESSION['uid'])) {
    header("Location: ./index.php");
} else {
    $uid = $_SESSION['uid'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .card-body a {
            text-decoration: none;
        }
    </style>
    <title>Dashboard</title>
</head>

<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <a class="navbar-brand" href="#" style="flex-grow: 10;">My Account</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-2 me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="./index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="./dashboard.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="./orders.php">Order History</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="./wishlist.php">Wishlist</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="./profile.php">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="./settings.php">Settings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="./includes/logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Content -->
    <div class="content container-fluid">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
        </div>
        <div class="row">
            <!-- Recent Orders Card -->
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header fw-bold">
                        Recent Orders
                    </div>
                    <div class="card-body">
                        <?php
                        $sql = "SELECT * from orders where user_id = '$uid'";
                        $result = $conn->query($sql);
                        if ($result) :
                            $cnt = 1;
                            while ($data = $result->fetch_assoc()) :

                        ?>
                                <p>Order #<?php echo $cnt++; ?>: <?php echo $data['status']; ?></p>
                        <?php
                            endwhile;
                        endif; ?>
                        <a href="./orders.php" class="btn btn-outline-success">View All Orders</a>
                    </div>

                </div>
            </div>

            <!-- Account Information Card -->
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header fw-bold">
                        Account Information
                    </div>
                    <?php
                    $sql = "SELECT * from users where id='$uid'";
                    $result = $conn->query($sql);
                    if ($result) $data = $result->fetch_assoc();
                    ?>
                    <div class="card-body">
                        <p>Name: <?php echo $data['name']; ?></p>
                        <p>Email: <?php echo $data['email']; ?></p>
                        <p>Phone: <?php echo $data['phone']; ?></p>
                        <a href="./profile.php" class="btn btn-outline-success">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Wishlist Card -->
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header fw-bold">
                        Wishlist
                    </div>
                    <div class="card-body">
                        <?php
                        $sql = "SELECT * from wishlist where user_id = '$uid'";
                        $result = $conn->query($sql);
                        if ($result) :
                            $cnt = 1;
                            while ($data = $result->fetch_assoc()) :
                                $pr_id = $data['product_id'];
                                $sql2 = "SELECT name from products where id = '$pr_id'";
                                $res = $conn->query($sql2);
                                if ($res)
                                    $data2 = $res->fetch_assoc();
                        ?>
                                <p>Product #<?php echo $cnt++; ?>: <?php echo $data2['name']; ?></p>
                        <?php
                            endwhile;
                        endif;
                        ?>
                        <a href="./wishlist.php" class="btn btn-outline-success">View Wishlist</a>
                    </div>
                </div>
            </div>

            <!-- Settings Card -->
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header fw-bold">
                        Settings
                    </div>
                    <div class="card-body">
                        <p><a href="#">Change Password</a></p>
                        <p><a href="#">Saved address</a></p>
                        <p><a href="#">Payment Methods</a></p>
                        <a href="./settings.php" class="btn btn-outline-success">Go to Settings</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php include './includes/bundle.php'; ?>
</body>

</html>