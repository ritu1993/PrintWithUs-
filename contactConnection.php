<?php
	$firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $query = $_POST['query'];
	

	// Database connection
	$conn = new mysqli('localhost','root','ritu','printwithus');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
        $stmt = $conn->prepare("insert into contact(firstName, lastName, email, query) values(?, ?, ?, ?)");
		$stmt->bind_param("ssss", $firstName, $lastName, $email, $query);
        $stmt->execute();
        header('location: thankyouContact.php');
		$stmt->close();
		$conn->close();
    }
?>