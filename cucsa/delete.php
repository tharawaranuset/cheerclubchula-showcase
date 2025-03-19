<?php 

    include("functions.php");

    $query1 = "UPDATE `code` SET `status` = '-1' WHERE id = " . $_POST['id-delete'];

    $result1 = mysqli_query($link, $query1);

    header("Location: dashboard.php");


?>