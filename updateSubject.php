<?php
include('profile.php');
echo "Update subject";
$conn = mysqli_connect("localhost","root","","creslms");
$courseCode = $_POST['courseCode'];

$update_sql = " SELECT * from subject WHERE course_code = '$courseCode'";
$query_run = mysqli_query($conn,$update_sql);

if(mysqli_num_rows($query_run)>0)
{
    echo "record found";
  

$department = $_POST['department'];
$subject_name = $_POST['subject'];
// $courseCode = $_POST['courseCode'];
$semester = $_POST['semester'];
$image = $_POST['image'];
$username =$user['name'];


     $sql = "UPDATE `subject` SET `department`='$department',`name`='$subject_name',`semester`='$semester',`subject_image`='$image' WHERE course_code = '$courseCode'";
     mysqli_query($conn,"insert into activity_log (date,name,action) values(NOW(),'$username','Added subject $subject_name')");
     
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
