<?php

/*
 * PHP SQLite - Create a table and insert rows in SQLite
 */
$name=$_POST["name"];
$zip =$_POST["zip"];
$email = $_POST["email"];

//Open the database mydb
$db = new SQLite3('mydb');
//$db->exec('CREATE TABLE STUFF(full_name varchar(255), zip varchar (255), email varchar (255))');
//echo "Table STUFF has been created \n";

//insert rows
$db->exec("INSERT INTO FORM(full_name, zip, email) VALUES ('$name','$zip', '$email')");
echo "Row inserted \n";
 $sql =<<<EOF
      SELECT * from FORM;
EOF;

   $ret = $db->query($sql);
   //echo "<td>";
   echo "<table border='1'>";
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
     // echo "<tr>";
   	echo "<tr><td>". $row['full_name']."</td><td>". $row['zip']. "</td><td>". $row['email']. "</td></tr>";
     // echo "name = ". $row['full_name'] . "\r\n";
     // echo "zipcode = ". $row['zip'] ."\r\n";
     // echo "email = ". $row['email'] ."\r\n";
      //echo "</tr>\n";
     // echo("<br>");
   }
   echo"</table>";
   echo "Operation done successfully\n";
   $db->close();
?>