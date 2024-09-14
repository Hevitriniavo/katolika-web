<div id="editCommitteeModal" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close-btn" id="closeEditCommitteeModal">&times;</span>
        <h3><?= $modalTitleEdit ?></h3>
        <form id="editForm" action="<?= $editAction ?>" method="post" class="needs-validation" novalidate>
            <input type="hidden" id="editId" name="id">

            <div class="form-group">
                <label for="editName"><?= $nameLabel ?></label>
                <input type="text" id="editName" name="name" class="form-control" required>
                <div class="invalid-feedback">Please enter a valid name.</div>
            </div>

            <div class="form-group">
                <label for="editCode"><?= $codeLabel ?></label>
                <input type="text" id="editCode" name="code" class="form-control" required>
                <div class="invalid-feedback">Please enter a valid code.</div>
            </div>

            <button type="submit" class="btn btn-primary"><?= $updateButtonText ?></button>
        </form>
    </div>
</div>
