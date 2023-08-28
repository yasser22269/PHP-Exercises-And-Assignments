<?php
session_start();
require_once('config.php');

$username = $email = $password  = "";
$errors = [];
try {
    if (isset($_POST['submit'])) {
        $username = empty($_POST["username"]) ? array_push($errors, "User Name is required") : $_POST["username"];
        $email = empty($_POST["email"]) ? array_push($errors, "Email is required") : $_POST["email"];
        $password = empty($_POST["password"]) ? array_push($errors, "Password is required") :
            password_hash($_POST["password"], PASSWORD_DEFAULT);
        if (count($errors) == 0) {
            if (isset($con)) {
                $stmt = $con->prepare("SELECT * FROM users WHERE username = :username OR email = :email");
                $stmt->bindparam(':username', $username);
                $stmt->bindparam(':email', $email);
                $stmt->execute();
                if ($stmt->rowCount() > 0) {
                    array_push($errors, "Username Or Email is registered before");
                }
                else {
                    $create_datetime = date("Y-m-d H:i:s");
                    $insert = $con->prepare("INSERT INTO users
                                    (username,email,password,create_datetime) 
                                    values(:username,:email,:password,:create_datetime)");
                    $insert->bindparam(':username', $username);
                    $insert->bindparam(':email', $email);
                    $insert->bindparam(':password', $password);
                    $insert->bindparam(':create_datetime', $create_datetime);
                    $insert->execute();

                    $_SESSION["username"] = $username;
                    header("location:index.php");

                }
            }

        }
    }
}
catch(PDOException $e) {
    echo $e;
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body>
    <form class="form" action="" method="post">
        <h1 class="login-title">Registration</h1>
        <?php
        if (isset($errors)){
            foreach ($errors as $error){
                echo "<ul > <li style='color: red;'>" .  $error . "</li> </ul>";
            }
        }

        ?>
        <input type="text" class="login-input" name="username" placeholder="Username" required />
        <input type="text" class="login-input" name="email" placeholder="Email Adress">
        <input type="password" class="login-input" name="password" placeholder="Password">
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link"><a href="login.php">Click to Login</a></p>
    </form>
</body>
</html>