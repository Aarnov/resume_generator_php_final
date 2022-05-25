
<?php session_start();
if (!isset($_SESSION["loggedin"])) {
    header("location:login.php");
}
?>
<!doctype html>
<html lang="en">
<head><title>Cover Letter Generator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>


    </style>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-black navbar-dark">
    <div class="container">
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
                    <a href="logout.php" class="nav-link">Sign Out</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!--section-->
<section class="bg-dark text-light p-5 text-center">
    <div class="container-fluid vh=100">
            <img class="img-fluid" src="1.png">
</div>
</section>
</body>