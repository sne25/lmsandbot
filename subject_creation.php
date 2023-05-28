<?php
include('profile.php');

$conn = mysqli_connect("localhost", "root", "", "creslms");
$department = $_POST['department'];
$subject_name = $_POST['subject'];
$courseCode = $_POST['courseCode'];
$semester = $_POST['semester'];
$image = $_POST['image'];
$username =$user['name'];


$sql = "INSERT INTO subject (department,name,course_code,semester,subject_image)
     VALUES ('$department','$subject_name','$courseCode','$semester','$image')";
   mysqli_query($conn,"insert into activity_log (date,name,action) values(NOW(),'$username','Added subject $subject_name')");


if (mysqli_query($conn, $sql)) {
   echo "New record has been added successfully !";
} else {
   echo "Error: " . $sql . ":-" . mysqli_error($conn);
}
$conn->close();
?>