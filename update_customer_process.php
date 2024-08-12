<?php  

// Database connection
$con = mysqli_connect("localhost", "root", "", "concert") or die("Cannot connect to server: " . mysqli_error($con));

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $registerId = $_POST['registerId'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $totalPrice = $_POST['totalPrice'];
    $totalPriceforAll = $_POST['totalPriceforAll'];

 // Update query
    $stmt = $con->prepare("UPDATE register SET email = ?, date = ?, category = ?, price = ?, quantity = ?, totalPrice = ?, totalPriceforAll = ? WHERE registerId = ?");
    $stmt->bind_param("sssdddis", $email, $date, $category, $price, $quantity, $totalPrice, $totalPriceforAll, $registerId);
    
    if ($stmt->execute()) {
        echo "Record updated successfully";
		
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    $stmt->close();
}

mysqli_close($con);

// Redirect back to the update page or show a confirmation message
header("Location: update.php");

exit();


