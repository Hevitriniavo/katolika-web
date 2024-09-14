<div class="container-fluid mt-5">
    <h2><?= $title ?></h2>

    <a href="#" id="openAddModal" class="btn btn-primary mb-3">Add </a>
    <?php if (count($items) > 0): ?>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody id="responsibilityTable">
            <?php foreach ($items as $item): ?>
                <tr>
                    <td><?= htmlspecialchars($item['id']); ?></td>
                    <td><?= htmlspecialchars($item['name']); ?></td>
                    <td>
                        <button class="edit-btn btn btn-warning"
                                data-id="<?= htmlspecialchars($item['id']); ?>"
                                data-name="<?= htmlspecialchars($item['name']); ?>">Edit
                        </button>
                        <button class="delete-btn btn btn-danger"
                                data-id="<?= htmlspecialchars($item['id']); ?>"
                                data-name="<?= htmlspecialchars($item['name']); ?>">Delete
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