<?php

include("config.php");

if (isset($mysql)) {
    $users = mysqli_query($mysql,'select * from users');
}
?>


<html>
<head>
    <title>Home</title>
</head>

<body>
<a href="create.php">Add New User</a><br/><br/>

<table width='80%' border=1>

    <tr>
        <th>Name</th> <th>tel</th> <th>Email</th> <th>Update</th>
    </tr>
    <?php
        if (isset($users)){
            foreach ($users as $user){
                echo "<tr style='text-align: center;'> <td>" .  $user['name'] . "</td>";
                echo " <td>" .  $user['email'] . "</td>";
                echo " <td>" .  $user['tel'] . "</td>";
                echo " <td> 
                            <a href='edit.php?id=$user[id]'>Update</a>
                            <a href='delete.php?id=$user[id]'>Delete</a> 
                    </td>";
                echo "</tr>";
            }
        }else{
            echo "Not found Data";
        }


    ?>
</table>
</body>
</html>
