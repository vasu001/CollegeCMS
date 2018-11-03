<?php require_once APPROOT . '/views/admins/inc/header.php';?>
<div class="dash_head">Manage Classes</div>
<div class="card mx-5 my-5 px-5">

    <h3 class="h3">View Classes Info</h3>
    <table class="table table-bordered table-sm table-hover text-center">
        <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Course</th>
                <th scope="col">Year</th>
                <th scope="col">Specialization</th>
                <th scope="col">Class</th>
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
                    <?php echo $row->{'Course Name'}; ?>
                </td>
                <td>
                    <?php echo $row->{'Year Name'}; ?>
                </td>
                <td>
                    <?php echo $row->{'Branch Name'}; ?>
                </td>
                <td>
                    <?php echo $row->{'Class Name'}; ?>
                </td>
                <td>
                    <?php echo $row->{'Created At'}; ?>
                </td>
                <td>
                    <form action="<?php echo URLROOT; ?>/admins/deleteClass" method="POST">
                        <button class="btn btn-sm bg-danger text-white" type="submit" name="deleteClass" value="<?php echo $row->{'SubID'}; ?>">Delete</button>
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
                <li class="page-item"><a class="page-link disabled" href="#"><i class="fas fa-chevron-circle-left"></i></a></li>
                <?php
                    for ($i = 0; $i < $data['pages']; $i++):
                ?>
                <li class="page-item">
                    <a class="page-link" href="<?php echo URLROOT; ?>/admins/manageClass/<?php echo $i + 1; ?>" name="pages"><?php echo $i + 1; ?></a>
                </li>
                <?php
                    endfor;
                ?>
                <li class="page-item"><a class="page-link disabled" href=""><i class="fas fa-chevron-circle-right"></i></a></li>
            </ul>
        </nav>
    </div>
    <div id="display-flash" class="text-center mt-2"><?php flash('class_delete'); ?></div>
</div>
<?php require_once APPROOT . '/views/admins/inc/footer.php';?>