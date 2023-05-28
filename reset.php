<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset</title>
    <link rel="stylesheet" href="loginpage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
</head>
<body>
    <div class="split-screen">
        <div class="left">
            <section class="copy">
            </section>
        </div>

        <div class="right">
            
            <form action="reset.php" method="post">
                <section class="copy">
                    <div class="img"><img src="loginlogo.png" alt="Cresent-Logo"></div>
                    <h2>Change password</h2>
                    
                </section>

                <div class="input-container">
                    
                    <label for="email">EMAIL</label>
                    <input type="email" id="user_email" name="user_email" value="<?php echo (isset($_POST['email']))?$_POST['email']:'';?>" placeholder="Enter your Email Address" autocomplete="off">
                    <i class="fas fa-id-badge"></i>
                </div>
                
                <div class="input-container">
                    
                    <label for="registernumber">OTP</label>
                    <input type="text" id="user_otp" placeholder="Enter OTP" name="user_otp" autocomplete="off" required>
                    <i class="fas fa-id-badge"></i>
                </div>
                
                

                <div class="input-container">
                    <label for="password">NEW PASSWORD</label>
                    <input type="password" id="password" placeholder="Enter new Password" name="password" title="Enter your password" autocomplete="off" required>
                    <i class="fas fa-lock"></i>
                </div>

                <div class="input-container">
                    <label for="password">CONFIRM PASSWORD</label>
                    <input type="password" id="cnfrm_password" placeholder="Confirm new Password" name="cnfrm_password" title="Enter your password" autocomplete="off" required>
                    <i class="fas fa-lock"></i>
                </div>
                
                <button class="signup-btn" name="save" type="submit"> save </button>
                                    
            </form>
        </div>
    </div>
    </div>
    <?php

        if(isset($_POST['user_email'])){
            $conn = mysqli_connect("localhost", "root", "", "creslms");
            $email = $_POST['user_email'];
            $otp = $_POST['user_otp'];
            $cnfrm_password = $_POST['cnfrm_password'];
            $password = $_POST['password'];
            if($cnfrm_password != $password) {
                echo "<script type='text/javascript'>alert('Both password should be same');</script>";
            }

            $query = "SELECT * FROM password_reset_log WHERE email = '$email' and user_otp = '$otp' and status = 'A'";

            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                $query = "update ".$row['user_table']." set password = '$cnfrm_password' WHERE id = '".$row['user_id']."'";
                $result = mysqli_query($conn, $query);
                echo "<script type='text/javascript'>alert('Password Changed Successfully.');</script>";
                echo "<script>
                window.location = 'loginpage.php';
                </script>";
                // print_r($row);
                // echo "<script type='text/javascript'>alert('otp available');</script>";
            }else{
                echo "<script type='text/javascript'>alert('no record found');</script>";
                echo "<script>
                window.location = 'reset.php';
                </script>";
            }
        }
    ?>
</body>
</html>

