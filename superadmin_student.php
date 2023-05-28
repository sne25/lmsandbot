<?php

$conn = mysqli_connect("localhost", "root", "", "creslms");
$name = $_POST['name'];
$rrn = $_POST['rrn'];
$email = $_POST['email'];
$department = $_POST['department'];
$phonenumber = $_POST['phonenumber'];
$year = $_POST['year'];




$sql = "INSERT INTO student (name,registernumber,email,department,phonenumber,year)
     VALUES ('$name','$rrn','$email','$department','$phonenumber','$year')";

if (mysqli_query($conn, $sql)) {
    echo "New record has been added successfully !";
} else {
    echo "Error: " . $sql . ":-" . mysqli_error($conn);
}
$conn->close();
?>