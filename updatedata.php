<?php

$conn = mysqli_connect("localhost","root","","creslms");
$registernumber = $_POST['registernumber'];

$update_sql = " SELECT * from student WHERE registernumber = '$registernumber'";
$query_run = mysqli_query($conn,$update_sql);

if(mysqli_num_rows($query_run)>0)
{
   
   
$name = $_POST['name'];
// $registernumber = $_POST['registernumber'];
$department = $_POST['department'];
$semester = $_POST['semester'];
$email = $_POST['email'];
$password = $_POST['password'];


     $sql = "UPDATE `student` SET `name`='$name',`department`='$department',`semester`='$semester',`email`='$email',`password`='$password',`status`='registered' WHERE registernumber = '$registernumber'";
     
     if (mysqli_query($conn, $sql)) {
        echo "Updated record successfully !";
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
}
else{ 
    echo "no record found ";

}
 $conn->close();
?>
