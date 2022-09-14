
<?php
session_start();
if(isset($_SESSION['id'])){
    echo "";
}else{
    header("Location:../../../../Student-Management-/page/login.php");
}
include_once "../database/dbcon.php";
$email_error=$size_error=$type_error="";
    if(isset($_POST['UpdateTeacher'])){
        $Edit_Teacher=$_GET['edit_TeacherID'];
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
            
            if(!$image_type == 'image/ipg' && !$image_type == 'image/png'){
                $size_error="Invalid image formate.";
            }else if($image_size<=2000){
                $type_error="Image size is larger. Image size should be less than 2mb.";
            }else{
                move_uploaded_file($image_tmp,"../Teacher_image/$image");
                $sqlUpdate="UPDATE teacher SET fullname_Teacher='{$fullname}',email_Teacher='{$email}',gender_Teacher='{$gender}',date_Teacher='{$date}',
                                                phone_Teacher='{$phone}',Adress_Teacher='{$Adress}', photo_Teacher='{$image}'
                                            WHERE id='{$Edit_Teacher}'";

                        $runUpdate=mysqli_query($con,$sqlUpdate);
                        if($runUpdate){
                            ?>
                                
                            <script>
                                alert('Teacher data edits successfully');
                                window.open('viewTeacher.php?success=Teacher data edits successfully','_self');
                            </script>
                            <?php
                        }else{
                            ?>
                                <script>
                                    alert('Unable to edits data. Please try again!');
                                    window.open('addTeacher.php?error=Error','_self');
                                </script>
                                <?php
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
            <h3 class="text-center text-white pb-4 pt-2 font-weight-bold ">Update Teacher</h3>
            <?php 
                if(isset($_GET['edit_TeacherID'])){
                    $edit_Teacher=$_GET['edit_TeacherID'];
                    $query="SELECT * FROM teacher WHERE id='{$edit_Teacher}'";
                    $run = mysqli_query($con,$query);
                    while($row=mysqli_fetch_assoc($run)){

            ?>
            <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-5 col-sm-5 col-12 m-auto">
                <div class="form-group">
                    <label for="" class="text-white">Full name</label>
                    <input type="text" name="fullname" placeholder="Enter fullname" class="form-control" value="<?php echo $row['fullname_Teacher']?>"required>
                </div>
                <div class="form-group">
                    <label for="" class="text-white">Email</label>
                    <input type="email" name="email" placeholder="Enter email" value="<?php echo $row['email_Teacher']?>"class="form-control">
                    <span class="text-white font-weight-bold"><?php echo $email_error ?></span>
                </div>
                <div class="form-group">
                    <label for="" class="text-white">Gender</label>
                    <input type="radio" name="gender" value="male" class="form-check-input ml-2"
                    <?php
                    if($row['gender_Teacher'] == 'male') echo "checked";
                    ?>>
                    <label for="" class="form-check-label text-white pl-4">Male</label>
                    <input type="radio" name="gender" value="female" class="form-check-input ml-2"
                    <?php
                    if($row['gender_Teacher'] == 'female') echo "checked";
                    ?>>
                    <label for="" class="form-check-label text-white pl-4">Female</label>
                </div>
                <div class="form-group">
                    <label for="" class="text-white">Birth of date</label>
                    <input type="date" name="birthdate" placeholder="Enter birth of date" class="form-control" value="<?php echo $row['date_Teacher']?>">
                </div>
                </div>
                <div class="col-md-5 col-sm-5 col-12 m-auto">
                <div class="form-group">
                    <label for="" class="text-white">Mobile Phone:</label>
                    <input type="text" name="phone" placeholder="Enter phone" class="form-control" value="<?php echo $row['phone_Teacher']?>">
                </div>
                <div class="form-group">
                    <label for="" class="text-white">Adress</label>
                    <input type="text" name="adress" placeholder="Enter district" class="form-control" value="<?php echo $row['Adress_Teacher']?>">
                </div>
                <div class="form-group">
                <label for="" class="text-white">Teacher's Photo</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile01"aria-describedby="inputGroupFileAddon01" name="image">
                        <label for="inputGroupFile01" class="custom-file-label"><?php echo $row['photo_Teacher']?></label>
                    </div>
                </div>
                </div>
                <?php

                 }
                }
                ?>
                </div>
                
                </div>
                <input type="submit" name="UpdateTeacher" value="Update Teacher" class="btn btn-success px-5 mt-2 ml-5 ">
            </form>
            <hr>
        </div>
    </section>
    </div>
    </div>


</body>
</html>