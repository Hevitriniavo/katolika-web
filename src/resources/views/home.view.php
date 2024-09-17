<div>
    <?= include_component("navbar") ?>
    <?= include_component("sidebar") ?>
    <div class="dashboard-wrapper">
        <div class="dashboard-ecommerce">
            <div class="container-fluid dashboard-content">
                <div class="ecommerce-widget">
                    <div class="row">
                        <!-- Card Membres -->
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="text-muted">Membres</h5>
                                    <div class="metric-value d-inline-block">
                                        <h1 class="mb-1">20</h1>
                                    </div>
                                    <div class="metric-label d-inline-block float-right text-primary font-weight-bold">
                                        <span>M/A</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card Sacrement -->
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="text-muted">Sacrement</h5>
                                    <div class="metric-value d-inline-block">
                                        <h1 class="mb-1">50</h1>
                                    </div>
                                    <div class="metric-label d-inline-block float-right text-primary font-weight-bold">
                                        <span>S/A</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card Argent -->
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="text-muted">Argent</h5>
                                    <div class="metric-value d-inline-block">
                                        <h1 class="mb-1">800</h1>
                                    </div>
                                    <div class="metric-label d-inline-block float-right text-primary font-weight-bold">
                                        <span>Ar/A</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card Zone -->
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="text-muted">Zone</h5>
                                    <div class="metric-value d-inline-block">
                                        <h1 class="mb-1">800</h1>
                                    </div>
                                    <div class="metric-label d-inline-block float-right text-primary font-weight-bold">
                                        <span>F/A</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Section Evenement -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-block">
                                <h3 class="section-title">Evenement</h3>
                            </div>
                            <div class="card">
                                <div class="campaign-table table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr class="border-0">
                                            <th class="border-0">Id:</th>
                                            <th class="border-0">Lieu</th>
                                            <th class="border-0">Start Date</th>
                                            <th class="border-0">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <!-- Répétition des événements -->
                                        <tr>
                                            <td>#</td>
                                            <td>Antananarivo</td>
                                            <td>Daty androany</td>
                                            <td>
                                                <div class="dropdown float-right">
                                                    <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown"
                                                       aria-expanded="true">
                                                        <i class="mdi mdi-dots-vertical"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="javascript:void(0);" class="dropdown-item">Annulé</a>
                                                        <a href="javascript:void(0);" class="dropdown-item">Encours</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- Plus de lignes ici -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Pagination -->
                        <div class="col-12">
                            <nav>
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link" href="#">Précédent</a></li>
                                    <li class="page-item"><a class="page-link" href="#">Suivant</a></li>
                                </ul>
                            </nav>
                        </div>

                        <!-- Footer -->
                        <div class="footer">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        Copyright © 2024 Concept. Catholique Soavimasoandro
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="text-md-right footer-links d-none d-sm-block">
                                            <a href="javascript: void(0);">Contact Us</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?= pubUrl('assets/global.js') ?>"></script>
