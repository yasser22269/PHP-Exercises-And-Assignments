<?php
require_once('config.php');
session_start();
$username = $password  = "";
$errors = [];
try {
    if (isset($_POST['submit'])) {
        $username = empty($_POST["username"]) ? array_push($errors, "User Name is required") : $_POST["username"];
        $password = empty($_POST["password"]) ? array_push($errors, "Password is required") :
            $_POST["password"];
        if (count($errors) == 0) {
            if (isset($con)) {
                $stmt = $con->prepare("SELECT * FROM users WHERE username = :username ");
                $stmt->bindparam(':username', $username);
                $stmt->execute();
                if ($stmt->rowCount() == 0 || ! Password_Verify($password,$stmt->fetch(0)['password'])) {
                    array_push($errors, "Username Or password is not correct");
                }else{
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
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Login</h1>
        <?php
        if (isset($errors)){
            foreach ($errors as $error){
                echo "<ul > <li style='color: red;'>" .  $error . "</li> </ul>";
            }
        }

        ?>
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="Password"/>
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <p class="link"><a href="register.php">New Registration</a></p>
    </form>

</body>
</html>