<?php

	class connect

	{
		$conn = new mysqli("localhost","root","","feeder");

		function __construct()
		{
			if ($conn->connect_error)
			{
    			die("Connection failed: " . $conn->connect_error);
			}	
			
		}

		function insert($usname,$email,$pass)
		{
			

			$query="insert into register values('"+$usname+"','"+$email+"','"+$password+"')";

			$conn->query($query);

			if($conn->query($query)===TRUE)
				return 1;
			else
				return 0;
			$conn->close();

		}
	}
?>