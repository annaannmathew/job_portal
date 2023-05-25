<?php
$con=mysqli_connect("localhost","root","","job");
$id=$_GET['id'];
 if(isset($_POST["Submit"]))
{
    $j=$_POST['job'];
    $ja=$_POST['job_available'];
    $l=$_POST['loc'];
    $c=$_POST['company'];    
    $i=$_FILES['FILE']['name'];
    $sql="insert into job_keeper(userid,Job,Job_Available,Location,Company,image) values('$id','$j','$ja','$l','$c','$i')";
    $a=mysqli_query($con,$sql);
    header("Location:/job/viewjobs.php?id=".$id);
    echo mysqli_error($con);

    if(file_exists("images/"))
    {
        move_uploaded_file($_FILES['FILE']['tmp_name'],"images/".$i);
    }
    else
    {
        mkdir ("images");
        move_uploaded_file($_FILES['FILE']['tmp_name'],"images/".$i);
    }
}

?>
<!DOCTYPE html>
<html> 
    <head> 
        <title>DETAILS</title>
    </head>
    <body>
   
<html>
    <head>
        <title>REGISTRATION FORM</title>
    </head>
    <body style="background-color:lightred;">
        <form method="POST" action ="<?php $_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
             <h1>REGISTRATION FORM</h1>
            <input type="text" name="job" placeholder="Job" required><br><br>
            <input type="text" name="job_available" placeholder="Job Available" required><br><br>
            <input type="text" name="loc" placeholder="Location" required><br><br>
            <input type="text" name="company" placeholder="Company" required><br><br>
            <input type="submit" name="Submit" value="Submit"><br>
        </form>
    </body>
</html