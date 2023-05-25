<?php
$con=mysqli_connect("localhost","root","","job");
$id=$_GET['id'];
if(isset($_GET['id']))
{
    $sql="select job_keeper.Job,job_keeper.Job_Available,job_keeper.Company,users.Name,users.Gender,users.Age,users.Phone_number,users.Emailid,users.Username,users.Password,job_keeper.Location,job_keeper.id from job_keeper LEFT JOIN users ON users.id=job_keeper.userid where id='$id'";
    $r=mysqli_query($con,$sql);
    $f=mysqli_fetch_array($r);
}
if(isset($_POST['submit']))
{
    header("Location:viewalljobs.php?id=".$id);
    $sql="update job_seeker set Name='".$_POST['Name']."',Gender='".$_POST['gender']."',Age='".$_POST['Age']."',Phone_Number='".$_POST['phn']."',Location='".$_POST['loc']."',Job_required='".$_POST['job']."',Qualification='".$_POST['ql']."',Company='".$_POST['comp']."',Current_Status='".$_POST['cs']."' where id='$id'";
    mysqli_query($con,$sql);
    echo mysqli_error($con);
    exit();
} 
?>

<!DOCTYPE html>
<html>
<head>
<title>DETAILS</title>
</head>
<body>
<form method="post"  action="<?php $_SERVER['PHP_SELF']?>">
    Name<input type="text" id="name" name="Name" pattern="[A-Za-z]{1,32}"value=<?php echo $f["Name"]?> required><br><br>
    Gender<input type="radio" name="gender" value="male"<?php echo ($f['Gender']=='male')?'checked':'' ?>>MALE
    <input type="radio" name="gender" value="female"<?php echo ($f['Gender']=='female')?'checked':'' ?>>
    FEMALE<br><br>
    Age<input type='number' id='age' name='Age' value=<?php echo $f["Age"]?> required><br><br>
    Phone Number<input type="int"  id="phn" name="phn" value=<?php echo $f["Phone_Number"]?> required ><br><br>
    Location<input type ="text" id="loc" name="loc" value=<?php echo $f["Location"]?> required><br><br>
    Job Required<input type="text"  id="job" name="job" value=<?php echo $f["Job_required"]?> required ><br><br>
    Qualification<input type ="text" id="ql" name="ql" value=<?php echo $f["Qualification"]?> required><br><br>
    Company<input type ="text" id="comp" name="comp" value=<?php echo $f["Company"]?> required><br><br>
    Current Status<input type ="text" id="cs" name="cs" value=<?php echo $f["Current_Status"]?> required><br><br>
    <input type="submit" name="submit" value="Submit"><br>
    </form>
</body>
</html>