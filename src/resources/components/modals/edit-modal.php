<div id="editModal" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close-btn" id="closeEditModal">&times;</span>
        <h3><?= $modalTitleEdit ?></h3>
        <form id="editForm" action="<?= $editAction ?>" method="post" class="needs-validation" novalidate>
            <input type="hidden" id="editId" name="id">

            <div class="form-group">
                <label for="editName"><?= $nameLabel ?></label>
                <input type="text" id="editName" name="name" class="form-control" required>
                <div class="invalid-feedback">Please enter a valid name.</div>
            </div>

            <button type="submit" class="btn btn-primary"><?= $updateButtonText ?></button>
        </form>
    </div>
</div>
