<?php
$icon=mysqli_connect("localhost","root","","job");
$sql="Select DISTINCT job_seeker.Name,job_seeker.Gender,job_seeker.Age,job_seeker.Phone_Number,job_seeker.Qualification,job_seeker.Current_Status,job_seeker.id from job_seeker LEFT JOIN job_keeper ON job_seeker.Job_required=job_keeper.Job_Available AND job_keeper.Company=job_seeker.Company AND job_seeker.Current_Status='Pending'";
$r=mysqli_query($icon,$sql);
$result=mysqli_fetch_all($r);
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
<table>
<tr>
    <th>id</th>
    <th>Name</th>
    <th>Gender</th>
    <th>Age</th>
    <th>Phone Number</th>
    <th>Qualification</th>
    <th>Current Status</th>
</tr>
<?php
$i=1;
foreach($result as $data)
{
?>
<tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $data[0] ?></td>
    <td><?php echo $data[1] ?></td>
    <td><?php echo $data[2] ?></td>
    <td><?php echo $data[3] ?></td>
    <td><?php echo $data[4] ?></td>
    <td><?php echo $data[5] ?></td>
    <td><a href="updatejobs.php?id=<?php echo $data[6]?>">EDIT</a></td>
    <td><a href="deletejobs.php?id=<?php echo $data[6]?>">DELETE</a></td>
</tr>
<?php
$i++;
}
?>
</table>
<?php
mysqli_close($icon);
?>