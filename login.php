<?php

$registernumber = $_POST['registernumber'];
$password = $_POST['password'];

$con = mysqli_connect('localhost', 'root', '', 'creslms');
if ($con->connect_error) {
    die("Failed to connect : " . $con->connect_error);
} else {
    $stmt = $con->prepare("select * from student where registernumber = ?");
    $stmt->bind_param("i", $registernumber);
    $stmt->execute();
    $stmt_result = $stmt->get_result();



    if ($stmt_result->num_rows > 0) {
        $data = $stmt_result->fetch_assoc();
        if ($data['password'] === $password) {

            $sql = "INSERT INTO user_log(reg_no,logged_time) VALUES ('$registernumber', CURRENT_TIMESTAMP())";
            if (!mysqli_query($con, $sql)) {
                echo "<script type='text/javascript'>alert('Could not insert record');</script>";
            }
            header("Location:studentfrontpage.php?user_id=" . $data['id'] . "&department=" . $data['department'] . "&semester=" . $data['semester']);





        } else {
            
            echo "<script type='text/javascript'>alert('invalid password');</script>";
            echo "<script>
            window.location = 'loginpage.php';
            </script>";
        }


    }

}
if ($con->connect_error) {
    die("Failed to connect : " . $con->connect_error);
} else {
    $stmt = $con->prepare("select * from faculty where registernumber = ?");
    $stmt->bind_param("i", $registernumber);
    $stmt->execute();
    $stmt_result = $stmt->get_result();

    if ($stmt_result->num_rows > 0) {
        $data = $stmt_result->fetch_assoc();
        if ($data['password'] === $password) {
            $sql = "INSERT INTO user_log(reg_no,logged_time) VALUES ('$registernumber', CURRENT_TIMESTAMP())";
            if (!mysqli_query($con, $sql)) {
                echo "<script type='text/javascript'>alert('Could not insert record');</script>";
            }
            if($data['sem']==="even"){
                header("Location:faculty_frontpage.php?user_id=" . $data['id'] . "&department=" . $data['department']."&sem=".$data['sem']);
            }if($data['sem']==="odd")
            {
                header("Location:faculty_frontpage2.php?user_id=" . $data['id'] . "&department=" . $data['department']."&sem=".$data['sem']);

            }

            // header("Location:faculty_sempage.php?user_id=" . $data['id'] . "&department=" . $data['department'] . "&semester=" . $data['semester']);


        } else {

            echo "<script type='text/javascript'>alert('invalid password');</script>";
            echo "<script>
            window.location = 'loginpage.php';
            </script>";


        }

    }

}
if ($con->connect_error) {
    die("Failed to connect : " . $con->connect_error);
} else {
    $stmt = $con->prepare("select * from superadmin where registernumber = ?");
    $stmt->bind_param("i", $registernumber);
    $stmt->execute();
    $stmt_result = $stmt->get_result();

    if ($stmt_result->num_rows > 0) {
        $data = $stmt_result->fetch_assoc();
        if ($data['password'] === $password) {

            header("Location: superadmin1.php?user_id=" . $data['id'] . "");

        } else {

            echo "<script type='text/javascript'>alert('invalid password');</script>";
            echo "<script>
            window.location = 'loginpage.php';
            </script>";

        }

    }

}
if ($con->connect_error) {
    die("Failed to connect : " . $con->connect_error);
} else {
    $stmt = $con->prepare("select * from admin where registernumber = ?");
    $stmt->bind_param("i", $registernumber);
    $stmt->execute();
    $stmt_result = $stmt->get_result();

    if ($stmt_result->num_rows > 0) {
        $data = $stmt_result->fetch_assoc();
        if ($data['password'] === $password) {
            $sql = "INSERT INTO user_log(reg_no,logged_time) VALUES ('$registernumber', CURRENT_TIMESTAMP())";
            if (!mysqli_query($con, $sql)) {
                echo "<script type='text/javascript'>alert('Could not insert record');</script>";
            }

            header("Location: admin_frontpage.php?user_id=" . $data['id']);

        } else {

            echo "<script type='text/javascript'>alert('invalid password');</script>";
            echo "<script>
            window.location = 'loginpage.php';
            </script>";

        }


    } else {

        echo "<script type='text/javascript'>alert('invalid password');</script>";
        echo "<script>
            window.location = 'loginpage.php';
            </script>";

    }

}