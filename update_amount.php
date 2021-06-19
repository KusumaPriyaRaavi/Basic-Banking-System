<?php
	echo "<body style='background:url(g.jpg); background-size: cover;'>";
	session_start();

	$con=mysqli_connect("localhost","root","");
	$db=mysqli_select_db($con,"bank");

	$sender = $_POST["sender"];
	$receiver = $_POST["receiver"];

	// Sender Amount 

	$sql = "SELECT balance FROM customers WHERE name = '$sender'";
	if(!mysqli_query($con,$sql))
	{
		echo "<script type='text/javascript'>alert('Data Invalid')</script>";
		die("");
	}

	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($result);
	$sender_amount = $row["balance"];

	// Receiver Amount

	$sql = "SELECT balance FROM customers WHERE name = '$receiver'";
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($result);
	$receiver_amount = $row["balance"];

	session_destroy();

	$amount = $_POST["transfer"];

	if($sender_amount >= $amount){

		$amount_of_sender = $sender_amount - $amount;
		$sql = "UPDATE customers set balance = $amount_of_sender where name = '$sender'";
		$result = mysqli_query($con,$sql);

		$amount_of_receiver = $receiver_amount + $amount;
		$sql = "UPDATE customers set balance = $amount_of_receiver where name = '$receiver'";
		$result = mysqli_query($con,$sql);

		$sql = "INSERT into transactions(sender,receiver,amount,Date_Time) values('$sender','$receiver',$amount,now())";
		$result = mysqli_query($con,$sql);

		$message = "Transaction Successful";
		echo "<script type='text/javascript'>alert('$message')</script>";

		include 'view_customers.php';

	}else{

		$message = "Insufficient Balance";
		echo "<script type=text/javascript>alert('$message')</script>";

		include 'view_customers.php';

	}
?>