<?php
session_start();
    if(isset($_SESSION['id'])){
        echo "";
    }else{
        header("Location:../../../../Student-Management-/page/login.php");
    }
include_once "../database/dbcon.php";
$email_error=$size_error=$type_error=$error="";
if(isset($_POST['add'])){
    $fullname= mysqli_real_escape_string($con,$_POST['fullname']);
    $lastname=mysqli_real_escape_string($con,$_POST['lastname']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $fathername= mysqli_real_escape_string($con,$_POST['fathername']);
    $birthdate=mysqli_real_escape_string($con,$_POST['birthdate']);
    $gender=mysqli_real_escape_string($con,$_POST['gender']);
    $city=mysqli_real_escape_string($con,$_POST['city']);
    $district=mysqli_real_escape_string($con,$_POST['district']);
    $nation=mysqli_real_escape_string($con, $_POST['nationality']);
    $state=mysqli_real_escape_string($con,$_POST['state']);
    $phone=mysqli_real_escape_string($con,$_POST['phone']);
    $image=$_FILES['image']['name'];
    $image_type=$_FILES['image']['type'];
    $image_size=$_FILES['image']['size'];
    $image_tmp=$_FILES['image']['tmp_name'];
    if(!empty($fullname)&& !empty($lastname) && !empty($email)){
                $query="SELECT * FROM student WHERE email='{$email}'";
                $run=mysqli_query($con,$query);
                $row=mysqli_num_rows($run);
                if(filter_var($email,FILTER_VALIDATE_EMAIL)){
                    if($row>0){
                        $email_error="Email is already exists. Please try with another email!";
                    }
                    else{
                        if(!$image_type == 'image/jpg' && !$image_type =='image/png'){
                            $size_error=" Invalid image formate";
                    
                        }
                        else if($image_size<=2000){
                            $type_error="Image size is larger. Image size should be less than 2mb.";
                        }
                        else{
                            move_uploaded_file($image_tmp,"../Student_image/$image");
                            $sql2="INSERT INTO student(fullname,lastname,email,parents_name,date,phone,gender,district,city,state, nation,photo)
                                    VALUES('{$fullname}','{$lastname}','{$email}','{$fathername}','{$birthdate}','{$phone}','{$gender}','{$district}','{$city}','{$state}','{$nation}','{$image}')";
                            $run2=mysqli_query($con,$sql2);
                            if($run2){
                                //$data=mysqli_fetch_assoc($run);

                               // $id=$data['id'];

       // echo "id=".$id;
       
                                //$_SESSION['id']=$id;
                                ?>
                                
                                <script>
                                    alert('Student data submited successfully');
                                </script>
                                <?php
                            }
                            else{
                                
                                ?>
                                <script>
                                    alert('Unable to submit data. Please try again!');
                                    window.open('addstudent.php?error=Error','_self');
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
   // include_once "../database/dbcon.php";
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
            <h3 class="text-center text-white pb-4 pt-2 font-weight-bold ">Add student</h3>
            <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-5 col-sm-5 col-12 m-auto">
                <div class="form-group">
                    <label for="" class="text-white">First name</label>
                    <input type="text" name="fullname" placeholder="Enter fullname" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="" class="text-white">Email</label>
                    <input type="email" name="email" placeholder="Enter email" class="form-control">
                    <span class="text-white font-weight-bold"><?php echo $email_error ?></span>
                </div>
                <div class="form-group">
                    <label for="" class="text-white">Father/Mother's name</label>
                    <input type="text" name="fathername" placeholder="Enter father's name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="" class="text-white">Gender</label>
                    <input type="radio" name="gender" value="male" class="form-check-input ml-2">
                    <label for="" class="form-check-label text-white pl-4">Male</label>
                    <input type="radio" name="gender" value="female" class="form-check-input ml-2">
                    <label for="" class="form-check-label text-white pl-4">Female</label>
                </div>
                <div class="form-group">
                    <label for="" class="text-white">City</label>
                    <input type="text" name="city" placeholder="Enter city" class="form-control">
                </div>
                <div class="form-group">
                    <label for="" class="text-white">Nationality</label>
                    <input type="text" name="nationality" placeholder="Enter your nationality" class="form-control">
                </div>
                </div>
                <div class="col-md-5 col-sm-5 col-12 m-auto">
                <div class="form-group">
                    <label for="" class="text-white">Last name</label>
                    <input type="text" name="lastname" placeholder="Enter lastname" class="form-control">
                </div>
                <div class="form-group">
                    <label for="" class="text-white">Birth of date</label>
                    <input type="date" name="birthdate" placeholder="Enter birth of date" class="form-control">
                </div>
                <div class="form-group">
                    <label for="" class="text-white">Mobile Phone:</label>
                    <input type="text" name="phone" placeholder="Enter phone" class="form-control">
                </div>
                <div class="form-group">
                    <label for="" class="text-white">District</label>
                    <input type="text" name="district" placeholder="Enter district" class="form-control">
                </div>
                <div class="form-group">
                    <label for="" class="text-white">State</label>
                    <input type="text" name="state" placeholder="Enter state" class="form-control">
                </div>
                <div class="form-group">
                <label for="" class="text-white">Student's Photo</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile01"aria-describedby="inputGroupFileAddon01" name="image">
                        <label for="inputGroupFile01" class="custom-file-label">Choose File/Student's Photo</label>
                    </div>
                </div>
                <span class="text-white font-weight-bold"><?php echo $size_error ?></span>
                <span class="text-white font-weight-bold"><?php echo $type_error?></span>
                </div>

                </div>
                
                </div>
                <input type="submit" name="add" value="Add student" class="btn btn-success px-5 mt-2 ml-5 ">
                <span class="text-white font-weight-bold float-right"><?php echo $error?></span>
            </form>
            <hr>
        </div>
    </section>
    </div>
    </div>


</body>
</html>