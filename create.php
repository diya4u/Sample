<!DOCTYPE html>
<html>
<head>
	<style>
		
		a.one:link {color:#ff0000;}
		a.one:visited {color:#0000ff;}
		a.one:hover {color:#ffcc00;}

		.title
		 {
			width:500px;
			height:70px;
			font-size:16px;
			text-align:center
		 }

		.form_div
		 {
			width:70%;
			float:left
		 }

		form 
		{
			width:300px;
			border:1px ;
			padding:10px 30px 40px;
			margin-left:70px;
			background-color:#f0f8ff
		}

		form h2 
		{
			text-align:center;
			text-shadow:2px 2px 2px #cfcfcf
		}

		textarea
		{
			width:100%;
			height:60px;
			border-radius:1px;
			box-shadow:0 0 1px 2px #123456;
			margin-top:10px;
			padding:7px;
			border:none
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
		
		.submit 
		{
			color:#fff;
			border-radius:3px;
			background:#1F8DD6;
			padding:5px;
			margin-top:40px;
			border:none;
			width:100%;
			height:30px;
			box-shadow:0 0 1px 2px #123456;
			font-size:18px
		}

		p
		{
			color:red;
			text-align:center
		}

		span
		{
			text-align:center;
			color:green
		}
	</style>

	<title>CREATE</title>
</head>

<body>
<div >
	<div class="form_div">
		<div class="title">
			<h2>INSERT DATA</h2>
		</div>
	<form action="create.php" method="post">
	<h2>Form</h2>
	<label>Name:</label>
	<input class="input" name="name" type="text" value="">
	<label>Email:</label>
	<input class="input" name="email" type="text" value="">
	<input class="submit" name="submit" type="submit" value="Insert">
	</form>
	</div>
</div>
<div>
	<p align="center"><b><a class="one" href="index.html" target="_blank">BACK</a></b></p>

</div>
</body>
</html>

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

if(isset($_POST['submit']))
{ // Fetching variables of the form which travels in URL
	$name = $_POST['name'];
	$email = $_POST['email'];

$sql = "INSERT INTO stud (name, email) VALUES ('$name', '$email')";

if ($conn->query($sql) === TRUE)
 {
    echo "New record created successfully";
 }
else 
 {
    echo "Error: " . $sql . "<br>" . $conn->error;
 }
}

$conn->close();
?>