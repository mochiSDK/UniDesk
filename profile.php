<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
  </head>
  <body>
    <?php require_once "navbar.php"; ?>
    <div class="container-fluid">
      <div class="row">
        <div class="col-auto">
          <div class="card text-center my-3" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">email@mail.com</h5>
              <a href="#" class="btn btn-primary">Edit</a>
            </div>
          </div>
        </div>
        <div class="col">
          <h1 class="my-2">Order History</h1>
          <table class="table">
            <thead>
              <tr>
                <th scope="col" style="width: 20%;">Product</th>
                <th scope="col">Name</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <img src="..." class="img-thumbnail" alt="...">
                </td>
                <td>Name</td>
              </tr>
              <tr>
                <td>img2</td>
                <td>Name</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
  </body>
</html>
