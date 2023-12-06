<?php


	$servername = $_SERVER['RDS_HOSTNAME'];
	$username = $_SERVER['RDS_USERNAME'];
	$password = $_SERVER['RDS_PASSWORD'];
	$dbname = $_SERVER['RDS_DB_NAME'];

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	echo "Connected successfully";


	$env = getenv(); // Retrieves all server environment variables
    echo "*". php_uname();
    // Display server environment variables
    foreach ($env as $key => $value) {
        echo "$key: $value <br>";
    }
	
?>