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

// Populate table logic
$sql = "INSERT INTO pokemon VALUES
  (143, \"Snorlax\", \"Normal\", NULL, \"Kanto\"),
  (144, \"Articuno\", \"Ice\", \"Flying\", \"Kanto\"),
  (145, \"Zapdos\", \"Electric\", \"Flying\", \"Kanto\"),
  (146, \"Moltres\", \"Fire\", \"Flying\", \"Kanto\"),
  (147, \"Dratini\", \"Dragon\", NULL, \"Kanto\"),
  (148, \"Dragonair\", \"Dragon\", NULL, \"Kanto\"),
  (149, \"Dragonite\", \"Dragon\", \"Flying\", \"Kanto\"),
  (150, \"Mewtwo\", \"Psychic\", NULL, \"Kanto\"),
  (151, \"Mew\", \"Psychic\", NULL, \"Kanto\")";

if($dbConnection -> query($sql) === TRUE) {
  echo "<br />Table populated successfully.";
}
else {
  echo "<br />Table population failed: " . $dbConnection -> error;
}

?>

<br /><br />
<a href="./RobinDropTable.php">Drop Table</a>
&ensp;
<a href="./RobinQueryTable.php">Query Table</a>