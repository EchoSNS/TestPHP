<?php require("partials/header.php") ?>

<?php require 'partials/nav.php'; ?>

<section class="page-wrapper bg-gra font-poppins">
    <div class="container wrapper wrapper--w680 p-t-120 p-b-100 font-poppins">
        <div class="card text-center">
            <div class="card-body">
                <h2 class="title">Registration Form</h2>
                <?php if($data): ?>
                    <div class="alert alert-danger float-left text-start">
                        <h5>Errors</h5>
                        <ul class="mx-5">
                            <?php foreach($data as $error): ?>
                            <li><?= $error ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row row-space">
                        <div class="col-lg-4 col-md-12">
                            <div class="input-group">
                                <label for="fName" class="form-label label">First Name</label>
                                <input class="input--style-4" type="text" id="fName" name="fName" placeholder="Enter your first name">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="input-group">
                                <label for="mName" class="form-label label">Middle Name</label>
                                <input class="input--style-4" type="text" id="mName" name="mName" placeholder="Enter your middle name">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="input-group">
                                <label for="lName" class="form-label label">Last Name</label>
                                <input class="input--style-4" type="text" id="lName" name="lName" placeholder="Enter your last name">
                            </div>
                        </div>
                    </div>
                    <div class="row row-space">
                        <div class="col-lg-6 col-md-12">
                            <div class="input-group">
                                <label for="email" class="form-label label">Email</label>
                                <input class="input--style-4" type="email" id="email" name="email" placeholder="Enter your email address">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="input-group">
                                <label for="phoneNumber" class="form-label label">Phone Number</label>
                                <input class="input--style-4" type="tel" id="phoneNumber" name="phoneNumber" placeholder="Enter your phone number">
                            </div>
                        </div>
                    </div>
                    <div class="row row-space">
                        <div class="col-lg-5 col-md-12">
                            <label for="profilePic" class="label">Profile Picture</label>
                            <div class="input-group">
                                <input type="file" class="form-control input--style-4" id="profilePic" name="profilePic" accept="image/*">
                            </div>
                        </div>
                    </div>
                    <div class="row row-space">
                        <div class="col p-t-15">
                            <button class="btn btn-primary" type="submit" value="Register">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php require("partials/footer.php") ?>