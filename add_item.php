<html>
    <head>
        <title>Add Item</title>
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
        <form action="check_item_type.php" method="POST">
           Item Type: <input type="radio" required value="auto" name="item_type" checked="checked"/> Auto
                      <input type="radio" required value="property" name="item_type"/>Property</br>
           <input type="submit" value="Add Details">
        </form>
    </body>
</html>
