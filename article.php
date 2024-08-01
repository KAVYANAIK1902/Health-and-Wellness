<?php
include './includes/config.php';

$id = $_GET['id'];
$sql = "SELECT * from article where id='$id'";
$res = $conn->query($sql);
$data = $res->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
</head>

<body>
    <?php include './includes/header.php'; ?>
    <?php include './includes/nav.php'; ?>

    <div class="container mt-5">

        <div class="card">
            <img src="./includes/img/article/<?php echo $data['img']; ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?php echo $data['title']; ?></h5>
                <p class="card-text"><?php echo $data['content']; ?></p>
            </div>
        </div>


    </div>
    <?php include './includes/footer.php' ?>

    <?php include './includes/bundle.php' ?>
    <script src="./includes/js/main.js"></script>
</body>

</html>