<?php
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "students";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	}

if(isset($_GET['id'])){
  $id = $_GET['id'];
}
  $sql = "UPDATE stud set is_active=0 where id= '".$id."'";

if ($conn->query($sql) === TRUE)
 {
    echo " record deleted successfully";
    header("Location: view.php");
 }
else 
 {
    echo "Error: " . $sql . "<br>" . $conn->error;
 }

  

 $conn->close();
?>

