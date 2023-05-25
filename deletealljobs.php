<?php
$con=mysqli_connect("localhost","root","","job");
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    mysqli_query($con,"delete from job_keeper where id=$id");
    header("Location:viewalljobs.php?id=".$id);
}
?>