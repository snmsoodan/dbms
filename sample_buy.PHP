<?php
echo '<script language="javascript">';
echo 'var answer = confirm("Add more items?");';
echo 'if (answer == true)';
echo '{window.location.assign("add_item1.php");}';
echo 'else {window.location.assign("buy_policy1.php");}';
echo '</script>';
?>