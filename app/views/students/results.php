<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
        crossorigin="anonymous">
    <title>Results | Student Dashboard</title>
</head>

<body>
    <!-- Dashboard Navigation -->
    <nav class="navbar navbar-expand-md navbar-dark bg-primary py-3">
        <div class="container-fluid">
            <a href="<?php echo URLROOT; ?>/students" class="navbar-brand">DASHBOARD</a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#dashNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="dashNav">
                <ul class="navbar-nav mr-auto d-lg-none">
                    <li class="navbar-item"><a href="<?php echo URLROOT; ?>/students/update" class="nav-link">Update
                            Information</a></li>
                    <li class="navbar-item"><a href="<?php echo URLROOT; ?>/students/results" class="nav-link">Check
                            Results</a></li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="<?php echo URLROOT; ?>/students" class="nav-link text-white">Welcome
                            <?php echo $_SESSION['user_name']; ?></a></li>
                    <li class="nav-item"><a href="<?php echo URLROOT . '/users/logout'; ?>" class="nav-link"><i class="fas fa-sign-out-alt"></i>
                            Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container-fluid">
        <div class="row">
            <!-- Dashboard Sidebar -->
            <aside class="col-lg-2 mx-auto d-none d-lg-block border border-right bg-light" style="height: 90vh;">
                <div class="mt-3">
                    <nav class="navbar navbar-light justify-content-center">
                        <div class="px-5">
                            <div class="text-center">
                                <img src="../<?php echo $data['photo']; ?>" alt="Profile Image" class="img-fluid img-thumbnail rounded-circle"
                                    style="width:100%; height:190px;">
                                <h6 class="my-4">
                                    <?php echo $data['name']; ?>
                                </h6>
                            </div>
                            <div class="pl-2 text-justify">
                                <ul class="navbar-nav">
                                    <li class="navbar-item"><a href="<?php echo URLROOT; ?>/students" class="nav-link">Dashboard</a></li>
                                    <li class="navbar-item"><a href="<?php echo URLROOT; ?>/students/update" class="nav-link">Update
                                            Information</a></li>
                                    <li class="navbar-item"><a href="<?php echo URLROOT; ?>/students/results" class="nav-link">Check
                                            Results</a></li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </aside>

            <!-- Dashboard Main Section -->
            <section class="col-lg-10 border border-left" id="showResults">
                <div class="mt-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="h2 text-center mt-5">Results</div>
                            <div class="card card-body">
                                <div class="row">
                                    <div class="col-md-12 mx-auto">
                                        <table class="table text-center">
                                            <thead class="bg-primary text-white">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Subject</th>
                                                    <th>Marks</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if($data['isData']):
                                                    $i = 1;foreach ($data['marks'] as $row): ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $i; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row->{'Subject'}; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row->{'Marks'}; ?>
                                                    </td>
                                                </tr>
                                                    <?php $i++;endforeach;?>
                                                <tr class="bg-success text-white">
                                                    <td></td>
                                                    <td>Total</td>
                                                    <td>
                                                        <?php
                                                            echo $data['obtained'];
                                                        endif;
                                                        ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-4 offset-1 bg-warning text-center h2 p-3 text-white">
                                        Status
                                    </div>
                                    <div class="col-md-4 offset-2 bg-warning text-center h3 p-3 text-white">
                                        <?php 
                                            echo $data['status'];
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <!-- Footer Section -->
    <footer id="student-footer" class="bg-primary">
        <div class="container">
            <div class="row">
                <div class="col text-center text-white mt-3 mb-1">
                    <h5 class="h5">Student Dashboard |
                        <?php echo "CCMS"; ?>
                    </h5>
                    <p>Copyright &copy; 2018-2019</p>
                    <p>All Rights Reserved</p>
                </div>
            </div>
        </div>
    </footer>


    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>

</html>