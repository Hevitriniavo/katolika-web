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
                        <button class="btn btn-sm btn-warning edit-ticket-btn"
                                data-id="<?= $ticket['id'] ?>"
                                data-from="<?= $ticket['from'] ?>"
                                data-to="<?= $ticket['to'] ?>"
                                data-operation_id="<?= $ticket['operation_id'] ?>"
                                data-account_id="<?= $ticket['account_id'] ?>"
                                data-paid="<?= $ticket['paid'] ?>"
                                data-distribution="<?= $ticket['distribution'] ?>">Edit</button>
                        <button class="btn btn-sm btn-danger delete-ticket-btn"
                                data-id="<?= $ticket['id'] ?>">Delete</button>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
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
                    <div class="form-group">
                        <label for="from">From</label>
                        <input type="number" class="form-control" id="from" name="from" required>
                    </div>
                    <div class="form-group">
                        <label for="to">To</label>
                        <input type="number" class="form-control" id="to" name="to" required>
                    </div>
                    <div class="form-group">
                        <label for="operation_id">Operation ID</label>
                        <input type="number" class="form-control" id="operation_id" name="operation_id" required>
                    </div>
                    <div class="form-group">
                        <label for="account_id">Account ID</label>
                        <input type="number" class="form-control" id="account_id" name="account_id" required>
                    </div>
                    <div class="form-group">
                        <label for="paid">Paid</label>
                        <input type="text" class="form-control" id="paid" name="paid">
                    </div>
                    <div class="form-group">
                        <label for="distribution">Distribution</label>
                        <input type="text" class="form-control" id="distribution" name="distribution">
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
                    <div class="form-group">
                        <label for="editFrom">From</label>
                        <input type="number" class="form-control" id="editFrom" name="from" required>
                    </div>
                    <div class="form-group">
                        <label for="editTo">To</label>
                        <input type="number" class="form-control" id="editTo" name="to" required>
                    </div>
                    <div class="form-group">
                        <label for="editOperationId">Operation ID</label>
                        <input type="number" class="form-control" id="editOperationId" name="operation_id" required>
                    </div>
                    <div class="form-group">
                        <label for="editAccountId">Account ID</label>
                        <input type="number" class="form-control" id="editAccountId" name="account_id" required>
                    </div>
                    <div class="form-group">
                        <label for="editPaid">Paid</label>
                        <input type="text" class="form-control" id="editPaid" name="paid">
                    </div>
                    <div class="form-group">
                        <label for="editDistribution">Distribution</label>
                        <input type="text" class="form-control" id="editDistribution" name="distribution">
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
            <form id="deleteTicketForm" method="POST" action="<?= path('/tickets/delete') ?>">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteTicketModalLabel">Delete Ticket</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="deleteTicketId">
                    <p>Are you sure you want to delete this ticket?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="<?= pubUrl("assets/global.js") ?>"></script>


