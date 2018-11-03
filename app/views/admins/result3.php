<?php require_once APPROOT . '/views/admins/inc/header.php';?>
<div class="dash_head">Result</div>
<div class="card mx-5 my-5 px-5">
    <h3 class="h3">Update <?php echo $data['name']; ?>'s Marks</h3>
    <form action="<?php echo URLROOT; ?>/admins/updateMarks" method="POST">
        <table class="table table-bordered table-sm table-hover text-center">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Subjects</th>
                    <th scope="col">Marks</th>
                </tr>
            </thead>
            <tbody>

                <?php
                    $i = 1;
                    foreach ($data['row'] as $row):
                ?>
                <tr>
                    <th scope="col">
                        <?php echo $i; ?>
                    </th>
                    <td>
                        <?php echo $row->{'Name'}; ?>
                    </td>
                    <td>
                        <input type="number" name="marks-<?php echo $i; ?>" class="form-control form-control-sm">
                    </td>
                </tr>
                <?php
                    $i++;
                    endforeach;
                ?>
            </tbody>
        </table>
        <input type="submit" value="Update Marks" class="btn btn-primary btn-block">
    </form>
</div>
<?php require_once APPROOT . '/views/admins/inc/footer.php';?>