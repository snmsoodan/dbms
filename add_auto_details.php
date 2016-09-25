<html>
    <head>
        <title>Add Auto Details</title>
    </head>
    <?php
   session_start(); //starts the session
   if($_SESSION['user']){ // checks if the user is logged in  
   }
   else{
      header("location: home_page.php"); // redirects if user is not logged in
   }
   $user = $_SESSION['user']; //assigns user value
    ?>
    <body>                
        <form action="add_auto_details.php" method="POST">
           VIN: <input type="text" name="vin" required="required" /> <br/>
           Name: <input type="text" name="name" required="required" /> <br/>
           Type: <input type="text" name="type" required="required" /> <br/>
           Model No.: <input type="text" name="model" required="required" /> <br/>
           Lincese Plate No.: <input type="text" name="license" required="required" /> <br/>
           Bought On: <input type="text" name="boughton" required="required" /> <br/>
           Market Price: <input type="text" name="price" required="required" /> <br/>           
           <input type="submit" value="Add Item">
        </form>
    </body>
</html>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $username = $_SESSION['user'];
  $policy_id = $_SESSION['policy_id'];
  $bool = true;

  mysql_connect("localhost", "root","") or die(mysql_error()); //Connect to server
  mysql_select_db("sample_dbproject_db") or die("Cannot connect to database"); //Connect to database  \

    $vin = mysql_real_escape_string($_POST['vin']);
    $name = mysql_real_escape_string($_POST['name']);
    $type = mysql_real_escape_string($_POST['type']);
    $model = mysql_real_escape_string($_POST['model']);
    $license = mysql_real_escape_string($_POST['license']);
    $boughton = mysql_real_escape_string($_POST['boughton']);
    $price = mysql_real_escape_string($_POST['price']);
    
    mysql_query("INSERT INTO item (bought_on,market_price,policy_id)
                                VALUES('$boughton','$price','$policy_id')");

    $query2 = mysql_query("SELECT * from item order by id desc limit 1"); //Query the users table    
    $row2 = mysql_fetch_assoc($query2); //display all rows from query
    $item_id = $row2['id'];
    echo $item_id;

    mysql_query("INSERT INTO auto (id,vin,name,type,model,license_plate)
                                VALUES('$item_id','$vin','$name','$type','$model','$license')");

    //Print '<script>alert("Add more items!");</script>'; // Prompts the user
    //Print '<script>window.location.assign("add_item.php");</script>'; // redirects to register.php
    echo '<script language="javascript">';
    echo 'var answer = confirm("Add more items?");';
    echo 'if (answer == true)';
    echo '{window.location.assign("add_item.php");}';
    echo 'else {window.location.assign("buy_policy.php");}';
    echo '</script>';
  }
?>