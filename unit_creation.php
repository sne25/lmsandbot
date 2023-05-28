<?php

$conn = mysqli_connect("localhost", "root", "", "creslms");
$image = $_POST['image'];
$subject_id = $_POST['subjectid'];
$unit = $_POST['unit'];



$sql = "INSERT INTO subject_unit (image_url,subject_id,unit_id)
     VALUES ('$image','$subject_id','$unit')";

if (mysqli_query($conn, $sql)) {
    echo "New record has been added successfully !";
} else {
    echo "Error: " . $sql . ":-" . mysqli_error($conn);
}
$conn->close();
?>