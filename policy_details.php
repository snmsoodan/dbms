<html>
    <head>
        <title>Apply Online</title>
    </head>
    <?php
   session_start(); //starts the session
   if($_SESSION['user']){ // checks if the user is logged in  
   }
   else{
      header("location: home_page.php"); // redirects if user is not logged in
   }
   ?>
    <body>                
        <form action="policy_details.php" method="POST">
           Start Date: <input type="text" name="start_date" required="required" /> <br/>           
           Policy Type: <input type="radio" required value="standard" name="policy_type"/> Standard
                        <input type="radio" required value="gold" name="policy_type"/> Gold
                        <input type="radio" required value="platinum" name="policy_type"/>Platinum</br>
           Policy Covergae: <input type="radio" required value="300/500" name="policy_coverage"/> 300/500
                            <input type="radio" required value="500/700" name="policy_coverage"/> 500/700
                            <input type="radio" required value="700/900" name="policy_coverage"/>700/900</br>
           <input type="submit" value="Add Items">           
        </form>
    </body>
</html>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){       
    $username = $_SESSION['user'];         
    $person_id = $_SESSION['person_id'];  
    mysql_connect("localhost", "root","") or die(mysql_error()); //Connect to server
    mysql_select_db("sample_dbproject_db") or die("Cannot connect to database"); //Connect to database 

    $start_date = mysql_real_escape_string($_POST['start_date']);
    $policy_type = mysql_real_escape_string($_POST['policy_type']);
    $policy_coverage = mysql_real_escape_string($_POST['policy_coverage']);         
    $policy_status = "active";    

    mysql_query("INSERT INTO policy (start_date,type,policy_status,coverage,policy_holder,end_date,premium,tax,surcharge,term)
                                VALUES('$start_date','$policy_type','$policy_status','$policy_coverage','$person_id','na',0,0,0,0)");          

    $query2 = mysql_query("SELECT * from policy order by id desc limit 1"); //Query the users table    
    $row2 = mysql_fetch_assoc($query2); //display all rows from query
    $id = $row2['id']; // the first username row is passed on to $table_users, and so on until the query is finished
    $_SESSION['policy_id'] = $id;
    //echo $id;
    //echo $_SESSION['policy_id'];

    Print '<script>alert("Proceed to add item on policy!");</script>'; // Prompts the user
    Print '<script>window.location.assign("add_item.php");</script>'; // redirects to register.php
  }
?>