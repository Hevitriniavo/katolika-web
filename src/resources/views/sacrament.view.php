<div>
    <?= include_component("navbar") ?>
    <?= include_component("sidebar") ?>
    <div class="dashboard-wrapper">

        <?= include_component("table", [
            "items" => $sacraments,
            "title" => "Sacrament Management",
            "alert" => "No sacraments found. Please add some sacraments."
        ]) ?>

        <?= include_component("modals/add-modal", [
            'modalTitleAdd' => 'Add Sacrament',
            'addAction' => path('/sacraments/create'),
            'nameLabel' => 'Sacrament Name',
            'addButtonText' => 'Add'
        ]) ?>

        <?= include_component("modals/edit-modal", [
            'modalTitleEdit' => 'Edit Sacrament',
            'editAction' => path('/sacraments/update'),
            'nameLabel' => 'Sacrament Name',
            'updateButtonText' => 'Update'
        ]) ?>

        <?= include_component("modals/delete-modal", [
            'itemType' => 'sacrament',
            'deleteAction' => path('/sacraments/delete')
        ]) ?>

    </div>
</div>

<script src="<?= pubUrl("assets/global.js") ?>"></script>