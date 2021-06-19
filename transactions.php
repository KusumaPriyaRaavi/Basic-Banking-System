<?php echo "<body style='background:url(g.jpg); background-size: cover;'>";?>
<!DOCTYPE html>
<html>
<head>
	<title>All Transactions</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="index.css">
</head>
<style type="text/css">
	th:hover {
			background-color: #f5f5f5;
		}
		h2{
			text-align: center;
		}
		th{
			font-size: 25px;
			text-align: center;
		}
		td{
			font-size: 20px;
			text-align: center;
		}
		table{

			width: 50%;
			height: 100%; 
			line-height: 45px;
			border: 5px solid black;
		}
		tr:hover{

			background-color: #f5f5f5;
		}
			
	</style>
<body>

	<form method="POST" action="index.php">
		<button class="btn" style="float: left;"><i class="fa fa-home"></i> Home</button>
    </form>

	<form method="POST" action="index.php">
		<?php

			include 'db.php';
			$query = "SELECT * FROM transactions";
			$result = mysqli_query($con,$query);

			if(mysqli_num_rows($result) > 0){

				echo "<center><div>";
					echo "<table border='5'>";
						echo "<tr>";
							echo "<th colspan='5'><h2>All Transactions</h2></th>";
						echo "</tr>";
						echo "<t>";
							echo "<th>Sno</th>";
							echo "<th>Sender</th>";
							echo "<th>Receiver</th>";
							echo "<th>Amount</th>";
							echo "<th>Date & Time</th>";
						echo "</t>";

						while ($row=mysqli_fetch_assoc($result)) {

							echo "<tr>
								<td>".$row['sno']."</td>
								<td>".$row['sender']."</td>
								<td>".$row['receiver']."</td>
								<td>".$row['amount']."</td>
								<td>".$row['Date_Time']."</td>
							</tr>";
						}
						echo "</table></div></center>";

			}else{
					echo "0 results";
			mysqli_close($con);
			}

		?>
	</form>

</body>
</html>