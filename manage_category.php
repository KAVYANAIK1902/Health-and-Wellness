<?php
include './includes/config.php';

if (!isset($_SESSION['aid'])) {
    header("Location: ./login.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Category</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-success">
        <div class="container-fluid">
            <a class="navbar-brand text-light" href="#">Health n wellness</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <div class="d-flex">
        <?php include './includes/navbar.php'; ?>

        <div class="content p-4">
            <h2>Manage Categories</h2>
            <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#categoryModal">Add Category</button>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="category-list">

                    <?php
                    $sql = "SELECT * from categories";
                    $res = $conn->query($sql);
                    if ($res) :
                        while ($data = $res->fetch_assoc()) :
                    ?>
                            <tr>
                                <td><?php echo $data['id']; ?></td>
                                <td><?php echo $data['name']; ?></td>
                                <td> <?php echo $data['description']; ?></td>
                                <td>
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editCategoryModal" onclick="editCategory(<?php echo $data['id']; ?>)">Edit</button>
                                    <a href="./includes/functions/del_category.php?id=<?php echo $data['id']; ?>"><button class="btn btn-danger btn-sm">Delete</button></a>
                                </td>
                            </tr>
                    <?php
                        endwhile;
                    endif;
                    ?>

                </tbody>
            </table>
        </div>
    </div>

    <!-- Category Modal -->
    <div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="categoryModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="categoryModalLabel">Add Category</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="./includes/functions/add_category.php">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="categoryName">Category Name</label>
                            <input type="text" name="name" class="form-control" id="categoryName" required>
                        </div>
                        <div class="form-group">
                            <label for="categoryDescription">Description</label>
                            <textarea class="form-control" name="desc" id="categoryDescription" rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="modal_btn" class="btn btn-success">Add Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Category Modal -->
    <div class="modal fade" id="editCategoryModal" tabindex="-1" role="dialog" aria-labelledby="categoryModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="categoryModalLabel">Edit Category</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="./includes/functions/edit_category.php">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="editCategoryId">
                        <div class="form-group">
                            <label for="editCategoryName">Category Name</label>
                            <input type="text" name="name" class="form-control" id="editCategoryName" required>
                        </div>
                        <div class="form-group">
                            <label for="editCategoryDescription">Description</label>
                            <textarea class="form-control" name="desc" id="editCategoryDescription" rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <?php include './includes/bundle.php'; ?>
    <script>
        function editCategory(id) {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "./includes/functions/get_category.php?id=" + id, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);

                    document.getElementById('editCategoryId').value = response.id;
                    document.getElementById('editCategoryName').value = response.name;
                    document.getElementById('editCategoryDescription').value = response.description;
                }
            };
            xhr.send();
        }
    </script>
</body>

</html>