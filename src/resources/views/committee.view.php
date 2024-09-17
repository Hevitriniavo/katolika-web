<div>
    <?= include_component("navbar") ?>
    <?= include_component("sidebar") ?>
    <div class="dashboard-wrapper">

        <?= include_component("committee-table", [
            "items" => $committees,
            "title" => "Committee Management",
            "alert" => "No committees found. Please add some committees."
        ]) ?>

        <?= include_component("modals/add-committee-modal", [
            'modalTitleAdd' => 'Add Committee',
            "codeLabel" => "Committee Code",
            'addAction' => path('/committees/create'),
            'nameLabel' => 'Committee Name',
            'addButtonText' => 'Add'
        ]) ?>

        <?= include_component("modals/edit-committee-modal", [
            'modalTitleEdit' => 'Committee Region',
            'editAction' => path('/committees/update'),
            "codeLabel" => "Committee Code",
            'nameLabel' => 'Committee Name',
            'updateButtonText' => 'Update'
        ]) ?>

        <?= include_component("modals/delete-modal", [
            'itemType' => 'committee',
            'deleteAction' => path('/committees/delete')
        ]) ?>

    </div>
</div>

<script src="<?= pubUrl("assets/global.js") ?>"></script>