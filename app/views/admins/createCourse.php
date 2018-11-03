<?php require_once APPROOT . '/views/admins/inc/header.php';?>
<div class="dash_head">Add Course</div>
<div class="container">
    <div class="card m-5 px-5" id="marg-top">
        <h3 class="h3">Add New Courses</h3>

        <form method="POST" action="<?php echo URLROOT; ?>/admins/createCourse">
            <div class="form-group mt-2">
                <label for="courseName">Course Name</label>
                <input type="text" class="form-control" name="newCourse" placeholder="Enter course">
            </div>
            <div class="form-group">
                <input type="submit" class="btn bg-primary text-white mt-2" value="Add Course">
            </div>
        </form>

    </div>
    <div id="display-flash" class="text-center text-white"><?php flash('course_success'); ?></div>
</div>
<?php require_once APPROOT . '/views/admins/inc/footer.php';?>