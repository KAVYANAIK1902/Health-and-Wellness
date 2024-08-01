<?php
include './includes/config.php';
$oid = $_GET['id'];

$sql = "SELECT
    o.id,
    c.name,
    c.email,
    c.phone,
    a.address AS shipping_address,
    o.total,
    o.status,
    oi.product_id,
    oi.price,
    oi.quantity,
    (oi.price * oi.quantity) AS total_item_amount
FROM
    orders o
INNER JOIN 
    address a ON a.id = o.address
INNER JOIN
    users c ON o.user_id = c.id
INNER JOIN
    order_items oi ON o.id = oi.order_id
WHERE
    o.id = '$oid';
";
$res = $conn->query($sql);
$order = $res->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
        }

        .invoice {
            width: 100%;
            max-width: 800px;
            margin: auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .invoice-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .invoice-header h2 {
            margin: 0;
        }

        .invoice-body {
            border-top: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
            padding: 20px 0;
            margin-bottom: 20px;
        }

        .invoice-body table {
            width: 100%;
            border-collapse: collapse;
        }

        .invoice-body table th,
        .invoice-body table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .invoice-footer {
            text-align: right;
        }

        .print-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
        }

        @media print {
            .print-button {
                display: none;
            }
        }
    </style>
</head>

<body>

    <div class="invoice">
        <div class="invoice-header">
            <h2>Invoice</h2>
            <button class="print-button" onclick="window.print()">Print Invoice</button>
        </div>
        <div class="invoice-body">
            <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Shipping Address</th>
                        <th>Total Amount</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $order['id']; ?></td>
                        <td><?php echo $order['name']; ?></td>
                        <td><?php echo $order['email']; ?></td>
                        <td><?php echo $order['phone']; ?></td>
                        <td><?php echo $order['shipping_address']; ?></td>
                        <td><?php echo $order['total']; ?></td>
                        <td><?php echo $order['status']; ?></td>
                    </tr>
                </tbody>
            </table>

            <h3>Items</h3>
            <table>
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT oi.*,p.name from order_items oi JOIN products p ON oi.product_id = p.id where oi.order_id  = '$oid'";
                    $res = $conn->query($sql);
                    if ($res) :
                        while ($item = $res->fetch_assoc()) :
                    ?>
                            <tr>
                                <td><?php echo $item['name']; ?></td>
                                <td><?php echo number_format($item['price'], 2); ?></td>
                                <td><?php echo $item['quantity']; ?></td>
                                <td><?php echo number_format($item['price'] * $item['quantity'], 2); ?></td>
                            </tr>
                    <?php
                        endwhile;
                    endif;
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>