<div>
    <?= include_component("navbar") ?>
    <?= include_component("sidebar") ?>
    <div class="dashboard-wrapper">

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">User</h5>
                <div class="card-body">

                    <table id="example3" class="table table-striped table-bordered" style="width:100%">

                        <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nom Opération</th>
                            <th scope="col">Nombre de billet</th>
                            <th scope="col">Prix</th>
                            <th scope="col">Description</th>
                            <th scope="col">Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>

                            <td>1</td>
                            <td>Locomotive</td>
                            <td>boss</td>
                            <td>125</td>
                            <td>155 <span>Ariary</span></td>
                            <td>12-12-2012</td>
                            <td>
                                <i class="fas fa-fw fa-trash"></i>

                                <i class="fas fa-fw fa-trash"></i>
                            </td>
                        </tr>
                        <tr>

                            <td>1</td>
                            <td>Locomotive</td>
                            <td>boss</td>
                            <td>125</td>
                            <td>155 <span>Ariary</span></td>
                            <td>12-12-2012</td>
                            <td>
                                <i class="fas fa-fw fa-trash"></i>

                                <i class="fas fa-fw fa-trash"></i>
                            </td>
                        </tr>
                        <tr>

                            <td>1</td>
                            <td>Locomotive</td>
                            <td>boss</td>
                            <td>125</td>
                            <td>155 <span>Ariary</span></td>
                            <td>12-12-2012</td>
                            <td>
                                <i class="fas fa-fw fa-trash"></i>

                                <i class="fas fa-fw fa-trash"></i>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

<script src="<?= pubUrl("assets/global.js") ?>"></script>