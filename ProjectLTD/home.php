<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CDMI</title>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="all.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body>
    <!-- header 1 -->
    <div class="w-100 bg-color ptb-10">
        <div class="w-1140">
            <div class="flex">
                <div class="w-33 mail">
                    <ul class="flex">
                        <li><a href="" class="tw font-14 yellowtxt"><i class="fa-solid fa-envelope"></i>info@cdmi.in
                            </a></li>
                        <li><a href="" class="tw font-14 yellowtxt"><i class="fa-solid fa-certificate"></i> Verify
                                Certificate</a></li>
                    </ul>
                </div>
                <div class="w-33 flex center">
                    <a href="" class="tw font-14">HAVE ANY QUESTION ? +91 90333 16003</a>
                </div>
                <div class="w-33 social">
                    <ul class="flex end">
                        <li><a href="" class="tw font-14 yellowtxt"><i class="fa-brands fa-facebook-f"></i></a></li>
                        <li><a href="" class="tw font-14 yellowtxt"><i class="fa-brands fa-twitter"></i></a></li>
                        <li><a href="" class="tw font-14 yellowtxt"><i class="fa-brands fa-google-plus-g"></i></a></li>
                        <li><a href="" class="tw font-14 yellowtxt"><i class="fa-brands fa-linkedin"></i></a></li>
                        <li><a href="" class="tw font-14 yellowtxt"><i class="fa-brands fa-instagram"></i></a></li>
                        <li><a href="" class="tw font-14 yellowtxt"><i class="fa-brands fa-youtube"></i></a></li>
                        <li><a href="" class="tw font-14 yellowtxt"><i class="fa-brands fa-whatsapp"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- header 2 -->

    <div class="w-100 z-i">
        <div class="w-1140">
            <div class="flex">
                <div class="w-20">
                    <a href=""> <img src="https://www.cdmi.in/assets/front/images/creative-logo-blue.svg" width="100%"
                            alt=""></a>
                </div>
                <div class="w-80">
                    <ul class="flex end">
                        <li><a href="" class="yellowtxt" style="color: #ffbc06;">home</a></li>
                        <li><a href="" class="yellowtxt">courses
                                <i class="fa-solid fa-chevron-down"></i></a>
                            <div class="menu">
                                <div class="flex f-wrap">
                                    <?php

$con = mysqli_connect("localhost","root","","ltepro");

$query = "SELECT * FROM `course` WHERE `status` = '0' ";

    $res = mysqli_query($con , $query);
?>

                                    <?php
            while($row = mysqli_fetch_assoc($res))
    {
        ?>

                                    <div class="w-25">
                                        <ul>
                                            <h3><?php echo $row['name']; ?></h3>
                                            <?php

$id = $row['id'];
$querys = "SELECT * FROM `subcourse` WHERE `courseid` = $id";

    $ress = mysqli_query($con , $querys);

?>

                                            <?php
            while($rows = mysqli_fetch_assoc($ress))
    {
        ?>

                                            <li><a href="" class="icon"><i class="fa-regular fa-circle-check"></i>Master
                                                    <?php echo $rows['name']; ?></a></li>

                                            <?php  
    } 
    ?>
                                        </ul>
                                    </div>

                                    <?php  
    } 
    ?>
                                </div>
                        </li>
                        <li><a href="" class="yellowtxt">college courses</a></li>
                        <li><a href="" class="yellowtxt">activities<i class="fa-solid fa-chevron-down"></i></a></li>
                        <li><a href="" class="yellowtxt">blog</a></li>
                        <li><a href="" class="yellowtxt">know us<i class="fa-solid fa-chevron-down"></i></a></li>
                        <li><a href="" class="yellowtxt">get in touch</a></li>
                        <li><a href="" class="yellowtxt">student zone<i class="fa-solid fa-chevron-down"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- slider section -->

    <div class="w-100 pos-rel slider">
        <div class="btn-prev"><i class="fa-solid fa-chevron-down fa-rotate-270"></i></div>
        <div class="btn-next"><i class="fa-solid fa-chevron-down fa-rotate-90"></i></div>
    </div>


    <div class="h3">
        <h3 class="f1">CREATIVE COURSE</h3>
        <h3 class="f2">OFFERED COURSES</h3>
    </div>

    <!-- card -->



    <div class="w-100">
        <div class="w-1140">
            <div class="flex f-wrap gap">
                <?php
                                                
                 $qry = "SELECT * FROM `course` WHERE `status` = '0' ";
                                                    
                  $re = mysqli_query($con , $qry);
                                                
            while($row = mysqli_fetch_assoc($re))
    {
        ?>
                <div class="w-33 a2">
                    <div class="w-video">
                        <img src="courseimg/<?php echo $row['img']; ?>" alt="">
                        <div class="w-head pd-10">
                            <h2><?php echo $row['name']; ?></h2>
                        </div>
                    </div>
                    <div class="w-rate pd-10">
                        <div class="flex btw a-cen">
                            <div class="w-start">
                                <ul class="flex">
                                    <li><a href=""><i class="fa-solid fa-star mm"></i></a></li>
                                    <li><a href=""><i class="fa-solid fa-star mm"></i></a></li>
                                    <li><a href=""><i class="fa-solid fa-star mm"></i></a></li>
                                    <li><a href=""><i class="fa-solid fa-star mm"></i></a></li>
                                    <li><a href=""><i class="fa-solid fa-star-half-stroke mm"></i></a></li>
                                </ul>
                            </div>
                            <div class="w-know">
                                <a href="<?php echo $row['link']; ?>">know more...!!</a>
                            </div>
                        </div>
                    </div>
                </div>

                <?php  
    } 
    ?>
                <!-- batten -->

                <div class="flex w-100 center">
                    <div class="w-view">
                        <ul>
                            <li><a href="">View All Courses <i class="fa-solid fa-arrow-right"></i> </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        u
</body>

</html>