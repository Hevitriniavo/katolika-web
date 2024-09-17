<div class="dashboard-main-wrapper">
    <?= include_component("navbar") ?>
    <?= include_component("sidebar") ?>
    <div class="dashboard-wrapper">
        <div class="container-fluid mt-5">
            <h2>User Management</h2>

            <a href="<?= path("/users/create") ?>" id="openAddModal" class="btn btn-primary mb-3">Add</a>

            <?php if (count($users) > 0): ?>
                <div class="scroll">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Username</th>
                        <th>region</th>
                
                        <th>Address</th>
                        <th>Birth Date</th>
                        <th>Gender</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody id="responsibilityTable" >
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= htmlspecialchars($user['id']); ?></td>
                            <td><?= htmlspecialchars($user['first_name']); ?></td>
                            <td><?= htmlspecialchars($user['last_name']); ?></td>
                            <td><?= htmlspecialchars($user['username']); ?></td>
                           
                            <td>
                                <?php if (!empty($user['photo'])): ?>
                                    <img src="<?= htmlspecialchars($user['photo']); ?>" alt="User Photo" style="width: 50px; height: auto;">
                                <?php else: ?>
                                    No Photo
                                <?php endif; ?>
                            </td>
                            <td><?= htmlspecialchars($user['address']); ?></td>
                            <td><?= htmlspecialchars($user['birth_date']); ?></td>
                            <td><?= htmlspecialchars($user['gender']); ?></td>
                            <td>
                                <a href="<?= path("/users/update?id=" . $user['id']) ?>" class="btn btn-warning">Edit</a>
                                <form action="<?= path("/users/delete") ?>" method="POST" style="display:inline;">
                                    <input type="hidden" name="id" value="<?= htmlspecialchars($user['id']); ?>">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                </div>
            <?php else: ?>
                <div class="alert alert-info" role="alert">
                    No users found. Please add some users.
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<script src="<?= pubUrl("assets/global.js") ?>"></script>
