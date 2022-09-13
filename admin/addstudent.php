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
                <a href="../../Student-Management-/admin/register.php" class="list-group-item list-group-item-action"><i class="fa fa-check-circle"></i>Register User</a>
                <a href="../../Student-Management-/page/logout.php" class="list-group-item list-group-item-action"><i class="fa fa-sign-out"></i>Logout</a>

            </ul>
        </div>
        <div class="main-body">
        <section class="main-form">
        <h2 class="text-center text-white .shadow-lg bg-danger p-3 font-weight-bold">Student Managerment System</h2>
        <div class="container bg-danger rounded dash mt-5" id="formsetting">
            <h3 class="text-center text-white pb-4 pt-2 font-weight-bold ">Add student</h3>
            <form action="">
            <div class="row">
                <div class="col-md-5 col-sm-5 col-12 m-auto">
                <div class="form-group">
                    <label for="" class="text-white">First name</label>
                    <input type="text" name="fullname" placeholder="Enter fullname" class="form-control">
                </div>
                <div class="form-group">
                    <label for="" class="text-white">Email</label>
                    <input type="email" name="email" placeholder="Enter email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="" class="text-white">Father/Mother's name</label>
                    <input type="text" name="fathername" placeholder="Enter father's name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="" class="text-white">Gender</label>
                    <input type="radio" name="radio" value="male" class="form-check-input ml-2">
                    <label for="" class="form-check-label text-white pl-4">Male</label>
                    <input type="radio" name="radio" value="female" class="form-check-input ml-2">
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
                    <input type="text" name="date" placeholder="Enter birth of date" class="form-control">
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
                        <input type="file" class="custom-file-input" id="inputGroupFile01"aria-describedby="inputGroupFileAddon01">
                        <label for="inputGroupFile01" class="custom-file-label">Choose File</label>
                    </div>
                </div>
                </div>

                </div>
                
                </div>
                <input type="submit" name="add" value="Add student" class="btn btn-success px-5 mt-2 ml-5 ">
            </form>
            <hr>
        </div>
    </section>
    </div>
    </div>


</body>
</html>