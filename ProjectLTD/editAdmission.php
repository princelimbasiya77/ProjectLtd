<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | User Profile</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<style>
.w-100 {
    width: 100%;
    height: 100vh;
    /* padding-left: 20%; */
    padding-top: 2%;
    display: flex;
    justify-content: center;

}

form {
    width: 500px;
    height: 100vh;
    box-shadow: 0 0 1px 0;
    border-radius: 10px;
}

.card-footer {
    width: 100%;
    display: flex;
    justify-content: center;
}

.form-title {
    color: white;
    padding: 10px;
    background-color: #4646ff;
    border-radius: 10px 10px 0px 0px;
}

.proimgs {
    border-radius: 50% !important;
    width: 35px !important;
    height: 35px !important;
}

.proimg {
    border-radius: 50% !important;
    width: 135px !important;
    height: 135px !important;
}

.sidebar {
    height: 100vh;
}

.form-group {
    width: 100%;


}

.form-control {
    width: 460px;

}
</style>


<?php

$con = mysqli_connect("localhost","root","","ltepro");

session_start();

$userId = $_SESSION['loginUser'];

if(!isset($_SESSION['loginUser']))
{
    header("location:loginpage.php");
}

if(@$_GET['edit'])
    {
        $edit_id = $_GET['edit'];
        $qry = "SELECT * FROM `admission` WHERE `id`='$edit_id'";
        $res = mysqli_query($con , $qry);
        $row = mysqli_fetch_assoc($res);
        $Name = $row['Name'];
        $ContactNumber = $row['ContactNumber'];
        $ParentContact = $row['ParentContact'];    
        $CourseName = $row['CourseName'];    
        $JoinDate = $row['JoinDate'];    
        $FeesDate = $row['FeesDate'];    
        $BatchTime = $row['BatchTime'];
    }
if(isset($_POST['addInquiry']))
    {
  
        $Name = $_POST['Name'];
        $ContactNumber = $_POST['ContactNumber'];
        $ParentContact = $_POST['ParentContact'];    
        $CourseName = $_POST['CourseName'];    
        $JoinDate = $_POST['JoinDate'];    
        $FeesDate = $_POST['FeesDate'];    
        $BatchTime = $_POST['BatchTime'];  

        if(@$_GET['edit'])
    {
        $qry = "UPDATE `admission` SET `Name`='$Name',`ContactNumber`='$ContactNumber', `ParentContact`='$ParentContact', `CourseName`='$CourseName', `JoinDate`='$JoinDate', `FeesDate`='$FeesDate', `BatchTime`='$BatchTime' WHERE `id`='$edit_id'";
    }
    else
    {
        $qry = "INSERT INTO `admission` (`Name`,`ContactNumber`,`ParentContact`,`CourseName`,`JoinDate`,`FeesDate`,`BatchTime`) VALUES ('$Name','$ContactNumber','$ParentContact','$CourseName','$JoinDate','$FeesDate','$BatchTime')";
    } 
        mysqli_query($con , $qry);
        
    }
            
$query = "SELECT * FROM `logindata` WHERE `id`='$userId'";

$res = mysqli_query($con , $query);

$row = mysqli_fetch_assoc($res);

?>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="../../dist/img/user1-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="dist/img/user8-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="dist/img/user3-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i
                                                class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->


            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="image/<?php echo $row['proimg'] ?>" class="proimgs" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?php echo $row['name'] ?></a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item menu-open">
                            <a href="dashboard.php" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                            <a href="profile.php" class="nav-link">
                                <i class="nav-icon fa-regular fa-user"></i>
                                <p>
                                    Profile
                                </p>
                            </a>
                            <ul class="nav nav-pills nav-sidebar flex-column">
                                <li class="nav-item menu-open">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-tachometer-alt"></i>
                                        <p>
                                            Course
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="addcourse.php" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Add Course</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="viewcourse.php" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>View Course</p>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="nav nav-pills nav-sidebar flex-column">
                                        <li class="nav-item menu-open">
                                            <a href="#" class="nav-link">
                                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                                <p>
                                                    SubCourse
                                                    <i class="right fas fa-angle-left"></i>
                                                </p>
                                            </a>
                                            <ul class="nav nav-treeview">
                                                <li class="nav-item">
                                                    <a href="addSubcourse.php" class="nav-link">
                                                        <i class="far fa-circle nav-icon"></i>
                                                        <p>Add SubCourse</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="viewSubcourse.php" class="nav-link">
                                                        <i class="far fa-circle nav-icon"></i>
                                                        <p>View SubCourse</p>
                                                    </a>
                                                </li>
                                            </ul>
                                            <ul class="nav nav-pills nav-sidebar flex-column">
                                                <li class="nav-item menu-open">
                                                    <a href="#" class="nav-link">
                                                        <i class="nav-icon fas fa-tachometer-alt"></i>
                                                        <p>
                                                            Inquiry
                                                            <i class="right fas fa-angle-left"></i>
                                                        </p>
                                                    </a>
                                                    <ul class="nav nav-treeview">
                                                        <li class="nav-item">
                                                            <a href="addInquiry.php" class="nav-link">
                                                                <i class="far fa-circle nav-icon"></i>
                                                                <p>Add Inquiry</p>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="viewInquiry.php" class="nav-link">
                                                                <i class="far fa-circle nav-icon"></i>
                                                                <p>View Inquiry</p>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <ul class="nav nav-pills nav-sidebar flex-column">
                                                        <li class="nav-item menu-open">
                                                            <a href="viewFollowup.php" class="nav-link">
                                                                <i class="nav-icon fa-regular fa-user"></i>
                                                                <p>
                                                                    View FollowUP
                                                                </p>
                                                            </a>
                                                        </li>
                                                    </ul>

                                                    <ul class="nav nav-pills nav-sidebar flex-column">
                                                        <li class="nav-item menu-open">
                                                            <a href="#" class="nav-link">
                                                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                                                <p>
                                                                    Admission
                                                                    <i class="right fas fa-angle-left"></i>
                                                                </p>
                                                            </a>
                                                            <ul class="nav nav-treeview">
                                                                <li class="nav-item">
                                                                    <a href="addAdmission.php" class="nav-link">
                                                                        <i class="far fa-circle nav-icon"></i>
                                                                        <p>Add Admission</p>
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a href="viewAdmission.php" class="nav-link">
                                                                        <i class="far fa-circle nav-icon"></i>
                                                                        <p>View Admission</p>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                            <ul class="nav nav-pills nav-sidebar flex-column">
                                                                <li class="nav-item menu-open">
                                                                    <a href="#" class="nav-link">
                                                                        <i class="nav-icon fas fa-tachometer-alt"></i>
                                                                        <p>
                                                                            Admission
                                                                            <i class="right fas fa-angle-left"></i>
                                                                        </p>
                                                                    </a>
                                                                    <ul class="nav nav-treeview">
                                                                        <li class="nav-item">
                                                                            <a href="addAdmission.php" class="nav-link">
                                                                                <i class="far fa-circle nav-icon"></i>
                                                                                <p>Add Admission</p>
                                                                            </a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a href="viewAdmission.php"
                                                                                class="nav-link">
                                                                                <i class="far fa-circle nav-icon"></i>
                                                                                <p>View Admission</p>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                    <a href="logout.php" class="nav-link">
                                                                        <i
                                                                            class="nav-icon fa-solid fa-right-from-bracket"></i>
                                                                        <p>
                                                                            Logout
                                                                        </p>
                                                                    </a>
                                                            </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>


        <div class="w-100">
            <!-- form start -->
            <form method="POST">
                <div class="form-title">
                    <h2>ADMISSION</h2>
                </div>
                <div class="card-body">
                    <!-- 1 -->

                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" value="<?php echo $Name ?>" name="Name" class="form-control"
                            id="exampleInputEmail1" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Contact Number</label>
                        <input type="text" value="<?php echo $ContactNumber ?>" name="ContactNumber"
                            class="form-control" id="exampleInputEmail1" placeholder="Enter Contact Number">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Parent Contact</label>
                        <input type="text" value="<?php echo $ParentContact ?>" name="ParentContact"
                            class="form-control" id="exampleInputEmail1" placeholder="Enter Parent Contact">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Select Course Name</label>
                        <input type="text" value="<?php echo $CourseName ?>" name="CourseName" class="form-control"
                            id="exampleInputEmail1" placeholder="Enter Course Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Join Date</label>

                        <input type="date" value="<?php echo $JoinDate ;?>" name="JoinDate" class="form-control"
                            id="exampleInputEmail1" style="width: 460px;">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Expected Fees Payment Date</label>

                        <input type="date" value="<?php echo $FeesDate ;?>" name="FeesDate" class="form-control"
                            id="exampleInputEmail1" style="width: 460px;">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Batch Time</label>
                        <select name="BatchTime" class="form-control select2" style="width: 460px;">
                            <option selected="selected " disabled>Select Batch Time</option>
                            <option value="8 to 10" <?php if(@$BatchTime == '8 to 10') { echo "selected"; } ?>>8 to 10
                            </option>
                            <option value="10 to 12" <?php if(@$BatchTime == '10 to 12') { echo "selected"; } ?>>10 to
                                12</option>
                            <option value="12 to 2" <?php if(@$BatchTime == '12 to 2') { echo "selected"; } ?>>12 to 2
                            </option>
                            <option value="2 to 4" <?php if(@$BatchTime == '2 to 4') { echo "selected"; } ?>>2 to 4
                            </option>
                            <option value="4 to 6" <?php if(@$BatchTime == '4 to 6') { echo "selected"; } ?>>4 to 6
                            </option>
                            <option value="6 to 8" <?php if(@$BatchTime == '6 to 8') { echo "selected"; } ?>>6 to 8
                            </option>
                        </select>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" name="addInquiry" class="btn btn-primary">Edit Admission</button>
                </div>
            </form>
        </div>
        <!-- /.card -->

    </div>
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
</body>

</html>