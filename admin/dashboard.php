<?php
 session_start();
    if(isset($_SESSION['id'])){
        echo "";
    }else{
        header("Location:../../../../Student-Management-/page/login.php");
    }

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
                <a href="../../Student-Management-/page/logout.php" class="list-group-item list-group-item-action"><i class="fa fa-sign-out"></i>Logout</a>

            </ul>
        </div>
        <div class="main-body">
        <section class="main-form">
        <h2 class="text-center text-white .shadow-lg bg-danger p-3 font-weight-bold">Student Managerment System</h2>
        <div class="container bg-danger rounded dash mt-5" id="formsetting">
            <h3 class="text-center text-white pb-4 pt-2 font-weight-bold">Welcome to dashboard</h3>
            <div class="row">
                <div class="col-md-4 col-sm-4 col-12 m-auto icon">
                    <a href="../../Student-Management-/admin/addstudent.php" class="text-white text-center"><i class="fa fa-user"></i>
                    <h3>Add student</h3>
                </a>
                </div>
                <div class="col-md-4 col-sm-4 col-12 m-auto icon">
                    <a href="../../Student-Management-/admin/viewstudent" class="text-white text-center"><i class="fa fa-eye"></i>
                    <h3>View student</h3>
                </a>
                </div>
                <div class="col-md-4 col-sm-4 col-12 m-auto icon">
                    <a href="../../Student-Management-/admin/updatestudent.php" class="text-white text-center"><i class="fa fa-pencil"></i>
                    <h3>Edit student</h3>
                </a>
                </div>
            </div>
            <hr class="text-white">

            <div class="row">
                <div class="col-md-4 col-sm-4 col-12 m-auto icon">
                    <a href="" class="text-white text-center"><i class="fa fa-user"></i>
                    <h3>Add teacher</h3>
                </a>
                </div>
                <div class="col-md-4 col-sm-4 col-12 m-auto icon">
                    <a href="" class="text-white text-center"><i class="fa fa-eye"></i>
                    <h3>View teacher</h3>
                </a>
                </div>
                <div class="col-md-4 col-sm-4 col-12 m-auto icon">
                    <a href="" class="text-white text-center"><i class="fa fa-pencil"></i>
                    <h3>Edit teacher</h3>
                </a>
                </div>
            </div>
            <hr>
        </div>
    </section>
    </div>
    </div>


</body>
</html>