<html>
<head>
    <title>Add Users</title>

    <?php
    $name = $email = $moblie  = "";
    $errors = [];
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = empty($_POST["name"]) ? array_push($errors,"Name is required") : $_POST["name"] ;
        $email = empty($_POST["email"]) ? array_push($errors,"Email is required") : $_POST["email"] ;
        $tel = empty($_POST["tel"]) ? array_push($errors,"tel is required") : $_POST["tel"] ;
        if(count($errors) == 0 ){
            include_once('config.php');
            if (!empty($mysql)) {
                $result = mysqli_query($mysql,
                    "INSERT INTO users(name,email,tel) VALUES('$name','$email','$tel')");
                header("location:index.php");
            }
        }

    }


    ?>
</head>

<body>
<a href="index.php">Go to Home</a>
<br/><br/>

<?php
    if (isset($errors)){
        foreach ($errors as $error){
            echo "<ul > <li style='color: red;'>" .  $error . "</li> </ul>";
        }
    }



?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="form1">
    <table width="25%" border="0">
        <tr>
            <td>Name</td>
            <td><input type="text" name="name"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email"></td>
        </tr>
        <tr>
            <td>tel</td>
            <td><input type="tel" name="tel"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="Submit" value="Add"></td>
        </tr>
    </table>
</form>


</body>
</html>