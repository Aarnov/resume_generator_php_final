<?php
//This script will handle login
session_start();
if(isset($_SESSION['loggedin'])){
    header("location:main_page.php");
}

require_once "config.php";
$email = $password = "";
$err = "";
// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST"){

    if(empty(trim($_POST['email'])) || empty(trim($_POST['password'])))
    {
        $err = "Please enter email and password";
        echo $err;
    }
    else{
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
    }


    if(empty($err))
    {
        $sql = "SELECT id, email, password FROM users WHERE email = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $param_username);
        $param_username = $email;

        // Try to execute this statement
        if(mysqli_stmt_execute($stmt)){
            mysqli_stmt_store_result($stmt);
            if(mysqli_stmt_num_rows($stmt) == 1)
            {
                mysqli_stmt_bind_result($stmt, $id, $email, $hashed_password);
                if(mysqli_stmt_fetch($stmt))
                {
                    if(password_verify($password, $hashed_password))
                    {
                        // this means the password is corrct. Allow user to login
                        session_start();
                        $_SESSION["email"] = $email;
                        $_SESSION["id"] = $id;
                        $_SESSION["loggedin"] = true;

                        //Redirect user to welcome page
                        header("location:main_page.php");

                    }
                }

            }

        }
    }


}


?>

<!doctype html>
<html lang="en">
<head><title>Log in</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>


    </style>
</head>
<body>
<div class="container-fluid vh=100">
    <div class="row justify-content-center vh-100">
        <div class="card w-25 my-auto shadow">
            <div class="card-header text-center bg-primary text-white w-1000">
                <h2>Log in Form</h2>
            </div>
            <div class="card-body">
                <form action="login.php" method="post">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password"  name="password" class="form-control" id="password" placeholder="">
                    </div>
                </br>
                    <button type="submit" class="btn btn-secondary w-100">Log in</button>
                </form>
                <div class="card-footer text-center">
                    <small>Dont have an account yet?<A href="register.php">Click here</A> </small>
                </div>
                <div class="card-footer text-center">
                    <small>&copy;Aarnov Adhikari</small>
                </div>
            </div>
        </div>


    </div>
</body>
</html>
