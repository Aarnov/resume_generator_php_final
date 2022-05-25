<?php
session_start();
if (!isset($_SESSION["loggedin"])) {
    header("location:../login.php");
}

require_once "config_demo.php";
if (isset($_POST["search_keyword"]) && isset($_POST["search_keyword"])){
    $search_keyword=$_POST["search_keyword"];

    $search_field=$_POST["search_field"];


    if($search_field=="first_name"){
        $sql="SELECT * FROM persons WHERE first_name LIKE '%".$search_keyword."%'";
        $result = mysqli_query($conn, $sql);
    }
    elseif($search_field=="last_name"){
        $sql="SELECT * FROM persons WHERE last_name LIKE '%".$search_keyword."%'";
        $result = mysqli_query($conn, $sql);
    }
    elseif($search_field=="email"){
        $sql="SELECT * FROM persons WHERE email LIKE '%".$search_keyword."%'";
        $result = mysqli_query($conn, $sql);
    }
}
?>
<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
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
<div class="container-fluid">
<a href="create.php" method="post">Create</a>
<form action="search.php" method="post">
    <input type="text" name="search_keyword" placeholder="search here" required>
    <select name="search_field" required>
        <option value="first_name"selected>First Name</option>
        <option value="last_name">Last Name</option>
        <option value="email">Email</option>
    </select>
    <input type="submit" value="search">
</form>

<?php
if(isset($result)) {
    if (mysqli_num_rows($result) == 0) {
        if (mysqli_num_rows($result) == 0) {
            echo "<tr>";
            echo "<td colspan='7'>No data found!!! Try again...</td>";
            echo "</tr>";
        }
    }else{
       echo" <table border=1 class='table table-dark'>";
       echo"<tr>";
        echo"<th>id</th>";
        echo"<th>Image</th>";
        echo" <th>First Name</th>";
        echo"<th>Last Name</th>";
        echo"<th>Email</th>";
        echo"<th>Edit</th>";
        echo"<th>Delete</th>";
    echo"</tr>";
}
?>



    <?php foreach($result as $row){?>
        <tr>
            <td><?php echo$row['id']?></td>
            <td><img src="upload/<?php echo $row['image']?>" height="2%" width="5%"></td>
            <td><?php echo$row['first_name']?></td>
            <td><?php echo$row['last_name']?></td>
            <td><?php echo $row['email']?></td>
            <td><a href="update.php?id=<?php echo $row['id']?>">Edit</td>
            <td><a href="delete_detail.php?id=<?php echo $row['id']?>">Delete</td>
        </tr>
        <?php
        }
        ?>
    <?php }?>
</div>

</body>
</html>

