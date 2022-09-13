<?php
include_once "../database/dbcon.php";
$email_error=$password_error=$error=" ";
if(isset($_POST['submit'])){
    $fullname=$_POST['fullname'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $password2=$_POST['password2'];

    $pass=password_hash($password,PASSWORD_BCRYPT);
    $pass2=password_hash($password2,PASSWORD_BCRYPT);

    if(!empty($fullname) && !empty($email) && !empty($password) && !empty($password2)){
        $query="SELECT * FROM admin WHERE email='{$email}'";
        $run= mysqli_query($con,$query);
        $row=mysqli_num_rows($run);
        if(filter_var($email,FILTER_VALIDATE_EMAIL)){
            if($row>0){
                $email_error="Email is already exists. Please try with another email!";
            }else if($password !== $password2){
                $password_error="Your password do not match!";
            }else{
                $sql="INSERT INTO admin (fullname,email,password)values('{$fullname}','{$email}','{$pass}')";
                $run=mysqli_query($con,$sql);
                if($run){
                    ?>
                    <script>
                        alert('Register successfully!Now, Lets login!');
                    </script>
                    <?php
                }else{
                    ?>
                    <script>alert('Error!Wait 10 miniutes to register again!')</script>
                    <?php
                }
            }
        }
    }
}
?>
<?php
include_once "header.php";

?>
<link rel="stylesheet" href="../css/css.css">
<body>
    <div class="d-flex" id="wrap">
        <div class="sidebar bg-light border-light border">
            <div class="sidebar-heading">
                <p class="text-center bg-danger p-3">Hello,Admin!</p>
            </div>
            <ul class="listgroup list-group-flush">
                <a href="../../Student-Management-/admin/dashboard.php" class="list-group-item list-group-item-action"><i class="fa fa-dashboard"></i>Dashboard</a>
                <a href="../../Student-Management-/admin/addstudent.php" class="list-group-item list-group-item-action"><i class="fa fa-user"></i>Add Student</a>
                <a href="../../Student-Management-/admin/viewstudent.php" class="list-group-item list-group-item-action"><i class="fa fa-eye"></i>View Student</a>
                <a href="../../Student-Management-/admin/updatestudent.php" class="list-group-item list-group-item-action"><i class="fa fa-pencil"></i>Edit Student</a>
                <a href="../../Student-Management-/admin/addTeacher.php" class="list-group-item list-group-item-action"><i class="fa fa-user"></i>Add Teacher</a>
                <a href="../../Student-Management-/admin/viewTeacher.php" class="list-group-item list-group-item-action"><i class="fa fa-eye"></i>View Teacher</a>
                <a href="../../Student-Management-/admin/updateTeacher.php" class="list-group-item list-group-item-action"><i class="fa fa-pencil"></i>Edit Teacher</a>
                <a href="../../Student-Management-/admin/updatestudent.php" class="list-group-item list-group-item-action"><i class="fa fa-check-circle"></i>Register User</a>
                <a href="../../Student-Management-/page/logout.php" class="list-group-item list-group-item-action"><i class="fa fa-sign-out"></i>Logout</a>

            </ul>
        </div>
        <div class="main-body">
        <section class="main-form">
        <h2 class="text-center text-white .shadow-lg bg-danger p-3 font-weight-bold">Student Managerment System</h2>
        <div class="container bg-danger rounded dash mt-5" id="formsetting">
            <h3 class="text-center text-white pb-4 pt-2 font-weight-bold">Register a account to be admin!</h3>
            <div class="row">

            <div class="col-md-7 col-sm-7 col-12">
                    <img src="../image/school_software_1.png" alt="" width=100%>
                </div>
                <div class="col-md-5 col-sm-5 col-12 mt-4">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="" class="text-white font-weight-bold">Full name</label>
                            <input type="text" name="fullname" placeholder="Enter your full name" class="form-control border" required>
                        </div>
                        <div class="form-group">
                            <label for="" class="text-white font-weight-bold">Email</label>
                            <input type="email" name="email" placeholder="Enter your email" class="form-control border"required>
                            <span class="text-white font-weight-bold"><?php echo $email_error ?></span>
                        </div>
                        <div class="form-group">
                            <label for="" class="text-white font-weight-bold">Password</label>
                            <input type="password" name="password" placeholder="Enter your password" class="form-control border"required>
                        </div>
                        <div class="form-group">
                            <label for="" class="text-white font-weight-bold">Confirm Password</label>
                            <input type="password" name="password2" placeholder="Enter your confirm password" class="form-control border"required>
                            <span class="text-white font-weight-bold"><?php echo $password_error?></span>
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
    </div>
    </div>


</body>
</html>