<html>
	<head>
		<title>Policy Actions</title>
	</head>
	<?php
	session_start(); //starts the session
	if($_SESSION['username']){ //checks if user is logged in
	}
	else{
		header("location:home_page.php"); // redirects if user is not logged in
	}
	$username = $_SESSION['username']; //assigns user value
	$id_exists = false;
	?>
	<body>
		<a href="logout.php">Click here to logout</a><br/><br/>
		<a href="policy_holder_home.php">Return to Home page</a>
		<h2 align="center">Currently Selected Policy</h2>
		<table width="100%" border="1px" class="table table-inverse">
		  <tr>
		    <th>ID</th>
		    <th>Term Start Date</th>
		    <th>Term End Date</th>
		    <th>Policy Type</th>
		    <th>Policy Coverage</th>
		    <th>Policy Status</th>
		    <th>Premium</th>		    
		  </tr>
			<?php
				if(!empty($_GET['id']))
				{
					$policy_id = $_GET['id'];
					$_SESSION['policy_id'] = $policy_id;
					$id_exists = true;
					mysql_connect("localhost", "root","") or die(mysql_error()); //Connect to server
					mysql_select_db("sample_dbproject_db") or die("Cannot connect to database"); //connect to database
					$query = mysql_query("Select * from policy Where id='$policy_id'"); // SQL Query
					$count = mysql_num_rows($query);
					if($count > 0)
					{
						while($row = mysql_fetch_array($query))
						{
						  print "<tr>";
				          print '<td align="center">'.$row['id']."</td>";
				          print '<td align="center">'.$row['start_date']."</td>";
				          print '<td align="center">'.$row['end_date']."</td>";
				          print '<td align="center">'.$row['type']."</td>";
				          print '<td align="center">'.$row['coverage']."</td>";
				          print '<td align="center">'.$row['policy_status']."</td>";
				          print '<td align="center">'.$row['premium']."</td>";					                            			          
				          print "</tr>";
						}
					}
					else
					{
						$id_exists = false;
					}
				}
			?>
		</table>
		<br/>
		<table width="25%" border="1px" class="table table-inverse">
	      <tr><th><a href="view_personal_details.php">Personal Details</a></th></tr>	      
	      <tr><th><a href="view_item_details.php">Items on Policy</a></th></tr>
	      <tr><th><a href="raise_claim.php">Raise Claim</a></th></tr>
	      <tr><th><a href="provide_feedback.php">Provide Feedback</a></th></tr>      
	  	</table> 
	  </body>
	  </html>