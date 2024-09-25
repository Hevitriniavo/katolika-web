<div class="container-fluid mt-5">
    <div class="dashboard-main-wrapper">
        <?= include_component("navbar") ?>
        <?= include_component("sidebar") ?>
        <div class="dashboard-wrapper">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header"><?= isset($user["id"]) ? "Edit User" : "Create User" ?></h5>
                    <div class="card-body">
                        <form class="needs-validation" novalidate action="<?= $actionUrl ?>" method="post" enctype="multipart/form-data">
                            <?php if (isset($user["id"])): ?>
                                <input type="hidden" name="id" value="<?= htmlspecialchars($user["id"]) ?>">
                            <?php endif; ?>

                            <div class="row">
                                <!-- First Name -->
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-2">
                                    <label for="firstName">First Name</label>
                                    <input type="text" class="form-control" id="firstName" name="firstName" value="<?= htmlspecialchars($user["firstName"] ?? '') ?>"
                                           placeholder="First Name" required>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter a first name.</div>
                                </div>

                                <!-- Last Name -->
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-2">
                                    <label for="lastName">Last Name</label>
                                    <input type="text" class="form-control" id="lastName" name="lastName" value="<?= htmlspecialchars($user["lastName"] ?? '') ?>"
                                           placeholder="Last Name" required>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter a last name.</div>
                                </div>

                                <!-- Code -->
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-2">
                                    <label for="code">Code</label>
                                    <input type="text" class="form-control" id="code" name="code" value="<?= htmlspecialchars($user["code"] ?? '') ?>"
                                           placeholder="Code" required>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter a code.</div>
                                </div>
                            </div>

                            <div class="row">
                                <!-- QR Code -->

                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-2">
                                    <label for="gender">Gender</label>
                                    <select class="form-control" id="gender" name="gender" required>
                                        <option value="" disabled selected>Select gender</option>
                                        <option value="Male" <?= (isset($user["gender"]) && $user["gender"] == "Male") ? 'selected' : '' ?>>Male</option>
                                        <option value="Female" <?= (isset($user["gender"]) && $user["gender"] == "Female") ? 'selected' : '' ?>>Female</option>
                                    </select>
                                    <div class="invalid-feedback">Please select gender.</div>
                                </div>

                                <!-- Photo -->
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-2">
                                    <label for="photo">Photo</label>
                                    <input type="file" class="form-control" id="photo" name="photo" required>
                                    <div class="invalid-feedback">Please provide a valid photo.</div>
                                </div>

                                <!-- Birth Date -->
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-2">
                                    <label for="birthDate">Date of Birth</label>
                                    <input type="date" class="form-control" name="birthDate" id="birthDate" value="<?= htmlspecialchars($user["birthDate"] ?? '') ?>"
                                           placeholder="Date of Birth" required>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please provide a valid date of birth.</div>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Address -->
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-2">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" name="address" id="address" value="<?= htmlspecialchars($user["address"] ?? '') ?>"
                                           placeholder="Address" required>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please provide an address.</div>
                                </div>

                                <!-- Username -->
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-2">
                                    <label for="username">Username</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">@</span>
                                        </div>
                                        <input type="text" class="form-control" name="username" value="<?= htmlspecialchars($user["username"] ?? '') ?>"
                                               id="username" placeholder="Username" required>
                                        <div class="invalid-feedback">Please choose a username.</div>
                                    </div>
                                </div>

                                <!-- Password -->
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-2">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control"  name="password" id="password"
                                           placeholder="Password" <?= isset($user["id"]) ? "" : "required" ?>>
                                    <div class="invalid-feedback">Please provide a password.</div>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Region -->
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-2">
                                    <label for="regionId">Region</label>
                                    <select class="form-control" id="regionId" name="regionId" required>
                                        <option value="" disabled selected>Select a region</option>
                                        <?php foreach ($regions as $region): ?>
                                            <option value="<?= htmlspecialchars($region["id"]) ?>" <?= (isset($user["regionId"]) && $user["regionId"] == $region["id"]) ? 'selected' : '' ?>>
                                                <?= htmlspecialchars($region["name"]) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">Please select a region.</div>
                                </div>

                                <!-- Sacrament -->
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-2">
                                    <label for="sacramentId">Sacrament</label>
                                    <select class="form-control" id="sacramentId" name="sacramentId">
                                        <option value="" disabled selected>Select a sacrament</option>
                                        <?php foreach ($sacraments as $sacrament): ?>
                                            <option value="<?= htmlspecialchars($sacrament["id"]) ?>" <?= (isset($user["sacramentId"]) && $user["sacramentId"] == $sacrament["id"]) ? 'selected' : '' ?>>
                                                <?= htmlspecialchars($sacrament["name"]) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <!-- Holy -->
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-2">
                                    <label for="holyId">Holy</label>
                                    <select class="form-control" id="holyId" name="holyId">
                                        <option value="" disabled selected>Select a holy</option>
                                        <?php foreach ($holies as $holy): ?>
                                            <option value="<?= htmlspecialchars($holy["id"]) ?>" <?= (isset($user["holyId"]) && $user["holyId"] == $holy["id"]) ? 'selected' : '' ?>>
                                                <?= htmlspecialchars($holy["name"]) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">Please select a holy.</div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-2">
                                    <label for="responsibilityId">Responsibility</label>
                                    <select class="form-control" id="responsibilityId" name="responsibilityId">
                                        <option value="" disabled selected>Select a responsibility</option>
                                        <?php foreach ($responsibilities as $responsibility): ?>
                                            <option value="<?= htmlspecialchars($responsibility["id"]) ?>" <?= (isset($user["responsibilityId"]) && $user["responsibilityId"] == $responsibility["id"]) ? 'selected' : '' ?>>
                                                <?= htmlspecialchars($responsibility["name"]) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">Please select a responsibility.</div>
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-2">
                                    <label for="committeeId">Committee</label>
                                    <select class="form-control" id="committeeId" name="committeeId">
                                        <option value="" disabled selected>Select a committee</option>
                                        <?php foreach ($committees as $committee): ?>
                                            <option value="<?= htmlspecialchars($committee["id"]) ?>" <?= (isset($user["committeeId"]) && $user["committeeId"] == $committee["id"]) ? 'selected' : '' ?>>
                                                <?= htmlspecialchars($committee["name"]) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">Please select a committee.</div>
                                </div>


                            </div>

                           <div class="d-flex justify-content-between">
                               <a class="btn btn-danger" href="<?= path("/users") ?>">Cancel</a>
                               <button class="btn btn-primary" type="submit"><?= isset($user["id"]) ? "Update User" : "Create User" ?></button>
                           </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
