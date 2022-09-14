<?php
include_once "../database/dbcon.php";
if(isset($_GET['Delete_id'])){
    $id_delete=$_GET['Delete_id'];
    $sql="DELETE FROM admin WHERE id='{$id_delete}'";
    $run=mysqli_query($con,$sql);
    if($run){
        ?>
            <script>
                alert("Delete data successfully!");
                window.open('./register.php?delete_msg=Data deleted successfully','_self');
            </script>
        <?php
    }else{

    }
}
?>