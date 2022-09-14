<?php
session_start();
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
<body>
<?php
    include_once "../database/dbcon.php";
    $sql2=mysqli_query($con,"SELECT*FROM admin WHERE id='{$_SESSION['id']}'");
    if(mysqli_num_rows($sql2)>0){
        $row1=mysqli_fetch_assoc($sql2);
    }
    ?>
    <div class="d-flex" id="wrap">
        <div class="sidebar bg-light border-light border">
            <div class="sidebar-heading">
                <p class="text-center bg-danger p-3">Hello,<span><?php echo $row1['fullname']?></span></p>
            </div>
            <ul class="listgroup list-group-flush">
                <a href="../../Student-Management-/admin/dashboard.php" class="list-group-item list-group-item-action"><i class="fa fa-dashboard"></i>Dashboard</a>
                <a href="../../Student-Management-/admin/addstudent.php" class="list-group-item list-group-item-action"><i class="fa fa-user"></i>Add Student</a>
                <a href="../../Student-Management-/admin/viewstudent.php" class="list-group-item list-group-item-action"><i class="fa fa-eye"></i>View Student</a>
                <a href="../../Student-Management-/admin/addTeacher.php" class="list-group-item list-group-item-action"><i class="fa fa-user"></i>Add Teacher</a>
                <a href="../../Student-Management-/admin/viewTeacher.php" class="list-group-item list-group-item-action"><i class="fa fa-eye"></i>View Teacher</a>
                <a href="../../Student-Management-/admin/register.php" class="list-group-item list-group-item-action"><i class="fa fa-check-circle"></i>Register User</a>
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
                        </div>

                        
                    </form>
                    
                    
                </div>
            </div>
            
        </div>
    </section>
    <section class="main-form">
        <div class="container bg-white rounded mt-5" id="formsetting">
            <div class="row justify-content-center">
                <div class="col-md-7 col-sm-5 col-3">
                    <table class="table table-bordered table-hover">
                        <thead class="bg-danger text-white text-center">
                            <tr>
                                <th style="width:10%">ID</th>
                                <th style="width:30%">Full name</th>
                                <th style="width:100%">Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-dark">
                        <?php
                            $sqlUser="SELECT * FROM admin";
                            $runUser=mysqli_query($con,$sqlUser);
                            $i=1;
                            while($row=mysqli_fetch_assoc($runUser)){

                
                        ?>
                            <tr class="text-center">
                                <td><?php echo $i++ ;?></td>
                                <td><?php echo $row['fullname'];?></td>
                                <td><?php echo $row['email'];?></td>
                                <td>
                                <a  style="color: red;text-decoration:none" href="deleteUser.php?Delete_id=<?php echo $row['id'];?>">Delete</a>
                                </td>
                                
                            </tr>
                        </tbody>
                        <?php
                        }?>
                    </table>
                </div>
            </div>
            <hr>
        </div>
    </section>
    </div>
    </div>


</body>
</html>