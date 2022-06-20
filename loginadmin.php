<?php
  include('db.php');

  if(isset($_POST['submit']))
  {
      $username =  $_POST['username'];
      $pass = $_POST['password'];
      $query = mysqli_query($conn, "SELECT * FROM admin WHERE username = '".$username."' AND password = '".$pass."' "); 
      $data = mysqli_fetch_array($query);
    
      if (mysqli_num_rows($query)>0) 
      {
        session_start();
        $_SESSION['user_logged_in'] = TRUE;
        header('location: admin.php');  
      } 
      else 
      {
        $error = true;
      }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>AGV Helm</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <!-- Sweet Alert-->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    <section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card bg-primary text-white" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">
                <div class="mb-md-5 mt-md-4 pb-5">

                <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                <p class="text-white-50 mb-5">Please enter your username and password!</p>

                <form action="loginadmin.php" method="post" role="form">
                    <div class="form-outline form-white mb-4">
                        <input type="text" name="username" placeholder="Username" value="" class="form-control form-control-lg" />
                    </div>
                    <div class="form-outline form-white mb-4">
                        <input type="password" type="password" class="form-control" name="password" placeholder="Password" id="myPassword" value="" class="form-control form-control-lg" />
                    </div>
                    <button name="submit" class="btn btn-outline-light btn-lg px-5" type="submit" >Login</button>
                </form>
            </div>
            </div>
        </div>
        </div>
    </div>
    </section>
</body>
</html>