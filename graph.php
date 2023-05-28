<?php
$conn = mysqli_connect("localhost", "root", "", "creslms");
?>
<?php include('header.php'); ?>
<?php include('profile.php'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-circle-progress/1.2.2/circle-progress.min.js"></script>

<body>

    <div class="container-fluid">
        <div class="row-fluid">

            <!--/span-->
            <div class="span9" id="content">
                <div class="row-fluid"></div>

                <div class="row-fluid">

                    <!-- block -->
                    <div id="block_bg" class="block">
                        <div class="navbar navbar-inner block-header">
                            <div class="muted pull-left">Data Numbers</div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">



                                <?php
                                $query_teacher = mysqli_query($conn, "select * from faculty") or die(mysqli_error());
                                $count_teacher = mysqli_num_rows($query_teacher);
                                ?>


                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $count_teacher; ?>"><?php echo $count_teacher ?></div>
                                    <div class="chart-bottom-heading"><strong>Teachers</strong>

                                    </div>
                                </div>




                                <?php
                                $query_student = mysqli_query($conn, "select * from student") or die(mysqli_error());
                                $count_student = mysqli_num_rows($query_student);
                                ?>

                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $count_student ?>"><?php echo $count_student ?></div>
                                    <div class="chart-bottom-heading"><strong>Students</strong>

                                    </div>
                                </div>












                                <?php
                                $query_subject = mysqli_query($conn, "select * from subject") or die(mysqli_error());
                                $count_subject = mysqli_num_rows($query_subject);
                                ?>

                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $count_subject; ?>"><?php echo $count_subject; ?></div>
                                    <div class="chart-bottom-heading"><strong>Subjects</strong>

                                    </div>
                                </div>


                            </div>
                        </div>
                        <!-- /block -->

                    </div>
                </div>




            </div>
        </div>

       
    </div>
    <?php include('script.php'); ?>
</body>

</html>