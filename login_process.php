<?php
    session_start();
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
    
    if(isset($_POST['login_submit'])){
        $email= $_POST ['email'];
    	$pass= $_POST ['password'];
    	$email = stripcslashes($email);
    	$pass = stripcslashes($pass);
    	$email = mysqli_real_escape_string($conn, $email);
    	$pass = mysqli_real_escape_string($conn, $pass);
    	//mysql_connect("localhost", "root", "");
    	//mysql_select_db("bus_ticket");
    	$result = mysqli_query($conn, "select * from user where email = '$email' and password='$pass'") or die ("Failed to query database".mysqli_error($conn));
    	$row= mysqli_fetch_array($result);
    	if($row['email']==$email && $row['password']== $pass){
    	    $_SESSION["email"]=$email;
    	    header('Location: search.php');
    		//echo "Login success!!! Welcome ".$row['username'];
    	} else{
    		echo "Failed to login! Try again!";
    	}
        
    }
	
?>