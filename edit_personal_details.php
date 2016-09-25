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
    <form action="apply_online.php" method="POST">       
    <table border="2px" align="left" width="50%">
    <caption><h2>Edit Policy Holder Details</h2></caption>

<?php 
  mysql_connect("localhost", "root","") or die(mysql_error()); //Connect to server
  mysql_select_db("sample_dbproject_db") or die("Cannot connect to database"); //Connect to database 
  $person_details = mysql_query("select * from person where id='$person_id'");
  $row = mysql_fetch_array($person_details);

  print '<tr><th>Username</th><td align="center"><input type="text" name="username" required="required" value="'.$row['username']."/></td></tr>";
  print '<tr><th>First Name</th><td align="center">'.$row['FirstName']."</td></tr>";
  print '<tr><th>Last Name</th><td align="center">'.$row['LastName']."</td></tr>";
  print '<tr><th>Address</th><td align="center">'.$row['Address']."</td></tr>";
  print '<tr><th>City</th><td align="center">'.$row['City']."</td></tr>";
  print '<tr><th>Phone</th><td align="center">'.$row['Phone']."</td></tr>";
  print '<tr><th>Email</th><td align="center">'.$row['Email']."</td></tr>";
  print '<tr><th>Date of Birth</th><td align="center">'.$row['DOB']."</td></tr>";       
?>
  
  <tr><input type="submit" value="Submit Changes"/></tr>   
  </table>
</form>
</body>
</html>

