<?php
if(isset($_POST['submit'])){
    $name = isset($_POST['username']) ? $_POST['username'] : "No Name";
    echo "User Name is " . $name .  "<br>";
    if (!empty($_POST['check_list'])) {
        echo "favourite colours chosen by ". $name  .  "<br>";
        echo "<ul>";
            foreach ($_POST['check_list'] as $check_list){
                echo "<li>$check_list</li>";
            }
           echo "</ul>";
    }else{
        echo "user didn't choose favourite colours" .  "<br>";

    }
    echo '<a href="array.php">Back</a>';
}
