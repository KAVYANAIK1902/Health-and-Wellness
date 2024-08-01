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
    <title>Manage Orders</title>
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
            <h2>Manage Orders</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Customer ID</th>
                        <th>Customer Name</th>
                        <th>Total Amount</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="order-list">
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
                                    <a href="./includes/functions/del_order.php?id=<?php echo $data['id']; ?>"><button class="btn btn-danger btn-sm">Delete</button></a>
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


    <?php include './includes/bundle.php'; ?>
</body>

</html>