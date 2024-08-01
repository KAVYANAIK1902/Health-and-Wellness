<?php
include_once './includes/config.php';

$message = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['message_send'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $sql = "INSERT into messages (name,email,message,status) values ('$name','$email','$message','unseen')";
    $res = $conn->query($sql);
    if ($res)
        $message = "<p class='text-light'>Submitted successfully.</p>";
    else
        $message = "<p class='text-warning'>Not submitted.Some error has occured</p>";
}

?>
<!-- Footer -->
<footer class="bg-success text-light py-4 mt-5">
    <div class="container">
        <div class="row">
            <!-- Information Links -->
            <div class="col-md-6">
                <h4 class="text-dark">Information</h4>
                <ul class="list-unstyled">
                    <li><a class="text-light" href="#">About Us</a></li>
                    <li><a class="text-light" href="#">Contact Us</a></li>
                    <li><a class="text-light" href="#">Cancellation Policy</a></li>
                    <li><a class="text-light" href="#">General Terms & Conditions</a></li>
                    <li><a class="text-light" href="#">Return/Refund Policy</a></li>
                    <li><a class="text-light" href="#">Shipping Policy</a></li>
                    <li><a class="text-light" href="#">FAQ</a></li>
                </ul>
            </div>
            <!-- Message Us Form -->
            <div class="col-md-6">
                <h4 class="text-dark">Message Us</h4>
                <form method="POST">
                    <div class="mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Your Name">
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Your Email">
                    </div>
                    <div class="mb-3">
                        <label for="message">Message</label>
                        <textarea name="message" class="form-control" id="message" rows="3" placeholder="Your Message"></textarea>
                    </div>
                    <div class="mb-3">
                        <?php echo $message; ?>
                    </div>
                    <button type="submit" name="message_send" class="btn btn-outline-light">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</footer>