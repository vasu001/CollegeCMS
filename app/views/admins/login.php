<?php require_once APPROOT.'/views/inc/header.php'; ?>
<div class="container text-justify my-5 h-100">
    <div class="row">
    <div class="col-md-6 mx-auto card card-body bg-light">
            <h2 class="display-4 mb-3 text-center text-danger">Admin Login</h2>
            <p class="text-center">Please fill in your credentials</p>
            <form action="<?php echo URLROOT.'/admins/login'; ?>" method="POST">
                <div class="form-group">
                    <label for="email">Email: <sup>*</sup></label>
                    <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
                    <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="password">Password: <sup>*</sup></label>
                    <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
                    <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="submit" class="btn btn-warning btn-block" value="Login">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>