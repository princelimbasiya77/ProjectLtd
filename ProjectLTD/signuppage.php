<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | General Form Elements</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<style>

  .w-100{
    width: 100%;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  form{
    width: 600px;
    
    box-shadow: 0 0 1px 0;
    border-radius: 10px;
  }
  .card-footer{
    width: 100%;
    display: flex;
    justify-content: center;
  }
  .form-title{
    color: white;
    padding: 10px;
    background-color: #4646ff;
    border-radius: 10px 10px 0px 0px;
  }

</style>
<?php
    $connect = mysqli_connect("localhost","root","","ltepro");
    if(isset($_POST['signData']))
    {
        $img = $_FILES['img']['name'];
        $name = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $emails = $email;
        $emails = filter_var($emails, FILTER_SANITIZE_EMAIL);
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);

if ($name == '') {
  echo "Enter the Name";
}
else if(!preg_match("/^[a-zA-Z]*$/",$name))
{
    echo "Invalid Name";
}

else if($email == '') {
    echo "Enter Email";
}
else if(!filter_var($emails, FILTER_VALIDATE_EMAIL)) {
    echo "<br> not a valid Email address";
}
else if($password == '') {
    echo "Enter Password";
}
else if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 6 ||strlen($password) > 12) {
    echo 'Password should be at least 6 characters in length and should include at least one upper case letter, one number, and one special character.';
}
else
{
    move_uploaded_file($_FILES['img']['tmp_name'],"image/".$img);
    $qry = "INSERT INTO `logindata` (`name`,`email`,`password`,`proimg`) VALUES ('$name','$email','$password','$img')";
    mysqli_query($connect , $qry);
    header("location:loginpage.php");

}
}

?>
<body class="hold-transition sidebar-mini">
<div class="w-100">
              <!-- form start -->
              <form method="POST" enctype="multipart/form-data">
                <div class="form-title">
                  <h2>SIGN IN</h2>
                  </div>
                <div class="card-body">
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">User Name</label>
                    <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Enter Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Profile Photo</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="img" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">  Choose Image</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="signData" class="btn btn-primary">SIGN UP</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>
