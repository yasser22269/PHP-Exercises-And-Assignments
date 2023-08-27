<?php

include_once("config.php");
$id = $_GET['id'];
if (!empty($mysql)) {
    $result = mysqli_query($mysql,
        "Delete from users WHERE id=$id");
    header("location:index.php");
}



?>
