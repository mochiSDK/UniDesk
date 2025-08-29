<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">UniDesk</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item me-2">
                    <button id="themetoggle" type="button" class="btn btn-outline-secondary" data-bs-toggle="button"><i class="bi-brightness-high-fill"></i></button>
                    <script>
                        const toggleButton = document.getElementById('themetoggle')
                        const themeIcon = toggleButton.querySelector("i")
                        toggleButton.addEventListener("click", () => {
                            const isActive = toggleButton.classList.contains("active")
                            document.documentElement.setAttribute("data-bs-theme", isActive ? "dark" : "light")
                            themeIcon.classList.toggle("bi-moon-stars-fill", isActive)
                            themeIcon.classList.toggle("bi-brightness-high-fill", !isActive)
                        })
                    </script>
                </li>
                <li class="nav-item me-2">
                    <div class="input-group">
                        <div class="input-group-text" id="btnGroupAddon2"><i class="bi bi-search"></i></div>
                        <form method="get" action="search.php">
                            <input name="search" type="text" class="form-control" placeholder="Search" aria-label="Search">
                        </form>
                    </div>
                </li>
                <li class="nav-item me-2">
                    <a href="cart.php" role="button" class="btn btn-outline-secondary"><i class="bi bi-cart-fill"></i></a>
                </li>
                <li class="nav-item me-2">
                <a href="notifications.php" role="button" class="btn btn-outline-secondary"><i class="bi bi-bell-fill"></i></a>
                </li>
                <li class="nav-item dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
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
