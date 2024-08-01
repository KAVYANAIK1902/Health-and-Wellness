<?php
include './includes/config.php';
include './includes/functions.php';

if (isset($_SESSION['uid'])) {
    $uid = $_SESSION['uid'];
} else {
    echo "<script>if (confirm('Please login or register to open your cart.')) { window.location.href = './products.php';} else { window.location.href = './products.php'; };</script>";
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
</head>

<body>

    <?php include './includes/header.php'; ?>
    <?php include './includes/nav.php'; ?>

    <!-- Shopping Cart Page -->
    <div class="container mt-5">
        <div class="row">
            <!-- Cart Items -->
            <div class="col-md-8 mb-4">
                <h3>Shopping Cart</h3>
                <div class="card">

                    <?php
                    $sql = "SELECT cart.id AS cart_id,products.id AS product_id,products.name AS product_name,products.description AS product_description,products.price AS product_price,products.discount_price AS product_discount_price,products.image AS product_image, cart.id AS cart_id ,cart.quantity AS cart_quantity,(products.discount_price * cart.quantity) AS total_price FROM cart JOIN products ON cart.product_id = products.id WHERE cart.user_id = '$uid';";
                    $result = $conn->query($sql);
                    if ($result) :
                        while ($data = $result->fetch_assoc()) :
                    ?>
                            <div class="card-body">
                                <div class="row cart-item" data-price="50">
                                    <div class="col-md-2">
                                        <img src="./includes/img/products/<?php echo $data['product_image']; ?>" class="img-fluid" alt="Product Image 1">
                                    </div>
                                    <div class="col-md-4">
                                        <h5 class="card-title"><?php echo $data['product_name']; ?></h5>
                                        <p class="card-text">
                                            <span class="text-danger font-weight-bold">₹<?php echo $data['product_discount_price']; ?></span>
                                        </p>
                                        <div class="quantity">
                                            <label for="quantity-1">Quantity:</label>
                                            <input type="number" class="form-control quantity-input" id="quantity-1" value="<?php echo $data['cart_quantity']; ?>" data-price="<?php echo $data['product_discount_price']; ?>" data-cartId="<?php echo $data['cart_id']; ?>" min="1">
                                        </div>
                                        <p class="total-price" id="total_indivisual">Total: ₹<?php echo $data['total_price']; ?></p>
                                        <a href="./includes/remove_item.php?id=<?php echo $data['cart_id']; ?>"><button class="btn btn-danger">Remove Item</button></a>
                                    </div>
                                </div>
                            </div>

                    <?php
                        endwhile;
                    endif;
                    ?>

                </div>
            </div>
            <!-- Cart Summary -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Cart Summary</h5>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Subtotal:</td>
                                    <td id="sub_total"></td>
                                </tr>
                                <tr>
                                    <td>Tax:</td>
                                    <td>GST - 20%</td>
                                </tr>
                                <tr>
                                    <td>Total:</td>
                                    <td id="total_grand"></td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="./checkout.php"><button type="submit" class="btn btn-outline-success btn-block">Buy Now</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include './includes/footer.php' ?>
    <?php include './includes/bundle.php'; ?>
    <script>
        let sub_total = document.getElementById('sub_total');
        let total_indivisual = document.querySelectorAll('#total_indivisual');
        let total_grand = document.getElementById('total_grand');
        let quantity = document.querySelectorAll(".quantity-input");

        for (let i = 0; i < quantity.length; i++) {
            const element = quantity[i];
            element.addEventListener('input', function() {
                let val = element.getAttribute('data-price');
                let cartId = element.getAttribute('data-cartId');
                let qty_val = element.value;
                total_indivisual[i].innerHTML = "₹" + (val * qty_val);
                subTotal();
                updateQuantity(cartId, qty_val);
            });
        }

        function subTotal() {
            sub_total_val = 0;
            quantity.forEach(qty => {
                let val = qty.getAttribute('data-price');
                let qty_val = qty.value;
                sub_total_val += (val * qty_val);
                sub_total.innerHTML = "₹" + parseFloat(sub_total_val).toFixed(2);
                total_grand.innerHTML = "₹" + parseFloat(sub_total_val * 1.20).toFixed(2);
            });
        }
        subTotal();

        function updateQuantity(cartId, newQuantity) {
            console.log(cartId);
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "./includes/update_cart_quantity.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    console.log(xhr.responseText);
                    // Optionally update the total price and other UI elements based on response
                }
            };
            xhr.send("cart_id=" + cartId + "&quantity=" + newQuantity);
        }
    </script>
</body>

</html>