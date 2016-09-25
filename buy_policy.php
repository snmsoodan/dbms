<?php
   session_start(); //starts the session
   if($_SESSION['user']){ // checks if the user is logged in  
   }
   else{
      header("location: home_page.php"); // redirects if user is not logged in
}
?>

<?php
   $username = $_SESSION['user']; //assigns user value    
   $policy_id = $_SESSION['policy_id']; //assigns user value    

    mysql_connect("localhost", "root","") or die(mysql_error()); //Connect to server
    mysql_select_db("sample_dbproject_db") or die("Cannot connect to database"); //Connect to database    
    $person_details = mysql_query("select * from person where username='$username'");
?>    
<html><head>Buy Policy</head>
<body>
<p>	
<table border="2px" align="center" width="100%">
	<caption><h2>Policy Holder Details</h2></caption>
<tr>
<th width="25%">Name</th>
<th width="25%">Phone</th>
<th width="25%">Email</th>
<th width="25%">Address</th>
<tr>    
<?php    
        while($row = mysql_fetch_array($person_details))
        {
          print "<tr>";
          print '<td align="center">'.$row['FirstName']." ".$row['LastName']."</td>";
          print '<td align="center">'.$row['Phone']."</td>"; 
          print '<td align="center">'.$row['Email']."</td>";          
          print '<td align="center">'.$row['Address']."</td>";          
          print "</tr>";
        }
    
?>

</table></p></br>

<p>
<table border="2px" align="left" width="75%">
	<caption><h2>Items on Policy</h2></caption>
<tr>
<th width="25%">Name</th>
<th width="25%">Model</th>
<th width="25%">License Plate No.</th>
</tr>    
<?php    
	$item_details = mysql_query("select a.name,a.model,a.license_plate from item i 
													join auto a on a.id = i.id 
													join policy p on i.policy_id = p.id 
													where p.id='$policy_id'");

        while($row = mysql_fetch_array($item_details))
        {
          print "<tr>";          
          print '<td align="center">'.$row['name']."</td>"; 
          print '<td align="center">'.$row['model']."</td>";          
          print '<td align="center">'.$row['license_plate']."</td>";          
          print "</tr>";
        }
    
?>

</table></p></br>

<p>
<table border="2px" align="left" width="50%">
	<caption><h2>Policy Details</h2></caption>

<?php  
	$policy_details = mysql_query("select * from policy where id='$policy_id'");
	$row = mysql_fetch_array($policy_details);

	print '<tr><th>Start Date</th><td align="center">'.$row['start_date']."</td></tr>";
	print '<tr><th>End Date</th><td align="center">'.$row['end_date']."</td></tr>";
	print '<tr><th>Policy Type</th><td align="center">'.$row['type']."</td></tr>";
	print '<tr><th>Policy Status</th><td align="center">'.$row['policy_status']."</td></tr>";
	print '<tr><th>Covergae</th><td align="center">'.$row['coverage']."</td></tr>";
	print '<tr><th>Premium</th><td align="center">'.$row['premium']."</td></tr>";
	print '<tr><th>Tax</th><td align="center">'.$row['tax']."</td></tr>";
	print '<tr><th>Surcharge</th><td align="center">'.$row['surcharge']."</td></tr>";	      
?>

</table></p>
<p>
<form action="apply_online_checkout.php">
	<input type="submit" value="Proceed To Checkout">
</form>
</p>
</body>
</html>    