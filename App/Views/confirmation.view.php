<?php require("partials/header.php") ?>

<?php require 'partials/nav.php'; ?>

    <section class="page-wrapper bg-gra font-poppins">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow-sm mt-5">
                        <div class="card-body text-center">
                            <h2 class="card-title">Registration Successful!</h2>
                            <img src="uploads/<?= htmlspecialchars($profile_image) ?>" alt="Profile Image" class="img-fluid rounded-circle mb-3" style="width: 100px; height: 100px;" />
                            <div class="user-info text-left">
                                <p><strong>First Name:</strong> <?= htmlspecialchars($_POST['fName']) ?></p>
                                <p><strong>Middle Name:</strong> <?= htmlspecialchars($_POST['mName']) ?></p>
                                <p><strong>Last Name:</strong> <?= htmlspecialchars($_POST['lName']) ?></p>
                                <p><strong>Email:</strong> <?= htmlspecialchars($_POST['email']) ?></p>
                                <p><strong>Phone Number:</strong> <?= htmlspecialchars($_POST['phoneNumber']) ?></p>
                            </div>
                            <a href="/users" class="btn btn-primary">View Users</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php require("partials/footer.php") ?>