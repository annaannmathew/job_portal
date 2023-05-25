
<?php
$icon=mysqli_connect("localhost","root","","job");
$id=$_GET['id'];
if(isset($_GET['id']))
{
    $sql="select * from users where id='$id'";
    $r=mysqli_query($icon,$sql);
    $result=mysqli_fetch_all($r);

}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>PROFILE PAGE</title>
        <link rel="stylesheet" href="style1.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="navbar-top">
        <div class="title">
            <h1>PROFILE</h1>
        </div>
        <ul>
            <li>
            <a href="http://localhost/job/signlogin.php">
                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                </a>
            </li>
        </ul>
    </div>

    <div class="sidenav">
        <div class="profile">
        <div class="sidenav-url">
            <div class="url">
                <a href="#profile" class="active">Profile</a>
                <hr align="center">
            </div>
            <div class="url">
                <a href="http://localhost/job/registerjs.php?id=<?php echo $id;?>" class="active">Registration Form</a>
                <hr align="center">
            </div>
        </div>
        </div>
    </div>
    <div class="main">
        <h2>IDENTITY</h2>
        <div class="card">
            <div class="card-body">
                <i class="fa fa-pen fa-xs edit"></i>
                <table>
                    <tbody>
                        <?php
                            foreach($result as $data)
                            {
                        ?>
                        <tr>                           
                            <img src="images/<?php echo $data[11]; ?>" style="width:50%;height:50%;">
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>:</td>
                            <td><?= $data[1] ?></td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td>:</td>
                            <td><?= $data[2] ?></td>
                        </tr>
                        <tr>
                            <td>Age</td>
                            <td>:</td>
                            <td><?= $data[3] ?></td>
                        </tr>
                        <tr>
                            <td>Phone Number</td>
                            <td>:</td>
                            <td><?= $data[6] ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td><?= $data[8] ?></td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td>:</td>
                            <td><?= $data[9] ?></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>:</td>
                            <td><?= $data[10] ?></td>
                        </tr>
                        <tr>
                            <td>Current Status</td>
                            <td>:</td>
                            <td><?= $data[12] ?></td>
                        </tr>
                        <?php
                            }
                        ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

<?php
mysqli_close($icon);
?>