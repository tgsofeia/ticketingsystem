<html>
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


</style>

    <?php 

    $con = mysqli_connect("localhost", "root", "", "concert") or die("Cannot connect to server." . mysqli_error($con)); 

    $registerId = $_POST["registerId"]; 

    $sql_delete = "DELETE FROM register WHERE registerId='$registerId'"; 

    $sql_result = mysqli_query($con, $sql_delete) or die("Error in sql due to " . mysqli_error($con)); 

    // Check if the deletion was successful
    if (mysqli_affected_rows($con) > 0) {
        // Display success message in a message box
        echo '<div class="message-box">';
        echo '<p class="success">Successfully deleted.</p>';
        echo '</div>';
    } else {
        // Display error message in a message box
        echo '<div class="message-box">';
        echo '<p class="error">User does not exist.</p>';
        echo '</div>';
    }

    mysqli_close($con);
    ?> 

<style>
body {
    background-image: url('i.jpg');
    background-size: cover;
    background-position: center;
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;
}

.success, .error {
    position: relative;
    padding: 30px;
    border-radius: 10px;
    margin: 30px auto;
    margin-top:180px;
    width: fit-content;
    font-size: 24px;
    font-weight: bold;
    color: #4b0082; /* Dark shiny purple color */
    background-color: white;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    animation: fadeIn 0.5s ease-in-out; /* Add fade-in animation */
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

.success::before, .error::before {
    position: absolute;
    left: -40px;
    top: 0;
    font-size: 24px;
    color: #4b0082; /* Dark shiny purple color */
    
    padding: 5px;
    border-radius: 5px;
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

<footer>
      <div>
        <span>Copyright © 2024 All Rights Reserved</span>
       
       
      </div>
    </footer>
<?php
      } 

      else {
           echo "No session exists or session has expired. Please log in again.";
      }
?>
</body> 
</html> 
