<div class="dashboard-main-wrapper">
    <?= include_component("navbar") ?>
    <?= include_component("sidebar") ?>
    <div class="dashboard-wrapper">

        <?= include_component("table", [
            "items" => $responsibilities,
            "title" => "Responsibility Management",
            "alert" => "No responsibilities found. Please add some responsibilities."
        ]) ?>

        <?= include_component("modals/add-modal", [
            'modalTitleAdd' => 'Add Responsibility',
            'addAction' => path('/responsibilities/create'),
            'nameLabel' => 'Responsibility Name',
            'addButtonText' => 'Add'
        ]) ?>

        <?= include_component("modals/edit-modal", [
            'modalTitleEdit' => 'Edit Responsibility',
            'editAction' => path('/responsibilities/update'),
            'nameLabel' => 'Responsibility Name',
            'updateButtonText' => 'Update'
        ]) ?>

        <?= include_component("modals/delete-modal", [
            'itemType' => 'responsibility',
            'deleteAction' => path('/responsibilities/delete')
        ]) ?>

    </div>
</div>


<script src="<?= pubUrl("assets/global.js") ?>"></script>