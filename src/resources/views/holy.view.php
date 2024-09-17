<div>
    <?= include_component("navbar") ?>
    <?= include_component("sidebar") ?>
    <div class="dashboard-wrapper">

        <?= include_component("table", [
            "items" => $holies,
            "title" => "Holy Management",
            "alert" => "No holies found. Please add some holies."
        ]) ?>

        <?= include_component("modals/add-modal", [
            'modalTitleAdd' => 'Add Holy',
            'addAction' => path('/holies/create'),
            'nameLabel' => 'Holy Name',
            'addButtonText' => 'Add'
        ]) ?>

        <?= include_component("modals/edit-modal", [
            'modalTitleEdit' => 'Holy Region',
            'editAction' => path('/holies/update'),
            'nameLabel' => 'Holy Name',
            'updateButtonText' => 'Update'
        ]) ?>

        <?= include_component("modals/delete-modal", [
            'itemType' => 'holy',
            'deleteAction' => path('/holies/delete')
        ]) ?>

    </div>
</div>

<script src="<?= pubUrl("assets/global.js") ?>"></script>