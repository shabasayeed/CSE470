<?php
session_start();
?>
<table style="width:70%">
<?php
    $servername = "localhost";
    $username = "id11812686_niloy";
    $password = "123456789";
    $dbname= "id11812686_bus_ticket";
    
    $h1= "Starting Location";
    $h2= "Destination";
    $h3= "Bus ID";
    $h4= "Bus Name";
    $h5= "Departure Time";
    $h6= "Arrival Time";
    $h7= "Available Seat";
    $h8= "Bus Type";
    $h9= "Fare of each seat";
    $h11="Journey Date";
    $h10= "Total Fare";
    
    
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error); } 
    if(isset($_POST['searchbtn'])){
        $starting_location= $_POST ['starting_location'];
    	$destination= $_POST ['destination'];
    	$date=$_POST['date'];
    	$_SESSION["date"]=$date;
    	$seats=$_POST['seats'];
    	$_SESSION["seats"]=$seats;
    	$starting_location = stripcslashes($starting_location);
    	$destination = stripcslashes($destination);
    	$starting_location = mysqli_real_escape_string($conn, $starting_location);
    	$destination = mysqli_real_escape_string($conn, $destination);
    	
    	$search = mysqli_query($conn, "select * from bus_info where starting_location = '$starting_location' and destination='$destination' and available_seat>'$seats'") or die ("Failed to query database".mysqli_error($conn));
    	echo "<tr><th>".$h1."</th><th>".$h2."</th><th>".$h3."</th><th>".$h4."</th><th>".$h5."</th><th>".$h6."</th><th>".$h7."</th><th>".$h8."</th><th>".$h9."</th><th>".$h10."</th><th>".$h11."</th></tr>"; 
    	
    	while($row = mysqli_fetch_array($search)){
        	if($row['starting_location']==$starting_location && $row['destination']== $destination){ 
        	    echo
                       "<tr><td>".$row["starting_location"]."</td><td>".$row["destination"]."</td><td>".$row["bus_id"]."</td><td>".$row["Bus_name"]."</td><td>".$row["dept_time"]."</td><td>".$row["drop_of_time"]."</td><td>".$row["Available_seat"]."</td><td>".$row["type"]."</td><td>".$row["fare"]."</td><td>".$row['fare']*$seats."</td><td>".$date."</td></tr>";
        	}
    	}
        
    }
    
?>
</table>
<form action="confirm.php" method="post">
      <!--<p>Please write the prefered BUS_ID for travel.</p>-->
      <hr>
      <label for="bus_id" style="margin-left:auto;margin-right:auto;display:block;margin-top:2%;margin-bottom:0%"><b><center>Please type your preferable BUS_ID for travel!</center></b></label>
      <input style="margin-left:auto;margin-right:auto;display:block;margin-top:2%;margin-bottom:0%" type="text" placeholder="Enter Bus ID" name="bus_id" required>
      <button onclick="document.getElementById('id01').style.display='block'" style="margin-left:auto;margin-right:auto;display:block;margin-top:2%;margin-bottom:0%" type="submit" name="searchtn">SUBMIT</button>
      <button onclick="window.location.href = 'search.php';" style="margin-left:auto;margin-right:auto;display:block;margin-top:.5%;margin-bottom:0%" class= "button button3">CANCEL</button>
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