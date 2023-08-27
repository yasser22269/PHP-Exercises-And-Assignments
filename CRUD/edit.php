<?php

include_once("config.php");


$errors = [];

if(isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = empty($_POST["name"]) ? array_push($errors,"Name is required") : $_POST["name"] ;
    $email = empty($_POST["email"]) ? array_push($errors,"Email is required") : $_POST["email"] ;
    $tel = empty($_POST["tel"]) ? array_push($errors,"Mobile is required") : $_POST["tel"] ;
    if(count($errors) == 0 ){
        if (!empty($mysql)) {
            $result = mysqli_query($mysql,
                "UPDATE users SET name='$name',email='$email',tel='$tel' WHERE id=$id");
            header("location:index.php");
        }
    }

}else{
    $id = $_GET['id'];

}



// get data
if (!empty($mysql)) {
    $user = mysqli_query($mysql, "SELECT * FROM users WHERE id=$id");
}
if ($user->num_rows > 0) {
    while($row = $user->fetch_assoc()) {
        $name = $row['name'];
        $email = $row['email'];
        $tel = $row['tel'];
    }
}

?>


<html>
<head>
    <title>Edit User Data</title>
</head>
<body>
<a href="index.php">Home</a>
<br/><br/>
<?php
if (isset($errors)){
    foreach ($errors as $error){
        echo "<ul > <li style='color: red;'>" .  $error . "</li> </ul>";
    }
}

?>
<form name="update_user" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <table border="0">
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" value="<?php echo $name;?>"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email" value="<?php echo $email;?>"></td>
        </tr>
        <tr>
            <td>Mobile</td>
            <td><input type="tel" name="tel" value="<?php echo $tel;?>"></td>
        </tr>
        <tr>
            <td><input type="hidden" name="id" value="<?php echo $id;?>"></td>
            <td><input type="submit" name="update" value="Update"></td>
        </tr>
    </table>
</form>
</body>
</html>
