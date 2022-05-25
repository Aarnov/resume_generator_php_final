
<?php


require_once "config.php";
session_start();

$email=$password=$confirm_password="";
$email_err=$password_err=$confirm_password_err = "";


if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if (empty($_POST['email'])) {
        $email_err = "Email cannot be empty";
    }
    else {
        $sql = "SELECT id FROM users WHERE email = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = trim($_POST['email']);
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $email_err = "This email is already taken";
                    echo $email_err;
                }else{
                    echo"Something went wrong";
                }
            }
        }
    }

    if (empty($_POST['password'])) {
        $password_err = "Password cannot be empty";
    } elseif ($_POST['password'] < 5) {
        $password_err = "Password cannot be less then 5";
    } else {
        $password = trim($_POST['password']);
    }
    echo $password_err;


    if ($password != $_POST['confirm_password']) {
        $confirm_password_err = "password should match";
    }
    echo $confirm_password_err;


    if (empty($email_err) && empty($password_err) && empty($confirm_password_err)) {
        $sql = "INSERT INTO users (email, password,verification_code) VALUES (?, ?,?)";
        $stmt = mysqli_prepare($conn,$sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ssi", $param_username, $param_password,$param_verification_code);

            // Set these parameters
            $param_username = $_POST["email"];
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            $param_verification_code=rand(1000,9999);


            // Try to execute the query
            if (mysqli_stmt_execute($stmt)) {
                $verification_code = $param_verification_code;
                $_SESSION["code"]=$verification_code;
                $to_email = $_POST['email'];
                $subject = "Email verification";
                $body = "Hello there, Thankyou for registering your account.
                          Your verification code is " . $verification_code;
                $headers = "From: aarnovadhikari123@gmail.com";
                if (mail($to_email, $subject, $body, $headers)) {
                    echo "Email successfully sent to $to_email";
                    session_start();
                    $_SESSION["to_email"]=$to_email;
                    header("location:verify.php");

                } else {
                    echo "Email sending failed...";
                }
            } else {
                echo "Something went wrong... cannot redirect!";
            }

        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
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
<div class="container-fluid vh=100">
    <div class="row justify-content-center vh-100">
        <div class="card w-25 my-auto shadow">
            <div class="card-header text-center bg-primary text-white w-1000">
                <h2>Register Form</h2>
            </div>
            <div class="card-body">
                <form action="register.php" method="post">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email"  name="email" class="form-control" id="email" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password"  name="password" class="form-control" id="password" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password"  name="confirm_password" class="form-control" id="confirm_password"
                               placeholder=""></br>
                    </div>
                    <button type="submit" class="btn btn-secondary w-100">Sign Up</button>
                </form>
            <div class="card-footer text-center">
                <small>Already signed up?<a href="login.php">Click here</a></small>
            </div>
                <div class="card-footer text-center">
                    <small>&copy;Aarnov Adhikari</small>
                </div>
        </div>
    </div>


</div>
</body>
</html>
