<div>
    <?= include_component("navbar") ?>
    <?= include_component("sidebar") ?>
    <div class="dashboard-wrapper">

        <?= include_component("table", [
            "items" => $activities,
            "title" => "Activity Management",
            "alert" => "No activity found. Please add some activities."
        ]) ?>

        <?= include_component("modals/add-modal", [
            'modalTitleAdd' => 'Add Activity',
            'addAction' => path('/activities/create'),
            'nameLabel' => 'Activity Name',
            'addButtonText' => 'Add'
        ]) ?>

        <?= include_component("modals/edit-modal", [
            'modalTitleEdit' => 'Edit Activity',
            'editAction' => path('/activities/update'),
            'nameLabel' => 'Activity Name',
            'updateButtonText' => 'Update'
        ]) ?>

        <?= include_component("modals/delete-modal", [
            'itemType' => 'activity',
            'deleteAction' => path('/activities/delete')
        ]) ?>


    </div>
</div>


<script src="<?= pubUrl("assets/global.js") ?>"></script>