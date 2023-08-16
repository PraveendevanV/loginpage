<?php
require 'config.php';
if (!empty($_SESSION["id"])){
    $id = $_SESSION["id"];

    $result = mysqli_query($conn, "SELECT * FROM reg WHERE id=$id");
    $row = mysqli_fetch_assoc($result);
    if (isset($_POST["edit"])){
        $newname = $_POST["newname"];
        $newemail = $_POST["newemail"];
        $newplacc = $_POST["newplacc"];
        $newedu = $_POST["newedu"];
        $newcontact = $_POST["newcontact"];
        $updata = "UPDATE reg SET username='$newname',email='$newemail',placc='$newplacc',edu='$newedu',contact='$newcontact' WHERE id='$id'";
        if (mysqli_query($conn, $updata)){
                echo "<script> alert('Profile Updated')</script>";
        }else{
            echo "error";
        }
    }
    if (isset($_POST["dlte"])){
        $newplacc = $_POST["newplacc"];
        $newedu = $_POST["newedu"];
        $newcontact = $_POST["newcontact"];

        $upt = "UPDATE reg SET placc='',edu='' WHERE id='$id'";

        if (mysqli_query($conn, $upt)){
            echo "<script> alert('Deleted')</script>";
        }else{
            echo "error";
        }


    }
    if (isset($_POST["delete"])){

        $dlt = "DELETE FROM reg WHERE id='$id'";
        if (mysqli_query($conn, $dlt)){
            echo "<script> alert('Deleted Profile')</script>";
        }else{
            echo "error";
        }
    }

}
else{
    header ("location: login.php");
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>index</title>

</head>
<body>

    <nav class="navbar fixed-top navbar-light bg-dark" id="top">
        <div class="container-fluid">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <img src="2.jpg" alt="Logo" style="width:40px;" class="rounded-pill">
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="#">Welcome <?php echo $row["username"]; ?></a>
                </li>
            </ul>
            <ul class="nav-item dropdown text-right">
                    <a class="nav-link dropdown-toggle text-light pt-2" data-bs-toggle="dropdown" href="">Profile</a>
                <div class="dropdown-menu dropdown-menu-end">
                        <a href="#" id="ep" class="dropdown-item">Edit Profile</a>
                        <a href="#" id="pro" class="dropdown-item">Delete Profile</a>
                    <div class="dropdown-divider"></div>
                    <a href="logout.php" class="dropdown-item">Logout</a>
                    </div>
                </div>
            </ul> 
        </div>
    </nav>  
    
<div class="container position-absolute top-40 start-50" id="car"><br><br><br>
    <div class="card" style="width:500px">
        <div class="card-body">
            <form action="" method="post">
            <h4 class="card-title"><?php echo $row["username"]; ?></h4>
            <hr class="text-dark">
            <hr class="text-dark">
            <div class="form-group">
                <p>Name:
                <input type="text" name="newname" value="<?php echo $row["username"]; ?>">
                </p>
            </div>
                <hr class="text-dark">
            <div class="form-group">
                <p>Email:
                <input type="email" name="newemail" value="<?php echo $row["email"]; ?>">
                </p>
            </div>
                <hr class="text-dark">
            <div class="form-group">
                <p>Place:
                <input type="text" name="newplacc" value="<?php echo $row["placc"]; ?>"><button type="submit" name="dlte" class="btn-sm btn-danger">Delete</button>
                </p>
            </div>
            <hr class="text-light">
            <div class="form-group">
                <p>Education:
                <input type="text" name="newedu" value="<?php echo $row["edu"]; ?>"><button type="submit" name="dlte" class="btn-sm btn-danger">Delete</button>
                </p>
            </div>
            <hr class="text-light">
            <div class="form-group">
                <p>Contact:
                <input type="bigint" name="newcontact" value="<?php echo $row["contact"]; ?>">
                </p>
            </div>
            <div class="form-group">
            <button type="submit" class="btn btn-default btn-sm" name="edit">SAVE</button>
            </div>
        </div>
    </div>
</div>
<div class="container position-absolute top-50 start-50 translate-middle p-5 my-6" id="pr">
    <div class="text-light"><?php echo $row["username"]; ?></div>
        <hr class="text-light">
    <hr class="text-light">
    <div class="form-group">
        <p class="text-light">Username: <?php echo $row["username"]; ?></p>
    </div>
    <hr class="text-light">
    <div class="form-group">
        <p class="text-light">Email: <?php echo $row["email"]; ?> </p>
    </div>
    <hr class="text-light">
    <div class="form-group">
        <p class="text-light">Contact: <?php echo $row["contact"]; ?></p>
    </div>
    <hr class="text-light">
    <div class="form-group">
        <p class="text-light">Education: <?php echo $row["edu"]; ?></p>
    </div>
    <hr class="text-light">
    <div class="form-group">
        <p class="text-light">Place: <?php echo $row["placc"]; ?></p>
    </div>
    <hr class="text-light">
    <div class="form-group">
    <button type="submit" name="delete" class="btn btn-danger">Delete</button>  
    </div>

</div>
</form>
    <script>
    $(document).ready(function(){
        $("#pr").hide();
        $("#pro").on('click',function(){
        $("#pr").fadeToggle();
        });
    });
    $(document).ready(function(){
        $("#car").hide();
        $("#ep").on('click',function(){
        $("#car").fadeToggle();
        });
    });
    </script>
</body>
</html>