<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set Event Quotas</title>
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
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 100vh;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-image: url('i.jpg');
            background-size: cover;
            background-position: center;
            color: white;
        }
        .form-container {
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 1000px;
            max-width: 80%;
            margin: 5px auto;
            background-color: #fff;
            margin-top: 60px;
        }
        h2 {
            text-align: center;
            margin-bottom: 0px;
            color: #512da8;
            position: relative;
        }
        h2::before {
            content: "🎫";
            position: absolute;
            left: -40px;
            top: 0;
            font-size: 24px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
            font-weight: bold;
            color: #512da8;
        }
        input[type="number"],
        button {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 8px;
            border: 1px solid #ccc;
            width: 100%;
            box-sizing: border-box;
            font-size: 16px;
        }
        button {
            background-color: #ff0080;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #000;
        }
        .table-container {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }
        .table-container div {
            flex: 1;
            min-width: 150px;
            margin: 10px;
        }
        .table-container label {
            display: block;
            margin-bottom: 5px;
        }
        .table-container input {
            width: calc(100% - 20px);
        }
        .date-container {
            margin-bottom: 20px;
        }
        .date-container input[type="radio"] {
            margin-right: 10px;
        }
        .date-container label {
            margin-right: 20px;
            color: #512da8;
        }
        .error-message {
            color: #f44336;
            font-size: 14px;
            margin-top: 5px;
        }
        footer {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: left;
            background: #000;
            padding: 20px 0;
        }
        footer div {
            padding: 0 10px;
            max-width: 1200px;
            width: 100%;
            display: flex;
            justify-content: space-between;
        }
        footer span {
            color: #fff;
        }
    </style>
</head>
<body>
<?php
$user = $_SESSION["adminId"];
if (isset($user)) {
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

<div class="form-container">
    <h2>Set Quotas for Categories</h2>
    <form method="post">
        <div class="date-container">
            <label for="date">Select Date:</label><br>
            <input type="radio" id="date1" name="date" value="2024-06-08T19:30" required>
            <label for="date1">June 8, 2024 - 7:30 PM</label><br>
            <input type="radio" id="date2" name="date" value="2024-06-09T19:30" required>
            <label for="date2">June 9, 2024 - 7:30 PM</label><br>
        </div>
        <div class="table-container">
             <div>
                    <label for="quota_vvip">VVIP</label>
                    <input type="number" id="quota_vvip" name="quota_vvip" min="0" required>
                </div>
                <div>
                    <label for="quota_vip">VIP</label>
                    <input type="number" id="quota_vip" name="quota_vip" min="0" required>
                </div>
                <div>
                    <label for="quota_ps1">PS1</label>
                    <input type="number" id="quota_ps1" name="quota_ps1" min="0" required>
                </div>
                <div>
                    <label for="quota_ps2">PS2</label>
                    <input type="number" id="quota_ps2" name="quota_ps2" min="0" required>
                </div>
                <div>
                    <label for="quota_ps3">PS3</label>
                    <input type="number" id="quota_ps3" name="quota_ps3" min="0" required>
                </div>
                <div>
                    <label for="quota_ps4">PS4</label>
                    <input type="number" id="quota_ps4" name="quota_ps4" min="0" required>
                </div>
                <div>
                    <label for="quota_ps5">PS5</label>
                    <input type="number" id="quota_ps5" name="quota_ps5" min="0" required>
                </div>
        </div>
        <button type="submit">Set Quotas</button>
        <p class="error-message" id="error-message"></p>
    </form>
<?php

$con = mysqli_connect("localhost", "root", "", "concert") or die("Connection failed: " . mysqli_connect_error());

$success_message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Extracting form data
    $event_date = $_POST['date'];
    $quota_vvip = $_POST['quota_vvip'];
    $quota_vip = $_POST['quota_vip'];
    $quota_ps1 = $_POST['quota_ps1'];
    $quota_ps2 = $_POST['quota_ps2'];
    $quota_ps3 = $_POST['quota_ps3'];
    $quota_ps4 = $_POST['quota_ps4'];
    $quota_ps5 = $_POST['quota_ps5'];

    // Validating form data
    if (!empty($event_date) && !empty($quota_vvip) && !empty($quota_vip) && !empty($quota_ps1) && !empty($quota_ps2) && !empty($quota_ps3) && !empty($quota_ps4) && !empty($quota_ps5)) {
        // Check if the event date already exists in the table
        $check_sql = "SELECT * FROM event_quotas WHERE event_date = ?";
        $check_stmt = $con->prepare($check_sql);
        $check_stmt->bind_param("s", $event_date);
        $check_stmt->execute();
        $result = $check_stmt->get_result();

        if ($result->num_rows > 0) {
            // Prepare the SQL statement for updating quotas
            $update_sql = "UPDATE event_quotas SET quota_vvip = ?, quota_vip = ?, quota_ps1 = ?, quota_ps2 = ?, quota_ps3 = ?, quota_ps4 = ?, quota_ps5 = ? WHERE event_date = ?";
            $update_stmt = $con->prepare($update_sql);
            // Bind parameters and execute the statement
            $update_stmt->bind_param("iiiiiiis", $quota_vvip, $quota_vip, $quota_ps1, $quota_ps2, $quota_ps3, $quota_ps4, $quota_ps5, $event_date);
            if ($update_stmt->execute()) {
                $success_message = "Quotas updated successfully.";
            } else {
                $success_message = "Error updating quotas.";
            }
        } else {
            // Prepare the SQL statement for inserting data
            $insert_sql = "INSERT INTO event_quotas (event_date, quota_vvip, quota_vip, quota_ps1, quota_ps2, quota_ps3, quota_ps4, quota_ps5) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $insert_stmt = $con->prepare($insert_sql);
            // Bind parameters and execute the statement
            $insert_stmt->bind_param("siiiiiii", $event_date, $quota_vvip, $quota_vip, $quota_ps1, $quota_ps2, $quota_ps3, $quota_ps4, $quota_ps5);
            if ($insert_stmt->execute()) {
                $success_message = "Quotas inserted successfully.";
            } else {
                $success_message = "Error inserting quotas.";
            }
        }

        // Check if the operation was successful
        if (strpos($success_message, "successfully") !== false) {
            echo "<script>alert('$success_message');</script>";
        }
    } else {
        $success_message = "Please fill in all fields.";
    }
}

?>


    <?php if (isset($success_message)): ?>
        <p><?php echo $success_message; ?></p>
    <?php endif; ?>
</div>

<footer>
    <div>
        <span>Copyright © 2024 All Rights Reserved</span>
    </div>
</footer>

<script>
    function validateForm() {
        const inputs = document.querySelectorAll('input[type="number"]');
        for (let input of inputs) {
            if (input.value < 0) {
                document.getElementById('error-message').textContent = 'Quotas must be a non-negative number';
                return false;
            }
        }
        return true;
    }
</script>

<?php
      } 

      else {
           echo "No session exists or session has expired. Please log in again.";
      }
?>
</body>
</html>

