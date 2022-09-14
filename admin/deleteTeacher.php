<?php
include_once "../database/dbcon.php";
if(isset($_GET['delete_TecherID'])){
    $id_delete=$_GET['delete_TecherID'];
    $query="SELECT * FROM teacher WHERE id= '{$id_delete}'";
    $run2=mysqli_query($con,$query);
    while($row=mysqli_fetch_assoc($run2)){
        $image=$row['photo_Teacher'];
    }
    unlink('../Teacher_image/'.$image);
    $sql="DELETE FROM teacher WHERE id='{$id_delete}'";
    $run=mysqli_query($con,$sql);
    if($run){
        ?>
            <script>
                alert("Delete data successfully!");
                window.open('./viewTeacher.php?delete_msg=Data deleted successfully','_self');
            </script>
        <?php
    }else{

    }
}
?>