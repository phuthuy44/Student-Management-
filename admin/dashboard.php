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
<div class="admintitle">
<h4><a href="../../Student-Management-/page/logout.php">Logout</a></h4>
<h1>Welcome to Admin Dashboard</h1>

</div>
<div class="dashboard" >
    <table border="1">
        <tr>
            <td>
                1.
            </td>
            <td>
                <a href="./addstudent.php">Insert Student</a>
            </td>
        </tr>
        <tr>
            <td>
                2.
            </td>
            <td>
                <a href="./updatestudent.php">Update Student</a>
            </td>
        </tr>
        <tr>
            <td>
                3.
            </td>
            <td>
                <a href="./deletestudent.php">Delete Student</a>
            </td>
        </tr>
    </table>
</div>

</body>
</html>