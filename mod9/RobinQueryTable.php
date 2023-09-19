<!--
  Robin Pindel
  440 mod8 Database Assignment
  2023-09-11

  Reference
  PHP MySQL Create Table. (n.d.). https://www.w3schools.com/php/php_mysql_create_table.asp
  -->

<head>
<link href="./RobinMod9.css" type="text/css" rel="stylesheet">
</head>


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

// DB queries setup
$sqlPsychic = "SELECT * FROM pokemon WHERE (Type_1 = \"Psychic\") OR (Type_2 = \"Psychic\")";
$sqlDualType = "SELECT * FROM pokemon WHERE Type_2 IS NOT NULL";
$sqlNameStartsD = "SELECT * FROM pokemon WHERE name LIKE \"D%\"";

if($resultPsychic = $dbConnection -> query($sqlPsychic)) {
  echo "<br /><br />";
  echo "<table>";
  echo "<caption id=\"psychic\">The Psychic Pokemon Are</caption>";
  echo "<tr><th>Pokedex</th><th>Name</th><th>Type 1</th><th>Type 2</th><th>Home Region</th></tr>";
  while ($row = mysqli_fetch_array($resultPsychic, MYSQLI_ASSOC)) {
    $pokedex = $row['Pokedex'];
    $name = $row['Name'];
    $type_1 = $row['Type_1'];
    $type_2 = $row['Type_2'];
    $home_region = $row['Home_Region'];
    echo "<tr><td> $pokedex </td><td> $name </td><td> $type_1 </td><td> $type_2 </td><td> $home_region </td></tr>";
  }
  echo "</table>";
}

if($resultDualType = $dbConnection -> query($sqlDualType)) {
  echo "<br />";
  echo "<table>";
  echo "<caption id=\"dual\">The Dual-Type Pokemon Are</caption>";
  echo "<tr><th>Pokedex</th><th>Name</th><th>Type 1</th><th>Type 2</th><th>Home Region</th></tr>";
  while ($row = mysqli_fetch_array($resultDualType, MYSQLI_ASSOC)) {
    $pokedex = $row['Pokedex'];
    $name = $row['Name'];
    $type_1 = $row['Type_1'];
    $type_2 = $row['Type_2'];
    $home_region = $row['Home_Region'];
    echo "<tr><td> $pokedex </td><td> $name </td><td> $type_1 </td><td> $type_2 </td><td> $home_region </td></tr>";
  }
  echo "</table>";
}

if($resultNameStartsD = $dbConnection -> query($sqlNameStartsD)) {
  echo "<br />";
  echo "<table>";
  echo "<caption id=\"nameD\">The Pokemon with Names That Start with D Are</caption>";
  echo "<tr><th>Pokedex</th><th>Name</th><th>Type 1</th><th>Type 2</th><th>Home Region</th></tr>";
  while ($row = mysqli_fetch_array($resultNameStartsD, MYSQLI_ASSOC)) {
    $pokedex = $row['Pokedex'];
    $name = $row['Name'];
    $type_1 = $row['Type_1'];
    $type_2 = $row['Type_2'];
    $home_region = $row['Home_Region'];
    echo "<tr><td> $pokedex </td><td> $name </td><td> $type_1 </td><td> $type_2 </td><td> $home_region </td></tr>";
  }
  echo "</table>";
}

?>

<br /><br />
<a href="./RobinDropTable.php">Drop Table</a>