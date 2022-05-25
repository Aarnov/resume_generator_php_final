<?php
session_start();
if (!isset($_SESSION["loggedin"])) {
    header("location:../login.php");
}
require_once "config.php";
$sql = "SELECT * FROM record where user_id=".$_SESSION['id']." ORDER BY id DESC LIMIT 1";

if ($stmt = mysqli_prepare($conn, $sql)) {


    // Attempt to execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 1) {
    /* Fetch result row as an associative array. Since the result set
    contains only one row, we don't need to use while loop */
    $row = mysqli_fetch_array($result);}}}

?>
<html>
<head>
<title>CV maker</title>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
<!--cv template-->
<div class="container" id="cv-template">
    <div class="row">
        <div class="col-md-4 text-center py-5 bg-dark text-light">
            <!--            first col-->
            <img id="imageT" src="upload/<?php echo $row['photo'] ?>" width="200px" border-radius= "50%" ;>

            <div class="container ">
                <p id="nameT1" class="mt-3"><?php echo $row['name'] ?></p>
                <p id="contactT"><?php echo $row['contact'] ?></p>
                <p id="addressT"><?php echo $row['address'] ?></p>

                <hr>

                <p><a id="fbT" href="#1"><?php echo $row['facebook'] ?></a></p>
                <p><a id="instaT" href="#1"><?php echo $row['insta'] ?></a></p>
                <p><a id="linkedT" href="#1"><?php echo $row['linkedin'] ?></a></p>
            </div>
            <hr>
            <h3>Skills</h3>
            <div  id="skT">
                <?php echo $row['skills'] ?>
            </div>

        </div>


        <div class="col-md-8 py-5">
            <!--            second col-->
            <h1 id="nameT2" class="text-center" style=" font-weight: 900;"><?php echo $row['name'] ?></h1>


            <!--objective card-->
            <div class="card mt-4">
                <div class="card-header bg-dark text-light">
                    <h3>Objective</h3>
                </div>
                <div class="card-body">
                    <p id="objectiveT"><?php echo $row['objective'] ?></p>
                </div>
            </div>

            <!--work experience card-->

            <div class="card mt-4">
                <div class="card-header bg-dark text-light">
                    <h3>Work Experience</h3>
                </div>
                <div class="card-body text=small">
                    <div id="weT">
                        <?php echo $row['experience'] ?>
                    </div>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header bg-dark text-light">
                    <h3>Achievements</h3>
                </div>
                <div class="card-body text=small">
                    <div id="achT">
                        <?php echo $row['achievements'] ?>
                    </div>
                </div>
            </div>

            <!--academic qualification card-->
            <div class="card mt-4">
                <div class="card-header bg-dark text-light">
                    <h3>Academic Qualification</h3>
                </div>
                <div class="card-body text=small">
                    <div id="aqT">
                        <?php echo $row['qualification'] ?>
                    </div>
                </div>
            </div>

            <div class="container py-4 text-center">
                <button onclick="printCV('cv-template')" class="btn btn-dark btn-lg print" id="print">Print CV</button>
            </div>

        </div>
    </div>
</div>
<script src="script.js"></script>
</body>
</html>