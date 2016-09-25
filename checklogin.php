<?php
	session_start();
	$username = mysql_real_escape_string($_POST['username']);
	$password = mysql_real_escape_string($_POST['password']);
	$usertype = mysql_real_escape_string($_POST['user_type']);
	mysql_connect("localhost", "root","") or die(mysql_error()); //Connect to server
	mysql_select_db("sample_dbproject_db") or die("Cannot connect to database"); //Connect to database
	if($usertype == 'policy_holder')
	{
	$query = mysql_query("SELECT * from person p join policy_holder ph on p.id=ph.id WHERE p.username='$username'"); //Query the users table if there are matching rows equal to $username
	}else if($usertype == 'agent')
	{
	$query = mysql_query("SELECT * from person p join agent a on p.id=a.id WHERE p.username='$username'"); //Query the users table if there are matching rows equal to $username
	}
	else if($usertype == 'investigator')
	{
	$query = mysql_query("SELECT * from person p join claim_investigator c on p.id=c.id WHERE p.username='$username'");
	}
	else if($usertype == 'admin')
	{
	
	}

	$exists = mysql_num_rows($query); //Checks if username exists
	$table_users = "";
	$table_password = "";
	if($exists > 0) //IF there are no returning rows or no existing username
	{
		while($row = mysql_fetch_assoc($query)) //display all rows from query
		{
			$table_users = $row['username']; // the first username row is passed on to $table_users, and so on until the query is finished
			$table_password = $row['password']; // the first password row is passed on to $table_users, and so on until the query is finished
		}
		if(($username == $table_users) && ($password == $table_password)) // checks if there are any matching fields
		{
				if($password == $table_password)
				{
					$_SESSION['username'] = $username; //set the username in a session. This serves as a global variable
					if($usertype == 'policy_holder')
					{header("location: policy_holder_home.php");} // redirects the user to the authenticated home page
					else if($usertype == 'agent')
					{header("location: agent_home.php");}
					else if($usertype == 'investigator')
					{header("location: investigator_home.php");}
					else if($usertype == 'admin')
					{header("location: admin_home.php");}					
				}
				
		}
		else
		{
			Print '<script>alert("Incorrect Password!");</script>'; //Prompts the user
			Print '<script>window.location.assign("all_user_login.php");</script>'; // redirects to login.php
		}
	}
	else
	{
		Print '<script>alert("Incorrect Username!");</script>'; //Prompts the user
		Print '<script>window.location.assign("all_user_login.php");</script>'; // redirects to login.php
	}
?>