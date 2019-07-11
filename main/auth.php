<?php
	//Start session
	session_start();
	include('../connect.php');
	$discount = $db->prepare("SELECT discount FROM discount WHERE id = 2");
	$discount->execute();
	$discount = $discount->fetch();

	$CurrentDate = date("Y/m/d");
	$dueDate = $discount['discount'];

	if($CurrentDate > $dueDate)
	{
		// echo 'clear your dues';
		header('location: index.php');
	}
	else
	{
		//Check whether the session variable SESS_MEMBER_ID is present or not
		if(!isset($_SESSION['SESS_MEMBER_ID']) || (trim($_SESSION['SESS_MEMBER_ID']) == '')) {
			header("location: ../index.php");
			exit();
		}
	}


?>