<!DOCTYPE HTML>
<html>
<head>
<style>
#stud
{
 font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 50%;
}
table,th,td
{
  text-align: center;
   padding: 15px;
   
}
th
{
  background-color: #4CAF50;
  color: white;
}
tr
{
  tr:nth-child(even) {background-color: #f2f2f2;}

}
</style>
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "students";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection

if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}
?>

<div><center>Deatils</center><div>
<hr>
<table id="stud" border="1" align="center">
<tr>
  <th>ID</th>
  <th>NAME</th>
  <th>EMAIL</th>
  <th>OPTIONS</th>
</tr>

<?php

$query = mysqli_query($conn, "SELECT id,name,email FROM stud where is_active=1")
   or die (mysqli_error($conn));

while ($row = mysqli_fetch_array($query)) {
?>
   <tr>
    <td><?php echo $row['id'];?></td>
    <td><?php echo $row['name'];?></td>
    <td><?php echo $row['email'];?></td>
    <td align="center">
<a href="edit.php?id=<?php echo $row["id"]; ?>">Edit</a>&nbsp;


<a href="delete.php?id=<?php echo $row["id"]; ?>">Delete</a>
</td>
    </tr>

    <?php
}

?>

</table>
<div>
  <p align="center"><b><a class="one" href="index.html" target="_blank">BACK</a></b></p>

</div>
</body>
</html>

