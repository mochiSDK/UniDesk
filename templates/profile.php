<?php require_once "handlers/theme_handler.php"; ?>
<!doctype html>
<html lang="en" data-bs-theme="<?php echo $theme; ?>">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Profile</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>

<body>
  <?php require_once "navbar_controller.php"; ?>
  <div class="container-fluid">
    <div class="row">
      <!-- Profile Card -->
      <div class="col-auto">
        <div class="card text-center my-3" style="width: 18rem;">
          <div class="card-body">
            <h5 class="card-title"><?php echo $_SESSION["username"]; ?></h5>
            <p class="card-text"><?php echo $_SESSION["user_email"]; ?></p>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>
          </div>
        </div>
      </div>
      <!-- Edit Modal -->
      <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Change credentials</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="handlers/update_user.php">
              <div class="modal-body">
                <div class="form-floating mb-3">
                  <input type="text" name="username" class="form-control" id="newUsernameInput" placeholder="username">
                  <label for="newUsernameInput">New username</label>
                </div>
                <div class="input-group">
                  <div class="form-floating">
                    <input id="newPasswordInput" type="password" name="password" class="form-control" placeholder="Password">
                    <label for="newPasswordInput">New password</label>
                  </div>
                  <button id="showButton" class="btn btn-outline-secondary" type="button"><i class="bi bi-eye-fill"></i></button>
                  <script>
                    const showButton = document.getElementById("showButton")
                    const showIcon = showButton.querySelector("i")
                    const password = document.getElementById("newPasswordInput")
                    showButton.addEventListener("click", () => {
                      const isPassword = password.getAttribute("type") === "password"
                      password.setAttribute("type", isPassword ? "text" : "password")
                      showIcon.classList.toggle("bi-eye-fill", !isPassword)
                      showIcon.classList.toggle("bi-eye-slash-fill", isPassword)
                    })
                  </script>
                </div>
              </div>
              <div class="modal-footer">
                <button id="closeBtn" type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button id="saveBtn" type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- Order history -->
      <div class="col">
        <h1 class="my-2">Order History</h1>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col" style="width: 15%;">Image</th>
              <th scope="col">Name</th>
              <th scope="col">Brand</th>
              <th scope="col">Price</th>
              <th scope="col">Purchase Date</th>
              <th scope="col">Delivery Date</th>
              <th scope="col">Status</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($templateParams["productHistory"] as $product): ?>
              <tr>
                <td><?php echo $product["OrderId"]; ?></td>
                <td><img src="<?php echo $product["Picture"]; ?>" class="img-thumbnail w-50" alt="..."></td>
                <td><?php echo $product["Name"]; ?></td>
                <td><?php echo $product["Brand"]; ?></td>
                <td><?php echo $product["Price"]; ?>€</td>
                <td><?php echo $product["PurchaseDate"]; ?></td>
                <td><?php echo $product["DeliveryDate"]; ?></td>
                <td><?php echo $product["Status"]; ?></td>
                <td>
                  <a href="handlers/confirm_delivery.php?orderId=<?php echo urlencode($product['OrderId']); ?>" id="confirmDelivery<?php echo $product["OrderId"]; ?>" type="submit" class="btn btn-primary <?php if ($product["Status"] == "Delivered"): ?>disabled<?php endif; ?>">
                    Confirm delivery
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>

</html>
