<?php
session_start();
    if(isset($_SESSION['id'])){
        echo "";
    }else{
        header("Location:../../../../Student-Management-/page/login.php");
    }
include_once "../database/dbcon.php";

?>

<?php
include_once "header.php";

?>

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
                <a href="../../Student-Management-/admin/addTeacher.php" class="list-group-item list-group-item-action"><i class="fa fa-user"></i>Add Teacher</a>
                <a href="../../Student-Management-/admin/viewTeacher.php" class="list-group-item list-group-item-action"><i class="fa fa-eye"></i>View Teacher</a>
                <a href="../../Student-Management-/admin/updateTeacher.php" class="list-group-item list-group-item-action"><i class="fa fa-pencil"></i>Edit Teacher</a>
                <a href="../../Student-Management-/admin/register.php" class="list-group-item list-group-item-action"><i class="fa fa-check-circle"></i>Register User</a>
                <a href="../../Student-Management-/page/logout.php" class="list-group-item list-group-item-action"><i class="fa fa-sign-out"></i>Logout</a>

            </ul>
        </div>
        <div class="main-body">
        <section class="main-form">
        <h2 class="text-center text-white .shadow-lg bg-danger p-3 font-weight-bold">Student Managerment System</h2>
        <div class="container bg-danger rounded dash mt-5" id="formsetting">
            <h3 class="text-center text-white pb-4 pt-2 font-weight-bold ">Edit student</h3>
            <?php
                if(isset($_GET['edit_studentID'])){
                    $edit= $_GET['edit_studentID'];
                    $query="SELECT * FROM student WHERE id ='{$edit}'";
                    $run=mysqli_query($con,$query);
                    while($row=mysqli_fetch_assoc($run)){

                  

            ?>
            
            <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-5 col-sm-5 col-12 m-auto">
                <div class="form-group">
                    <label for="" class="text-white">First name</label>
                    <input type="text" name="fullname" placeholder="Enter fullname" class="form-control" value="<?php echo $row['fullname']?>" required>
                </div>
                <div class="form-group">
                    <label for="" class="text-white">Email</label>
                    <input type="email" name="email" placeholder="Enter email" class="form-control" value="<?php echo $row['email']?>">
                </div>
                <div class="form-group">
                    <label for="" class="text-white">Father/Mother's name</label>
                    <input type="text" name="fathername" placeholder="Enter father's name" class="form-control" value="<?php echo $row['parents_name']?>">
                </div>
                <div class="form-group">
                    <label for="" class="text-white">Gender</label>
                    <input type="radio" name="gender" value="male" class="form-check-input ml-2"
                    <?php
                        if($row['gender']=='male') echo "checked";
                    ?>
                    >
                    <label for="" class="form-check-label text-white pl-4">Male</label>
                    <input type="radio" name="gender" value="female" class="form-check-input ml-2" 
                    <?php
                        if($row['gender']=='female') echo "checked";
                    ?>
                    >
                    <label for="" class="form-check-label text-white pl-4">Female</label>
                </div>
                <div class="form-group">
                    <label for="" class="text-white">City</label>
                    <input type="text" name="city" placeholder="Enter city" class="form-control" value="<?php echo $row['city']?>">
                </div>
                <div class="form-group">
                    <label for="" class="text-white">Nationality</label>
                    <input type="text" name="nationality" placeholder="Enter your nationality" class="form-control" value="<?php echo $row['nation']?>">
                </div>
                </div>
                <div class="col-md-5 col-sm-5 col-12 m-auto">
                <div class="form-group">
                    <label for="" class="text-white">Last name</label>
                    <input type="text" name="lastname" placeholder="Enter lastname" class="form-control" value="<?php echo $row['lastname']?>">
                </div>
                <div class="form-group">
                    <label for="" class="text-white">Birth of date</label>
                    <input type="date" name="birthdate" placeholder="Enter birth of date" class="form-control" value="<?php echo $row['date']?>">
                </div>
                <div class="form-group">
                    <label for="" class="text-white">Mobile Phone:</label>
                    <input type="text" name="phone" placeholder="Enter phone" class="form-control" value="<?php echo $row['phone']?>">
                </div>
                <div class="form-group">
                    <label for="" class="text-white">District</label>
                    <input type="text" name="district" placeholder="Enter district" class="form-control"value="<?php echo $row['district']?>">
                </div>
                <div class="form-group">
                    <label for="" class="text-white">State</label>
                    <input type="text" name="state" placeholder="Enter state" class="form-control" value="<?php echo $row['state']?>">
                </div>
                <div class="form-group">
                <label for="" class="text-white">Student's Photo</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile01"aria-describedby="inputGroupFileAddon01" name="image">
                        <label for="inputGroupFile01" class="custom-file-label">Choose File</label>
                    </div>
                </div>
                </div>
                <?php
                   }
                }
                ?>
                </div>
                
                </div>
                <input type="submit" name="update" value="Update student" class="btn btn-success px-5 mt-2 ml-5 ">
            </form>
            <hr>
        </div>
    </section>
    </div>
    </div>


</body>
</html>
<?php
if(isset($_POST['update'])){
    $edit=$_GET['edit_studentID'];
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
    if(!$image_type == 'image/jpg' && !$image_type =='image/png'){
        $size_error=" Invalid image formate";

    }
    else if($image_size<=2000){
        $type_error="Image size is larger. Image size should be less than 2mb.";
    }
    else{
        move_uploaded_file($image_tmp,"../Student_image/$image");
        $sql2="UPDATE student SET fullname='{$fullname}',lastname='{$lastname}',email='{$email}',parents_name='{$fathername}',date='{$birthdate}',
                                    gender='{$gender}',phone='{$phone}',city='{$city}',district='{$district}',state='{$state}',nation='{$nation}',photo='{$image}'
                            WHERE id='{$edit}' ";
        $run2=mysqli_query($con,$sql2);
        if($run2){
            //$data=mysqli_fetch_assoc($run);

            //$id=$row['id'];

// echo "id=".$id;

            $_SESSION['id']=$edit;
            ?>
            
            <script>
                alert('Student data update successfully');
                window.open('./viewstudent.php?success=Update successfully','_self');
            </script>
            <?php
        }
        else{
            
            ?>
            <script>
                alert('Unable to update data. Please try again!');
                window.open('./viewstudent.php?error=Error','_self');
            </script>
            <?php
        }
    }
    }else{
        ?>
          <script>
                alert('Unable to update data. Please try again!');
                window.open('./viewstudent.php?error=Error','_self');
            </script>  
        <?php
    }
}

        ?>