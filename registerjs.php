<?php
$con=mysqli_connect("localhost","root","","job");
$id=$_GET['id'];
 if(isset($_POST["Submit"]))
{
    $j=$_POST['job'];
    $ql=$_POST['ql'];
    $l=$_POST['loc'];
    $c=$_POST['company'];
    $sql="insert into job_seeker(userid,Job_required,Qualification,Location,Company) values('$id','$j','$ql','$l','$c')";
    $a=mysqli_query($con,$sql);
    header("Location:/job/profilejs.php?id=".$id);
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
    <body style="background-color: lightred;">
        <form method="POST" action ="<?php $_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
             <h1>REGISTRATION FORM</h1>
            <input type="text" name="job" placeholder="Job Required" required><br><br>
            <input type="text" name="ql" placeholder="Qualification" required><br><br>
            <input type="text" name="loc" placeholder="Location" required><br><br>
            <input type="text" name="company" placeholder="Company" required><br><br>
            <input type="submit" name="Submit" value="Submit"><br>
        </form>
    </body>
</html