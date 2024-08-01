<?php
include './includes/config.php';

$message = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT id,password from admin where email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($uid, $hashed_pass);
    $stmt->fetch();
    $stmt->close();

    if ($uid != null and $hashed_pass != null) {
        if (password_verify($password, $hashed_pass)) {
            session_unset();
            session_destroy();
            session_start();
            $_SESSION['aid'] = $uid;
            header("Location: ./index.php");
        } else {
            $message = "Invalid Password.";
        }
    } else {
        $message = "No admin found.";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>


    <div class="container bg-success mt-5 p-3 rounded-1" style="min-width: 360px;;width:40%">
        <h3 class="text-center text-light">Admin Login</h3>
        <form method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label text-light">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label text-light">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <p class="text-warning"><?php echo $message; ?></p>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-outline-light">Login</button>
            </div>

        </form>
    </div>

    <?php include './includes/bundle.php'; ?>
</body>

</html>