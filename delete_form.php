<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IU Concert E-ticketing: Streamlining Access to the June 2024 Kuala Lumpur Show</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding-top: 150px; /* Adjust this value based on your header height */
            box-sizing: border-box;
            background-image: url('i.jpg');
            background-size: cover;
            background-position: center;
            color: white;
        }
        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 5;
            background: hsl(292deg 84% 5% / 50%);
            padding: 10px 0;
        }
        .navbar {
            display: flex;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 10px;
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
            color: white;
            text-decoration: none;
        }
        .delete-ticket {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 500px;
            max-width: 100%;
            background-color: #fff;
            color: #000;
            animation: fadeIn 1s ease-in-out;
            margin: 0 auto;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .delete-ticket h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #512da8;
            position: relative;
        }
        .delete-ticket h1::before {
            content: "🎫";
            position: absolute;
            left: -40px;
            top: 0;
            font-size: 24px;
        }
        .delete-ticket form {
            display: flex;
            flex-direction: column;
            width: 100%;
        }
        .delete-ticket label {
            margin-bottom: 5px;
            font-weight: bold;
            color: #512da8;
        }
        .delete-ticket input[type="text"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-top: 10px;
            margin-bottom: 20px;
            border: none;
            border-radius: 5px;
            font-size: 1em;
            border: 0.5px solid black;
        }
        .delete-ticket button[type="submit"] {
            background-color: #ff0080;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .delete-ticket button[type="submit"]:hover {
            background-color: #000;
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
            margin: 0 auto;
            text-align: left;
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

<div class="delete-ticket">
    <h1>Delete Participants by ID</h1>
    <form action="delete.php" method="post">
        <label for="registerId">Enter Register ID to Delete:</label>
        <input type="text" id="registerId" name="registerId" required>
        <button type="submit">Delete</button>
    </form>
</div>
<footer>
    <div>
        <span>Copyright © 2024 All Rights Reserved</span>
    </div>
</footer>
<?php
} else {
    echo "No session exists or session has expired. Please log in again.";
}
?>

</body>
</html>
