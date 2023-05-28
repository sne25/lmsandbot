<?php
 session_start(); 
//Check whether the session variable SESS_MEMBER_ID is present or not

$session_id=$_SESSION['id'];

$user_query = mysqli_query($conn,"select * from admin where id = '$session_id'");
$user_row = mysqli_fetch_array($user_query);
$user_username = $user_row['username'];


?>