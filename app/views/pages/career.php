<?php require_once(APPROOT.'/views/inc/header.php'); ?>
<div class="container text-justify my-5 h-100">
    <h2 class="display-4 mb-3">Career Enquiry</h2>
    <div class="card card-body bg-light">
        <?php flash('register_success'); ?>
        <form method='POST' action='<?php echo URLROOT;?>/pages/career'>

            <div class="form-group">
                <label for="name">Name: <sup>*</sup></label>
                <input class="form-control form-control-lg <?php echo (!empty($data['name_error'])) ? 'is-invalid' : ''; ?>"
                    name="name" id="name" type="text" placeholder="Enter Full Name" value="<?php echo $data['name']; ?>">
                <span class="invalid-feedback">
                    <?php echo $data['name_error']; ?></span>
            </div>

            <div class="form-group">
                <label for="email">Email: <sup>*</sup></label>
                <input class="form-control form-control-lg <?php echo (!empty($data['email_error'])) ? 'is-invalid' : ''; ?>"
                    name="email" id="email" type="email" placeholder="Enter Email" value="<?php echo $data['email']; ?>">
                <span class="invalid-feedback">
                    <?php echo $data['email_error']; ?></span>
            </div>

            <div class="form-group">
                <label for="mobile">Mobile: <sup>*</sup></label>
                <input class="form-control form-control-lg <?php echo (!empty($data['mobile_error'])) ? 'is-invalid' : ''; ?>"
                    name="mobile" id="mobile" type="text" placeholder="Enter Contact Number" value="<?php echo $data['mobile']; ?>">
                <span class="invalid-feedback">
                    <?php echo $data['mobile_error']; ?></span>
            </div>

            <div class="form-group">
                <label for="date">Date: <sup>*</sup></label>
                <input class="form-control form-control-lg <?php echo (!empty($data['date_error'])) ? 'is-invalid' : ''; ?>"
                    name="date" id="date" type="date">
                <span class="invalid-feedback">
                    <?php echo $data['date_error']; ?></span>
            </div>

            <div class="form-group">
                <label for="curorg">Current Organisation: <sup>*</sup></label>
                <input class="form-control form-control-lg <?php echo (!empty($data['curorg_error'])) ? 'is-invalid' : ''; ?>"
                    name="curorg" id="curorg" type="text" placeholder="Current Organization" value="<?php echo $data['curorg']; ?>">
                <span class="invalid-feedback">
                    <?php echo $data['curorg_error']; ?></span>
            </div>

            <div class="form-group">
                <label for="query">Query: <sup>*</sup></label>
                <textarea class="form-control form-control-lg <?php echo (!empty($data['query_error'])) ? 'is-invalid' : ''; ?>"
                    name="query" id="query" placeholder="Enter Your Query" rows="4" cols="30"><?php echo $data['query']; ?></textarea>
                <span class="invalid-feedback">
                    <?php echo $data['query_error']; ?></span>
            </div>

            <div class="form-group">
                <label for="permaddr">Permanent Address: <sup>*</sup></label>
                <input class="form-control form-control-lg <?php echo (!empty($data['permaddr_error'])) ? 'is-invalid' : ''; ?>"
                    name="permaddr" id="permaddr" type="text" placeholder="Enter Permanent Address" value="<?php echo $data['permaddr']; ?>">
                <td><span class="invalid-feedback">
                        <?php echo $data['permaddr_error']; ?></span>
            </div>

            <div class="form-group">
                <label for="pincode">Pincode: <sup>*</sup></label>
                <input class="form-control form-control-lg <?php echo (!empty($data['pincode_error'])) ? 'is-invalid' : ''; ?>"
                    name="pincode" id="pincode" type="text" placeholder="Postal Code" value="<?php echo $data['pincode']; ?>">
                <span class="invalid-feedback">
                    <?php echo $data['pincode_error']; ?></span>
            </div>

            <div class="form-group">
                <label for="curctc"> Current CTC: <sup>*</sup></label>
                <input class="form-control form-control-lg <?php echo (!empty($data['curctc_error'])) ? 'is-invalid' : ''; ?>"
                    name="curctc" id="curctc" type="text" placeholder="Current CTC" value="<?php echo $data['curctc']; ?>">
                <span class="invalid-feedback">
                    <?php echo $data['curctc_error']; ?></span>
            </div>

            <div class="form-group">
                <label for="expctc">Expected CTC: <sup>*</sup></label>
                <input class="form-control form-control-lg <?php echo (!empty($data['expctc_error'])) ? 'is-invalid' : ''; ?>"
                    name="expctc" id="expctc" type="text" placeholder="Expected CTC" value="<?php echo $data['expctc']; ?>">
                <span class="invalid-feedback">
                    <?php echo $data['expctc_error']; ?></span>
            </div>

            <div class="form-group">
                <label for="gender">Gender: <sup>*</sup></label>
                <select class="form-control form-control-lg <?php echo (!empty($data['gender_error'])) ? 'is-invalid' : ''; ?>"
                    name="gender" id="gender">
                    <option value="" selected>Choose...</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                <span class="invalid-feedback">
                    <?php echo $data['gender_error']; ?></span>
            </div>

            <div class="form-group">
                <input class="btn bg-primary px-5 text-white" type="submit" value="Submit"></td>
            </div>

        </form>
    </div>
</div>


<div class="container text-justify my-5 h-100" id="display2">
</div>
<?php require_once(APPROOT.'/views/inc/footer.php'); ?>

<!-- GO TO PAGES -> career -->