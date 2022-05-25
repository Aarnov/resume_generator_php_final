<?php session_start();

require_once "config.php";
if (!isset($_SESSION["loggedin"])) {
    header("location:register.php");
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $temp_name=$_FILES['photo']['tmp_name'];
    $filename=$_FILES['photo']['name'];
    $folder = "upload/".$filename;
    if (move_uploaded_file($temp_name, $folder))  {
        $msg = "Image uploaded successfully";
    }else{
        $msg = "Failed to upload image";
    }

$sql="INSERT INTO record(user_id,name,contact,address,photo,facebook,insta,linkedin,skills,objective,experience,achievements,qualification) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";
$stmt=mysqli_prepare($conn,$sql);

if($stmt) {

    mysqli_stmt_bind_param($stmt, "isissssssssss",$user_id, $param_name, $param_contact, $param_address, $param_photo, $param_facebook, $param_insta, $param_linkedin, $param_skills, $param_objective, $param_experience, $param_achievements, $param_qualification);

    $user_id=$_SESSION['id'];
    $param_name = $_POST['name'];
    $param_contact = $_POST['contact'];
    $param_address = $_POST['address'];
    $param_photo = $_FILES['photo']['name'];
    $param_facebook = $_POST['facebook'];
    $param_insta = $_POST['insta'];
    $param_linkedin = $_POST['linkedin'];
    $param_skills = $_POST['skill'];
    $param_objective = $_POST['objective'];
    $param_experience=$_POST['experience'];
    $param_achievements = $_POST['achievement'];
    $param_qualification = $_POST['qualification'];
    // Attempt to execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        header("location: try.php");
        exit;
    } else {
        echo "ERROR: Could not execute query: $sql. " . mysqli_error($conn);
    }
}
}


?>
<html>
<title>CV maker</title>

<link href="style.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>


<!--navbar-->
<nav class="navbar navbar-expand-sm bg-black navbar-dark">
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
                    <a href="logout.php" class="nav-link">Sign Out</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container" id="cv-form">
    <h1 class="text-center my-2"> Resume Generator</h1>
    <form action="" method="post" enctype="multipart/form-data">
    <div class="row">

        <!--        first column-->

        <div class="col-md-6">

            <h3 class="text-center">Personal Information</h3>
            <div class="form-group">
                <lable for="name">Your Name</lable>
                <input type="text" name="name" class="form-control" id="nameField" placeholder="Enter here" required>
            </div>

            <div class="form-group mt-2">
                <lable for="contact"> Your Contact</lable>
                <input type="text" name="contact" class="form-control" id="contactField" placeholder="Enter here">
            </div>

            <div class="form-group mt-2">
                <lable for="address"> Your Address</lable>
                <textarea class="form-control" name="address" id="addressField" placeholder="Enter here" ></textarea>
            </div>

            <div class="form-group mt-2" enctype="multipart/form-data">
                <label>Select your Photo</label>
                <input id="imgField" name="photo" type="file" class="form-control" required>
            </div>


            <h4 class="text-secondary mt-2">Links</h4>
            <div class="form-group ">
                <lable for="facebook"> Facebook</lable>
                <input type="url" name="facebook" class="form-control" id="fbField" placeholder="Enter here"  pattern="https://.*">
            </div>

            <div class="form-group mt-2">
                <lable for="insta"> Instagram</lable>
                <input type="url" name="insta" class="form-control" id="instaField" placeholder="Enter here"  pattern="https://.*">
            </div>

            <div class="form-group mt-2">
                <lable for="linkedin"> LinkedIn</lable>
                <input type="text" name="linkedin" class="form-control" id="linkedField" placeholder="Enter here" pattern="https://.*"K>
            </div>

            <h4 class="text-secondary mt-2">Skills</h4>
            <div class="form-group mt-2" id="sk">
                <lable for="skills"></lable>
                <textarea name="skill" class="form-control skField" placeholder="Enter data here" rows="3" ></textarea>

            </div>
        </div>



        <!--        //second column-->
        <div class="col-md-6">
            <h3 class="text-center">Professional Information</h3>

            <div class="form-group mt-2">
                <lable for="objectiveField"> Objective</lable>
                <textarea name="objective" class="form-control" id="objectiveField" placeholder="Enter here" rows="5" ></textarea>
            </div>

            <div class="form-group mt-2" id="we">
                <lable for="addressField"> Work experience</lable>
                <textarea name="experience" class="form-control weField"  placeholder="Enter here" rows="3" ></textarea>


            </div>

            <div class="form-group mt-2" id="ach">
                <lable for="addressField">Achievements</lable>
                <textarea name="achievement" class="form-control achField" placeholder="Enter here" rows="3" ></textarea>

            </div>


            <div class="form-group mt-2" id="aq">
                <lable for="addressField">Academic Qualification</lable>
                <textarea name="qualification" class="form-control aqField" placeholder="Enter here" rows="3" ></textarea>
            </div>


            <div class="container text-center mt-3 ">
                <button type="submit"  class="btn btn-dark btn-lg" id="generate_cv" >Generate CV</button>
            </div>
        </div>
    </div>
    </form>
</div>


<script src="script.js"></script>
</body>
</html>