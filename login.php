<?php
require 'config.php';
if (!empty($_SESSION["id"])){
    header("location: index.php");
}
if(isset($_POST['submit'])){
    $usernameemail = $_POST["usernameemail"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM reg WHERE username = '$usernameemail' OR email = '$usernameemail'");
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result)>0){
        if ($password == $row['password']){
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            header("Location: index.php");
        }
        else{
            echo
            "<script> alert('wrong password');</script>";
        }
    }
    else{
        echo
        "<script> alert('user not registered');</script>";
    }
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
    <title>Demo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container ">
        <div class="row">
            <div class="col-lg-8 col-md-5 col-sm-3">
                <div class="card position-absolute top-50 start-50 translate-middle p-5 my-6" id="card">
                    <form method="post" action="" autocomplete="off">
                    <div class="card-header"><h3 class="">LOGIN</h3></div><br>
                    <div class="content ms-1 p-4">
                        <div class="input-field">
                            <input type="text" name="usernameemail" required value=""> 
                            <label>email or name</label>
                          </div><br>
                          <div class="input-field">
                            <input type="password" name="password" required value=""> 
                            <label>Enter Password</label>
                          </div>
                          <input type="checkbox" class="ms-4" id="cbox"><span class="text-light ms-1">Remember Me</span>
                          <a href="" class="fpsd ms-5">Forget Password?</a><br><br>
                          <div class="p-6 ms-2">
                          <button class="button" name="submit" role="button">Login</button>
                          </div><br>
                          <div class="text-light ms-5"><span>Not a Member?</span>
                            <a  class="" href="register.php">Register Now!</a>
                          </div>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>    

</body>
</html>