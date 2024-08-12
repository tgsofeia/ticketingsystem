<?php
session_start();

if (isset($_SESSION["userId"]) || isset($_SESSION["adminId"])) {
    session_destroy();
    echo "<script>
        alert('Successfully logged out');
        window.location.href = 'landing.html';
    </script>";
    
 
} else {
    echo "No session exists or session has expired. Please log in again.";
}
?>

