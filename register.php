<?php
session_start();

if (isset($_SESSION["userId"])) {
    $user = $_SESSION["userId"]; // Pass value from $_SESSION variable to $user to display

    $con = mysqli_connect("localhost", "root", "", "concert") or die("Cannot connect to server." . mysqli_error($con));

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $name = mysqli_real_escape_string($con, $_POST["name"]);
        $email = mysqli_real_escape_string($con, $_POST["email"]);
        $date = mysqli_real_escape_string($con, $_POST["date"]);
        $category = array();
        $price = array();
        $quantity = array();
        $totalPrice = array();
        $totalPriceforAll = 0;

        if (isset($_POST["quantity-date1"])) {
            foreach ($_POST["quantity-date1"] as $key => $value) {
                $category[] = mysqli_real_escape_string($con, $key);
                $price[] = mysqli_real_escape_string($con, $_POST["price-date1"][$key]);
                $quantity[] = intval($value);
                $totalPrice[] = intval($value) * floatval($_POST["price-date1"][$key]);
            }
        }

        if (isset($_POST["quantity-date2"])) {
            foreach ($_POST["quantity-date2"] as $key => $value) {
                $category[] = mysqli_real_escape_string($con, $key);
                $price[] = mysqli_real_escape_string($con, $_POST["price-date2"][$key]);
                $quantity[] = intval($value);
                $totalPrice[] = intval($value) * floatval($_POST["price-date2"][$key]);
            }
        }
        $totalPriceforAll = array_sum($totalPrice);

        // Check if user has already registered for 4 tickets
        // Check if user has already registered for 4 categories
        $check_tickets_sql = "SELECT COUNT(DISTINCT category) as count FROM register WHERE username =?";
        $check_tickets_stmt = $con->prepare($check_tickets_sql);
        $check_tickets_stmt->bind_param("s", $user);
        $check_tickets_stmt->execute();
        $check_tickets_stmt->bind_result($count);
        $check_tickets_stmt->fetch();
        $check_tickets_stmt->close();

        if ($count >= 4) {
            echo "<script>alert('You have already registered for 4 categories.'); window.location.href='user.php';</script>";
            exit();
        }

        // Check quota
        for ($i = 0; $i < count($category); $i++) {
            $quota_field = "quota_" . strtolower(str_replace(" ", "", $category[$i]));
            $check_quota_sql = "SELECT $quota_field FROM event_quotas WHERE event_date =?";
            $check_quota_stmt = $con->prepare($check_quota_sql);
            $check_quota_stmt->bind_param("s", $date);
            $check_quota_stmt->execute();
            $check_quota_stmt->bind_result($quota);
            $check_quota_stmt->fetch();
            $check_quota_stmt->close();

            if ($quota < $quantity[$i]) {
                echo "<script>alert('Sorry, the quota for " . $category[$i] . " is full.'); window.location.href='user.php';</script>";
                exit();
            }
        }

        // Insert into register table
        $sql_result = true;
        for ($i = 0; $i < count($category); $i++) {
            if ($quantity[$i] > 0) {
                $insert_sql = "INSERT INTO register VALUES (null, '$user','$name', '$email', '$date', '$category[$i]', '$price[$i]', '$quantity[$i]', '$totalPrice[$i]', '$totalPriceforAll')";
                $sql_result = $sql_result && mysqli_query($con, $insert_sql) or die("Error in inserting data due to " . mysqli_error($con));
            }
        }

        if ($sql_result) {
            // Update quota
            for ($i = 0; $i < count($category); $i++) {
                $quota_field = "quota_" . strtolower(str_replace(" ", "", $category[$i]));
                $update_quota_sql = "UPDATE event_quotas SET $quota_field = $quota_field -? WHERE event_date =?";
                $update_quota_stmt = $con->prepare($update_quota_sql);
                $update_quota_stmt->bind_param("is", $quantity[$i], $date);
                $update_quota_stmt->execute();
                $update_quota_stmt->close();
            }

            // Display success message only if at least one category is selected
            $hasSelectedCategory = false;
            foreach ($quantity as $qty) {
                if ($qty > 0) {
                    $hasSelectedCategory = true;
                    break;
                }
            }
            if ($hasSelectedCategory) {
                echo "<script>alert('Congratulations. You have successfully gotten the ticket!'); window.location.href='user.php';</script>";
                exit();
            } else {
                echo "<script>alert('Please select at least one category.'); window.location.href='user.php';</script>";
                exit();
            }
        } else {
            echo "Error in inserting new data";
            echo "<script>alert('Error in inserting data. Please try again'); window.location.href='user.php';</script>";
            exit();
        }
    }
} else {
    echo "No session exists or session has expired. Please log in again.";
}

mysqli_close($con);
?>
