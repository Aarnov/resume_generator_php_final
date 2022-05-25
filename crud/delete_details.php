<?php
session_start();
if (!isset($_SESSION["loggedin"])) {
    header("location:../login.php");
}

require_once "config_demo.php";

if (isset($_POST["id"]) && !empty($_POST["id"])) {
    $sql = "DELETE FROM persons WHERE id = ?";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        //set parameter

        $param_id = $_GET["id"];
        if (mysqli_stmt_execute($stmt)) {
            header("location: new_retrieve.php");
        }
    }
}
?>

<html>
<head>
    <title>Delete record</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head><body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
        <a href="../main_page.php" class="navbar-brand nav-link">Resume Generator</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="../sample.php" class="nav-link" >Sample</a>
                </li>
                <li class="nav-item">
                    <a href="../make_your_own.php" class="nav-link" >Make your own</a>
                </li>
                <li class="nav-item">
                    <a href="create.php" class="nav-link">My Info</a>

                </li>
                <li class="nav-item">
                    <a href="new_retrieve" class="nav-link">Crud List</a>
                </li>
                <li class="nav-item">
                    <a href="../logout.php" class="nav-link">Sign Out</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<h2>Delete record</h2>
<form action="" method="post">
    <input type="hidden" name="id" value=" <?php echo trim($_GET["id"]);?> ">
    <p>Do you want to delete this employee record?</p>
    <p>
        <input type="submit" value="Yes">
        <button><a href="retrieve_to.php">No</a></button>
    </p>

</form>
</body>
</html>


<!--navigation bar-->
<!--<nav class="navbar navbar-expand-sm bg-dark navbar-dark">-->
<!--    <div class="container-fluid">-->
<!--        <a href="main_page.php" class="navbar-brand nav-link">Resume Generator</a>-->
<!--        <div class="collapse navbar-collapse">-->
<!--            <ul class="navbar-nav ms-auto">-->
<!--                <li class="nav-item">-->
<!--                    <a href="sample.php" class="nav-link" >Sample</a>-->
<!--                </li>-->
<!--                <li class="nav-item">-->
<!--                    <a href="make_your_own.php" class="nav-link" >Make your own</a>-->
<!--                </li>-->
<!--                <li class="nav-item">-->
<!--                    <a href="crud/create.php" class="nav-link">My Info</a>-->
<!--                </li>-->
<!--                <li class="nav-item">-->
<!--                    <a href="logout.php" class="nav-link">Sign Out</a>-->
<!--                </li>-->
<!--            </ul>-->
<!--        </div>-->
<!--    </div>-->
<!--</nav>-->







