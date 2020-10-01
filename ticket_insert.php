<?php
    session_start();
    $servername = "localhost";
    $username = "id11812686_niloy";
    $password = "123456789";
    $dbname= "id11812686_bus_ticket";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    
    $bus_id=$_SESSION["bus_id"];
    $email=$_SESSION["email"];
    $date=$_SESSION["date"];
    $seats=$_SESSION["seats"];
    $seat_minus=mysqli_query($conn,"UPDATE bus_info SET Available_seat=Available_seat-'$seats' where bus_id='$bus_id'") or die ("Failed to query database".mysqli_error($conn));
    $fare= mysqli_query($conn,"Select fare from bus_info where bus_id='$bus_id'")or die ("Failed to query database".mysqli_error($conn));
    $row = mysqli_fetch_assoc($fare);
    $total_fare=$row['fare']*$seats;
    $insertQ =  mysqli_query($conn,"INSERT INTO ticket(bus_id, passenger_email, date, seats,total_fare) VALUES ('$bus_id','$email', '$date', '$seats','$total_fare')") or die ("Failed to query database".mysqli_error($conn));
    
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-image: url("http://imagine-mexico.com/official-id-now-required-on-long-distance-bus-trips-in-mexico/");
  background-color: #cccccc;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>

<h2 style="margin-left:auto;margin-right:auto;display:block;margin-top:1%;margin-bottom:0%;text-align:center;">You have successfully booked your ticket!</h2>
<h2 style="margin-left:auto;margin-right:auto;display:block;margin-top:1%;margin-bottom:0%;text-align:center;">Thank you for using "EasyBooking Bus Ticket"</h2>
<p><b>"EasyBooking Bus Ticket" is an online ticketing service. We do not operate any buslines of our own.</b></p>

<p><b><U>Our liabilities are limited to:</U></b></p>

<p>1. Issuing a valid ticket for its network of bus operators.</p>
<p>2. Providing refund and support in the event of cancellation.</p>
<p><b><U>Our liability does not include the following:</U></b></p>

<p>1. The bus operator's bus not departing / reaching on time.</p>
<p>2. The bus operator's employees being rude.</p>
<p>3. The bus operator's bus seats etc. not being up to the customer's expectation.</p>
<p>4. The bus operator cancelling the trip, changing the type of bus or changing the seat.</p>
<p>5. The baggage of the customer getting lost / stolen /damaged.</p>
<p>6. The customer waiting at the wrong boarding point.</p>
<p>7. The bus operator changing the boarding point and/or using a pick-up vehicle at the boarding point to take customers to the bus departure point.</p>
<p>8. Passengers are requested to arrive at the boarding point 20 minutes prior to bus departure. If not, the ticket is deemed cancelled.</p>

<p>9. Passengers need to furnish a copy of the ticket at boarding or they may not be allowed to board the bus.</p>

<p>10. The bus operator reserves the right to cancel/delay trips, change buses and change seats due to unavoidable reasons.</p>

<p>11. Luggage policy is as per operator’s policies. The operator or "EasyBooking Bus Ticket" does not bear any consequences for the passenger carrying illegal goods.</p>

<p><b><U><font color="red">12. For cancelling a ticket booked at EasyBooking Bus Ticket, the passenger must call our call centre on 11115 at least 6 hours prior trip departure.</font></U></b></p>
<button onclick="window.location.href ='search.php';" style="margin-left:auto;margin-right:auto;display:block;margin-top:2%;margin-bottom:0%;text-align:center;">Enter to main menu!</button>


<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
</body>
</html>