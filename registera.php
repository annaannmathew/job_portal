<?php
$con=mysqli_connect("localhost","root","","job");
 if(isset($_POST["Submit"]))
{
    $n=$_POST['name'];
    //$u=$_POST['Username'];
    //$p=$_POST['password'];
    $sql="insert into admin(Name) values('$n')";
    $a=mysqli_query($con,$sql);
    header("Location:/job/login.php");
    echo mysqli_error($con);
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
            <input type="text" id="name" name="name" pattern="[A-Za-z]{1,32}" placeholder="Name" required><br><br>
            <!--<input type="text" id="Username" name="Username" placeholder ="Username" required><br><br>
            <input type="text" id="Password" name="Password" placeholder="Password" required><br><br>-->
            <input type="submit" name="Submit" value="Submit"><br>
        </form>
    </body>
</html