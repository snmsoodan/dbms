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
        <form action="apply_online_checkout.php" method="POST">
           Payment Type: <input type="radio" required value="credit_card" name="payment_type"/> Credit Card
                        <input type="radio" required value="debit_card" name="payment_type"/> Debit Card
                        <input type="radio" required value="paypal" name="payment_type"/>Paypal</br>

           Card or Account No.: <input type="text" name="account_no" required="required" /> <br/>
           Billing Address: <input type="text" name="billing_address" required="required" /> <br/>                                
           <input type="submit" value="Buy Policy">
        </form>
    </body>
</html>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $username = $_SESSION['user'];
  $policy_id = $_SESSION['policy_id'];  

  mysql_connect("localhost", "root","") or die(mysql_error()); //Connect to server
  mysql_select_db("sample_dbproject_db") or die("Cannot connect to database"); //Connect to database  \

    $payment_type = mysql_real_escape_string($_POST['payment_type']);
    $account_no = mysql_real_escape_string($_POST['account_no']);
    $billing_address = mysql_real_escape_string($_POST['billing_address']);
    
    $query = mysql_query("SELECT * from person where username='$username'"); //Query the users table    
    $row = mysql_fetch_assoc($query); //display all rows from query
    $policy_holder = $row['id'];    

    mysql_query("INSERT INTO payment_method (payment_type,account_no,billing_address,policy_holder)
                                VALUES('$payment_type','$account_no','$billing_address','$policy_holder')");
    
    echo '<script language="javascript">';
    echo 'var answer = confirm("Confirm Checkout");';
    echo 'if (answer == true)';    
    echo '{window.location.assign("logout_to_successful.php");}';
    echo 'else {window.location.assign("apply_online_checkout.php");}';
    echo '</script>';
  }
?>