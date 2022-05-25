<?php
session_start();
if (!isset($_SESSION["loggedin"])) {
    header("location:../login.php");
}

require_once "config_demo.php";
$sql = "SELECT * FROM persons";
$result = mysqli_query($conn, $sql)

?>

<html>
<head>
    <title>Edit Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>
<body>
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
                    <a href="../logout.php" class="nav-link">Sign Out</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container-fluid vh=100">
    <div class="row justify-content-center ">
                <a href="create.php">Create New</a>
                <form action="search.php" method="post">
                    <input type="text" name="search_keyword" required>
                    <select name="search_field" required>
                        <option value="first_name" selected>First Name</option>
                        <option value="last_name">Last Name</option>
                        <option value="email">Email</option>
                    </select>
                    <input type="submit" value="Search">
                </form>


        <table class='table table-dark' border="1">
            <tr>
                <th>id</th>
                <th>Image</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php foreach ($result as $row) { ?>
                <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><img src="upload/<?php echo $row['image'] ?>" height="2%" width="5%"></td>
                    <td><?php echo $row['first_name'] ?></td>
                    <td><?php echo $row['last_name'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><a href="update.php?id=<?php echo $row["id"] ?>">Edit</a></td>
                    <td><a href="delete_details.php? id=<?php echo $row["id"] ?>">Delete</a></td>
                </tr>

            <?php } ?>
        </table>
    </div>
</div>
</body>
</html>



