<?php

include './includes/config.php';

$message = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $newPass = $_POST['newPass'];
    $confPass = $_POST['confPass'];

    if ($newPass == $confPass) {
        $hashed_pass = password_hash($newPass, PASSWORD_DEFAULT);
        $sql = "INSERT into users (name, email, password, phone) values ('$name','$email','$hashed_pass','$phone')";
        $res = $conn->query($sql);
        if ($res) {
            header("Location: ./login.php");
        } else {
            $message = "An error occured while registering.";
        }
    } else {
        $message = "Passwords do not match";
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <?php include './includes/header.php'; ?>
    <?php include './includes/nav.php'; ?>

    <div class="container bg-success mt-5 p-3 rounded-1" style="min-width: 360px;width:40%">
        <form method="POST">
            <h2 class="text-center text-light">Register</h2>
            <div class="mb-3">
                <label for="name" class="form-label text-light">Name</label>
                <input type="text" name="name" id="name" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label text-light">Email</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label text-light">Phone</label>
                <input type="number" name="phone" class="form-control" id="phone" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label text-light">Create Password</label>
                <input type="password" name="newPass" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label text-light">Confirm Password</label>
                <input type="password" name="confPass" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <p class="text-warning"><?php echo $message; ?></p>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-outline-light">Register</button>
            </div>
            <div class="mb-3">
                <p class="text-light">Already have an account? <a class="text-dark" href="./login.php">Login</a> here. </p>
            </div>
        </form>
    </div>

    <?php include './includes/footer.php'; ?>
    <?php include './includes/bundle.php'; ?>
</body>

</html>