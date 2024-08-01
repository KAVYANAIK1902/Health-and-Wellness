<?php
include './includes/config.php';

if (!isset($_SESSION['aid'])) {
    header("Location: ./login.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-success">
        <div class="container-fluid">
            <a class="navbar-brand text-light" href="../index.php">Health n wellness</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <div class="d-flex">
        <?php include './includes/navbar.php'; ?>

        <div class="content p-4">
            <h2>Dashboard</h2>
            <div class="row">

                <?php
                $sql = "SELECT * from products";
                $res = $conn->query($sql);
                $num = $res->num_rows;
                ?>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total Products</h5>
                            <p class="card-text" id="total-products"><?php echo $num; ?></p>
                        </div>
                    </div>
                </div>

                <?php
                $sql = "SELECT * from categories";
                $res = $conn->query($sql);
                $num = $res->num_rows;
                ?>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total Categories</h5>
                            <p class="card-text" id="total-categories"><?php echo $num; ?></p>
                        </div>
                    </div>
                </div>

                <?php
                $sql = "SELECT * from orders";
                $res = $conn->query($sql);
                $num = $res->num_rows;
                ?>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total Orders</h5>
                            <p class="card-text" id="total-orders"><?php echo $num; ?></p>
                        </div>
                    </div>
                </div>

                <?php
                $sql = "SELECT * from users";
                $res = $conn->query($sql);
                $num = $res->num_rows;
                ?>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total Users</h5>
                            <p class="card-text" id="total-users"><?php echo $num; ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12">
                    <h3>Recent Orders</h3>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>User</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody id="recent-orders">

                            <?php
                            $sql = "SELECT o.*, u.name from orders o join users u on o.user_id = u.id ORDER BY created_at DESC LIMIT 4";
                            $res = $conn->query($sql);
                            if ($res) :
                                while ($data = $res->fetch_assoc()) :
                            ?>
                                    <tr>
                                        <td><?php echo $data['id']; ?></td>
                                        <td><?php echo $data['name']; ?></td>
                                        <td><?php echo $data['created_at']; ?></td>
                                        <td><?php echo $data['status']; ?></td>
                                        <td><?php echo $data['total']; ?></td>
                                    </tr>
                            <?php

                                endwhile;
                            endif;
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php include './includes/bundle.php'; ?>
</body>

</html>