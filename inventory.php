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
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Product name</td>
                        <td>Model</td>
                        <td><button type="button" class="btn btn-primary"><i class="bi bi-eye-fill"></i></button></td>
                        <td>9,99€</td>
                        <td>200</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Product name</td>
                        <td>Model</td>
                        <td><button type="button" class="btn btn-primary"><i class="bi bi-eye-fill"></i></button></td>
                        <td>5,25€</td>
                        <td>125</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>

</html>
