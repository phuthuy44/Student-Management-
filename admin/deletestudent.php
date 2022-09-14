<?php
include_once "../database/dbcon.php";
if(isset($_GET['delete_studentID'])){
    $id_delete=$_GET['delete_studentID'];
    $query="SELECT * FROM student WHERE id= '{$id_delete}'";
    $run2=mysqli_query($con,$query);
    while($row=mysqli_fetch_assoc($run2)){
        $image=$row['photo'];
    }
    unlink('../Student_image/'.$image);
    $sql="DELETE FROM student WHERE id='{$id_delete}'";
    $run=mysqli_query($con,$sql);
    if($run){
        ?>
            <script>
                alert("Delete data successfully!");
                window.open('./viewstudent.php?delete_msg=Data deleted successfully','_self');
            </script>
        <?php
    }else{

    }
}
?>