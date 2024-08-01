<?php
include './includes/config.php';


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health</title>
</head>

<body>
    <?php include './includes/header.php'; ?>
    <?php include './includes/nav.php'; ?>

    <div class="container mt-5">

        <?php
        $sql = "SELECT * from article where category = 'health'";
        $res = $conn->query($sql);
        if ($res) :
            $cnt = 0;
            while ($data = $res->fetch_assoc()) :
        ?>
                <?php
                if ($cnt % 2 == 0) {
                ?>
                    <div class="row">
                    <?php
                }
                    ?>
                    <div class="col-md-6">
                        <div class="card mb-3" style="max-width: 720px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="./includes/img/article/<?php echo $data['img']; ?>" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $data['title']; ?></h5>
                                        <p class="card-text"><?php echo substr($data['content'], 0, 200) . '...'; ?></p>
                                        <a href="./article.php?id=<?php echo $data['id']; ?>" class="btn btn-outline-success">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <?php if ($cnt % 2 == 0) { ?>
                    </div>
        <?php
                    }
                    $cnt++;
                endwhile;
            endif;
        ?>

    </div>

    <?php include './includes/footer.php' ?>

    <?php include './includes/bundle.php' ?>
    <script src="./includes/js/main.js"></script>
</body>

</html>