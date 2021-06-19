<?php echo "<body style='background:url(bg.jpg); background-size: cover;'>";?>
<!DOCTYPE html>
<html>
    <head>
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    	  <link rel="stylesheet" type="text/css" href="index.css">
    	 <title>Home Page</title>
    </head>
    <body>
        <h2 style="color: white;text-align: center;letter-spacing: 3px;text-shadow: 3px 4px blue;font-size: 50px;">Sparks Banking System</h2>
        <div class="row">

          	<div class="column">
          		<img src="b.png" width="600" height="500">
          	</div>

          	<div class="column">
          	<form method="POST" action="view_customers.php">
            		<div class="container">
            			 <div class="card" style="width:200px;margin-left: 200px;margin-top: 40px;margin-bottom: 50px;">
              			<img class="card-img-top" src="b6.jpg" alt="Customers" >
                			<div class="card-body">
                  				<center><button class="btn">View Customers</button></center>
               				</div>
            		    </div>
          	    </div>
          	</form>
          	<form method="POST" action="transactions.php">
            		<div class="container">
            			 <div class="card" style="width:200px; margin-left: 200px; margin-top: 50px;">
              			<img class="card-img-top" src="pic6.jpg" alt="Transactions">
                			<div class="card-body">
                  				<center><button class="btn">All Transactions</button></center>
               				</div>
            		    </div>

          	    </div>
          	</form>
          </div>
        </div>
      </body>

</html>
