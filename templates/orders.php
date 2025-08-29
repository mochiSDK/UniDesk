<?php require_once "handlers/theme_handler.php"; ?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="<?php echo $theme; ?>">

<head>
    <meta charset="utf-8">
    <title>Incoming Orders</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>

<body>
    <?php require_once "navbar_controller.php"; ?>
    <div class="container-fluid mt-2">
        <h1>Incoming Orders</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" style="width: 10%;">#</th>
                    <th scope="col">Purchase Date</th>
                    <th scope="col">Delivery Date</th>
                    <th scope="col">Total</th>
                    <th scope="col">Action</th>
                    <th scope="col">Order</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($templateParams["ordersIdsDatesTotal"] as $order): ?>
                    <tr>
                        <td><?php echo $order["OrderId"] ?></td>
                        <td><?php echo $order["PurchaseDate"] ?></td>
                        <td><?php echo $order["DeliveryDate"] ?></td>
                        <td><?php echo $order["Total"] ?>€</td>
                        <td><a href="handlers/ship_order.php?orderId=<?php echo $order['OrderId']; ?>&email=<?php echo $order["Email"]; ?>" type="submit" class="btn btn-primary">Ship</a></td>
                        <td>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width: 50%;">Name</th>
                                        <th scope="col">Brand</th>
                                        <th scope="col">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($templateParams["orderDetails"][$order["OrderId"]] as $orderDetail): ?>
                                        <tr>
                                            <td><?php echo $orderDetail["Name"] ?></td>
                                            <td><?php echo $orderDetail["Brand"] ?></td>
                                            <td><?php echo $orderDetail["Price"] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>

</html>
