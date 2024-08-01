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
    <title>Manage Products</title>
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
            <h2>Manage Products</h2>
            <button class="btn btn-success mb-3" data-toggle="modal" data-target="#productModal">Add Product</button>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Discounted Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="product-list">

                    <?php
                    $sql = "SELECT p.*,c.name as c_name from products p JOIN categories c on c.id = p.category_id";
                    $res = $conn->query($sql);
                    if ($res) :
                        while ($data = $res->fetch_assoc()) :
                    ?>
                            <tr>
                                <td><?php echo $data['id']; ?></td>
                                <td><?php echo $data['name']; ?></td>
                                <td><?php echo $data['c_name']; ?></td>
                                <td>₹<?php echo $data['price']; ?></td>
                                <td>₹<?php echo $data['discount_price']; ?></td>
                                <td>
                                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editProductModal" onclick="editProduct(<?php echo $data['id'] ?>)">Edit</button>
                                    <a href="./includes/functions/del_product.php?id=<?php echo $data['id']; ?>"><button class="btn btn-danger btn-sm">Delete</button></a>
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

    <!-- Product Modal -->
    <div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productModalLabel">Add Product</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="./includes/functions/add_product.php" enctype="multipart/form-data" id="">
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label for="productName">Product Name</label>
                            <input type="text" name="p_name" class="form-control" id="productName" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="productCategory">Category</label>
                            <select name="category" class="form-control" id="productCategory" required>
                                <option>Select</option>
                                <?php
                                $sql = "SELECT * from categories";
                                $res = $conn->query($sql);
                                if ($res) :
                                    while ($data = $res->fetch_assoc()) :
                                ?>
                                        <option value="<?php echo $data['id']; ?>"><?php echo $data['name']; ?></option>
                                <?php
                                    endwhile;
                                endif;
                                ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="productPrice">Price</label>
                            <input type="number" name="price" class="form-control" id="productPrice" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="productDiscountPrice">Discounted Price</label>
                            <input type="number" name="d_price" class="form-control" id="productDiscountPrice" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="stock">Stock</label>
                            <input type="number" name="stock" class="form-control" id="stock" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="inputGroupFile01">Product Image 1</label>
                            <input type="file" name="img1" class="form-control" id="inputGroupFile01">
                        </div>
                        <div class="form-group mb-3">
                            <label for="inputGroupFile02">Product Image 2</label>
                            <input type="file" name="img2" class="form-control" id="inputGroupFile02">
                        </div>
                        <div class="form-group mb-3">
                            <label for="inputGroupFile03">Product Image 3</label>
                            <input type="file" name="img3" class="form-control" id="inputGroupFile03">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Add Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Product Modal -->
    <div class="modal fade" id="editProductModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productModalLabel">Edit Product</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="./includes/functions/edit_product.php" enctype="multipart/form-data" id="">
                    <div class="modal-body">
                        <input type="hidden" name="productId" id="productId">
                        <div class="form-group mb-3">
                            <label for="productName">Product Name</label>
                            <input type="text" name="p_name" class="form-control" id="editProductName" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                            <textarea class="form-control" name="editDescription" id="editDescription" rows="3"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="productPrice">Price</label>
                            <input type="number" name="price" class="form-control" id="editProductPrice" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="productDiscountPrice">Discounted Price</label>
                            <input type="number" name="d_price" class="form-control" id="editProductDiscountPrice" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="stock">Stock</label>
                            <input type="number" name="stock" class="form-control" id="editStock" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function editProduct(id) {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "./includes/functions/get_product.php?id=" + id, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);

                    document.getElementById('productId').value = id;
                    document.getElementById('editProductName').value = response.name;
                    document.getElementById('editProductPrice').value = response.price;
                    document.getElementById('editProductDiscountPrice').value = response.discount_price;
                    document.getElementById('editStock').value = response.stock;
                    document.getElementById('editDescription').value = response.description;
                }
            };
            xhr.send();

        }
    </script>


    <?php include './includes/bundle.php'; ?>
</body>

</html>