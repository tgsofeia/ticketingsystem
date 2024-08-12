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
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 20px;
            box-sizing: border-box;
            background-image: url('i.jpg'); /* Set background image */
            background-size: cover; /* Cover the entire background */
            background-position: center; /* Center the background image */
            color: white;
            padding-top: 60px; /* Adjusted padding for fixed header */
        }
        
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

    .search-ticket {
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 450px;
    max-width: 100%;
    animation: fadeIn 1s ease-in-out;
    background-color: #fff;
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
}

        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        .search-ticket h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #512da8;
            position: relative;
        }
        
        .search-ticket h1::before {
            content: "🎫";
            position: absolute;
            left: -40px;
            top: 0;
            font-size: 24px;
        }
        
        .search-ticket form {
            display: flex;
            flex-direction: column;
        }
        
        .search-ticket label {
            margin-bottom: 5px;
            font-weight: bold;
            color: #512da8;
        }
        
        .search-ticket input[type="text"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-top: 10px;
            margin-bottom: 20px;
            border: 0.5px solid black; /* Adjusted border thickness */
            border-radius: 5px;
            font-size: 1em;
        }

        .search-ticket input[type="submit"] {
            background-color: #ff0080;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        
        .search-ticket input[type="submit"]:hover {
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

    <div class="search-ticket">
        <h1>Search Registered Participants</h1>
        <form action="search_user.php" method="post">
            <label for="registerId">Register ID:</label>
            <input type="text" id="event_id" name="registerId" required>
            <input type="submit" value="Search">
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
