<?php
		
	class connect

	{
		private $conn;
		function connection()
		{
		 	$this->conn = new mysqli("localhost","root","","feeder");

			if ($this->conn->connect_error)
			{
    			echo "error";
			}
			return $this->conn;
		}

	}
?>