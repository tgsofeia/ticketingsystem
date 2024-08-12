<!DOCTYPE html>
<html>
<head>
    <title>User</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IU Concert E-ticketing: Streamlining Access to the June 2024 Kuala Lumpur Show</title>
    <link rel="stylesheet" href="style.css">
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
	  
<section class="details" id="details" >
    <ul class="cards">
       <li class="card">
         <div class="box1">
           <div style="position: relative;right: 20px;"><img src="poster.jpeg" alt="img"></div>
           <div><h2>2024 IU H.E.R.E.H WORLD TOUR CONCERT IN KUALA LUMPUR</h2>
               <p>SAT,SUN • JUNE 8,9 • 7:30 PM</p>
               <p>AXIATA ARENA, KUALA LUMPUR</p></div>
           </div>
           <div><img src="seat.jpeg" alt="img" width="100%" height="auto"></div>
       </li>
    </ul>
</section>

<section class="portfolio" id="ticket" >
    <ul class="cards" >
        <li class="card">
            <br><br>
            <div>
                <h2>2024 IU H.E.R.E.H WORLD TOUR CONCERT IN KUALA LUMPUR</h2>
                <p>AXIATA ARENA, KUALA LUMPUR</p>
            </div>
            <p><i> Choose your preferred date and categories </i></p> <br><br>
            <div class="form-wrapper">
                <div class="container">
                    <form method="post" action="register.php">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" required>
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>

                        <br><br><label>Select Date:</label><br>
                        <input type="radio" id="date1" name="date" value="2024-06-08T19:30" required>
                        <label for="date1">June 8, 2024 - 7:30 PM</label><br>
                        <input type="radio" id="date2" name="date" value="2024-06-09T19:30" required>
                        <label for="date2">June 9, 2024 - 7:30 PM</label><br><br>

                        <div id="categories-date1" class="categories" style="display:none;">
                            <label>June 8, 2024 - 7:30 PM Categories:</label>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>VVIP</td>
                                        <td>MYR 949</td>
                                        <td>
                                            <input type="number" name="quantity-date1[VVIP]" min="0" max="4" value="0" data-price="949" >
                                            <input type="hidden" name="price-date1[VVIP]" value="949" required>
                                        </td><td><span id="total-price-date1-VVIP">Total Price (VVIP): MYR 0</span></td>
                                    </tr>
                                    <tr>
                                        <td>VIP</td>
                                        <td>MYR 899</td>
                                        <td>
                                            <input type="number" name="quantity-date1[VIP]" min="0" max="4" value="0" data-price="899" >
                                            <input type="hidden" name="price-date1[VIP]" value="899" required>
                                        </td><td><span id="total-price-date1-VIP">Total Price (VIP): MYR 0</span></td>
                                    </tr>
                                    <tr>
                                        <td>PS1</td>
                                        <td>MYR 799</td>
                                        <td>
                                            <input type="number" name="quantity-date1[PS1]" min="0" max="4" value="0" data-price="799" >
                                            <input type="hidden" name="price-date1[PS1]" value="799" required>
                                        </td><td><span id="total-price-date1-PS1">Total Price (PS1): MYR 0</span></td>
                                    </tr>
                                    <tr>
                                        <td>PS2</td>
                                        <td>MYR 699</td>
                                        <td>
                                            <input type="number" name="quantity-date1[PS2]" min="0" max="4" value="0" data-price="699" >
                                            <input type="hidden" name="price-date1[PS2]" value="699" required>
                                        </td><td><span id="total-price-date1-PS2">Total Price (PS2): MYR 0</span></td>
                                    </tr>
                                    <tr>
                                        <td>PS3</td>
                                        <td>MYR 599</td>
                                        <td>
                                            <input type="number" name="quantity-date1[PS3]" min="0" max="4" value="0" data-price="599" >
                                            <input type="hidden" name="price-date1[PS3]" value="599" required>
                                        </td><td><span id="total-price-date1-PS3">Total Price (PS3): MYR 0</span></td>
                                    </tr>
                                    <tr>
                                        <td>PS4</td>
                                        <td>MYR 499</td>
                                        <td>
                                            <input type="number" name="quantity-date1[PS4]" min="0" max="4" value="0" data-price="499" >
                                            <input type="hidden" name="price-date1[PS4]" value="499" required>
                                        </td><td><span id="total-price-date1-PS4">Total Price (PS4): MYR 0</span></td>
                                    </tr>
                                    <tr>
                                        <td>PS5</td>
                                        <td>MYR 399</td>
                                        <td>
                                            <input type="number" name="quantity-date1[PS5]" min="0" max="4" value="0" data-price="399" >
                                            <input type="hidden" name="price-date1[PS5]" value="399" required>
                                        </td><td><span id="total-price-date1-PS5">Total Price (PS5): MYR 0</span></td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>

                        <div id="categories-date2" class="categories" style="display:none;">
                            <label>June 9, 2024 - 7:30 PM Categories:</label>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>VVIP</td>
                                        <td>MYR 949</td>
                                        <td>
                                            <input type="number" name="quantity-date2[VVIP]" min="0" max="4" value="0" data-price="949" >
                                            <input type="hidden" name="price-date2[VVIP]" value="949" required>
                                        </td><td><span id="total-price-date2-VVIP">Total Price (VVIP): MYR 0</span></td>
                                    </tr>
                                    <tr>
                                        <td>VIP</td>
                                        <td>MYR 899</td>
                                        <td>
                                            <input type="number" name="quantity-date2[VIP]" min="0" max="4" value="0" data-price="899" >
                                            <input type="hidden" name="price-date2[VIP]" value="899" required>
                                        </td><td><span id="total-price-date2-VIP">Total Price (VIP): MYR 0</span></td>
                                    </tr>
                                    <tr>
                                        <td>PS1</td>
                                        <td>MYR 799</td>
                                        <td>
                                            <input type="number" name="quantity-date2[PS1]" min="0" max="4" value="0" data-price="799" >
                                            <input type="hidden" name="price-date2[PS1]" value="799" required>
                                        </td><td><span id="total-price-date2-PS1">Total Price (PS1): MYR 0</span></td>
                                    </tr>
                                    <tr>
                                        <td>PS2</td>
                                        <td>MYR 699</td>
                                        <td>
                                            <input type="number" name="quantity-date2[PS2]" min="0" max="4" value="0" data-price="699" >
                                            <input type="hidden" name="price-date2[PS2]" value="699" required>
                                        </td><td><span id="total-price-date2-PS2">Total Price (PS2): MYR 0</span></td>
                                    </tr>
                                    <tr>
                                        <td>PS3</td>
                                        <td>MYR 599</td>
                                        <td>
                                            <input type="number" name="quantity-date2[PS3]" min="0" max="4" value="0" data-price="599" >
                                            <input type="hidden" name="price-date2[PS3]" value="599" required>
                                        </td><td><span id="total-price-date2-PS3">Total Price (PS3): MYR 0</span></td>
                                    </tr>
                                    <tr>
                                        <td>PS4</td>
                                        <td>MYR 499</td>
                                        <td>
                                            <input type="number" name="quantity-date2[PS4]" min="0" max="4" value="0" data-price="499" >
                                            <input type="hidden" name="price-date2[PS4]" value="499" required>
                                        </td><td><span id="total-price-date2-PS4">Total Price (PS4): MYR 0</span></td>
                                    </tr>
                                    <tr>
                                        <td>PS5</td>
                                        <td>MYR 399</td>
                                        <td>
                                            <input type="number" name="quantity-date2[PS5]" min="0" max="4" value="0" data-price="399" >
                                            <input type="hidden" name="price-date2[PS5]" value="399" required>
                                        </td><td><span id="total-price-date2-PS5">Total Price (PS5): MYR 0</span></td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>

                        <br><br>
                        <div id="total-price-container">
                            <label>Total Price:</label>
                            <span id="total-price">MYR 0</span>
                        </div>
			<center>
			   <input type="submit" class="button" value="register"></input>
			</center>
                    </form>
                </div>
            </div>
        </li>
    </ul>
</section>
<section>
</section>

<footer>
    <div>
        <span>Copyright © 2024 All Rights Reserved</span>
    </div>
</footer>
<script src="register.js"></script>
      <?php
      } 

      else {
           echo "No session exists or session has expired. Please log in again.";
      }
?>
</body>
</html>
