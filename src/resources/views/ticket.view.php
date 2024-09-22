<div>
    <?= include_component("navbar") ?>
    <?= include_component("sidebar") ?>
    <div class="dashboard-wrapper">
        <div class="col-xl-12 mt-5 col-lg-12 col-md-12 col-sm-12 col-12">
            <h1>Ticket Management</h1>
            <button class="btn btn-primary" data-toggle="modal" data-target="#ticketModal">Add Ticket</button>

            <table class="table mt-4">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Operation ID</th>
                    <th>Account ID</th>
                    <th>Paid</th>
                    <th>Distribution</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($tickets as $ticket): ?>
                    <tr>
                        <td><?= $ticket['id'] ?></td>
                        <td><?= $ticket['from'] ?></td>
                        <td><?= $ticket['to'] ?></td>
                        <td><?= $ticket['operation_id'] ?></td>
                        <td><?= $ticket['account_id'] ?></td>
                        <td><?= $ticket['paid'] ?></td>
                        <td><?= $ticket['distribution'] ?></td>
                        <td>
                            <button class="btn btn-warning btn-sm edit-ticket-btn"
                                    data-id="<?= $ticket['id'] ?>"
                                    data-from="<?= $ticket['from'] ?>"
                                    data-to="<?= $ticket['to'] ?>"
                                    data-operation_id="<?= $ticket['operation_id'] ?>"
                                    data-account_id="<?= $ticket['account_id'] ?>"
                                    data-paid="<?= $ticket['paid'] ?>"
                                    data-distribution="<?= $ticket['distribution'] ?>">
                                Edit
                            </button>
                            <button class="btn btn-danger btn-sm delete-ticket-btn"
                                    data-id="<?= $ticket['id'] ?>">
                                Delete
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="ticketModal" tabindex="-1" role="dialog" aria-labelledby="ticketModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="ticketForm" method="POST" action="<?= path('/tickets/create') ?>">
                <div class="modal-header">
                    <h5 class="modal-title" id="ticketModalLabel">Add Ticket</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="ticketId">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="from">From</label>
                                <input type="number" class="form-control" id="from" name="from" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="to">To</label>
                                <input type="number" class="form-control" id="to" name="to" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="operation_id">Operation</label>
                                <select class="form-control" id="operation_id" name="operation_id" required>
                                    <option value="" disabled selected>Select an operation</option>
                                    <?php foreach ($operations as $operation): ?>
                                        <option value="<?= htmlspecialchars($operation["id"]) ?>">
                                            <?= htmlspecialchars($operation["name"]) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">Please select an operation.</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="account_id">Account</label>
                                <select class="form-control" id="account_id" name="account_id" required>
                                    <option value="" disabled selected>Select an account</option>
                                    <?php foreach ($users as $user): ?>
                                        <option value="<?= htmlspecialchars($user["id"]) ?>">
                                            <?= htmlspecialchars($user["name"]) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">Please select an account.</div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="distribution">Distribution</label>
                                <input type="text" class="form-control" id="distribution" name="distribution">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check form-switch mt-4">
                                <input class="form-check-input" type="checkbox" id="paidSwitch" name="paid" value="paid" onchange="updateLabel()">
                                <label class="form-check-label" for="paidSwitch" id="switchLabel">Not Paid</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Ticket</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editTicketModal" tabindex="-1" role="dialog" aria-labelledby="editTicketModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="editTicketForm" method="POST" action="<?= path('/tickets/update') ?>">
                <div class="modal-header">
                    <h5 class="modal-title" id="editTicketModalLabel">Edit Ticket</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="editTicketId">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="editFrom">From</label>
                                <input type="number" class="form-control" id="editFrom" name="from" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="editTo">To</label>
                                <input type="number" class="form-control" id="editTo" name="to" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="editOperationId">Operation</label>
                                <select class="form-control" id="editOperationId" name="operation_id" required>
                                    <option value="" disabled>Select an operation</option>
                                    <?php foreach ($operations as $operation): ?>
                                        <option value="<?= htmlspecialchars($operation["id"]) ?>">
                                            <?= htmlspecialchars($operation["name"]) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="editAccountId">Account</label>
                                <select class="form-control" id="editAccountId" name="account_id" required>
                                    <option value="" disabled>Select an account</option>
                                    <?php foreach ($users as $user): ?>
                                        <option value="<?= htmlspecialchars($user["id"]) ?>">
                                            <?= htmlspecialchars($user["name"]) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="editDistribution">Distribution</label>
                                <input type="text" class="form-control" id="editDistribution" name="distribution">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check form-switch mt-4">
                                <input class="form-check-input" type="checkbox" id="editPaidSwitch" name="paid" value="paid">
                                <label class="form-check-label" for="editPaidSwitch" id="editSwitchLabel">Not Paid</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Ticket</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteTicketModal" tabindex="-1" role="dialog" aria-labelledby="deleteTicketModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="deleteTicketForm" action="<?= path("/tickets/delete") ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteTicketModalLabel">Delete Ticket</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this ticket?</p>
                    <input type="hidden" name="id" id="deleteTicketId">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteButton">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="<?= pubUrl("assets/global.js") ?>"></script>