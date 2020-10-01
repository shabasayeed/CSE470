<table style="width:70%">
<?php
    //Ob_start();
    session_start();
    //include('/$dbcon.php');
    $servername = "localhost";
    $username = "id11812686_niloy";
    $password = "123456789";
    $dbname= "id11812686_bus_ticket";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $email=$_SESSION["email"];
    //echo $email;
    $sql=mysqli_query($conn, "SELECT * from ticket,bus_info where ticket.passenger_email='$email' and ticket.bus_id=bus_info.bus_id") or die ("Failed to query database".mysqli_error($conn));
    $row= mysqli_fetch_array($sql);
    
    $h1= "Ticket ID";
    $h2= "Bus ID";
    $h3= "Passenger Email";
    $h4= "Date";
    $h5= "Seats";
    $h6= "Total Fare";
    $h7= "Starting Location";
    $h8= "Destination";
    //if(count( mysqli_fetch_array($sql))==0){echo "Empty";}
   // else{
    echo "<tr><th>".$h1."</th><th>".$h2."</th><th>".$h3."</th><th>".$h4."</th><th>".$h5."</th><th>".$h6."</th><th>".$h7."</th><th>".$h8."</th></tr>"; 
    
    while($row = mysqli_fetch_array($sql)){
    // while(isset($row)){
	    echo
            "<tr><td>".$row["ticket_id"]."</td><td>".$row["bus_id"]."</td><td>".$row["passenger_email"]."</td><td>".$row["date"]."</td><td>".$row["seats"]."</td><td>".$row["total_fare"]."</td><td>".$row["starting_location"]."</td><td>".$row["destination"]."</td></tr>";
	}
?>
</table>
<form action="afterCancel.php" method="post">
      <hr>
      <label for="bus_id" style="margin-left:auto;margin-right:auto;display:block;margin-top:2%;margin-bottom:0%"><b><center>Please type ticket ID for deleting any booking!</center></b></label>
      <input style="margin-left:auto;margin-right:auto;display:block;margin-top:2%;margin-bottom:0%" type="text" placeholder="Enter ticket ID" name="ticket_id_no" required>
      <button onclick="document.getElementById('id01').style.display='block'" style="margin-left:auto;margin-right:auto;display:block;margin-top:2%;margin-bottom:0%" type="submit" name="searchtn">Submit</button>
      <button onclick="window.location.href = 'search.php';" style="margin-left:auto;margin-right:auto;display:block;margin-top:0.5%;margin-bottom:0%" class="button button3">Back to main menu!</button>
</form>
</body>
</html>
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
.button2 {background-color: #008CBA;} /* Blue */
.button3 {background-color: #f44336;} /* Red */ 
.button4 {background-color: #e7e7e7; color: black;} /* Gray */ 
.button5 {background-color: #555555;} /* Black */
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