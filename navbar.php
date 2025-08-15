<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">UniDesk</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item me-2">
                    <button id="themetoggle" type="button" class="btn btn-outline-secondary" data-bs-toggle="button"><i class="bi bi-moon-stars-fill"></i></button>
                    <script>
                        const toggleButton = document.getElementById('themetoggle')
                        const icon = toggleButton.querySelector("i")
                        toggleButton.addEventListener("click", () => {
                            if (toggleButton.classList.contains("active")) {
                                document.documentElement.setAttribute("data-bs-theme", "dark")
                                icon.classList.remove("bi-moon-stars-fill")
                                icon.classList.add("bi-brightness-high-fill")
                            } else {
                                document.documentElement.setAttribute("data-bs-theme", "light")
                                icon.classList.remove("bi-brightness-high-fill")
                                icon.classList.add("bi-moon-stars-fill")
                            }
                        })
                    </script>
                </li>
                <li class="nav-item me-2">
                    <div class="input-group">
                        <div class="input-group-text" id="btnGroupAddon2"><i class="bi bi-search"></i></div>
                        <input type="text" class="form-control" placeholder="Search" aria-label="Search">
                    </div>
                </li>
                <li class="nav-item me-2">
                    <button type="button" class="btn btn-outline-secondary"><i class="bi bi-cart-fill"></i></button>
                </li>
                <li class="nav-item me-2">
                    <button type="button" class="btn btn-outline-secondary"><i class="bi bi-bell-fill"></i></button>
                </li>
                <li class="nav-item dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-fill"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><a class="dropdown-item" href="#">Sign out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
