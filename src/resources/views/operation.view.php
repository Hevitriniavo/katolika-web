<div>
    <?= include_component("navbar") ?>
    <?= include_component("sidebar") ?>
    <div class="dashboard-wrapper">

        <div class="container mt-5">
            <h1 class="mb-4">Operation Management</h1>
            <button id="openCreateModal" class="btn btn-success mb-3">Add Operation</button>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Ticket Count</th>
                        <th>Operation Date</th>
                        <th>Description</th>
                        <th>Ticket Price</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if (!empty($operations)): ?>
                        <?php foreach ($operations as $operation): ?>
                            <tr>
                                <td><?= htmlspecialchars($operation['id']) ?></td>
                                <td><?= htmlspecialchars($operation['name']) ?></td>
                                <td><?= htmlspecialchars($operation['ticket_count']) ?></td>
                                <td><?= htmlspecialchars($operation['operation_date']) ?></td>
                                <td><?= htmlspecialchars($operation['description']) ?></td>
                                <td><?= htmlspecialchars($operation['ticket_price']) ?></td>
                                <td>
                                    <button class="btn btn-warning btn-sm edit-btn" data-id="<?= htmlspecialchars($operation['id']) ?>" data-name="<?= htmlspecialchars($operation['name']) ?>" data-ticket_count="<?= htmlspecialchars($operation['ticket_count']) ?>" data-operation_date="<?= htmlspecialchars($operation['operation_date']) ?>" data-description="<?= htmlspecialchars($operation['description']) ?>" data-ticket_price="<?= htmlspecialchars($operation['ticket_price']) ?>">Edit</button>
                                    <button class="btn btn-danger btn-sm delete-btn" data-id="<?= htmlspecialchars($operation['id']) ?>">Delete</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="text-center">No operations found.</td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<div id="createModal" class="modal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Operation</h5>
                <span class="close-btn" data-bs-dismiss="modal" aria-label="Close">&times;</span>
            </div>
            <div class="modal-body">
                <form id="createForm" action="<?= path('/operations/create') ?>" method="post">
                    <div class="mb-3">
                        <label for="createName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="createName" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="createTicketCount" class="form-label">Ticket Count</label>
                        <input type="number" class="form-control" id="createTicketCount" name="ticket_count" required>
                    </div>
                    <div class="mb-3">
                        <label for="createOperationDate" class="form-label">Operation Date</label>
                        <input type="date" class="form-control" id="createOperationDate" name="operation_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="createDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="createDescription" name="description" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="createTicketPrice" class="form-label">Ticket Price</label>
                        <input type="number" class="form-control" id="createTicketPrice" name="ticket_price" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="editModal" class="modal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Operation</h5>
                <span class="close-btn" data-bs-dismiss="modal" aria-label="Close">&times;</span>
            </div>
            <div class="modal-body">
                <form id="editForm" action="<?= path('/operations/update') ?>" method="post">
                    <input type="hidden" id="editId" name="id">
                    <div class="mb-3">
                        <label for="editName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="editName" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="editTicketCount" class="form-label">Ticket Count</label>
                        <input type="number" class="form-control" id="editTicketCount" name="ticket_count" required>
                    </div>
                    <div class="mb-3">
                        <label for="editOperationDate" class="form-label">Operation Date</label>
                        <input type="date" class="form-control" id="editOperationDate" name="operation_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="editDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="editDescription" name="description" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="editTicketPrice" class="form-label">Ticket Price</label>
                        <input type="number" class="form-control" id="editTicketPrice" name="ticket_price" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="deleteModal" class="modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Operation</h5>
                <span class="close-btn" data-bs-dismiss="modal" aria-label="Close">&times;</span>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this operation?</p>
                <form id="deleteForm" action="<?= path('/operations/delete') ?>" method="post">
                    <input type="hidden" id="deleteId" name="id">
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-danger me-2">Delete</button>
                        <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="<?= pubUrl("assets/global.js") ?>"></script>