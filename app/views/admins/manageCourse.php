<?php require_once APPROOT . '/views/admins/inc/header.php';?>

<div class="dash_head">Manage Course</div>
<div class="card mx-5 my-5 px-5">
    <h3 class="h3">View Courses Info</h3>
    <table class="table table-bordered table-sm table-hover text-center">
        <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Created_At</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>

            <?php
                foreach ($data['row'] as $row):
            ?>
            <tr>
                <th scope="col">
                    <?php echo $row->{'ID'}; ?>
                </th>
                <td>
                    <?php echo $row->{'Name'}; ?>
                </td>
                <td>
                    <?php echo $row->{'Created_At'}; ?>
                </td>
                <td>
                    <form action="<?php echo URLROOT; ?>/admins/manageCourse" method="POST">
                        <button class="btn btn-sm bg-danger text-white" type="submit" name="deleteCourse" value="<?php echo $row->{'ID'}; ?>">Delete</button>
                    </form>
                </td>
            </tr>
            <?php
endforeach;
?>
        </tbody>
    </table>
    <div>
        <h6><em>List of Available Courses</em></h6>
    </div>
    <div>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item"><a class="page-link disabled" href="#">Previous</a></li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link disabled" href="">Next</a></li>
            </ul>
        </nav>
    </div>
    
    <div id="display-flash" class="text-center mt-2"><?php flash('delete_course'); ?></div>
</div>
<?php require_once APPROOT . '/views/admins/inc/footer.php';?>