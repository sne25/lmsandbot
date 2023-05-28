<?php

$conn = mysqli_connect("localhost","root","","creslms");
$registernumber = $_POST['registernumber'];

$update_sql = " SELECT * from admin WHERE registernumber = '$registernumber'";
$query_run = mysqli_query($conn,$update_sql);

if(mysqli_num_rows($query_run)>0)
{
   
   
    $name = $_POST['name'];
    // $registernumber = $_POST['registernumber'];
    $email = $_POST['email'];
    $password = $_POST['password'];


     $sql = "UPDATE `admin` SET `name`='$name',`email`='$email',`password`='$password',`status`='registered' WHERE registernumber = '$registernumber'";
     
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
