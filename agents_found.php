<html>  
    <head>      
        <title>Find Agents</title>
    </head>   
    <body>
      <h2 align="center">Insurance Management System</h2>         
      <table width="100%" border="1px" class="table table-inverse">
      <tr>
        <th width="25%"><a href="home_page.php">Home</a></th>
        <th width="25%"><a href="get_quote.php">Get Quote</a></th>
        <th width="25%"><a href="find_agents.php">Find Agents In Your City</a></th>
        <th width="25%"><a href="apply_online.php">Apply Online</a></th>        
      </tr>
      </table>      
      <h2 align="center">Agents In Your City</h2>
    <table width="100%" border="1px" class="table table-inverse">
      <tr>
        <th>Name</th>        
        <th>Office Address</th>        
        <th>Phone</th>        
        <th>Email</th>        
      </tr>
      <?php
        if($_SERVER['REQUEST_METHOD'] = "POST") //Added an if to keep the page secured
  {
    $city = mysql_real_escape_string($_POST['city']);    
    mysql_connect("localhost", "root","") or die(mysql_error()); //Connect to server
    mysql_select_db("sample_dbproject_db") or die("Cannot connect to database"); //Connect to database    
    $query = mysql_query("select * from agent a join person p on a.id = p.id where a.city='$city'");
    $exists = mysql_num_rows($query); //Checks if username exists
    $table_users = "";
    $table_password = "";
    if($exists > 0)
    {    
        while($row = mysql_fetch_array($query))
        {
          print "<tr>";
          print '<td align="center">'.$row['FirstName']." ".$row['LastName']."</td>";
          print '<td align="center">'.$row['office_address']."</td>"; 
          print '<td align="center">'.$row['Phone']."</td>";          
          print '<td align="center">'.$row['Email']."</td>";          
          print "</tr>";
        }
    }
    else
    {
      Print '<script>alert("Sorry! No Agents found in your city!");</script>'; //Prompts the user
      Print '<script>window.location.assign("find_agents.php");</script>'; // redirects to login.php
    }
  }
      ?>
    </table>  
  </body>
</html>