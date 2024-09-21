<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/css/bootstrap.min.css" rel="stylesheet">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/js/bootstrap.bundle.min.js"></script>
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
                            <i class="fas fa-user"></i> Herivelona
                        </a>
                    </li>
                            <li class="nav-item">
                                <a class="nav-link" style="font-family: 'Roboto', sans-serif;" href="<?= path("/users") ?>"
                                      data-target="#submenu-3" aria-controls="submenu-3">
                                      <i class="fas fa-search"></i> Recherche
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                 <a class="nav-link dropdown-toggle" style="font-family: 'Roboto', sans-serif;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-running"></i> finding money
                                 </a>
                                    <div class="dropdown-menu custom-dropdown" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="<?= path("/operations") ?>">Operations</a>
                                        <a class="dropdown-item" href="<?= path("/tickets") ?>">Billet</a>
                                        <a class="dropdown-item" href="<?= path("/marking") ?>">Marquage</a>
                                        <a class="dropdown-item" href="<?= path("/situations") ?>">Situation</a>
                                        <a class="dropdown-item" href="<?= path("/distributions") ?>">Distrubution</a>
                                        <a class="dropdown-item" href="<?= path("/results") ?>">Résultat</a>
                                    </div>
                             </li>
                             <li class="nav-item">
                                <a class="nav-link" style="font-family: 'Roboto', sans-serif;" href="<?= path("/users") ?>"
                                      data-target="#submenu-3" aria-controls="submenu-3">
                                      <i class="fas fa-chart-bar"></i>Statisique
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" style="font-family: 'Roboto', sans-serif;" href="<?= path("/users") ?>"
                                      data-target="#submenu-3" aria-controls="submenu-3">
                                      <i class="fas fa-calendar-alt"></i> Calendrier
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" style="font-family: 'Roboto', sans-serif;" href="<?= path("/users") ?>"
                                      data-target="#submenu-3" aria-controls="submenu-3">
                                      <i class="fas fa-user-check"></i> Présence
                                </a>
                            </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
