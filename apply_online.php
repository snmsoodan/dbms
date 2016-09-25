<html>
    <head>
        <title>Apply Online</title>
    </head>
    <body>        
        <a href="home_page.php">Click here to go to Home Page</a><br/><br/>
        <form action="apply_online.php" method="POST">
           Username: <input type="text" name="username" required="required" /> <br/>
           Password: <input type="password" name="password" required="required" /> <br/>
           First Name: <input type="text" name="firstname" required="required" /> <br/>
           Last Name: <input type="text" name="lastname" required="required" /> <br/>
           Phone: <input type="text" name="phone" required="required" /> <br/>
           Email: <input type="text" name="email" required="required" /> <br/>
           Gender: <input type="radio" required value="M" name="gender"/> Male
                   <input type="radio" required value="F" name="gender"/>Female</br>
           Address: <input type="text" name="address" required="required" /> <br/>
           City: <input type="text" name="city" required="required" /> <br/>
           DOB: <input type="text" name="dob" required="required" /> <br/>
           <input type="submit" value="Next">           
        </form>
    </body>
</html>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $username = mysql_real_escape_string($_POST['username']);
  $bool = true;
  mysql_connect("localhost", "root","") or die(mysql_error()); //Connect to server
  mysql_select_db("sample_dbproject_db") or die("Cannot connect to database"); //Connect to database
  $query = mysql_query("Select * from person"); //Query the users table
  while($row = mysql_fetch_array($query)) //display all rows from query
  {
    $table_users = $row['username']; // the first username row is passed on to $table_users, and so on until the query is finished
    if($username == $table_users) // checks if there are any matching fields
    {
      $bool = false; // sets bool to false
      Print '<script>alert("Username has been taken!");</script>'; //Prompts the user
      Print '<script>window.location.assign("apply_online.php");</script>'; // redirects to register.php
    }
  }
  if($bool) // checks if bool is true
  {
    session_start();
    $_SESSION['user'] = $username;    
    $password = mysql_real_escape_string($_POST['password']);
    $firstname = mysql_real_escape_string($_POST['firstname']);
    $lastname = mysql_real_escape_string($_POST['lastname']);
    $phone = mysql_real_escape_string($_POST['phone']);
    $email = mysql_real_escape_string($_POST['email']);
    $gender = mysql_real_escape_string($_POST['gender']);
    $address = mysql_real_escape_string($_POST['address']);
    $city = mysql_real_escape_string($_POST['city']);
    $dob = mysql_real_escape_string($_POST['dob']);
    mysql_query("INSERT INTO Person (FirstName,LastName,Address,City,Phone,Email,Gender,DOB,username,password) 
                                VALUES('$firstname','$lastname','$address','$city','$phone','$email','$gender','dob','$username','$password')"); //Inserts the value to table users

    $query2 = mysql_query("SELECT * from person where username='$username'"); //Query the users table    
    $row2 = mysql_fetch_assoc($query2); //display all rows from query
    $id = $row2['id']; // the first username row is passed on to $table_users, and so on until the query is finished      
    $_SESSION['person_id'] = $id;    

    mysql_query("INSERT INTO policy_holder(id) values('$id')");
    Print '<script>alert("Proceed to policy details!");</script>'; // Prompts the user
    Print '<script>window.location.assign("policy_details.php");</script>'; // redirects to register.php
  }
}
?>