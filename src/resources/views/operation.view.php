<div>
    <?= include_component("navbar") ?>
    <?= include_component("sidebar") ?>
    <div class="dashboard-wrapper">
        <div class="container-fluid mt-5" style="background-color: #f0f4f8; padding: 30px; border-radius: 12px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); font-family: 'Open Sans', sans-serif;">
            <h2 style="color: #007bff; font-weight: 600; font-family: 'Montserrat', sans-serif;">Operation Management</h2>
            
            <a href="#" id="openCreateModal" class="btn btn-success mb-3" style="background-color: #28a745; border-color: #28a745; font-weight: 500; padding: 10px 20px;">Add Operation</a>

            <div class="table-responsive">
                <table class="table table-bordered table-hover" style="background-color: white; border: 1px solid #007bff; border-radius: 8px; overflow: hidden;">
                    <thead style="background-color: #28a745; color: white; font-weight: 600; font-family: 'Montserrat', sans-serif;">
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
                            <tr style="background-color: #eef7ee; transition: background-color 0.3s;">
                                <td><?= htmlspecialchars($operation['id']) ?></td>
                                <td><?= htmlspecialchars($operation['name']) ?></td>
                                <td><?= htmlspecialchars($operation['ticket_count']) ?></td>
                                <td><?= htmlspecialchars($operation['operation_date']) ?></td>
                                <td><?= htmlspecialchars($operation['description']) ?></td>
                                <td><?= htmlspecialchars($operation['ticket_price']) ?></td>
                                <td>
                                    <button class="edit-btn btn btn-warning" 
                                            data-id="<?= htmlspecialchars($operation['id']) ?>" 
                                            data-name="<?= htmlspecialchars($operation['name']) ?>" 
                                            data-ticket_count="<?= htmlspecialchars($operation['ticket_count']) ?>" 
                                            data-operation_date="<?= htmlspecialchars($operation['operation_date']) ?>" 
                                            data-description="<?= htmlspecialchars($operation['description']) ?>" 
                                            data-ticket_price="<?= htmlspecialchars($operation['ticket_price']) ?>" 
                                            style="font-weight: 500; padding: 6px 10px;">
                                        <i class="fas fa-edit" style="font-size: 1rem; color: green"></i>
                                    </button>
                                    <button class="delete-btn btn btn-danger" 
                                            data-id="<?= htmlspecialchars($operation['id']) ?>" 
                                            style="font-weight: 500; padding: 6px 10px;">
                                        <i class="fas fa-trash" style="font-size: 1rem;"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="text-center text-muted">No operations found.</td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <!-- Modal for Create Operation -->
            <div id="createModal" class="modal fade" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Operation</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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

            <!-- Modal for Edit Operation -->
            <div id="editModal" class="modal fade" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Operation</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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

            <!-- Modal for Delete Confirmation -->
            <div id="deleteModal" class="modal fade" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Delete Operation</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to delete this operation?</p>
                            <form id="deleteForm" action="<?= path('/operations/delete') ?>" method="post">
                                <input type="hidden" id="deleteId" name="id">
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-danger me-2">Delete</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Global JavaScript file -->
<script src="<?= pubUrl("assets/global.js") ?>"></script>
