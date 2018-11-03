<?php require_once APPROOT . '/views/inc/header.php';?>
    <section class="section">
        <aside class="aside">
            <nav>
                <div class="main-category">
                    <h3 class="h3">Main Category</h3>
                    <ul class="main-category-nav">
                        <a href="dashboard.php">
                            <li><i class="fas fa-tachometer-alt mr-3"></i>Dashboard</li>
                        </a>
                        <a href="#" data-toggle="collapse" data-target="#pages-child">
                            <li><i class="fas fa-file-alt mr-3"></i> Pages</li>
                        </a>
                        <ul id="pages-child" class="collapse ml-3">
                            <a href="" id="about">
                                <li><i class="fas fa-clipboard-list mr-2"></i>About</li>
                            </a>
                            <a href="" id="facilities">
                                <li><i class="fas fa-clipboard-list mr-2"></i>Facilities</li>
                            </a>
                            <a href="" id="cam_event">
                                <li><i class="fas fa-clipboard-list mr-2"></i>Campus Events</li>
                            </a>
                        </ul>
                        <a href="" id="admin_pass_change">
                            <li><i class="fas fa-key mr-3"></i>Admin Password</li>
                        </a>
                    </ul>
                </div>
                <div class="student-category">
                    <h3 class="h3">Student Category</h3>
                    <ul class="student-category-nav">
                    <a href="#" data-toggle="collapse" data-target="#course">
                            <li><i class="fas fa-university mr-3"></i>Courses</li>
                        </a>
                        <ul id="course" class="collapse ml-3">
                            <a href="<?php echo URLROOT; ?>/admins/createCourse" id="course_cr">
                                <li><i class="fas fa-clipboard-list mr-2"></i>Add Course</li>
                            </a>
                            <a href="<?php echo URLROOT; ?>/admins/manageCourse" id="course_mg">
                                <li><i class="fas fa-clipboard-list mr-2"></i>Manage Course</li>
                            </a>
                        </ul>
                        <a href="#" data-toggle="collapse" data-target="#subject">
                            <li><i class="fas fa-book mr-3"></i>Subjects</li>
                        </a>
                        <ul id="subject" class="collapse ml-3">
                            <a href="<?php echo URLROOT; ?>/admins/createClass" id="subject_cr">
                                <li><i class="fas fa-clipboard-list mr-2"></i>Add Subject</li>
                            </a>
                            <a href="<?php echo URLROOT; ?>/admins/manageClass" id="subject_mg">
                                <li><i class="fas fa-clipboard-list mr-2"></i>Manage Subject</li>
                            </a>
                        </ul>
                        <a href="#" data-toggle="collapse" data-target="#student">
                            <li><i class="fas fa-user-graduate mr-3"></i>Students</li>
                        </a>
                        <ul id="student" class="collapse ml-3">
                            <a href="<?php echo URLROOT; ?>/admins/addStudent"  id="student_cr">
                                <li><i class="fas fa-clipboard-list mr-2"></i>Add Student</li>
                            </a>
                            <a href="<?php echo URLROOT; ?>/admins/manageStudent" id="student_mg">
                                <li><i class="fas fa-clipboard-list mr-2"></i>Manage Student</li>
                            </a>
                        </ul>
                        <a href="<?php echo URLROOT; ?>/admins/result" id="results_show">
                            <li><i class="fas fa-graduation-cap mr-2"></i> Results</li>
                        </a>
                    </ul>
                </div>
            </nav>
        </aside>
        <main>
            <div id="showresults">