<?php
	$conn = new mysqli("localhost", "root", "");
if($conn->select_db("webapp") )
		//echo "Connection complete!!!";
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
?>