<?php
require 'config.php';
            if (isset($_POST["submit"])){
                $username = $_POST["username"];
                $email = $_POST["email"];
                $password = $_POST["password"];
                $repassword = $_POST["repassword"];
                $sql = ("SELECT * FROM reg WHERE username = '$username' OR email = '$email'");
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result)>0){
                    echo
                    "<script> alert('username or email has already taken'); </script>";
                }
                else {
                    if($password == $repassword){
                        $query = "INSERT INTO reg VALUES('','$username','$email','$password','$repassword')";
                        mysqli_query($conn, $query);
                        echo
                        "<script> alert('registration successfully')</script>";
                    }
                    else {
                        echo
                        "<script> alert('password does not match')</script>";
                    }
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
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container ">
        <div class="row">
            <div class="col-lg-8 col-md-5 col-sm-3">
                <div class="card position-absolute top-50 start-50 translate-middle p-5 my-6" id="card">
                    <form method="post" action="" autocomplete="off">
                    <div class="card-header"><h3 class="">SIGNUP</h3></div><br>
                    <div class="content ms-1 p-4">
                        <div class="input-field">
                            <input type="text" name="username" required value=""> 
                            <label for="name">Enter Name</label>
                          </div><br>
                          <div class="input-field">
                            <input type="email" name="email" required value=""> 
                            <label>Enter Email</label>
                          </div><br>
						  <div class="input-field">
                            <input type="password" name="password" required value=""> 
                            <label>Enter password</label>
                          </div><br>
						  <div class="input-field">
                            <input type="password" name="repassword" required value=""> 
                            <label>confirm password</label>
                          </div><br>
                          <div class="p-6 ms-2">
                          <button class="button" name="submit" role="button">SignUp</button>
                          </div><br>
                          <a href="login.php" class="p-6 ms-2" id="lg">Login</a>
						</div>
					</form>
                </div>
            </div>
        </div>
    </div>    
</body>
</html>