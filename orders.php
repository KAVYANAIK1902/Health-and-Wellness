<?php
include './includes/config.php';
$uid = $_SESSION['uid'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History</title>
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
                    <a class="nav-link active" href="./logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Content -->
    <div class="content container-fluid">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Order History</h1>
        </div>

        <!-- Order History Table -->
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Order ID</th>
                        <th scope="col">Date</th>
                        <th scope="col">Total</th>
                        <th scope="col">Status</th>
                        <th scope="col">Details</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT o.*,u.name from orders o JOIN users u ON u.id = o.user_id";
                    $res = $conn->query($sql);
                    if ($res) :
                        while ($data = $res->fetch_assoc()) :
                    ?>
                            <tr>
                                <td><?php echo $data['id']; ?></td>
                                <td><?php echo $data['user_id']; ?></td>
                                <td><?php echo $data['name']; ?></td>
                                <td>₹<?php echo $data['total']; ?></td>
                                <td><?php echo $data['status']; ?></td>
                                <td>
                                    <a href="./order_details.php?id=<?php echo $data['id']; ?>"><button class="btn btn-info btn-sm">View</button></a>
                                </td>
                            </tr>
                    <?php
                        endwhile;
                    endif;

                    ?>
                </tbody>
            </table>
        </div>
    </div>


    <?php include './includes/bundle.php' ?>
</body>

</html>