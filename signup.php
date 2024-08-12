<html>
<body>
<?php

$con=mysqli_connect("localhost", "root", "","concert") or die("Cannot connect to server.".mysqli_error($con)); 

$username = $_POST["username"];
$password = $_POST["password"];

$query = "select * from participants where username='$username' "; 
$result = mysqli_query($con , $query); 

if (mysqli_num_rows($result) > 0) {     
     echo "<script>alert('Username already exists'); window.location.href='landing.html';</script>";
     exit(); 
}

else
{
     $insert_sql="INSERT INTO participants VALUES('$username', '$password')";

     $sql_result =mysqli_query($con,$insert_sql) or die("Error in inserting data due to ".mysqli_error($con));

     	if($sql_result) 
        {
		echo "<script>alert('Succesfully Sign Up. Please log in back'); window.location.href='landing.html';</script>";
     		exit(); // Stop further execution
        }
	else{
		echo "<script>alert('Error in inserting data.Please try again.'); window.location.href='landing.html';</script>";
     		exit(); // Stop further execution
	}

}

?>
</body>
</html>