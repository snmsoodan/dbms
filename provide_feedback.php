<html>
    <head>
        <title>Apply Online</title>
    </head>
    <?php
	session_start(); //starts the session
	if($_SESSION['username']){ //checks if user is logged in
	}
	else{
		header("location:home_page.php"); // redirects if user is not logged in
	}
	$username = $_SESSION['username']; //assigns user value	
	?>
	<body>
		<a href="logout.php">Click here to logout</a><br/><br/>
		<a href="policy_holder_home.php">Return to Home page</a>

        <h2>Please Provide Feedback</h2>
        <form action="provide_feedback.php" method="POST">           
            <textarea name="feedback" rows="10" cols="30">
            </textarea>						
           <input type="submit" value="Submit Feedback">           
        </form>
    </body>
</html>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){  

  $person_id = $_SESSION['person_id'];
  mysql_connect("localhost", "root","") or die(mysql_error()); //Connect to server
  mysql_select_db("sample_dbproject_db") or die("Cannot connect to database"); //Connect to database
      
    $feedback = mysql_real_escape_string($_POST['feedback']);
    
    mysql_query("INSERT INTO feedback (feedback,policy_holder)
                                VALUES('$feedback','$person_id')"); //Inserts the value to table users

    
    Print '<script>alert("Proceed to Home Page!");</script>'; // Prompts the user
    Print '<script>window.location.assign("policy_holder_home.php");</script>'; // redirects to register.php  
}
?>
