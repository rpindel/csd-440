<!--
  Robin Pindel
  440 mod8 Database Assignment
  2023-09-11

  Reference
  PHP MySQL Create Table. (n.d.). https://www.w3schools.com/php/php_mysql_create_table.asp
  -->


<?PHP

// DB connection details
$host = "localhost";
$username = "student1";
$password = "pass";
$databaseName = "baseball_01";

$dbConnection = new mysqli ($host, $username, $password, $databaseName);

if ($dbConnection -> connect_errno) {
  echo "Connection failed.";
}
else {
  echo "Connection successful.";
}

// Drop table logic
$sql = "DROP TABLE IF EXISTS pokemon";

if($dbConnection -> query($sql) === TRUE) {
  echo "<br />Table dropped successfully.";
}
else {
  echo "<br />Table drop failed: " . $dbConnection -> error;
}

?>

<br /><br />
<a href="./RobinCreateTable.php">Create Table</a>