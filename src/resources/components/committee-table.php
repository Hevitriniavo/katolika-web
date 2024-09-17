<div class="container-fluid mt-5" style="background-color: #f0f4f8; padding: 30px; border-radius: 12px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); font-family: 'Open Sans', sans-serif;">
    <h2 style="color: #007bff; font-weight: 600; font-family: 'Montserrat', sans-serif;"><?= $title ?></h2>
    <a href="#" id="openAddModal" class="btn btn-primary mb-3" style="background-color: #28a745; border-color: #28a745; font-weight: 500; padding: 10px 20px;">Add</a>
    <?php if (count($items) > 0): ?>
        <div class="scroll">
        <table class="table table-bordered" style="background-color: white; border: 1px solid #007bff; border-radius: 8px;">
            <thead style="background-color: #28a745; color: white; font-weight: 600; font-family: 'Montserrat', sans-serif;">
                <tr>
                    <th style="padding: 12px; font-family: 'Roboto', sans-serif;">ID</th>
                    <th style="padding: 12px; font-family: 'Roboto', sans-serif;">Name</th>
                    <th style="padding: 12px; font-family: 'Roboto', sans-serif;">Code</th>
                    <th style="padding: 12px; font-family: 'Roboto', sans-serif;">Actions</th>
                </tr>
            </thead>
            <tbody id="responsibilityCommitteeTable">
            <?php foreach ($items as $item): ?>
                <tr style="background-color: #eef7ee; transition: background-color 0.3s;">
                    <td style="padding: 12px;"><?= htmlspecialchars($item['id']); ?></td>
                    <td style="padding: 12px;"><?= htmlspecialchars($item['name']); ?></td>
                    <td style="padding: 12px;"><?= htmlspecialchars($item['code']); ?></td>
                    <td style="padding: 12px;">
                        <button class="edit-btn btn btn-warning"
                                data-committee-id="<?= htmlspecialchars($item['id']); ?>"
                                data-committee-name="<?= htmlspecialchars($item['name']); ?>"
                                data-committee-code="<?= htmlspecialchars($item['code']); ?>"
                                style="font-weight: 500; padding: 8px 16px;">Edit
                        </button>
                        <button class="delete-btn btn btn-danger"
                                data-committee-id="<?= htmlspecialchars($item['id']); ?>"
                                style="font-weight: 500; padding: 8px 16px;">Delete
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        </div>
    <?php else: ?>
        <div class="alert alert-info" role="alert" style="background-color: #d1ecf1; border-color: #bee5eb; color: #0c5460; padding: 15px; font-size: 1.1rem; font-family: 'Open Sans', sans-serif;">
            <?= $alert ?>
        </div>
    <?php endif; ?>
</div>
