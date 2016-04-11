<?php

class methods
{
	 private $conn;
 
    //constructor
    function __construct()
    {
        require_once 'connection.php';
        $db = new connect();
        $this->conn = $db->connection();
    }
	function insert($usname,$email,$pass)
	{			
		$q="insert into register values('$usname','$email','$pass')";

		if($this->conn->query($q)==TRUE)
		{
			return 1;
		}
		else
		{
			return 0;
		}
		$this->conn->close();

	}
	function login($email,$pass)
	{
		$q="select * from register where email = '$email' AND password='$pass'";
		$str=$this->conn->query($q);
		
		if(mysqli_num_rows($str)>0)
		{
			return 1;
		}
		else
		{
			return 0;
		}
		$this->conn->close();
	}
}

?>