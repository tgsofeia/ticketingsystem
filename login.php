<html>
<body>
<?php

$con = mysqli_connect("localhost", "root", "", "concert") or die("Cannot connect to server");

$username = $_POST["username"];
$password = $_POST["password"];

// Check in admins table
$sqlAdmin = "SELECT * FROM admins WHERE adminName = '$username'";
$resultAdmin = mysqli_query($con, $sqlAdmin);

if (mysqli_num_rows($resultAdmin) > 0) {
    $rowAdmin = mysqli_fetch_array($resultAdmin, MYSQLI_BOTH);
    if ($rowAdmin["adminPassword"] == $password) {
        session_start();
        $_SESSION["adminId"] = $username;
        header("Location: admin.php");
        exit();
    } else {
        echo "<script>alert('Password is incorrect.'); window.location.href='landing.html';</script>";
     		exit();
    }
} else {
    // Check in participants table
    $sqlUser = "SELECT * FROM participants WHERE username = '$username'";
    $resultUser = mysqli_query($con, $sqlUser);

    if (mysqli_num_rows($resultUser) > 0) {
        $rowUser = mysqli_fetch_array($resultUser, MYSQLI_BOTH);
        if ($rowUser["password"] == $password) {
            session_start();
            $_SESSION["userId"] = $username;
            header("Location: user.php");
            exit();
        } else {
            echo "<script>alert('Password is incorrect.'); window.location.href='landing.html';</script>";
     		exit();

        }
    } else {
            echo "<script>alert('Username does not exist.'); window.location.href='landing.html';</script>";
     		  exit();
    }
}

mysqli_close($con);
?>
</body>
</html>