<?php
include './includes/config.php';
include './includes/functions.php';

$uid = $_SESSION['uid'];

$sql = "SELECT * from users where id = '$uid'";
$result = $conn->query($sql);
if ($result) $data = $result->fetch_assoc();
$sql = "SELECT * from address where id = '" . $data['address_1'] . "'";
$result = $conn->query($sql);
if ($result) $data2 = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
</head>

<body>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Checkout</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>
        <!-- Checkout Page -->
        <div class="container mt-5">
            <div class="row">
                <!-- Customer Information -->
                <div class="col-md-6">
                    <h3>Customer Information</h3>
                    <form method="POST">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter your name" required value="<?php echo $data['name']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter your email" required value="<?php echo $data['email']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="hidden" name="address" value="<?php echo $data['address_1']; ?>">
                            <textarea class="form-control" id="address" rows="3" placeholder="Enter your address" required disabled><?php echo $data2['address']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone number</label>
                            <input type="tel" class="form-control" id="phone" placeholder="Enter your phone number" required value="<?php echo $data['phone']; ?>">
                        </div>
                </div>
                <!-- Order Summary -->
                <div class="col-md-6">
                    <h3>Order Summary</h3>
                    <div class="card">
                        <div class="card-body">

                            <?php
                            $sql = "SELECT cart.id AS cart_id,products.id AS product_id,products.name AS product_name,products.description AS product_description,products.price AS product_price,products.discount_price AS product_discount_price,products.image AS product_image, cart.id AS cart_id ,cart.quantity AS cart_quantity,(products.discount_price * cart.quantity) AS total_price FROM cart JOIN products ON cart.product_id = products.id WHERE cart.user_id = '$uid';";
                            $result = $conn->query($sql);
                            if ($result) :
                                while ($data = $result->fetch_assoc()) :
                            ?>
                                    <h5 class="card-title"><?php echo $data['product_name']; ?></h5>
                                    <p class="card-text">
                                        <span class="text-danger font-weight-bold">₹<?php echo $data['product_discount_price']; ?></span>
                                        <span class="text-muted"><s></s></span>
                                    </p>
                                    <p class="quantity" data-price="<?php echo $data['product_discount_price']; ?>" data-qty="<?php echo $data['cart_quantity']; ?>">Quantity: <?php echo $data['cart_quantity']; ?></p>
                                    <p class="subtotal">Subtotal: ₹<?php echo $data['cart_quantity'] * $data['product_discount_price']; ?></p>
                                    <hr>
                            <?php
                                endwhile;
                            endif;
                            ?>

                            <p class="font-weight-bold" id="total_grand2"></p>
                            <input type="hidden" id="total_grand" name="total_grand">
                        </div>
                    </div>
                    <hr>
                    <!-- Payment Form (for demonstration) -->
                    <h3>Payment Details</h3>

                    <div class="container">
                        <div class="row">
                            <div class="form-check form-check-inline col-md-4">
                                <input class="form-check-input" type="radio" name="payment" id="inlineRadio1" value="cod" onchange="change(this)" checked>
                                <label class="form-check-label" for="inlineRadio1">Cash on delivery</label>
                            </div>
                            <div class="form-check form-check-inline col-md-2">
                                <input class="form-check-input" type="radio" name="payment" id="inlineRadio2" value="upi" onchange="change(this)">
                                <label class="form-check-label" for="inlineRadio2">UPI</label>
                            </div>
                            <div class="form-check form-check-inline col-md-4">
                                <input class="form-check-input" type="radio" name="payment" id="inlineRadio3" value="card" onchange="change(this)">
                                <label class=" form-check-label" for="inlineRadio3">Card</label>
                            </div>
                        </div>
                        <div class="row mt-3" id="upi" style="display: none;">
                            <div class="col-md-4">
                                <a href=""><img src="./includes/img/google-pay-icon.webp" alt="" style="width: 50px;height: 40px"></a>
                            </div>
                            <div class="col-md-4">
                                <a href=""><img src="./includes/img/phonepe-icon.webp" alt="" style="width: 40px;height: 40px"></a>
                            </div>
                            <div class="col-md-4">
                                <a href=""><img src="./includes/img/paytm-icon.webp" alt="" style="width: 100px;height: 40px"></a>
                            </div>
                        </div>
                        <div class="row mt-3" id="cardDetails" style="display: none;">
                            <div class="form-group">
                                <label for="card-number">Card Number</label>
                                <input type="text" class="form-control" id="card-number" placeholder="Enter card number">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="expiry-date">Expiry Date</label>
                                    <input type="text" class="form-control" id="expiry-date" placeholder="MM/YY">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="cvv">CVV</label>
                                    <input type="text" class="form-control" id="cvv" placeholder="CVV">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 mt-5">
                        <a href="./index.php"><button type="button" class="btn btn-outline-danger">Cancel</button></a>
                        <button type="submit" name="place_order" class="btn btn-outline-success">Place your order</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <?php include './includes/bundle.php'; ?>
        <script>
            let total_grand = document.getElementById('total_grand');
            let total_grand2 = document.getElementById('total_grand2');
            let quantity = document.querySelectorAll(".quantity");
            let grandTotal = 0;

            function Total() {
                quantity.forEach(qty => {
                    let price = qty.getAttribute('data-price');
                    let qty_val = qty.getAttribute('data-qty');
                    grandTotal += (price * qty_val);
                });
                total_grand2.innerHTML = "Total : ₹" + grandTotal.toFixed(2);
                total_grand.value = grandTotal.toFixed(2);
            }

            window.onload = Total();

            function change(btn) {
                if (btn.value == 'cod') {
                    document.getElementById('upi').style.display = "none";
                    document.getElementById('cardDetails').style.display = "none";
                }
                if (btn.value == 'upi') {
                    document.getElementById('upi').style.display = "flex";
                    document.getElementById('cardDetails').style.display = "none";
                }
                if (btn.value == 'card') {
                    document.getElementById('upi').style.display = "none";
                    document.getElementById('cardDetails').style.display = "block";
                }
            }
        </script>
    </body>

    </html>