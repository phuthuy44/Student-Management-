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
    
<?php
    //include_once "../database/dbcon.php";
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
        <div class="container bg-white rounded dash mt-5" id="formsetting">
            <h3 class="text-center text-dark pb-4 pt-2 font-weight-bold">View student detail</h3>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-12">
                    <table class="table table-bordered table-responsive">
                        <thead class="bg-danger text-white ">
                            <tr>
                                <th>ID</th>
                                <th>Full name</th>
                                <th>Gender</th>
                                <th>Email</th>
                                <th>Birth of date</th>
                                <th>Phone</th>
                                <th>Adress</th>
                                <th>Photo</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <?php
                            $sqlView="SELECT * FROM teacher";
                            $runView=mysqli_query($con,$sqlView);
                            $i=1;
                            while($rowView=mysqli_fetch_assoc($runView)){

                
                        ?>
                        <tbody class="text-dark">
                            <tr>
                                <td><?php echo $i++ ;?></td>
                                <td><?php echo $rowView['fullname_Teacher'];?></td>
                                <td><?php echo $rowView['gender_Teacher'];?></td>
                                <td><?php echo $rowView['email_Teacher'];?></td>
                                <td><?php echo $rowView['date_Teacher'];?></td>
                                <td><?php echo $rowView['phone_Teacher'];?></td>
                                <td><?php echo $rowView['Adress_Teacher'];?></td>
                                <td><a href="../Teacher_image/<?php echo $rowView['photo_Teacher'];?>">
                                    <img src="../Teacher_image/<?php echo $rowView['photo_Teacher'];?>" alt="" width="50" height="50">    
                                </a></td>
                                <td>
                                    <a style="color: red; text-decoration:none"href="updateTeacher.php?edit_TeacherID=<?php echo $rowView['id'];?>">Edit

                                    </a> |
                                    <a style="color: red; text-decoration:none" href="deleteTeacher.php?delete_TecherID=<?php echo $rowView['id'];?>"> Delete

                                    </a>
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
    
</body>

</html>