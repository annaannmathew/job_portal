<?php
$icon=mysqli_connect("localhost","root","","job");
$sql="Select job_keeper.Job,job_keeper.Job_Available,job_keeper.Company,users.Name,users.Gender,users.Age,users.Phone_number,users.Emailid,users.Username,users.Password,job_keeper.Location,job_keeper.id from job_keeper LEFT JOIN users ON users.id=job_keeper.userid;";
$r=mysqli_query($icon,$sql);
$result=mysqli_fetch_all($r);
$sql1="Select * from job_seeker";
$r1=mysqli_query($icon,$sql1);
$resul1=mysqli_fetch_all($r1);
$id=$_GET['id'];
?>
<html>
<head>
<style>
    table
    {
        border: 1px solid;
        width:100%;
        text-align:center;

    }
    th,td
    {
        border: 1px solid;
        text-align:center;

    }
    tr:nth-child(even)
    {        
      
        background-color: #f2f2f2;
    }
    tr:nth-child(even):hover
    {        
      
        background-color:#64d92e;
    }
    tr:nth-child(odd):hover
    {        
      
        background-color:#de16d7;
    }
</style>
</head>
<h1>JOB  KEEPER</h1>
<table>
<tr>
    <th>id</th>
    <th>Name</th>
    <th>Gender</th>
    <th>Age</th>
    <th>Phone Number</th>
    <th>Job</th>
    <th>Job Available</th>
    <th>Location</th>
    <th>Company</th>
</tr>
<?php
$i=1;
foreach($result as $data)
{
?>
<tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $data[3] ?></td>
    <td><?php echo $data[4] ?></td>
    <td><?php echo $data[5] ?></td>
    <td><?php echo $data[6] ?></td>
    <td><?php echo $data[0] ?></td>
    <td><?php echo $data[1] ?></td>
    <td><?php echo $data[10] ?></td>
    <td><?php echo $data[2] ?></td>
    <td><a href="updatealljobs.php?id=<?php echo $data[11];?>">EDIT</a></td>
    <td><a href="deletealljobs.php?id=<?php echo $data[11];?>">DELETE</a></td>
</tr>
<?php
$i++;
}
?>
</table>
<h2>JOB SEEKER</h2>
<table>
<tr>
    <th>id</th>
    <th>Name</th>
    <th>Gender</th>
    <th>Age</th>
    <th>Phone Number</th>
    <th>Location</th>
    <th>Job Required</th>
    <th>Qualification</th>
    <th>Company</th>
    <th>Current Status</th>
</tr>
<?php
$i=1;
foreach($resul1 as $data1)
{
?>
<tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $data1[2] ?></td>
    <td><?php echo $data1[3] ?></td>
    <td><?php echo $data1[4] ?></td>
    <td><?php echo $data1[5] ?></td>
    <td><?php echo $data1[6] ?></td>
    <td><?php echo $data1[7] ?></td>
    <td><?php echo $data1[8] ?></td>
    <td><?php echo $data1[9] ?></td>    
    <td><?php echo $data1[10] ?></td>
    <td><a href="updatealljobsjs.php?id=<?php echo $data1[0];?>">EDIT</a></td>
    <td><a href="deletealljobsjs.php?id=<?php echo $data1[0];?>">DELETE</a></td>
</tr>
<?php
$i++;
}
?>
</table>
<?php
mysqli_close($icon);
?>