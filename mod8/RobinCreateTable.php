<!--
  Robin Pindel
  440 mod8 Database Assignment
  2023-09-11

  Reference
  PHP MySQL create Table. (n.d.). https://www.w3schools.com/php/php_mysql_create_table.asp
  -->


<?PHP

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

$sql = "CREATE TABLE pokemon (
  Pokedex INT(4) ZEROFILL NOT NULL PRIMARY KEY,
  Name VARCHAR(20) NOT NULL,
  Type_1 VARCHAR(10) NOT NULL,
  Type_2 VARCHAR(10),
  Home_Region VARCHAR(10) NOT NULL)";

if($dbConnection -> query($sql) === TRUE) {
  echo "<br />Table created successfully.";
}
else {
  echo "<br />Table creation failed: " . $dbConnection -> error;
}

?>

<br /><br />
<a href="./RobinDropTable.php">Drop Table</a>
&ensp;
<a href="./RobinPopulateTable.php">Populate Table</a>