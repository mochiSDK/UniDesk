<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Inventory - UniDesk</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>

<body>
    <?php require_once "navbar.php"; ?>
    <div class="container mt-2">
        <div class="row">
            <h1>Inventory</h1>
        </div>
        <div class="row mb-2">
            <div class="col">
                <div class="input-group ms-auto" style="max-width: 25%;">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon"><i class="bi bi-plus-circle-fill"></i></button>
                    <input type="text" class="form-control" placeholder="Search product" aria-label="Search" aria-describedby="button-addon">
                </div>
            </div>
        </div>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Model</th>
                        <th scope="col">Image</th>
                        <th scope="col">Price</th>
                        <th scope="col">Amount</th>
                        <th scope="col" style="width: 10%;">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Product name</td>
                        <td>Model</td>
                        <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#imageModal"><i class="bi bi-eye-fill"></i></button></td>
                        <td>9,99€</td>
                        <td>200</td>
                        <td><button type="button" class="btn btn-secondary"><i class="bi bi-pencil-square"></i></button></td>
                    </tr>
                </tbody>
                <!-- Image Modal -->
                <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="imageModalLabel">Product Image</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img src="..." class="img-thumbnail mb-3" alt="...">
                                <input class="form-control" type="file" accept="image/*" id="formFile">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>

</html>
