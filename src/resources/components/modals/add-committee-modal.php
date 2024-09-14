<div id="addModal" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close-btn" id="closeAddModal">&times;</span>
        <h3><?= $modalTitleAdd ?></h3>
        <form id="addForm" action="<?= $addAction ?>" method="post" class="needs-validation" novalidate>
            <div class="form-group">
                <label for="name"><?= $nameLabel ?></label>
                <input type="text" id="name" name="name" class="form-control" required>
                <div class="invalid-feedback">Please enter a valid name.</div>
            </div>
            <div class="form-group">
                <label for="code"><?= $codeLabel ?></label>
                <input type="text" id="code" name="code" class="form-control" required>
                <div class="invalid-feedback">Please enter a valid code.</div>
            </div>
            <button type="submit" class="btn btn-primary"><?= $addButtonText ?></button>
        </form>
    </div>
</div>
