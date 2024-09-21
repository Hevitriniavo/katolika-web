<div>
    <?= include_component("navbar") ?>
    <?= include_component("sidebar") ?>
    <div class="dashboard-wrapper">
        <div class="container-fluid mt-5" style="background-color: #f0f4f8; padding: 30px; border-radius: 12px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); font-family: 'Open Sans', sans-serif;">
            <h2 style="color: #007bff; font-weight: 600; font-family: 'Montserrat', sans-serif;">Ticket Management</h2>
            <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#ticketModal" style="background-color: #28a745; border-color: #28a745; font-weight: 500; padding: 10px 20px;">Add Ticket</button>

            <!-- Tickets Table -->
            <div class="scroll">
                <table class="table table-bordered" style="background-color: white; border: 1px solid #007bff; border-radius: 8px; overflow: hidden;">
                    <thead style="background-color: #28a745; color: white; font-weight: 600; font-family: 'Montserrat', sans-serif;">
                        <tr>
                            <th style="padding: 12px; font-family: 'Roboto', sans-serif;">ID</th>
                            <th style="padding: 12px; font-family: 'Roboto', sans-serif;">From</th>
                            <th style="padding: 12px; font-family: 'Roboto', sans-serif;">To</th>
                            <th style="padding: 12px; font-family: 'Roboto', sans-serif;">Operation ID</th>
                            <th style="padding: 12px; font-family: 'Roboto', sans-serif;">Account ID</th>
                            <th style="padding: 12px; font-family: 'Roboto', sans-serif;">Paid</th>
                            <th style="padding: 12px; font-family: 'Roboto', sans-serif;">Distribution</th>
                            <th style="padding: 12px; font-family: 'Roboto', sans-serif;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($tickets as $ticket): ?>
                        <tr style="background-color: #eef7ee; transition: background-color 0.3s;">
                            <td style="padding: 12px;"><?= htmlspecialchars($ticket['id']); ?></td>
                            <td style="padding: 12px;"><?= htmlspecialchars($ticket['from']); ?></td>
                            <td style="padding: 12px;"><?= htmlspecialchars($ticket['to']); ?></td>
                            <td style="padding: 12px;"><?= htmlspecialchars($ticket['operation_id']); ?></td>
                            <td style="padding: 12px;"><?= htmlspecialchars($ticket['account_id']); ?></td>
                            <td style="padding: 12px;"><?= htmlspecialchars($ticket['paid']); ?></td>
                            <td style="padding: 12px;"><?= htmlspecialchars($ticket['distribution']); ?></td>
                            <td style="padding: 12px;">
                                <button class="edit-btn btn btn-warning"
                                        data-id="<?= htmlspecialchars($ticket['id']); ?>"
                                        style="font-weight: 500; padding: 6px 10px;">
                                    <i class="fas fa-edit" style="font-size: 1rem; color: green;"></i>
                                </button>
                                <button class="delete-btn btn btn-danger"
                                        data-id="<?= htmlspecialchars($ticket['id']); ?>"
                                        style="font-weight: 500; padding: 6px 10px;">
                                    <i class="fas fa-trash" style="font-size: 1rem;"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Ticket Modal -->
<div class="modal fade" id="ticketModal" tabindex="-1" role="dialog" aria-labelledby="ticketModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius: 12px;">
            <form id="ticketForm" method="POST" action="<?= path('/tickets/save') ?>">
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
                    <button type="submit" class="btn btn-primary" style="background-color: #28a745;">Save Ticket</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="<?= pubUrl("assets/global.js") ?>"></script>
