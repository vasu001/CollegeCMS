<?php require_once APPROOT . '/views/admins/inc/header.php';?>
<div class="dash_head">Add Class</div>
<div class="container">
    <div class="card m-5 px-5" id="marg-top">
        <h3 class="h3">Add New Class</h3>

        <form method="POST" action="<?php echo URLROOT; ?>/admins/createClass">
            <div class="form-group mt-2">
                <label for="courseName">Course Name</label>
                <input type="text" class="form-control" name="course_name" placeholder="Enter course">
            </div>
            <div class="form-group mt-2">
                <label for="className">Class Name</label>
                <input type="text" class="form-control" name="subject_name" placeholder="Enter class">
            </div>
            <div class="form-group mt-2">
                <label for="className">Specilization</label>
                <input type="text" class="form-control" name="branch_name" placeholder="Enter branch">
            </div>
            <div class="form-group mt-2">
                <label for="yearName">Year</label>
                <input type="text" class="form-control" name="year_name" placeholder="Enter year">
            </div>
            <div class="form-group">
                <input type="submit" class="btn bg-primary text-white mt-2" value="Add Class">
            </div>
        </form>

    </div>

   <div id="display-flash" class="text-center mt-2"><?php flash('subject_success'); ?></div>
</div>
<?php require_once APPROOT . '/views/admins/inc/footer.php';?>