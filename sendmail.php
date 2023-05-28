<?php
use PHPMailer\PHPMailer\PHPMailer;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$conn = mysqli_connect("localhost", "root", "", "creslms");
if (isset($_POST['email'])) {
    $table = '';
    $email = $_POST['email'];

    $query = "SELECT * FROM student WHERE email = '$email'";

    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $table = 'student';
        // echo "<script type='text/javascript'>alert('Email exists !..');</script>";
    } else {
        $query1 = "SELECT * FROM faculty WHERE email = '$email'";

        $result1 = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            $table = 'faculty';
        } else {
            $query2 = "SELECT * FROM superadmin WHERE email = '$email'";

            $result2 = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
                $table = 'superadmin';
            } else {
                $query3 = "SELECT * FROM admin WHERE email = '$email'";

                $result3 = mysqli_query($conn, $query);
                if (mysqli_num_rows($result) > 0) {
                    $table = 'admin';
                } else {
                    echo "<script type='text/javascript'>alert('Email (" . $email . ") dosent exists !..');</script>";
                    echo "<script>
                            window.location = 'forgetpassword.php';
                            </script>";
                    // sendmail($email);
                }
            }
        }
    }
}

$user_otp = rand(100000, 999999);

$otp_query = "insert into password_reset_log 
            SET user_otp = '" . $user_otp . "',
            user_table = '" . $table . "', 
            user_id = (select id from " . $table . " where email = '" . $email . "' order by id desc limit 1), 
            email = '" . $email . "'";

$result = mysqli_query($conn, $otp_query);

$mail = new PHPMailer(true);

$mail->IsSMTP();

$mail->Host = 'smtp.gmail.com';

$mail->Port = '587';

$mail->SMTPAuth = true;

$mail->Username = 'lmscres02@gmail.com';

$mail->Password = 'pbdxnikdlsnxuavz';

$mail->SMTPSecure = '';

$mail->From = 'lmscres02@gmail.com';

$mail->FromName = 'creslms';

$mail->AddAddress($email);

$mail->IsHTML(true);

$mail->Subject = 'Password reset request for your account';

$message_body = '
            <p>For reset your password, you have to enter this verification code when prompted: <b>' . $user_otp . '</b>.</p>
            <p>Sincerely,</p>
            ';

$mail->Body = $message_body;

if ($mail->Send()) {
    echo '<script>alert("Please Check Your Email for password reset code")</script>';
    // echo "<script>
    // window.location = 'reset.php';
    // </script>";
    echo '<script>window.location.replace("reset.php?email=' . $email . '")</script>';
} else {
    echo "<script>
                window.location = 'forgetpassword.php';
                </script>";
}
// }
?>