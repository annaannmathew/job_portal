<?php
$con=mysqli_connect("localhost","root","","job");
$id=$_GET['id'];
if(isset($_GET['id']))
{
    $sql="select * from job_seeker where id='$id'";
    $r=mysqli_query($con,$sql);
    $f=mysqli_fetch_array($r);
}
if(isset($_POST['submit']))
{
    header("Location:viewjobs.php?id=".$id);
    $sql="update job_seeker set Current_Status='".$_POST['Current_Status']."' where id='$id'";
    mysqli_query($con,$sql);
    echo mysqli_error($con);
    exit();
} ?>


<!DOCTYPE html>
<html>
<head>
<title>DETAILS</title>
</head>
<body>
    <form method="post"  action="<?php $_SERVER['PHP_SELF']?>">
    <?php
    ?>
    Current_Status: <input type="text" id="Current_Status" name="Current_Status" value=<?php echo $f["Current_Status"]?> required><br><br>
                <input type="submit" name="submit" value="Submit"><br>
            </form>
    



</body>
</html>
<!--  -->