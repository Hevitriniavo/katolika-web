<div class="dashboard-main-wrapper">
    <?= include_component("navbar") ?>
    <?= include_component("sidebar") ?>
    <div class="dashboard-wrapper">

        <?= include_component("committee-table", [
            "items" => $regions,
            "title" => "Region Management",
            "alert" => "No region found. Please add some regions."
        ]) ?>

        <?= include_component("modals/add-committee-modal", [
            'modalTitleAdd' => 'Add Region',
            "codeLabel" => "Region Code",
            'addAction' => path('/regions/create'),
            'nameLabel' => 'Region Name',
            'addButtonText' => 'Add'
        ]) ?>

        <?= include_component("modals/edit-committee-modal", [
            'modalTitleEdit' => 'Edit Region',
            'editAction' => path('/regions/update'),
            "codeLabel" => "Region Code",
            'nameLabel' => 'Region Name',
            'updateButtonText' => 'Update'
        ]) ?>

        <?= include_component("modals/delete-modal", [
            'itemType' => 'region',
            'deleteAction' => path('/regions/delete')
        ]) ?>

    </div>
</div>

<script src="<?= pubUrl("assets/global.js") ?>"></script>