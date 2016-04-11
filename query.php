<?php
	//error_reporting(0);
	require 'query_method.php';
	
	$email=$_REQUEST["email"];
	$pass=$_REQUEST["pwd"];


	$qm = new methods;

	if(isset($_REQUEST["uid_reg"]))
	{
		$usname=$_REQUEST["uid_reg"];
		$num=$qm->insert($usname,$email,$pass);
		if($num==1)
			header('location: userpage.php');
		else
			header('location: index.php'.'?red=true');
	}
	else
	{

		$num=$qm->login($email,$pass);//login
		//echo $qm->str;
		if($num==1)
			header('location: userpage.php');
		else
			
			header('location: index.php'.'?red=true');
	}	
	
	
		
	
	
	

?>