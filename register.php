<?php 
    $msg = "";

    
    if (isset($_POST['submit'])) {
        $conn = new mysqli('localhost', 'root', '', 'passwordhash');

        $name = $conn->real_escape_string($_POST['name']);
        $email = $conn->real_escape_string($_POST['email']);
        $password = $conn->real_escape_string($_POST['password']);
        $cPassword = $conn->real_escape_string($_POST['cPassword']);

        if ($password != $cPassword) {
            $msg = "Please Check Your Password!";
        } else {
            $hash = password_hash($password, PASSWORD_BCRYPT);
            $conn->query("INSERT INTO users (name,email,password) VALUES ('$name', '$email', '$hash')");
            $msg = "You have been registered succesufully!";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP Password hashing</title>
    <link <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    
    <div class="container" style="margin=top: 100px;">
        <div class="row justify-content-center">
            <div class="col-md-6 col-md-offset-3" align="center">
            <img src="mail.png"><br><br>

            <?php if ($msg != "") echo $msg . "<br><br>"; ?>
             
            <form method="POST" action="register.php">
                <input class="form-control" minlength="5" name="name" placeholder="Name..."><br>
                <input class="form-control" name="email" type="email" placeholder="Email..."><br>
                <input class="form-control" minlength="6" name="password" type="password" placeholder="Password..."><br>
                <input class="form-control" minlength="6" name="cPassword" type="password" placeholder="Confirm Password..."><br>
                <input class="btn btn-primary" name="submit" type="submit" value="Register"><br>
            </form>

            </div>
        </div>
    </div>

</body>
</html>