<?php
require 'config.php';

$_SESSION["id"] = $_GET['user_id']; // Fill session id with user's id to get user's data like name and image name
$sessionId = $_SESSION["id"];
$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM superadmin WHERE id = $sessionId"));

?>