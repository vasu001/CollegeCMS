<?php require_once APPROOT.'/views/inc/header.php'; ?>
<div class="container text-justify my-5 h-100">
    <div class="row">
    <div class="col-md-6 mx-auto card card-body bg-light">
            <?php flash('register_success'); ?>
            <a href="<?php echo URLROOT; ?>/users/account/<?php echo $data['email'];?>/<?php echo $data['hash'];?>" class="btn btn-lg btn-info">Verify Account</a>
        </div>
    </div>
</div>
<?php require_once APPROOT.'/views/inc/footer.php'; ?>