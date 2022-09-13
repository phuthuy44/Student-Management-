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
                <a href="../../Student-Management-/admin/updatestudent.php" class="list-group-item list-group-item-action"><i class="fa fa-pencil"></i>Edit Student</a>
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
        <div class="container bg-white rounded dash mt-5" id="formsetting">
            <h3 class="text-center text-dark pb-4 pt-2 font-weight-bold">View student detail</h3>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-12">
                    <table class="table table-bordered table-responsive">
                        <thead class="bg-danger text-white ">
                            <tr>
                                <th>ID</th>
                                <th>First name</th>
                                <th>Last name</th>
                                <th>father/Mother's name</th>
                                <th>Gender</th>
                                <th>Email</th>
                                <th>Birth of date</th>
                                <th>Phone</th>
                                <th>City</th>
                                <th>District</th>
                                <th>Sate</th>
                                <th>Nationality</th>
                                <th>Photo</th>
                            </tr>
                        </thead>
                        <?php
                            $sql="SELECT * FROM student";
                            $run=mysqli_query($con,$sql);
                            $i=1;
                            while($row=mysqli_fetch_assoc($run)){

                
                        ?>
                        <tbody class="text-dark">
                            <tr>
                                <td><?php echo $i++ ;?></td>
                                <td><?php echo $row['fullname'];?></td>
                                <td><?php echo $row['lastname'];?></td>
                                <td><?php echo $row['parents_name'];?></td>
                                <td><?php echo $row['gender'];?></td>
                                <td><?php echo $row['email'];?></td>
                                <td><?php echo $row['date'];?></td>
                                <td><?php echo $row['phone'];?></td>
                                <td><?php echo $row['city'];?></td>
                                <td><?php echo $row['district'];?></td>
                                <td><?php echo $row['state'];?></td>
                                <td><?php echo $row['nation'];?></td>
                                <td><a href="../Student_image/<?php echo $row['photo']?>">
                                    <img src="../Student_image/<?php echo $row['photo'];?>" alt="" width="50" height="50">    
                                </a></td>
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