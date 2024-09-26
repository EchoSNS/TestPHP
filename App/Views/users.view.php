<?php require("partials/header.php") ?>

<?php require 'partials/nav.php'; ?>

    <section class="page-wrapper bg-gra font-poppins">
        <div class="container wrapper wrapper--w680 p-t-120 p-b-100 font-poppins">
            <div class="card text-center">
                <div class="card-body">
                    <h2 class="title">List of Users</h2>

                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
                    <?php endif; ?>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email Address</th>
                                <th scope="col">Profile Picture</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (!empty($data)): ?>
                                <?php foreach ($data as $user): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($user['first_name'] . " " . $user['middle_name'] . " " . $user['last_name']) ?></td>
                                        <td><?= htmlspecialchars($user['email']) ?></td>
                                        <td>
                                            <img src="/uploads/<?= htmlspecialchars(urlencode($user['profile_image'])) ?>" alt="Profile Image" style="max-width: 100px; max-height: 100px;" />
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="3">No users found.</td>
                                </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php require("partials/footer.php") ?>