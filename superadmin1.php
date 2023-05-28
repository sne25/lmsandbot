<?php include('profile2.php'); ?>
<?php error_reporting(0); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Superadmin dashboard</title>
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="admin_subjects.css" />
    <link rel="stylesheet" href="chart.css">



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <style media="screen">
        .upload {

            width: 90px;
            margin-top: 10px;
            margin-left: 65px;

        }

        .upload img {
            border-radius: 50%;
            border: 3px solid #DCDCDC;
            width: 90px;
            height: 90px;
        }

        .upload .rightRound {

            position: absolute;
            top: 75px;
            left: 128px;
            background: #00B4FF;
            width: 25px;
            height: 25px;
            line-height: 33px;
            text-align: center;
            border-radius: 50%;
            overflow: hidden;
            cursor: pointer;
        }

        .upload .leftRound {
            position: absolute;
            top: 75px;
            left: 75px;
            background: red;
            width: 25px;
            height: 25px;
            line-height: 33px;
            text-align: center;
            border-radius: 50%;
            overflow: hidden;
            cursor: pointer;
        }

        .upload .fa {
            color: white;
        }

        .upload input {
            position: absolute;
            transform: scale(2);
            opacity: 0;
        }

        .upload input::-webkit-file-upload-button,
        .upload input[type=submit] {
            cursor: pointer;
        }

        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            width: 450px;
            height: 350px;
            display: inline-table;
            border-radius: 5px;
            margin-left: 10px;
            margin-top: 100px;

        }

        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        }

        img {
            border-radius: 5px 5px 0 0;
        }

        .container1 {
            padding: 2px 16px;
            font-size: x-large;
            color: black;
        }

        .feed {
            margin-left: 100px;
        }
    </style>



</head>

<body>

    <!--wrapper start-->
    <div class="wrapper">
        <!-- header menu start-->
        <div class="header">
            <div class="header-menu">
                <img class="logo" src="logo (1).png">

                <ul>

                    <li><a href="showrequest.php?user_id=<?php echo $user['id']; ?>"><i class="fas fa-envelope-open"></i></a></li>
                    <li><a href="logout.php"><i class="fas fa-power-off"></i></a></li>
                </ul>
            </div>
        </div>
        <!--header menu end-->

        <div class="sec-header">
            <div class="sidebar-btn">
                <i class="fas fa-bars"></i>
            </div>
        </div>


        <!--sidebar start-->
        <div class="sidebar">
            <div class="sidebar-menu">


                <form class="form" id="form" action=""
                    enctype="multipart/form-data" method="post">
                    <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                    <div class="upload">
                        <img src="img/<?php echo $user['image']; ?>" id="image">
                        <p>
                            <?php echo $user['username']; ?>
                        </p>

                        <div class="rightRound" id="upload">
                            <input type="file" name="fileImg" id="fileImg" accept=".jpg, .jpeg, .png">
                            <i class="fa fa-camera"></i>
                        </div>

                        <div class="leftRound" id="cancel" style="display: none;">
                            <i class="fa fa-times"></i>
                        </div>
                        <div class="rightRound" id="confirm" style="display: none;">
                            <input type="submit">
                            <i class="fa fa-check"></i>

                        </div>
                </form>
            </div>

            <!-- <center class="profile">
                        <img src="sem image.jpg" alt="">
                        <p>Jessica</p>
                    </center> -->
            <?php


            $dep = $_GET['department'];
            $sem = $_GET['semester'];


            $query = "SELECT * FROM subject WHERE department='$dep' and semester = '$sem'";

            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
                $count = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $count++;
                    $subimg = $row['subject_image'];
                    $subjectId = $row['id'];
                    $subject = $row['name'];
                }
            }
            ?>

            <li class="item">
                <a href="superadmin_dashboard.php?user_id=<?php echo $user['id']; ?>" class="menu-btn">
                    <i class="fas fa-graduation-cap"></i><span>Add student</span>
                </a>
            </li>
            <li class="item">
                <a href="superadmin_faculty.php?user_id=<?php echo $user['id']; ?>" class="menu-btn">
                    <i class="fas fa-id-badge"></i><span>Add faculty</span>
                </a>
            </li>
            <li class="item">
                <a href="superadmin_admin.php?user_id=<?php echo $user['id']; ?>" class="menu-btn">
                    <i class="fas fa-id-card"></i><span>Add admin</span>
                </a>
            </li>

            <li class="item">
                <a href="superadmin_activity.php?user_id=<?php echo $user['id']; ?>" class="menu-btn">
                    <i class="fab fa-autoprefixer"></i><span>Activity Log</span>
                </a>
            </li>
            <li class="item">
                <a href="superadmin_user.php?user_id=<?php echo $user['id']; ?>" class="menu-btn">
                    <i class="fas fa-user"></i><span>User Log</span>
                </a>
            </li>
           



        </div>
    </div>
    <!--sidebar end-->
    <!--main container start-->

    <div class="container">

        <div class="box-container">


            <div class="chart-container">
                <div class="chart-box">
                    <?php
                    $query_teacher = mysqli_query($conn, "select * from faculty");
                    $count_teacher = mysqli_num_rows($query_teacher);
                    ?>
                    <div class="chart" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"
                        style="--value:<?php echo $count_teacher; ?>"></div>
                    <p>NUMBER OF FACULTY</p>

                </div>
                <?php
                $query_teacher = mysqli_query($conn, "select * from student") or die;
                $count_teacher = mysqli_num_rows($query_teacher);
                ?>
                <div class="chart-box">
                    <div class="chart" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"
                        style="--value:<?php echo $count_teacher; ?>"></div>
                    <p>NUMBER OF STUDENT</p>
                </div>
                <?php
                $query_teacher = mysqli_query($conn, "select * from admin");
                $count_teacher = mysqli_num_rows($query_teacher);
                ?>
                <div class="chart-box">
                    <div class="chart" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"
                        style="--value:<?php echo $count_teacher; ?>"></div>
                    <p>NUMBER OF ADMIN</p>
                </div>


            </div>



        </div>
        </div>
        <script type="text/javascript" src="profile_script.js"></script>
        <script>
            function myFunction() {
                alert('Currently unavailable')
            }
        </script>

        <!--card -->

        <!-- card ends -->



        <!--main container end-->

        <!--wrapper end-->

        <script type="text/javascript">
            $(document).ready(function () {
                $(".sidebar-btn").click(function () {
                    $(".wrapper").toggleClass("collapse");
                });
            });
        </script>
        <!-- <script type="text/javascript">
        document.getElementById("fileImg").onchange = function () {
            document.getElementById("image").src = URL.createObjectURL(fileImg.files[0]); // Preview new image

            document.getElementById("cancel").style.display = "block";
            document.getElementById("confirm").style.display = "block";

            document.getElementById("upload").style.display = "none";
        }

        var userImage = document.getElementById('image').src;
        document.getElementById("cancel").onclick = function () {
            document.getElementById("image").src = userImage; // Back to previous image

            document.getElementById("cancel").style.display = "none";
            document.getElementById("confirm").style.display = "none";

            document.getElementById("upload").style.display = "block";
        }
    </script> -->

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>



</body>

</html>