<?php if (!isAdminLoggedIn()): ?>
<footer class="container-fluid d-flex flex-md-row flex-sm-column justify-content-md-around justify-content-sm-center align-items-center bg-dark py-2">

    <div class="align-self-center w-100 text-center mr-1">
        <a href="<?php echo URLROOT; ?>" class="nav-link display-4 text-white">
            <?php echo SITENAME; ?></a>
    </div>

    <div class="align-self-center w-100 text-center mx-1 pt-3">
        <p class="text-white lead">Copyright &copy; 1995-2018 by <span>Saurabh Srivastava</span></p>
    </div>

    <div class="navbar navbar-expand-lg navbar-dark align-self-center w-100 ml-1">
        <ul class="navbar-nav">
            <li class="nav-item"><a href="<?php echo URLROOT; ?>" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="<?php echo URLROOT; ?>/pages/about" class="nav-link">About</a></li>
            <li class="nav-item"><a href="<?php echo URLROOT; ?>/pages/facilities" class="nav-link">Facilities</a></li>
            <li class="nav-item"><a href="<?php echo URLROOT; ?>/pages/campusEvent" class="nav-link">Events</a></li>
            <li class="nav-item"><a href="<?php echo URLROOT; ?>/pages/career" class="nav-link">Career</a></li>
            <li class="nav-item"><a href="<?php echo URLROOT; ?>/pages/contact" class="nav-link">Contact</a></li>
        </ul>
    </div>

</footer>


<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>
<script src="<?php echo URLROOT; ?>/js/jquery.fancybox.min.js"></script>
<script>
    $('[data-fancybox^="gallery"]').fancybox({
        // thumbs: {
        //     autoStart: true
        // },
        // buttons : [
        //     'close'
        // ],
        transitionEffect: "circular",
        loop: "true"
    });
</script>

</body>

<?php endif;?>


<?php if (isAdminLoggedIn()): ?>
<footer class="container-fluid d-flex flex-md-row flex-sm-column justify-content-md-around justify-content-sm-center align-items-center bg-danger py-1 px-1">
    <div class="align-self-center w-100 text-center mx-1 pt-3">
        <p class="text-white">Copyright &copy; 1995-2018 by <span>Saurabh Srivastava</span></p>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>
<script src="<?php echo URLROOT; ?>/js/main.js"></script>
</body>

</html>
<?php endif;?>