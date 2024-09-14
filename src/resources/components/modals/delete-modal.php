<div id="deleteModal" class="modal">
    <div class="modal-content">
        <span class="close-btn" id="closeDeleteModal">&times;</span>
        <h3>Confirm Deletion</h3>
        <p>Are you sure you want to delete this <?= $itemType ?>?</p>
        <form id="deleteForm" action="<?= $deleteAction ?>" method="post">
            <input type="hidden" id="deleteId" name="id">
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="cancelDelete">Cancel</button>
                <button type="submit" class="btn btn-danger">Delete</button>
            </div>
        </form>
    </div>
</div>
