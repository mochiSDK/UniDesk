<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">UniDesk</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mt-2 mb-2">
                <li class="nav-item me-lg-3 mb-2 mb-lg-0">
                    <form method="post">
                        <input type="hidden" name="theme" value="<?php echo $theme === 'dark' ? 'light' : 'dark'; ?>">
                        <button type="submit" class="btn btn-outline-secondary w-100 w-lg-auto">
                            <i class="<?php echo $theme === "dark" ? "bi-brightness-high-fill" : "bi-moon-stars-fill"; ?>"></i>
                        </button>
                    </form>
                </li>
                <li class="nav-item me-lg-3 mb-2 mb-lg-0">
                    <form method="get" action="search.php" class="w-100 w-lg-auto">
                        <div class="input-group">
                            <div class="input-group-text" id="btnGroupAddon2"><i class="bi bi-search"></i></div>
                            <label for="navbarSearch" class="visually-hidden">Search</label>
                            <input id="navbarSearch" name="search" type="text" class="form-control" placeholder="Search" aria-label="Search">
                        </div>
                    </form>
                </li>
                <li class="nav-item me-lg-3 mb-2 mb-lg-0">
                    <a href="cart.php" role="button" class="btn btn-outline-secondary w-100 w-lg-auto" title="Clicking this will redirect to cart page"><i class="bi bi-cart-fill"></i></a>
                </li>
                <li class="nav-item me-lg-3 mb-2 mb-lg-0">
                    <a href="notifications.php" role="button" class="btn btn-outline-secondary position-relative w-100 w-lg-auto" title="Clicking this will redirect you to notification page">
                        <i class="bi bi-bell-fill"></i>
                        <?php if ($templateParams["notificationsAmount"] > 0): ?>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                <?php echo $templateParams["notificationsAmount"]; ?>
                                <span class="visually-hidden">Unread notifications</span>
                            </span>
                        <?php endif; ?>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle w-100 w-lg-auto" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-fill"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="customer_profile.php">Profile</a></li>
                        <?php if ($templateParams["userType"]): ?>
                            <li><a class="dropdown-item" href="inventory.php">Inventory</a></li>
                            <li><a class="dropdown-item" href="incoming_orders.php">Orders</a></li>
                        <?php endif; ?>
                        <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
