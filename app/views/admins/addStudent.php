<?php require_once APPROOT . '/views/admins/inc/header.php';?>
<div class="dash_head">Add Student</div>
<div class="container">
    <div class="card m-5 px-5">
        <h3 class="h3">Add New Student</h3>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <form action="<?php echo URLROOT.'/admins/addStudent'; ?>" method="POST">
                        <div class="form-group">
                            <label for="name">Name: <sup>*</sup></label>
                            <input type="text" name="name" class="form-control <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>"
                                value="<?php echo $data['name']; ?>">
                            <span class="invalid-feedback">
                                <?php echo $data['name_err']; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="email">Email: <sup>*</sup></label>
                            <input type="email" name="email" class="form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>"
                                value="<?php echo $data['email']; ?>">
                            <span class="invalid-feedback">
                                <?php echo $data['email_err']; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="password">Password: <sup>*</sup></label>
                            <input type="password" name="password" class="form-control <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>"
                                value="<?php echo $data['password']; ?>">
                            <span class="invalid-feedback">
                                <?php echo $data['password_err']; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password: <sup>*</sup></label>
                            <input type="password" name="confirm_password" class="form-control <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>"
                                value="<?php echo $data['confirm_password']; ?>">
                            <span class="invalid-feedback">
                                <?php echo $data['confirm_password_err']; ?></span>
                        </div>
                        <div class="row mb-5">
                            <div class="col">
                                <input type="submit" class="btn btn-success btn-block" value="Add Student">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div id="display-flash" class="text-center mt-2"><?php flash('register_success'); ?></div>
    </div>
</div>
<?php require_once APPROOT . '/views/admins/inc/footer.php';?>