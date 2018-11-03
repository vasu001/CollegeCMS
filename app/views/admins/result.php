<?php require_once APPROOT . '/views/admins/inc/header.php';?>
<div class="dash_head">Result</div>
<div class="card mx-5 my-5 px-5">
    <h3 class="h3">Declare Student Result</h3>
    <div class="container mt-5" id="loadMarks">
        <div class="row" id="removeLists">
            <div class="col-md-8 mx-auto">
                <form action="<?php echo URLROOT; ?>/admins/result" method="post">
                    <div class="form-group">
                        <label for="course-select">Course</label>
                        <select name="course" id="course-select" class="form-control <?php echo (!empty($data['course_err'])) ? 'is-invalid' : ''; ?>">
                            <option value="">Choose Course...</option>
                            <option value="B.Tech">B.Tech</option>
                            <option value="M.Tech">M.Tech</option>
                            <option value="BCA">BCA</option>
                            <option value="MCA">MCA</option>
                        </select>
                        <span class="invalid-feedback"><?php echo $data['course_err']; ?></span>
                    </div>
                    <div class="form-group" id="year-group">
                        <label for="year-select">Year</label>
                        <select name="year" id="year-select" class="form-control <?php echo (!empty($data['year_err'])) ? 'is-invalid' : ''; ?>">
                            <option value="">Choose Year...</option>
                            <option value="First">First</option>
                            <option value="Second">Second</option>
                            <option value="Third">Third</option>
                            <option value="Fourth">Fourth</option>
                        </select>
                        <span class="invalid-feedback"><?php echo $data['year_err']; ?></span>
                    </div>
                    <div class="form-group" id="branch-group">
                        <label for="branch-select">Branch</label>
                        <select name="branch" id="branch-select" class="form-control <?php echo (!empty($data['branch_err'])) ? 'is-invalid' : ''; ?>">
                            <option value="">Choose Year...</option>
                            <option value="CSE">CSE</option>
                            <option value="ECE">ECE</option>
                            <option value="ME">ME</option>
                        </select>
                        <span class="invalid-feedback"><?php echo $data['branch_err']; ?></span>
                    </div>
                    <div class="col-md-6 mx-auto">
                        <div class="form-group">
                            <input type="submit" value="Next" class="btn btn-primary btn-block">
                        </div>
                    </div>
                </form>
                <div id="display-flash" class="text-center mt-2"><?php flash('empty_student'); ?></div>
            </div>
        </div>
    </div>
</div>
<?php require_once APPROOT . '/views/admins/inc/footer.php';?>