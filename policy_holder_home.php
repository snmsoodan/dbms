<html>
    <head>
        <title>Policy Holder Home</title>
    </head>
    <?php
   session_start(); //starts the session
   if($_SESSION['username']){ // checks if the user is logged in  
   }
   else{
      header("location: home_page.php"); // redirects if user is not logged in
   }
   $username = $_SESSION['username']; //assigns user value
   ?>
    <body>   
    <a href="logout.php">Click here to logout</a><br/><br/>     
    
<?php

  mysql_connect("localhost", "root","") or die(mysql_error()); //Connect to server
  mysql_select_db("sample_dbproject_db") or die("Cannot connect to database"); //Connect to database
  
  $query = mysql_query("Select * from person where username='$username'"); //Query the users table
           
    $row = mysql_fetch_assoc($query); //display all rows from query
    $id = $row['id'];
    $_SESSION['person_id']=$id; // the first username row is passed on to $table_users, and so on until the query is finished      
	
	echo '<h4>Welcome, '.$row['FirstName'].' '.$row['LastName'].'</h4></br>';
?>

<h2 align="center">Policy List</h2>
    <table width="100%" border="1px" class="table table-inverse">
      <tr>
        <th>ID</th>
        <th>Term Start Date</th>
        <th>Term End Date</th>
        <th>Policy Type</th>
        <th>Policy Coverage</th>
        <th>Policy Status</th>
        <th>Premium</th>
        <th>Select Policy</th>
      </tr>
<?php

    $policies = mysql_query("select * from policy where policy_holder='$id'");
    while($row = mysql_fetch_array($policies))
        {
          print "<tr>";
          print '<td align="center">'.$row['id']."</td>";
          print '<td align="center">'.$row['start_date']."</td>";
          print '<td align="center">'.$row['end_date']."</td>";
          print '<td align="center">'.$row['type']."</td>";
          print '<td align="center">'.$row['coverage']."</td>";
          print '<td align="center">'.$row['policy_status']."</td>";
          print '<td align="center">'.$row['premium']."</td>";
          print '<td align="center"><a href="selected_policy.php?id='.$row['id'].'">select</a></td>';                  
          print "</tr>";
        }
      ?>
    </table>  
  </body>
</html>

