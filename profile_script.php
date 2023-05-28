<?php
include('profile2.php'); 
require 'config.php';

if (isset($_FILES["fileImg"]["name"])) {
    $id = $_POST["id"];

    $src = $_FILES["fileImg"]["tmp_name"];
    $imageName = uniqid() . $_FILES["fileImg"]["name"];

    $target = "img/" . $imageName;

    move_uploaded_file($src, $target);

    $query = "UPDATE superadmin SET image = '$imageName' WHERE id = $id";
    mysqli_query($conn, $query);
    echo "<script>
        window.location = 'superadmin1.php?user_id=".$user['id']."';
        </script>";



}
?>