<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Incoming Orders</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>

<body>
    <?php require_once "navbar.php"; ?>
    <div class="container-fluid mt-2">
        <h1>Incoming Orders</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" style="width: 10%;">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col" style="width: 10%;">Price</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($templateParams["orders"] as $order): ?>
                    <tr>
                        <td><img src="<?php echo $order["Picture"] ?>" class="img-thumbnail" alt="Order Picture"></td>
                        <td><?php echo $order["Name"] ?></td>
                        <td><?php echo $order["Price"] ?>€</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>

</html>
