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
                <a href="" class="list-group-item list-group-item-action"><i class="fa fa-dashboard"></i>Dashboard</a>
                <a href="" class="list-group-item list-group-item-action"><i class="fa fa-user"></i>Add Student</a>
                <a href="" class="list-group-item list-group-item-action"><i class="fa fa-eye"></i>View Student</a>
                <a href="" class="list-group-item list-group-item-action"><i class="fa fa-pencil"></i>Edit Student</a>
                <a href="" class="list-group-item list-group-item-action"><i class="fa fa-sign-out"></i>Logout</a>

            </ul>
        </div>
    </div>


</body>
</html>