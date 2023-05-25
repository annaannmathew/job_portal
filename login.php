<?php
$icon=mysqli_connect("localhost","root","","admin");
if(isset($_POST['signup']))
{
    $U=$_POST['Username'];
    $E=$_POST['Email'];
    $P=$_POST['Password'];
    $sql="insert into epass(Username,Email,Password) values ('$U','$E','$P')";
    $r=mysqli_query($icon,$sql);
    header("Location: /project/sign-up-login-form/login.php");
    echo mysqli_error($icon);
}
if(isset($_POST['login']))
{
    $U=$_POST['Username'];
    $P=$_POST['Password'];
    $sql="select * from epass where Username='$U' && Password= '$P'";
    $r=mysqli_query($icon,$sql);
    if($r->num_rows==0)
    {
        echo "User not found";
    }
    else
    {
        header("Location:/project/epassview.php");
    }
    echo mysqli_error($icon);
}
?>

<!DOCTYPE html>
<html lang="en" >
<head>
<meta charset="UTF-8">
  <title>E-PASS - Sign up / Login Form</title>
  <link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<!DOCTYPE html>
<html>
<head>
	<title>Slide Navbar</title>
	<link rel="stylesheet" type="text/css" href="slide navbar style.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
<form method="post" action="<?php $_SERVER['PHP_SELF']?>"enctype ="multipart/form-data">
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
            <form method="post" action="<?php $_SERVER['PHP_SELF']?>"enctype ="multipart/form-data">
					<label for="chk" aria-hidden="true">Sign up</label>
					<input type="text" name="Username" placeholder="User name" required="">
					<input type="email" name="Email" placeholder="Email" required="">
					<input type="password" name="Password" placeholder="Password" required="">
					<button name="signup">Sign up</button>
				</form>
			</div>

			<div class="login">
            <form method="post" action="<?php $_SERVER['PHP_SELF']?>"enctype ="multipart/form-data">
					<label for="chk" aria-hidden="true">Login</label>
					<input type="email" name="Username" placeholder="Username" required="">
					<input type="password" name="Password" placeholder="Password" required="">
					<button name="login">Login</button>
				</form>
			</div>
	</div>
</body>
</html>
<!-- partial -->
  
</body>
</html>
