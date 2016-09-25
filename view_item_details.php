<html>
    <head>
        <title>Policy Holder Details</title>
    </head>
    <?php
   session_start(); //starts the session
   if($_SESSION['username']){ // checks if the user is logged in  
   }
   else{
      header("location: home_page.php"); // redirects if user is not logged in
   }
   $username = $_SESSION['username']; //assigns user value
   $person_id = $_SESSION['person_id'];
   $policy_id = $_SESSION['policy_id'];
   ?>
    <body>   
    <a href="logout.php">Click here to logout</a><br/>
    <a href="policy_holder_home.php">Return to Home page</a>         
  
<table border="2px" align="left" width="75%">
  <caption><h2>Items on Policy</h2></caption>
<tr>
<th width="25%">Name</th>
<th width="25%">Model</th>
<th width="25%">License Plate No.</th>
</tr>    
<?php    
  mysql_connect("localhost", "root","") or die(mysql_error()); //Connect to server
  mysql_select_db("sample_dbproject_db") or die("Cannot connect to database"); //Connect to database 
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

</table>
</body>
</html>