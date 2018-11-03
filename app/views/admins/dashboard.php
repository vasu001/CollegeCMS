<?php require_once APPROOT . '/views/admins/inc/header.php';?>
<div class="dash_head">
    Dashboard
</div>
<div class="cards">
    <a href="">
        <div class="cards1 text-right">
            <div class="float-left"><i class="fas fa-user-graduate fa-4x"></i></div>
            <div class="h2">
                <?php echo $data['studentCount']; ?>
            </div>
            <div class="h6">Registered Students</div>
        </div>
    </a>
    <a href="">
        <div class="cards2 text-right">
            <div class="float-left"><i class="fas fa-university fa-4x"></i></div>
            <div class="h2">
                <?php echo $data['courseCount']; ?>
            </div>
            <div class="h6">Courses Available</div>
        </div>
    </a>
    <a href="">
        <div class="cards3 text-right">
            <div class="float-left"><i class="fas fa-book fa-4x"></i></div>
            <div class="h2">
                <?php echo $data['subjectCount']; ?>
            </div>
            <div class="h6">Classes Available</div>
        </div>
    </a>
    <a href="">
        <div class="cards4 text-right">
            <div class="float-left"><i class="fas fa-graduation-cap fa-4x"></i></div>
            <div class="h2">
                <?php echo $data['resultsCount']; ?>
            </div>
            <div class="h6">Results Declared</div>
        </div>
    </a>
</div>
<?php require_once APPROOT . '/views/admins/inc/footer.php';?>