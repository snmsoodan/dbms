<html>
    <head>
        <title>My first PHP Website</title>
    </head>
    <body>
        <h2>Login Page</h2>
        <a href="home_page.php">Click here to go to Home Page</a><br/><br/>
        <form action="checklogin.php" method="POST">
           Enter Username: <input type="text" name="username" required="required" /> <br/>
           Enter password: <input type="password" name="password" required="required" /> <br/>
           User Type: <select name="user_type">
                        <option value="policy_holder">Policy Holder</option>
                        <option value="agent">Insurance Agent</option>
                        <option value="investgator">Claims Investigator</option>
                        <option value="admin">Admin</option>
                      </select>
           <input type="submit" value="Login"/>
        </form>
    </body>
</html>