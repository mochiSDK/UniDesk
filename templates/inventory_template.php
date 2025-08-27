<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Inventory - UniDesk</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>

<body>
    <?php require_once "navbar_controller.php"; ?>
    <div class="container mt-2">
        <div class="row">
            <h1>Inventory</h1>
        </div>
        <div class="row mb-2">
            <div class="col">
                <div class="input-group ms-auto" style="max-width: 25%;">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon" data-bs-toggle="modal" data-bs-target="#addProductModal"><i class="bi bi-plus-circle-fill"></i></button>
                    <input type="text" class="form-control" placeholder="Search product" aria-label="Search" aria-describedby="button-addon">
                </div>
                <!-- Add Product Modal -->
                <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="addProductModalLabel">Add Product</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="nameInput" class="form-label">Name</label>
                                    <input class="form-control" id="nameInput" placeholder="Product name">
                                </div>
                                <div class="mb-3">
                                    <label for="modelInput" class="form-label">Model</label>
                                    <input class="form-control" id="modelInput" placeholder="Product model">
                                </div>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Image</label>
                                    <input class="form-control" type="file" accept="image/*" id="formFile">
                                </div>
                                <div class="mb-3">
                                    <label for="priceInput" class="form-label">Price</label>
                                    <input type="number" min="0" class="form-control" id="priceInput" placeholder="Product price">
                                </div>
                                <div class="mb-3">
                                    <label for="amountInput" class="form-label">Amount</label>
                                    <input type="number" min="0" class="form-control" id="amountInput" placeholder="Amount in stock">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Model</th>
                        <th scope="col">Image</th>
                        <th scope="col">Price</th>
                        <th scope="col">In-stock</th>
                        <th scope="col">Category</th>
                        <th scope="col" style="width: 10%;">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($templateParams["inventory"] as $product): ?>
                        <tr>
                            <th scope="row"><?php echo $product["ProductId"]; ?></th>
                            <td><?php echo $product["Name"]; ?></td>
                            <td><?php echo $product["Brand"]; ?></td>
                            <td><?php echo $product["Model"]; ?></td>
                            <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#imageModal<?php echo $product["ProductId"]; ?>"><i class="bi bi-eye-fill"></i></button></td>
                            <td><?php echo $product["Price"]; ?>€</td>
                            <td><?php echo $product["Amount"]; ?></td>
                            <td><?php echo $product["Category"]; ?></td>
                            <td><button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#editProductModal<?php echo $product["ProductId"]; ?>"><i class="bi bi-pencil-square"></i></button></td>
                        </tr>
                        <!-- Image Modal -->
                        <div class="modal fade" id="imageModal<?php echo $product["ProductId"]; ?>" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="imageModalLabel<?php echo $product["ProductId"]; ?>">Product Image</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <img src="<?php echo $product["Picture"]; ?>" class="img-thumbnail mx-auto d-block mb-3" alt="Product image">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Edit Product Modal -->
                        <div class="modal fade" id="editProductModal<?php echo $product["ProductId"]; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="editModalLabel<?php echo $product["ProductId"]; ?>">Edit Product</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="post" action="handlers/edit_product.php">
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="nameInput<?php echo $product["ProductId"]; ?>" class="form-label">Name</label>
                                                <input name="productName" class="form-control" id="nameInput<?php echo $product["ProductId"]; ?>" value="<?php echo $product["Name"]; ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="brandInput<?php echo $product["ProductId"]; ?>" class="form-label">Brand</label>
                                                <input name="productBrand" class="form-control" id="brandInput<?php echo $product["ProductId"]; ?>" value="<?php echo $product["Brand"]; ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="modelInput<?php echo $product["ProductId"]; ?>" class="form-label">Model</label>
                                                <input name="productModel" class="form-control" id="modelInput<?php echo $product["ProductId"]; ?>" value="<?php echo $product["Model"]; ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="descriptionInput<?php echo $product["ProductId"]; ?>" class="form-label">Description</label>
                                                <textarea name="productDescription" rows="3" class="form-control" id="descriptionInput<?php echo $product["ProductId"]; ?>"><?php echo $product["Description"]; ?></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="formFile<?php echo $product["ProductId"]; ?>" class="form-label">Image</label>
                                                <input name="productImage" class="form-control" type="file" accept="image/*" id="formFile<?php echo $product["ProductId"]; ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="priceInput<?php echo $product["ProductId"]; ?>" class="form-label">Price</label>
                                                <input name="productPrice" type="number" min="0" class="form-control" id="priceInput<?php echo $product["ProductId"]; ?>" value="<?php echo $product["Price"]; ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="amountInput<?php echo $product["ProductId"]; ?>" class="form-label">Amount</label>
                                                <input name="productAmount" type="number" min="0" class="form-control" id="amountInput<?php echo $product["ProductId"]; ?>" value="<?php echo $product["Amount"]; ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="categoryInput<?php echo $product["ProductId"]; ?>" class="form-label">Category</label>
                                                <select name="productCategory" class="form-select" aria-label="Category select">
                                                    <?php foreach ($templateParams["categories"] as $category): ?>
                                                        <option
                                                            value="<?php echo $category["CategoryId"]; ?>"
                                                            <?php if ($product["CategoryId"] == $category["CategoryId"]): ?> selected <?php endif; ?>>
                                                            <?php echo $category["Name"]; ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="lengthInput<?php echo $product["ProductId"]; ?>" class="form-label">Length</label>
                                                        <input type="number" min="0" id="lengthInput<?php echo $product["ProductId"]; ?>" name="productLength" class="form-control" value="<?php echo $product["Length"]; ?>" aria-label=" Product length input">
                                                    </div>
                                                    <div class="col">
                                                        <label for="heightInput<?php echo $product["ProductId"]; ?>" class="form-label">Height</label>
                                                        <input type="number" min="0" id="heightInput<?php echo $product["ProductId"]; ?>" name="productHeight" class="form-control" value="<?php echo $product["Height"]; ?>" aria-label=" Product height input">
                                                    </div>
                                                    <div class="col">
                                                        <label for="widthInput<?php echo $product["ProductId"]; ?>" class="form-label">Width</label>
                                                        <input type="number" min="0" id="widthInput<?php echo $product["ProductId"]; ?>" name="productWidth" class="form-control" value="<?php echo $product["Width"]; ?>" aria-label=" Product width input">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>

</html>
