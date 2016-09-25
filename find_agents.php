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
        <th width="25%">Find Agents In Your City</th>
        <th width="25%"><a href="apply_online.php">Apply Online</a></th>        
      </tr>      
      </table>
      <form action="agents_found.php" method="POST">
           Enter City: <input type="text" name="city" /> <br/>           
           <input type="submit" value="Find Agents"/>
      </form>
    </body>
</html>