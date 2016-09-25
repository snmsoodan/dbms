<?php
   session_start(); //starts the session
   if($_SESSION['user']){ // checks if the user is logged in  
   }
   else{
      header("location: home_page.php"); // redirects if user is not logged in
   }
   $user = $_SESSION['user']; //assigns user value
?>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $item_type = mysql_real_escape_string($_POST['item_type']);
  
    if($item_type == "auto") // checks if there are any matching fields
    {            
      header("location: add_auto_details.php");
    }
    else
    {header("location: add_property_details.php");} 
}
?>
