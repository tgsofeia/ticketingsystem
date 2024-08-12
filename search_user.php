

<!DOCTYPE html>
<html>
<head>
<style>
header {
    position: fixed;
    top: 0;
    left: 0;
    z-index: 5;
    width: 100%;
    display: flex;
    justify-content: center;
    background: hsl(292deg 84% 5% / 50%);
}

.navbar {
    display: flex;
    padding: 0 10px;
    max-width: 1200px;
    width: 100%;
    align-items: center;
    justify-content: space-between;
}

.navbar input#menu-toggler {
    display: none;
}

.navbar #hamburger-btn {
    cursor: pointer;
    display: none;
}

.navbar .all-links {
    display: flex;
    align-items: center;
}

.navbar .all-links li {
    position: relative;
    list-style: none;
}

.navbar .all-links li a {
    color: white;
    text-decoration: none;
    padding: 10px;
}

.navbar .all-links li a:hover {
    text-decoration: underline;
}

.navbar .logo a {
    display: flex;
    align-items: center;
    margin-left: 0;
    color: white;
    text-decoration: none;
}

body {
    background-image: url('i.jpg');
    background-size: cover;
    background-position: center;
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    position: relative;
    width: 80%;
    margin-top: 70px; /* Adjust based on your header height */
}

.background-box {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #512da8; /* Light transparent purple */
    border-radius: 10px; /* Optional: Add rounded corners */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    z-index: -1; /* Place it behind the table */
}

table {
    width: 100%;
    border-collapse: collapse;
    background-color: rgba(75, 0, 130, 0.2); /* Table background color */
    color: black; /* Text color for better readability */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 10px; /* Add rounded corners */
    overflow: hidden; /* Ensure rounded corners work properly */
    font-size: 16px;
}

th, td {
    padding: 15px 20px;
    text-align: left;
    border: 1px solid rgba(0, 0, 0, 0.1); /* Semi-transparent border */
}

th {
    background-color: rgba(75, 0, 130, 0.9); /* Dark purple header */
    color: white;
}

tr:nth-child(even) {
    background-color: rgba(240, 240, 240, 0.8); /* Light transparent purple for even rows */
}

tr:hover {
    background-color: rgba(240, 240, 240, 1); /* Light purple hover effect */
    transition: background-color 0.3s ease; /* Smooth transition for hover effect */
}

footer {
    position: fixed;
    bottom: 0;
    width: 100%;
    background: #000;
    padding: 20px 0;
}

footer div {
    padding: 0 10px;
    max-width: 1200px;
    width: 100%;
    margin: 0 auto; /* Center the content horizontally */
}

footer span {
    color: #fff;
}
</style>
</head>
<body>
<?php

session_start();
$user = $_SESSION["adminId"]; 
	      
if (isset($user)) 
{
?>
<header>
    <nav class="navbar">
        <h2 class="logo"><a href="#">iMe.</a></h2>
        <input type="checkbox" id="menu-toggler">
        <label for="menu-toggler" id="hamburger-btn">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" width="24px" height="24px">
                <path d="M0 0h24v24H0z" fill="none"/>
                <path d="M3 18h18v-2H3v2zm0-5h18V11H3v2zm0-7v2h18V6H3z"/>
            </svg>
        </label>
        <ul class="all-links">
		<li><a href="admin.php">Home</a></li>
        </ul>
    </nav>
</header>

<div class="container">
    <div class="background-box"></div>
    <?php 
    echo "<table border=border><tr>  
    <td>Register ID</td> 
    <td>Username</td> 
    <td>Full Name</td> 
    <td>Email</td> 
    <td>Date</td> 
    <td>Category</td> 
    <td>Quantity</td> 
    <td>Total</td> 
    </tr>"; 

    $con=mysqli_connect("localhost", "root", "","concert") or die("Cannot connect to server.".mysqli_error($con)); 

    $registerId=@$_POST["registerId"]; 

    $sql = "SELECT * FROM register WHERE registerId LIKE '%$registerId%'";

    $result=mysqli_query($con,$sql) or die("Cannot execute sql."); 

    while($row=mysqli_fetch_array($result,MYSQLI_BOTH)) 
    { 
        $registerId=$row[0]; 
	$username=$row[1]; 
	$fullname=$row[2]; 
	$email=$row[3]; 
	$date=$row[4]; 
	$category=$row[5];
	$quantity=$row[7];
        $totalPrice=$row[8];  

               echo "<tr> 
              <td>$registerId</td> 
              <td>$username</td> 
              <td>$fullname</td> 
              <td>$email</td> 
              <td>$date</td> 
              <td>$category</td> 
              <td>$quantity</td> 
              <td>$totalPrice</td> 
              </tr>";  
    } 

    echo "</table>";
    ?> 
</div>

<footer>
    <div>
        <span>Copyright © 2024 All Rights Reserved</span>
    </div>
</footer>
<?php
      } 

      else {
           echo '<p style="color: white; text-align: center; margin-top: 20px;">No session exists or session has expired. Please log in again.</p>';
      }
?>
</body>
</html>
