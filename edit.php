<?php
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "students";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	}
$id=$_REQUEST['id'];
$query = "SELECT * from stud where id='".$id."'";
$result = mysqli_query($conn, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
	<style>
		.form
		{
			width:300px;
			border:1px ;
			padding:10px 30px 40px;
			margin-left:70px;
			background-color:#f0f8ff
		}
		.input
		 {
			width:100%;
			height:30px;
			border-radius:2px;
			box-shadow:0 0 1px 2px #123456;
			margin-top:10px;
			padding:7px;
			border:none;
			margin-bottom:20px
		  }
	</style>
<meta charset="utf-8">
<title>Edit Record</title>
</head>
<body>
<div class="form">

<h1><center>Update Record</center></h1>
<?php
$status = "";
if(isset($_POST['submit']))
{
$id=$_REQUEST['id'];
$name =$_REQUEST['name'];
$email =$_REQUEST['email'];
$update="update stud set name='".$name."', email='".$email."' where id='".$id."'";
mysqli_query($conn, $update) or die(mysqli_error());
$status = "Record Updated Successfully. </br></br>
<a href='view.php'> View Updated Record</a>";
echo '<p>'.$status.'</p>';
}else {
?>
<div >
<form name="form" method="post" action="">
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['id'];?>" />
<input type="text" name="name" placeholder="Enter Name" required value="<?php echo $row['name'];?>" />
<input type="text" name="email" placeholder="Enter email" required value="<?php echo $row['email'];?>" />
<input name="submit" type="submit" value="Update" />
</form>
<?php } ?>
</div>
</div>
</body>
</html>