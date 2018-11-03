<?php require_once(APPROOT.'/views/inc/header.php'); ?>
<div class="container text-justify my-5 h-100" id="display">
    <h2 class="display-4 mb-3">Contact Us</h2>
    <div class="card card-body bg-light">
        <?php flash('contact_success'); ?>
        <form class="form-group" method='POST' action='<?php echo URLROOT;?>/pages/contact'>

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
                <label for="query">Message: <sup>*</sup></label>
                <textarea class="form-control form-control-lg <?php echo (!empty($data['query_error'])) ? 'is-invalid' : ''; ?>"
                    name="query" id="query" placeholder="Enter Your Query" rows="4" cols="30"><?php echo $data['query']; ?></textarea>
                <span class="invalid-feedback">
                    <?php echo $data['query_error']; ?></span>
            </div>
            <div class="form-group">
                <label for="course">Course: <sup>*</sup></label>
                <select class="form-control form-control-lg <?php echo (!empty($data['course_error'])) ? 'is-invalid' : ''; ?>"
                    name="course" id="course">
                    <option value="" selected>Choose...</option>
                    <option value="BCA">BCA</option>
                    <option value="MCA">MCA</option>
                    <option value="B.Tech">B.Tech</option>
                    <option value="M.Tech">M.Tech</option>
                </select>
                <span class="invalid-feedback">
                    <?php echo $data['course_error']; ?></span>
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