<?php
// Database connection
$con = mysqli_connect("localhost", "root", "", "concert") or die("Cannot connect to server: " . mysqli_error($con));

$name = isset($_POST["name"]) ? $_POST["name"] : '';
$registerId = isset($_POST["registerId"]) ? $_POST["registerId"] : '';
$row = null;
$allEntries = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($name)) {

// If name is provided, search for customer records
    $stmt = $con->prepare("SELECT * FROM register WHERE fullname = ?");
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        if (!empty($registerId)) {
 // If registerId is provided, fetch specific entry details
            $stmt2 = $con->prepare("SELECT * FROM register WHERE registerId = ?");
            $stmt2->bind_param("i", $registerId);
            $stmt2->execute();
            $row = $stmt2->get_result()->fetch_assoc();
            $stmt2->close();
        }
    } else {
        echo "<script>alert('Name does not exists'); window.location.href='update.php';</script>";
    }
    $stmt->close();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update2'])) {
    // Update the chosen entry
    $stmt = $con->prepare("UPDATE register SET email = ?, date = ?, category = ?, price = ?, quantity = ?, totalPrice = ? WHERE registerId = ?");
    $stmt->bind_param("sssdiis", $_POST['email'], $_POST['date'], $_POST['category'], $_POST['price'], $_POST['quantity'], $_POST['totalPrice'], $registerId);

    if ($stmt->execute()) {
        // Calculate totalPriceforAll for all entries
        $stmt3 = $con->prepare("SELECT SUM(totalPrice) as totalPriceforAll FROM register WHERE fullname = ?");
        $stmt3->bind_param("s", $name);
        $stmt3->execute();
        $totalPriceforAllResult = $stmt3->get_result()->fetch_assoc();
        $totalPriceforAll = $totalPriceforAllResult['totalPriceforAll'];
        $stmt3->close();

        // Update totalPriceforAll for all entries
        $stmt4 = $con->prepare("UPDATE register SET totalPriceforAll = ? WHERE fullname = ?");
        $stmt4->bind_param("ds", $totalPriceforAll, $name);
        $stmt4->execute();
        $stmt4->close();
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    $stmt->close();
}

// Fetch all entries
if ($name) {
    $stmt5 = $con->prepare("SELECT * FROM register WHERE fullname = ?");
    $stmt5->bind_param("s", $name);
    $stmt5->execute();
    $allEntries = $stmt5->get_result()->fetch_all(MYSQLI_ASSOC);
    $stmt5->close();
}

mysqli_close($con);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IU Concert E-ticketing: Streamlining Access to the June 2024 Kuala Lumpur Show</title>
    <link rel="stylesheet" href="style.css">
	<style>
	table, th, td {
		border: 1px solid black;
		border-radius: 10px;
	}
	
	</style>
    <script>
	//To calculate total price
        function calculateTotalPrice() {
            const priceField = document.querySelector('input[name="price"]');
            const quantityField = document.querySelector('select[name="quantity"]');
            const totalPriceField = document.querySelector('input[name="totalPrice"]');
            const totalPriceForAllField = document.querySelector('input[name="totalPriceforAll"]');

            const price = parseFloat(priceField.value) || 0;
            const quantity = parseInt(quantityField.value) || 0;

            const totalPrice = price * quantity;
            totalPriceField.value = totalPrice.toFixed(2);
            totalPriceForAllField.value = totalPrice.toFixed(2);  // Assuming it's the same as totalPrice for single item update
        }

        function updatePrice() {
            const categorySelect = document.querySelector('select[name="category"]');
            const selectedOption = categorySelect.options[categorySelect.selectedIndex];
            const price = selectedOption.getAttribute('data-price');

            const priceField = document.querySelector('input[name="price"]');
            priceField.value = price;

            calculateTotalPrice();
        }

        document.addEventListener('DOMContentLoaded', () => {
            const quantityField = document.querySelector('select[name="quantity"]');
            const categorySelect = document.querySelector('select[name="category"]');

            quantityField.addEventListener('change', calculateTotalPrice);
            categorySelect.addEventListener('change', updatePrice);

            // Initial calculation
            updatePrice();
        });
    </script>
</head>
<body>
<?php

session_start();
$user = $_SESSION["userId"]; // Pass value from $_SESSION variable to $user to display
	      
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
	 <li><a href="user.php">Ticket</a></li>
         <li><a href="update.php">Profile</a></li>
         <li><a href="logout.php">Log Out</a></li>
            </ul>
        </nav>
    </header>

    <section class="background" id="background">
	<div class="user"><?php echo "Welcome $user !"; ?></div>
    </section>

    <section class="details" id="details">
        <ul class="cards">
            <li class="card">
                <?php if (!$name || !$result->num_rows): ?>
                    <h3>Provide your name:</h3><br><br>
                    <form method="post" action="">
                        Name: <input name="name" type="text" required/>
                        <br>
			<center>
			   <input type="submit" class="button" value="Search"></input>
			</center>
                    </form>
                <?php elseif (!$registerId): ?>
                    <p>Select the entry you want to update:</p>
                    <form method="post" action="">
                        <input name="name" type="hidden" value="<?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?>"/>
                        <select name="registerId">
                            <?php
                            $result->data_seek(0); // Reset result pointer
                            while ($row = $result->fetch_assoc()) {
                                echo '<option value="' . $row['registerId'] . '">';
                                echo 'Category: ' . $row['category'] . ', Quantity: ' . $row['quantity'];
                                echo '</option>';
                            }
                            ?>
                        </select>
                        <br><br>
			<center>
			   <input type="submit" class="button" value="Select"></input>
			</center>
                    </form>
                <?php else: ?>
                    <p>Fill the data below to update your profile:</p><br>
                    <form method="post" action="">
                        <input name="registerId" type="hidden" value="<?php echo htmlspecialchars($registerId, ENT_QUOTES, 'UTF-8'); ?>"/>
                        Name:
                        <input name="name" type="text" value="<?php echo htmlspecialchars($row['fullname'], ENT_QUOTES, 'UTF-8'); ?>" disabled/>
                        <input name="name" type="hidden" value="<?php echo htmlspecialchars($row['fullname'], ENT_QUOTES, 'UTF-8'); ?>"/>
                        <br><br>
                        Email:
                        <input name="email" type="text" value="<?php echo htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8'); ?>"/>
                        <br><br>
                        Date:
                        <select name="date">
                            <option value="2024-06-08T19:30" <?php if ($row['date'] == '2024-06-08T19:30') echo 'selected'; ?>>2024-06-08</option>
                            <option value="2024-06-09T19:30" <?php if ($row['date'] == '2024-06-09T19:30') echo 'selected'; ?>>2024-06-09</option>
                        </select>
                        <br><br>
                        Category:
                        <select name="category">
                            <option value="VVIP" data-price="949" <?php if ($row['category'] == 'VVIP') echo 'selected'; ?>>VVIP (MYR 949)</option>
                            <option value="VIP" data-price="899" <?php if ($row['category'] == 'VIP') echo 'selected'; ?>>VIP (MYR 899)</option>
                            <option value="PS1" data-price="799" <?php if ($row['category'] == 'PS1') echo 'selected'; ?>>PS1 (MYR 799)</option>
                            <option value="PS2" data-price="699" <?php if ($row['category'] == 'PS2') echo 'selected'; ?>>PS2 (MYR 699)</option>
                            <option value="PS3" data-price="599" <?php if ($row['category'] == 'PS3') echo 'selected'; ?>>PS3 (MYR 599)</option>
                            <option value="PS4" data-price="499" <?php if ($row['category'] == 'PS4') echo 'selected'; ?>>PS4 (MYR 499)</option>
                            <option value="PS5" data-price="399" <?php if ($row['category'] == 'PS5') echo 'selected'; ?>>PS5 (MYR 399)</option>
                        </select>
                        <br><br>
                        Price:
                        <input name="price" type="text" value="<?php echo htmlspecialchars($row['price'], ENT_QUOTES, 'UTF-8'); ?>" readonly/>
                        <br><br>
                        Quantity:
                        <select name="quantity">
                            <option value="1" <?php if ($row['quantity'] == '1') echo 'selected'; ?>>1</option>
                            <option value="2" <?php if ($row['quantity'] == '2') echo 'selected'; ?>>2</option>
                            <option value="3" <?php if ($row['quantity'] == '3') echo 'selected'; ?>>3</option>
                            <option value="4" <?php if ($row['quantity'] == '4') echo 'selected'; ?>>4</option>
                        </select>
                        <br><br>
                        Total Price:
                        <input name="totalPrice" type="text" value="<?php echo htmlspecialchars($row['totalPrice'], ENT_QUOTES, 'UTF-8'); ?>" readonly/>
                        <br><br>
			<center>
			   <input name="update2" type="submit" class="button" value="Update"></input>
			   <input name="Submit2" type="submit" class="button" value="Reset"></input>
			</center>
                    </form>
                <?php endif; ?>
            </li>
        </ul>
    </section>

    <?php if (!empty($allEntries)): ?>
    <section class="details" id="details">
        <ul class="cards">
            <li class="card">
                <h3>My Tickets:</h3>
				<br><br>
                <table border="1" style="width:100%">
                    <tr style=" color:white;background-color: black;">
                        <th style="width:10%">Order No</th>
                        <th style="width:15%">Name</th>
                        <th style="width:15%">Email</th>
                        <th style="width:12%">Date</th>
                        <th style="width:10%">Category</th>
                        <th style="width:10%">Price</th>
                        <th>Quantity</th>
                        <th style="width:10%">Total Price</th>
                        <th style="width:10%">Total Price for All</th>
                    </tr>
                    <?php foreach ($allEntries as $entry): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($entry['registerId'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($entry['fullname'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($entry['email'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($entry['date'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($entry['category'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($entry['price'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($entry['quantity'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($entry['totalPrice'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($entry['totalPriceforAll'], ENT_QUOTES, 'UTF-8'); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </li>
        </ul>
    </section>
    <?php endif; ?>
    <section>
    </section>
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
