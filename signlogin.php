<?php
$icon=mysqli_connect("localhost","root","","job");
if(isset($_POST['signup']))
{
    $R=$_POST['Role'];
    $E=$_POST['Emailid'];
    $U=$_POST['Username'];
    $P=$_POST['Password'];
    $CP=$_POST['Pw'];
    $n=$_POST['name'];
    $t=$_POST['gender'];
    $v=$_POST['age'];
    $p=$_POST['phn'];
    $i=$_FILES['FILE']['name'];
    $sql="insert into users(Role,Name,Gender,Age,Phone_number,Emailid,Username,Password,Confirm_Password,image) values ('$R','$n','$t','$v','$p','$E','$U','$P','$CP','$i')";
    $r=mysqli_query($icon,$sql);
    header("Location:/job/signlogin.php");
    echo mysqli_error($icon);
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
$role="";
$id="";
if(isset($_POST['login']))
{
    $U=$_POST['Username'];
    $P=$_POST['Password'];
    $sql="select * from users where Username='$U' && Password='$P'";
    $r=mysqli_query($icon,$sql);
    $data = mysqli_fetch_array($r);
    $role = $data['Role'];
    $id = $data['id'];
    if($r->num_rows==0)
    {
        echo "User not found";
    }
    else
    {
        if($role==1)
            header("Location:/job/profilea.php?id=".$id);
        elseif($role==2)
            header("Location:/job/profilejs.php?id=".$id);
        elseif($role==3)
        header("Location:/job/profile.php?id=".$id);
    }
    echo mysqli_error($icon);
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
        <title>JOB PORTAL LOGIN/SIGNUP PAGE<title>
        <link rel="stylesheet" href="./style.css">
    </head>
    <body>
        <!DOCTYPE html>
        <html>
            <head>
            <title>Slide Navbar</title>
	<!-- <link rel="stylesheet" type="text/css" href="./style.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet"> -->
</head>
<body>
<form method="post" action="<?php $_SERVER['PHP_SELF']?>"enctype ="multipart/form-data">
	<div class="main">
			<div class="signup">
            <form method="post" action="<?php $_SERVER['PHP_SELF']?>"enctype ="multipart/form-data">
					<label for="chk" aria-hidden="true">Sign up</label><br><br>
                    <input type="text" name="Role" placeholder="Role 1(Admin) 2(Job Seeker) 3(Job Keeper)" required=""><br><br>
                    <input type="text" id="name" name="name" pattern="[A-Za-z]{1,32}" placeholder="Name" required><br><br>
                    Gender<input type="radio" name="gender" value="male" checked>MALE
                    <input type="radio" name="gender" value="female">FEMALE<br><br>
                    <input type="number" name="age" id='age' value="age" placeholder="Age" required><br><br>
                    <input type="number" name="phn" placeholder="Phone Number" required><br><br>
                    <input type="email" name="Emailid" placeholder="Email" required=""><br><br>
                    <input type="text" name="Username" placeholder="Username" required=""><br><br>
					<input type="password" name="Password" placeholder="Password" required=""><br><br>
                    <input type="password" name="Pw" placeholder="Confirm Password" required=""><br><br>
                    Photo<input type="file" name="FILE"><br><br>
					<button name="signup">Sign up</button><br><br><br>
				</form>
			</div>

            <div class="login">
            <form method="post" action="<?php $_SERVER['PHP_SELF']?>"enctype ="multipart/form-data">
					<label for="chk" aria-hidden="true">Login</label><br><br>
					<input type="text" name="Username" placeholder="Username" required=""><br><br>
					<input type="password" name="Password" placeholder="Password" required=""><br><br>
					<button name="login">Login</button>
				</form>
			</div>
	</div>
</body>
</html>
</body>
</body>

</html>