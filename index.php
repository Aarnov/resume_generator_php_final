
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Main Page</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    </head>
    <body>

    <!--navigation bar-->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
            <a href="main_page.php" class="navbar-brand nav-link">Resume Generator</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="sample.php" class="nav-link" >Sample</a>
                    </li>
                    <li class="nav-item">
                        <a href="make_your_own.php" class="nav-link" >Make your own</a>
                    </li>
                    <li class="nav-item">
                        <a href="crud/create.php" class="nav-link">My Info</a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link">Sign Up</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!--showcase-->
    <section class="bg-black text-light p-5 text-center">
        <div class="container">
            <div class="d-flex">
                <div class="text-center">
                    <h1>Free Online</br> <span class="text-primary">Resume Generator</span></h1>
                    <p class="lead my-4">Our cover letter builder replaces difficult creative writing with a quick and accessible tool. Increase your interview chances, stand out from the crowd, apply for formal jobs and most importantly - let your professional story shine and resonate with employers!</p>
                    <a href="make_your_own.php" class="btn btn-success btn-warning btn-lg">Sign Up and Create yours now</a>
                </div>
                <img class="image-fluid rounded" src="10.jpg">
            </div>
        </div>
    </section>
    <!--boxes-->
    <section class="pt-5">
        <div class="container-fluid">
            <div class="row text-center">
                <div class="col md-4">
                    <div class="card bg-dark text-light">
                        <div class="card-body text-center">
                            <h2><i class="bi bi-laptop "></i></h2>
                            <h5 class="card-title text-warning">
                                Free To Use
                            </h5>
                            <p class="card-text">
                                Make easy and job winning cover letters all for free.
                                effective to use and a very easy interface lets u make
                                the best cover letters in a matter of minutes.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col md-4">
                    <div class="card bg-secondary text-light">
                        <div class="card-body text-center">
                            <h2><i class="bi bi-trophy "></i></h2>
                            <h5 class="card-title text-black">
                                Make a resume that wins interviews
                            </h5>
                            <p class="card-text">
                                Use our resume maker with its advanced creation
                                tools to tell a professional story that engages
                                recruiters, hiring managers and even CEOs.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col md-4">
                    <div class="card bg-dark text-light">
                        <div class="card-body text-center">
                            <h2><i class="bi bi-people "></i></h2>
                            <h5 class="card-title text-warning">
                                Resume writing made easy
                            </h5>
                            <p class="card-text">
                                Resume writing has never been this effortless. Just fill in your details and we have your resume ready in just a matter of seconds
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
    </html>

<?php
