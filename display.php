
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="display.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="index.css">
	<title>Customer Details</title>
	<style type="text/css">
		.btn:hover {
            background-color: white;
            color: black;
          }
	</style>

	<?php

		include 'db.php';
		session_start();
		$data=$_POST['Name'];

		$query="select * from customers where name='$data'";
		$result=mysqli_query($con,$query);

		if(!mysqli_query($con,$query)){
			die("Failed ".mysqli_error($con));
		}
		$row = mysqli_query($con,$query);
		$result = mysqli_fetch_array($row);
		$uname = $result["name"];
		$id = $result["sno"];
		$email = $result["email"];
		$balance = $result["balance"];


	 ?>
</head>
<body style="background-color: #5E001F">

	

    <h2 style="color: white;text-align: center;letter-spacing: 3px;text-shadow: 3px 4px blue;font-size: 50px;">MONEY TRANSFER</h2>
	
	
	<div class="split left">

		<form action="view_customers.php" method="POST">
			<button class="btn" style="float: left;">&laquo; Previous</button>
		</form>
		

		<div class="centered">
			
			<center><h3>SENDER</h3></center>
			<p><b>&nbsp;User ID :&nbsp;</b><?php echo $id ?></p>
			<p><b>&nbsp;User Name :&nbsp;</b><?php echo $uname ?></p>
			<p><b>&nbsp;Email :&nbsp;</b><?php echo $email ?></p>
			<p><b>&nbsp;Current Balance :&nbsp;</b><?php echo $balance ?></p>
		</div>
		
	</div>
	<br><br><br>
	<div class="split right">
		<form action="index.php" method="POST">
			<button class="btn" style="float: right;"><i class="fa fa-home"></i> Home</button>
		</form>

<div class="centered">
		<form method="POST" action="update_amount.php">
						<center><h3>RECEIVER</h3></center>
						<b>&nbsp;Sender :&nbsp;</b><input disabled type="text" name="sender" id="sender" value='<?php echo "$uname";?>'>
						<br><br>

						<b>&nbsp;Select Receiver:&nbsp;</b>
		                <select name="receiver" id="receiver" required>
		                <option>Select Receiver</option>
		                	<?php
		                		include 'db.php';
		              		    $res = mysqli_query($con, "SELECT * FROM customers WHERE name!='$uname'");
		                		while($row = mysqli_fetch_array($res)) {
		                    		echo("<option> "."  ".$row['name']."</option>");
		               			 }
		               		?>
		           
						</select> 
						<br><br>

						<b>&nbsp;Amount :&nbsp;</b>
						<input type="number" name="transfer" min="1" required>
						<br><br><br>
						<div class="container"><center><?php  
						
						echo "<button name='sender' value=$data class='btn'>Send Money</button>";?>
						
						</center>
				
					</div>

					
				</form>
				</div>

	</div>
	
</body>
</html>