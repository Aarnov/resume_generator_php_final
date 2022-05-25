<?php
session_start();
if (!isset($_SESSION["loggedin"])) {
    header("location:../login.php");
}
require_once "config_demo.php";

// Define variables and initialize with empty values
$first_name= $last_name = $email = "";
$first_name_err = $last_name_err = $email_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Validate first name
    $input_first_name = trim($_POST["first_name"]);
    if (empty($input_first_name)) {
        $first_name_err = "Please enter a first name.";
        echo "Please enter a first name.";

    } elseif (!filter_var($input_first_name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $first_name_err = "Please enter a valid first name.";
        echo "Please enter a valid first name.";

    } else {
        $first_name = $input_first_name;
    }

// Validate last name
    $input_email = trim($_POST["email"]);
    if (empty($input_email)) {
        $email_err = "Please enter a email.";
        echo "Please enter a email";
    } else {
        $email = $input_email;
    }

// Validate last name
    $input_last_name = trim($_POST["last_name"]);
    if (empty($input_last_name)) {
        $last_name_err = "Please enter a last name.";
        echo "Please enter a last name.";
    } elseif (!filter_var($input_last_name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $last_name_err = "Please enter a valid last name.";
        echo "Please enter a valid last name.";
    } else {
        $last_name = $input_last_name;
    }



    if (empty($first_name_err_err) && empty($last_name_err) && empty($email_err)) {
// Prepare an insert statement

        $temp_name=$_FILES['image']['tmp_name'];
        $filename=$_FILES['image']['name'];
        $folder = "../upload/".$filename;
        if (move_uploaded_file($temp_name, $folder))  {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
        }

        $sql = "INSERT INTO persons (first_name, last_name, email, image) VALUES (?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $first_name, $last_name, $email, $filename);

            // Set parameters
            $first_name = trim($_POST['first_name']);
            $last_name = trim($_POST['last_name']);
            $email = trim($_POST['email']);
            $filename=$_FILES['image']['name'];

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {

                header("location: new_retrieve.php");
            } else {
                echo "ERROR: Could not execute query: $sql. " . mysqli_error($conn);
            }
        } else {
            echo "ERROR: Could not prepare query: $sql. " . mysqli_error($conn);
        }

// Close statement
        mysqli_stmt_close($stmt);

// Close connection
        mysqli_close($conn);
    }
}
?>

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
                    <a href="crud/create.php" class="nav-link">My Info</a>
                </li>
                <li class="nav-item">
                    <a href="../logout.php" class="nav-link">Sign Out</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<!--<div class="container-fluid vh-100">-->
<!--    <div class="row justify-content-center vh-100">-->
<!--        <div class="card w-25 my-auto shadow">-->
<!--            <div class="card-header text-center text-white bg-primary w-1000">-->
<!--                <h2>Users<h2>-->
<!--            </div>-->
<!--    <div class="form-group">-->
<!--        <form action="create.php" method="post" enctype="multipart/form-data">-->
<!--            First name: <input type="text" placeholder="Enter First name here" name="first_name" class="form-control"> -->
<!--            Last Name: <input type="text" placeholder="Enter Last name here" name="last_name" class="form-control"> -->
<!--            Email: <input type="email" placeholder="Enter email here" name="email" class="form-control"> <br>-->
<!--            Upload Image: <input type="file" placeholder="Upload Image" name="image" class="form-control" required>-->
<!--            <input type="submit" value="Submit">-->
<!--        </form>-->
<!--    </div>-->
<!---->
<!--    </div>-->
<!--</div>-->
<!--</div>-->


<div class="container-fluid vh=100">
    <div class="row justify-content-center vh-100">
        <div class="card w-25 my-auto shadow">
            <div class="card-header text-center bg-primary text-white w-1000">
                <h2>Info Form</h2>
            </div>
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" class="form-control" id="first_name" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" name="last_name" class="form-control" id="last_name" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file"  name="image" class="form-control" id="image" placeholder="">
                    </div>
                    </br>
                    <button type="submit" class="btn btn-secondary w-100">Add</button>
                </form>
                <div class="card-footer text-center">
                    <medium>View list?  <A href="new_retrieve.php">Click here</A> </medium>
                </div>
                <div class="card-footer text-center">
                    <small>&copy;Aarnov Adhikari</small>
                </div>
            </div>
        </div>


    </div>
</body>
</html>

</body>
</html>