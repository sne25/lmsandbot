<?php

$conn = mysqli_connect("localhost", "root", "", "creslms");
$name = $_POST['name'];
$rrn = $_POST['rrn'];
$email = $_POST['email'];




$sql = "INSERT INTO admin (name,registernumber,email)
     VALUES ('$name','$rrn','$email')";

if (mysqli_query($conn, $sql)) {
    echo "New record has been added successfully !";
} else {
    echo "Error: " . $sql . ":-" . mysqli_error($conn);
}
$conn->close();
?>