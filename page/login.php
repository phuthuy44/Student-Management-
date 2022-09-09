
<?php
session_start();
if(isset($_SESSION['id'])){
    header("Location:../../../../Student-Management-/page/login.php");
}
?><!Doctype html>
<html>
    <head>
        <meta charset="UTD-8">
        <title>Admin Login</title>
    </head>
    <body>
        <h1 align="center">Admin Login</h1>
        <form action="login.php" method="post">
            <table align="center">
                <tr>
                    <td>Username</td>
                    <td>
                        <input type="text" name="username"required>
                    </td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>
                        <input type="password" name="password"required>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                    <input type="submit" name="login" value="Login">
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
<?php
include_once "./../../Student-Management-/database/dbcon.php";
if(isset($_POST['login'])){
    $username=$_POST['username'];
    $password=$_POST['password'];

    $sql="SELECT * FROM admin WHERE username='{$username}' AND password='{$password}'";
    $query=mysqli_query($con,$sql);
    $row=mysqli_num_rows($query);
    if($row<1){
        ?>
        <script>
            alert('Username or Password no match!');
            window.open('./../page/login.php','_self');
        </script>
        <?php
    }else{

        $data=mysqli_fetch_assoc($query);

        $id=$data['id'];

       // echo "id=".$id;
       
       $_SESSION['id']=$id;
        header('Location:../../../../Student-Management-/admin/dashboard.php');
    }

}
?>