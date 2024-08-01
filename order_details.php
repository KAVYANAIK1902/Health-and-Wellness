<?php
include './includes/config.php';

if (!isset($_SESSION['aid'])) {
    header("Location: ./login.php");
}

$o_id = $_GET['id'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-success">
        <div class="container-fluid">
            <a class="navbar-brand text-light" href="#">Health n wellness</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <div class="d-flex">

        <?php include './includes/navbar.php'; ?>

        <div class="content p-4">
            <h2>Order Details</h2>
            <div class="card mb-4">

                <?php
                $sql = "SELECT o.id as o_id, u.name ,u.email,u.id as u_id,u.phone,o.total,o.status,a.address from orders o join users u on u.id = o.user_id join address a on a.id = o.address where o.id = '$o_id'";
                $res = $conn->query($sql);
                if ($res) :
                    while ($data = $res->fetch_assoc()) :
                ?>
                        <div class="card-header">
                            Order ID: <span id="orderID"><?php echo $data['o_id']; ?></span>
                        </div>
                        <div class="card-body">
                            <p><strong>Customer Name:</strong> <span id="customerName"><?php echo $data['name']; ?></span></p>
                            <p><strong>Email:</strong> <span id="customerEmail"><?php echo $data['email']; ?></span></p>
                            <p><strong>Phone:</strong> <span id="customerPhone"><?php echo $data['phone']; ?></span></p>
                            <p><strong>Shipping Address:</strong> <span id="shippingAddress"><?php echo $data['address']; ?></span></p>
                            <p><strong>Total Amount:</strong> <span id="totalAmount">₹<?php echo $data['total']; ?></span></p>
                            <p><strong>Status:</strong> <span id="orderStatus"><?php echo $data['status']; ?></span></p>
                            <h5>Items</h5>
                            <ul id="orderItems">
                                <?php
                                $sql = "SELECT o.*,p.name from order_items o join products p on p.id = o.product_id where o.order_id = '$o_id'";
                                $res = $conn->query($sql);
                                if ($res) :
                                    while ($data2 = $res->fetch_assoc()) :
                                ?>
                                        <li><?php echo $data2['name']; ?> - ₹<?php echo $data2['price'] . " - " . $data2['quantity']; ?></li>
                                <?php
                                    endwhile;
                                endif;
                                ?>
                            </ul>
                            <a href="./bill.php?id=<?php echo $data['o_id']; ?>">
                                <button class="btn btn-outline-success">Print Invoice</button>
                            </a>
                        </div>
                <?php
                    endwhile;
                endif;
                ?>

            </div>
        </div>
    </div>
    <?php include './includes/bundle.php'; ?>
</body>

</html>