<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
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

    <div class="container mt-5 card p-0" style="min-width: 360px;width:60%;display:flex;align-items:center">
        <div class="row card-header mb-4" style="width: 100%;">
            <h3 class="text-center">Profile</h3>
        </div>
        <div class="col-md-4">
            <label for="name">Name</label>
            <input type="text" id="name" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="col-md-4">
            <label for="name">email</label>
            <input type="text" id="name" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="col-md-4">
            <label for="name">Phone</label>
            <input type="text" id="name" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
        </div>
    </div>

    <?php include './includes/bundle.php' ?>

</body>

</html>