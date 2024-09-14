<div class="container-fluid mt-5">
    <h2><?= $title ?></h2>
    <a href="#" id="openAddModal" class="btn btn-primary mb-3">Add</a>
    <?php if (count($items) > 0): ?>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Code</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody id="responsibilityCommitteeTable">
            <?php foreach ($items as $item): ?>
                <tr>
                    <td><?= htmlspecialchars($item['id']); ?></td>
                    <td><?= htmlspecialchars($item['name']); ?></td>
                    <td><?= htmlspecialchars($item['code']); ?></td>
                    <td>
                        <button class="edit-btn btn btn-warning"
                                data-committee-id="<?= htmlspecialchars($item['id']); ?>"
                                data-committee-name="<?= htmlspecialchars($item['name']); ?>"
                                data-committee-code="<?= htmlspecialchars($item['code']); ?>">Edit
                        </button>
                        <button class="delete-btn btn btn-danger"
                                data-committee-id="<?= htmlspecialchars($item['id']); ?>">Delete
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-info" role="alert">
            <?= $alert ?>
        </div>
    <?php endif; ?>
</div>
