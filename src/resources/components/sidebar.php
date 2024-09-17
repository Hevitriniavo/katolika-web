<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" style="font-family: 'Roboto', sans-serif;" href="<?= path("/responsibilities") ?>"
                           data-target="#submenu-3" aria-controls="submenu-3">
                            <i class="fas fa-tasks"></i> Responsibility
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" style="font-family: 'Roboto', sans-serif;" href="<?= path("/regions") ?>"
                           data-target="#submenu-3" aria-controls="submenu-3">
                            <i class="fas fa-map-marker-alt"></i> Region
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" style="font-family: 'Roboto', sans-serif;" href="<?= path("/holies") ?>"
                           data-target="#submenu-3" aria-controls="submenu-3">
                            <i class="fas fa-church"></i> Holy
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" style="font-family: 'Roboto', sans-serif;" href="<?= path("/committees") ?>"
                           data-target="#submenu-3" aria-controls="submenu-3">
                            <i class="fas fa-users"></i> Committee
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" style="font-family: 'Roboto', sans-serif;" href="<?= path("/sacraments") ?>"
                           data-target="#submenu-3" aria-controls="submenu-3">
                            <i class="fas fa-cross"></i> Sacrament
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" style="font-family: 'Roboto', sans-serif;" href="<?= path("/activities") ?>"
                           data-target="#submenu-3" aria-controls="submenu-3">
                            <i class="fas fa-running"></i> Activity
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" style="font-family: 'Roboto', sans-serif;" href="<?= path("/users") ?>"
                           data-target="#submenu-3" aria-controls="submenu-3">
                            <i class="fas fa-user"></i> User
                        </a>
                    </li>
                    <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-user"></i> vola
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="<?= path("/users") ?>">Users</a>
        <a class="dropdown-item" href="<?= path("/settings") ?>">Settings</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="<?= path("/logout") ?>">Logout</a>
    </div>
</li>
                </ul>
            </div>
        </nav>
    </div>
</div>
