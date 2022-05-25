<?php
require_once "config.php";
session_start();
if($_SERVER['REQUEST_METHOD']=="POST") {
    $insert_verification_code = $_POST["code"];
        if ($insert_verification_code != $_SESSION["code"]) {
            echo("Invalid code...Try again.");
        } else {
            header("location:login.php");
        }
    $sql = "DELETE * FROM users WHERE email=?";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "s", $param_email);
        //set parameter

        $param_email = $_SESSION['to_email'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>Verify Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .modal-header{
            background: black;
            color: #fff;

        }
    </style>
</head>
<body>
<div class="container">
    <div class="container p-5 my-5">

    <div class="container p-5 my-5 bg-dark text-white">

    <div class="container p-5 my-auto bg-secondary text-white">
    <h4><?php echo"An email has been successfully sent to ". $_SESSION["to_email"]?></h4>
    <h4> Click here to verify:</h4>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Verify</button>
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" text-center bg-primary text-white w-1000>
                <h5 modal-title >Verify</h5>
            </div>
            <div class="modal-body">
                <form action="verify.php" method="POST">
                    <div>
                    <label for="code" class="form-label text-dark"> Enter the verification code</label>
                        <input type="number" name="code" class="form-control" id="code"></br>

                </div>
                    <button type="submit" class="btn btn-primary w-100 align-right">Submit</button>
                </form>
            </div>
        </div>
    </div>

</div>
    </div>
    </div>
    </div>
</div>
</body>
</html>
