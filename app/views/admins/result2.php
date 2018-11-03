<?php require_once APPROOT . '/views/admins/inc/header.php';?>
<div class="dash_head">Result</div>
<div class="card mx-5 my-5 px-5">
    <h3 class="h3">Declare Student Result2</h3>
    <table class="table table-bordered table-sm table-hover text-center">
        <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Marks</th>
                <th scope="col">Result</th>
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
                    <form action="<?php echo URLROOT; ?>/admins/updateResult/<?php echo $row->{'ID'};?>" method="POST">
                        <button class='btn btn-warning btn-sm' type="submit" name="updateResult"><i class="fas fa-edit text-white"></i>
                            Update</button>
                    </form>
                </td>
                <td>
                    <form action="<?php echo URLROOT; ?>/admins/declareResult/<?php echo $row->{'ID'};?>" method="POST">
                        <button class='btn btn-success btn-sm' type="submit" name="declareResult"><i class="fas fa-file-alt text-white"></i>
                            Declare</button>
                    </form>
                </td>
            </tr>
            <?php
                endforeach;
            ?>
        </tbody>
    </table>
    <div>
        <h6><em>List of Students</em></h6>
    </div>
    <div>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item"><a class="page-link disabled" href="#">Previous</a></li>
                <?php
                    for ($i = 0; $i < $data['pages']; $i++):
                ?>
                <li class="page-item">
                    <a class="page-link" href="<?php echo URLROOT; ?>/admins/result2/<?php echo $i + 1; ?>" name="pages">
                        <?php echo $i + 1; ?></a>
                </li>
                <?php
                    endfor;
                ?>
                <li class="page-item"><a class="page-link disabled" href="">Next</a></li>
            </ul>
        </nav>
    </div>
    <div id="display-flash" class="text-center mt-2"><?php flash('declared_result'); ?></div>
</div>
<?php require_once APPROOT . '/views/admins/inc/footer.php';?>