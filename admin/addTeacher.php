
<?php
session_start();
if(isset($_SESSION['id'])){
    echo "";
}else{
    header("Location:../../../../Student-Management-/page/login.php");
}
include_once "../database/dbcon.php";
$email_error=$size_error=$type_error="";
    if(isset($_POST['addTeacher'])){
        $fullname=mysqli_real_escape_string($con,$_POST['fullname']);
        $email= mysqli_real_escape_string($con,$_POST['email']);
        $gender= mysqli_real_escape_string($con,$_POST['gender']);
        $date=mysqli_real_escape_string($con,$_POST['birthdate']);
        $phone=mysqli_real_escape_string($con,$_POST['phone']);
        $Adress= mysqli_real_escape_string($con,$_POST['adress']);
        $image=$_FILES['image']['name'];
        $image_type=$_FILES['image']['type'];
        $image_size=$_FILES['image']['size'];
        $image_tmp=$_FILES['image']['tmp_name'];
        if(!empty($fullname) && !empty($email)){
            $query="SELECT * FROM teacher WHERE email_Teacher='{$email}'";
            $run=mysqli_query($con,$query);
            $row=mysqli_num_rows($run);
            if(filter_var($email,FILTER_VALIDATE_EMAIL)){
                if($row>0){
                    $email_error="Email is already exits. Please try with another email!";
                }else{
                    if(!$image_type == 'image/ipg' && !$image_type == 'image/png'){
                        $size_error="Invalid image formate.";
                    }else if($image_size<=2000){
                        $type_error="Image size is larger. Image size should be less than 2mb.";
                    }else{
                        move_uploaded_file($image_tmp,"../Teacher_image/$image");
                        $sqlInsert="INSERT INTO teacher(fullname_Teacher, email_Teacher, gender_Teacher,date_Teacher, phone_Teacher, Adress_Teacher,photo_Teacher)
                                            VALUES ('{$fullname}','{$email}','{$gender}','{$date}','{$phone}','{$Adress}','$image')";
                        $runInsert=mysqli_query($con,$sqlInsert);
                        if($runInsert){
                            ?>
                                
                            <script>
                                alert('Teacher data submited successfully');
                                window.open('viewTeacher.php?error=Error','_self');
                            </script>
                            <?php
                        }else{
                            ?>
                                <script>
                                    alert('Unable to submit data. Please try again!');
                                    window.open('addTeacher.php?error=Error','_self');
                                </script>
                                <?php
                        }
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
    $sql=mysqli_query($con,"SELECT*FROM admin WHERE id='{$_SESSION['id']}'");
    if(mysqli_num_rows($sql)>0){
        $row=mysqli_fetch_assoc($sql);
    }
    ?>
    <div class="d-flex" id="wrap">
        <div class="sidebar bg-light border-light border">
            <div class="sidebar-heading">
                <p class="text-center bg-danger p-3">Hello,<span><?php echo $row['fullname']?></span></p>
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
            <h3 class="text-center text-white pb-4 pt-2 font-weight-bold ">Add Teacher</h3>
            <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-5 col-sm-5 col-12 m-auto">
                <div class="form-group">
                    <label for="" class="text-white">Full name</label>
                    <input type="text" name="fullname" placeholder="Enter fullname" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="" class="text-white">Email</label>
                    <input type="email" name="email" placeholder="Enter email" class="form-control">
                    <span class="text-white font-weight-bold"><?php echo $email_error ?></span>
                </div>
                <div class="form-group">
                    <label for="" class="text-white">Gender</label>
                    <input type="radio" name="gender" value="male" class="form-check-input ml-2">
                    <label for="" class="form-check-label text-white pl-4">Male</label>
                    <input type="radio" name="gender" value="female" class="form-check-input ml-2">
                    <label for="" class="form-check-label text-white pl-4">Female</label>
                </div>
                <div class="form-group">
                    <label for="" class="text-white">Birth of date</label>
                    <input type="date" name="birthdate" placeholder="Enter birth of date" class="form-control">
                </div>
                </div>
                <div class="col-md-5 col-sm-5 col-12 m-auto">
                <div class="form-group">
                    <label for="" class="text-white">Mobile Phone:</label>
                    <input type="text" name="phone" placeholder="Enter phone" class="form-control">
                </div>
                <div class="form-group">
                    <label for="" class="text-white">Adress</label>
                    <input type="text" name="adress" placeholder="Enter district" class="form-control">
                </div>
                <div class="form-group">
                <label for="" class="text-white">Teacher's Photo</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile01"aria-describedby="inputGroupFileAddon01" name="image">
                        <label for="inputGroupFile01" class="custom-file-label">Choose File/Teacher's photo</label>
                    </div>
                </div>
                <span class="text-white font-weight-bold"><?php echo $size_error ?></span>
                <span class="text-white font-weight-bold"><?php echo $type_error?></span>
                </div>

                </div>
                
                </div>
                <input type="submit" name="addTeacher" value="Add Teacher" class="btn btn-success px-5 mt-2 ml-5 ">
            </form>
            <hr>
        </div>
    </section>
    </div>
    </div>


</body>
</html>