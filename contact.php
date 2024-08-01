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

    <!-- Contact Page -->
    <div class="container mt-5">
        <div class="row">
            <!-- Contact Page -->
            <div class="container mt-5">
                <div class="row">
                    <!-- Contact Information -->
                    <div class="col-md-6 mb-4">
                        <h3>Contact Information</h3>
                        <p><strong>Address:</strong> 1234 Street Name, City, State, ZIP</p>
                        <p><strong>Phone:</strong> (123) 456-7890</p>
                        <p><strong>Email:</strong> info@example.com</p>
                    </div>
                    <!-- Google Map Embed -->
                    <div class="col-md-6 mb-4">
                        <h3>Location</h3>
                        <!-- Replace YOUR_API_KEY with your actual Google Maps Embed API key -->
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30885.238283239018!2d74.8170628481975!3d14.618731045643308!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bbea8d7fcd0f39b%3A0x83f28aeb1f2b1502!2sSirsi%2C%20Karnataka!5e0!3m2!1sen!2sin!4v1719903932958!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php include './includes/footer.php' ?>
    <?php include './includes/bundle.php'; ?>
</body>

</html>