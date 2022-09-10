<?php
session_start();
if(isset($_SESSION['id'])){
    header("Location:../../../../Student-Management-/page/login.php");
}
?>
<!Doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Student Management System</title>
        <link rel="stylesheet" href="./css/login.css">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    </head>
    <body>
    <section>
        <h1 class="text-center text-danger pt-5 pb-4 font-weight-bold">Student Management System</h1>
        <div class="container shadow-sm">
            <h3 class="text-danger text-center p-3" >Admin Login | Register Panel</h3>
            
            <div class="row">
                <div class="col-md-7 col-sm-7 col-12">
                    <img src="././image/school_software_1.png" alt=""width=100% height=100%>
                </div>
                <div class="col-md-5 col-sm-5 col-12 mt-4">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="" class="text-danger font-weight-bold">Full name</label>
                            <input type="text" name="fullname" placeholder="Enter your full name" class="form-control border">
                        </div>
                        <div class="form-group">
                            <label for="" class="text-danger font-weight-bold">Email</label>
                            <input type="email" name="email" placeholder="Enter your email" class="form-control border">
                        </div>
                        <div class="form-group">
                            <label for="" class="text-danger font-weight-bold">Password</label>
                            <input type="password" name="password" placeholder="Enter your password" class="form-control border">
                        </div>
                        <div class="form-group">
                            <label for="" class="text-danger font-weight-bold">Confirm Password</label>
                            <input type="password" name="password2" placeholder="Enter your confirm password" class="form-control border">
                        </div>
                        <div class="d-flex align-items-center">
                        <input type="submit" name="submit" value="Register" class="btn btn-dark px-4 m-2">
                        <a href="../Student-Management-/page/login.php">
                        <div class="btn btn-dark px-4 m-2">Login</div>
                        </div>

                        
                    </form>
                    
                    
                </div>
            </div>
        </div>
    </section>
    </body>
</html>