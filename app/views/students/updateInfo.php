<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
        crossorigin="anonymous">
    <title>Modify | Student Dashboard</title>
</head>

<body>
    <!-- Dashboard Navigation -->
    <nav class="navbar navbar-expand-md navbar-dark bg-primary py-3">
        <div class="container-fluid">
            <a href="<?php echo URLROOT; ?>/students" class="navbar-brand">DASHBOARD</a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#dashNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="dashNav">
                <ul class="navbar-nav mr-auto d-lg-none">
                    <li class="navbar-item"><a href="<?php echo URLROOT; ?>/students/update" class="nav-link">Update
                            Information</a></li>
                    <li class="navbar-item"><a href="<?php echo URLROOT; ?>/students/results" class="nav-link">Check
                            Results</a></li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="<?php echo URLROOT; ?>/students" class="nav-link text-white">Welcome
                            <?php echo $data['name']; ?></a></li>
                    <li class="nav-item"><a href="<?php echo URLROOT . '/students/logout'; ?>" class="nav-link"><i class="fas fa-sign-out-alt"></i>
                            Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container-fluid">
        <div class="row">
            <!-- Dashboard Sidebar -->
            <aside class="col-lg-2 mx-auto d-none d-lg-block border border-right bg-light" style="height: 90vh;">
                <div class="mt-3">
                    <nav class="navbar navbar-light justify-content-center">
                        <div class="px-5">
                            <div class="text-center">
                            <img src="../<?php echo $data['photo']; ?>" alt="Profile Image" class="img-fluid img-thumbnail rounded-circle" style="width:100%; height:190px;">
                                <h6 class="my-4">
                                    <?php echo $data['name']; ?>
                                </h6>
                            </div>
                            <div class="pl-2 text-justify">
                                <ul class="navbar-nav">
                                    <li class="navbar-item"><a href="<?php echo URLROOT; ?>/students" class="nav-link">Dashboard</a></li>
                                    <li class="navbar-item"><a href="<?php echo URLROOT; ?>/students/update" class="nav-link">Update
                                            Information</a></li>
                                    <li class="navbar-item"><a href="<?php echo URLROOT; ?>/students/results" class="nav-link">Check
                                            Results</a></li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </aside>

            <!-- Dashboard Main Section -->
            <section class="col-lg-10 border border-left" id="showResults">
                <div class="mt-3">
                    <div class="text-center my-3"><?php flash('register_success');?></div>
                    <div class="h2 text-center mt-5">Update Your Profile</div>
                    <div class="row mt-5">
                        <div class="col-md-8 mx-auto">
                            <form action="<?php echo URLROOT; ?>/students/update" method="POST" enctype="multipart/form-data">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" name="name" id="name" value="<?php echo $data['name']; ?>">
                                        <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="roll_num">Roll Number</label>
                                        <input type="text" class="form-control <?php echo (!empty($data['roll_num_err'])) ? 'is-invalid' : ''; ?>"  name="roll_num" id="roll_num" value="<?php echo $data['roll_num']; ?>">
                                        <span class="invalid-feedback"><?php echo $data['roll_num_err']; ?></span>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" name="email" id="email" value="<?php echo $data['email']; ?>">
                                        <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="dob">Date of Birth</label>
                                        <input type="date" class="form-control <?php echo (!empty($data['dob_err'])) ? 'is-invalid' : ''; ?>" name="dob" id="dob">
                                        <span class="invalid-feedback"><?php echo $data['dob_err']; ?></span>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="gender">Gender</label>
                                        <select name="gender" id="gender" class="form-control <?php echo (!empty($data['gender_err'])) ? 'is-invalid' : ''; ?>">
                                            <option value="">Choose...</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Transgender">Transgender</option>
                                        </select>
                                        <span class="invalid-feedback"><?php echo $data['gender_err']; ?></span>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="course">Course</label>
                                        <select name="course" id="course" class="form-control <?php echo (!empty($data['course_err'])) ? 'is-invalid' : ''; ?>">
                                            <option value="">Choose...</option>
                                            <option value="B.Tech">B.Tech</option>
                                            <option value="BCA">BCA</option>
                                            <option value="M.Tech">M.Tech</option>
                                            <option value="MCA">MCA</option>
                                        </select>
                                        <span class="invalid-feedback"><?php echo $data['course_err']; ?></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="branch">Specialization</label>
                                        <select name="branch" id="branch" class="form-control <?php echo (!empty($data['branch_err'])) ? 'is-invalid' : ''; ?>">
                                            <option value="">Choose...</option>
                                            <option value="CSE">CSE</option>
                                            <option value="ECE">ECE</option>
                                        </select>
                                        <span class="invalid-feedback"><?php echo $data['branch_err']; ?></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="year">Current Year</label>
                                        <select name="year" id="year" class="form-control <?php echo (!empty($data['year_err'])) ? 'is-invalid' : ''; ?>">
                                            <option value="">Choose...</option>
                                            <option value="First">1st</option>
                                            <option value="Second">2nd</option>
                                            <option value="Third">3rd</option>
                                            <option value="Fourth">4th</option>
                                        </select>
                                        <span class="invalid-feedback"><?php echo $data['year_err']; ?></span>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-8">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control <?php echo (!empty($data['address_err'])) ? 'is-invalid' : ''; ?>" name="address" id="address" value="<?php echo $data['address']; ?>">
                                        <span class="invalid-feedback"><?php echo $data['address_err']; ?></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="mobile">Mobile</label>
                                        <input type="number" class="form-control <?php echo (!empty($data['mobile_err'])) ? 'is-invalid' : ''; ?>" name="mobile" id="mobile" value="<?php echo $data['value']; ?>">
                                        <span class="invalid-feedback"><?php echo $data['mobile_err']; ?></span>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="city">City</label>
                                        <input type="text" class="form-control <?php echo (!empty($data['city_err'])) ? 'is-invalid' : ''; ?>" name="city" id="city" value="<?php echo $data['city']; ?>">
                                        <span class="invalid-feedback"><?php echo $data['city_err']; ?></span>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="state">State</label>
                                        <input type="text" class="form-control <?php echo (!empty($data['state_err'])) ? 'is-invalid' : ''; ?>" name="state" id="state" value="<?php echo $data['state']; ?>">
                                        <span class="invalid-feedback"><?php echo $data['state_err']; ?></span>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="pincode">Pincode</label>
                                        <input type="number" class="form-control <?php echo (!empty($data['pincode_err'])) ? 'is-invalid' : ''; ?>" name="pincode" id="pincode" value="<?php echo $data['pincode']; ?>">
                                        <span class="invalid-feedback"><?php echo $data['pincode_err']; ?></span>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="file">Upload Profile Image</label>
                                        <input type="file" name="photo" id="file" class="form-control-file <?php echo (!empty($data['photo_err'])) ? 'is-invalid' : ''; ?>">
                                        <small class="form-text text-muted" id="fileHelp">Max 2mb size</small>
                                        <span class="invalid-feedback"><?php echo $data['photo_err']; ?></span>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-8 mx-auto">
                                        <input type="submit" value="Submit" class="btn btn-primary btn-block btn-lg">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <!-- Footer Section -->
    <footer id="student-footer" class="bg-primary">
        <div class="container">
            <div class="row">
                <div class="col text-center text-white mt-3 mb-1">
                    <h5 class="h5">Student Dashboard |
                        <?php echo "CCMS"; ?>
                    </h5>
                    <p>Copyright &copy; 2018-2019</p>
                    <p>All Rights Reserved</p>
                </div>
            </div>
        </div>
    </footer>


    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>

</html>