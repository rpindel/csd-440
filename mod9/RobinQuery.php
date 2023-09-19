<!--
  Robin Pindel
  440 mod9 Programming Assignment
  2023-09-18

  This program leverages forms to search or add records to a database.

  References
  https://stackoverflow.com/questions/5826784/how-do-i-make-a-php-form-that-submits-to-self
  https://stackoverflow.com/questions/15794179/create-a-dynamic-mysql-query-using-php-variables
  https://phpdelusions.net/pdo_examples/dynamical_where
-->


<head>
<link href="./RobinMod9.css" type="text/css" rel="stylesheet">
</head>


<?PHP if ($_SERVER['REQUEST_METHOD'] === 'GET') { ?>


<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
  <fieldset>
    <legend>Find your Pokemon!</legend>
      <div class="form-element">
        <label>Pokedex number?</label>
        <input type="text" name="pokedex-number">
      </div>
      <div class="form-element">
        <label>Pokemon name?</label>
        <input type="text" name="pokemon-name">
      </div>
      <div class="form-element">
        <label>Pokemon's first type?</label>
        <input type="text" name="first-type">
      </div>
      <div class="form-element">
        <label>Pokemon's second type?</label>
        <input type="text" name="second-type">
      </div>
      <div class="form-element">
        <label>Home region??</label>
        <input type="text" name="home-region">
      </div>
      <div class="form-element">
        <button type="submit">Find 'em all!</button>
      </div>
  </fieldset>
</form>


<?PHP

}

elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {

  if (!($_POST['pokemon-name']) && !($_POST['pokedex-number']) && !($_POST['first-type']) && !($_POST['second-type']) && !($_POST['home-region'])) {
    echo "Please fill in at least one value to search the database.";
    echo "<br ?><br ?>";
    echo "<a href=\"./RobinQuery.php\">Go Back</a>";
  }
  else {
    echo "You submitted something!";
    /*echo "<br ?><br ?>";
    print_r($_POST);*/
    echo "<br ?><br ?>";
    echo "<a href=\"./RobinQuery.php\">Go Back</a>";

    // Setup database connection
    $dbHost = "localhost";
    $dbName = "baseball_01";
    $username = "student1";
    $password = "pass";
    
    try { 
      $dbConnection = new PDO("mysql:host=$dbHost;dbname=$dbName", $username, $password);  
      echo "<br ?><br ?>";
      echo "Successfully connected with $dbName database";  
    } 
    catch(Exception $e) {  
      echo "Connection failed" . $e -> getMessage();  
    }

    // Setup query variables
    $pokemon_name;
    $pokedex_number;
    $first_type;
    $second_type;
    $home_region;
    

    if ($_POST['pokedex-number'] !== NULL) {
      $pokedex_number = $_POST['pokedex-number'];
    }

    if ($_POST['pokemon-name'] !== NULL) {
      $pokemon_name = $_POST['pokemon-name'];
    }

    if ($_POST['first-type'] !== NULL) {
      $first_type = $_POST['first-type'];
    }

    if ($_POST['second-type'] !== NULL) {
      $second_type = $_POST['second-type'];
    }

    if ($_POST['home-region'] !== NULL) {
      $home_region = $_POST['home-region'];
    }

    //Setup database query
    $conditions = [];
    $values = [];

    if ($pokedex_number) {
      $conditions[] = "pokedex = ?";
      $values[] = $pokedex_number;
    }

    if ($pokemon_name) {
      $conditions[] = "name = ?";
      $values[] = $pokemon_name;
    }

    if ($first_type) {
      $conditions[] = "type_1 = ?";
      $values[] = $first_type;
    }

    if ($second_type) {
      $conditions[] = "type_2 = ?";
      $values[] = $second_type;
    }

    if ($home_region) {
      $conditions[] = "home_region = ?";
      $values[] = $home_region;
    }

    $query = "SELECT * FROM pokemon";

    if ($conditions) {
      $query .= " WHERE " . implode(" AND ", $conditions);
    }

    $stmt = $dbConnection -> prepare($query);
    $stmt -> execute($values);
    $data = $stmt -> fetchAll(PDO::FETCH_ASSOC);
    $rowCount = $stmt -> rowCount();
    print_r($data);
    if ($rowCount > 0) {
      echo "<br /><br />";
      echo "<table>";
      echo "<caption id=\"results\">Query Results</caption>";
      echo "<tr><th>Pokedex</th><th>Name</th><th>Type 1</th><th>Type 2</th><th>Home Region</th></tr>";
      foreach ($data as $row) {
        $pokedex_number = $row['Pokedex'];
        $pokemon_name = $row['Name'];
        $first_type = $row['Type_1'];
        $second_type = $row['Type_2'];
        $home_region = $row["Home_Region"];
        echo "<tr><td> $pokedex_number </td><td> $pokemon_name </td><td> $first_type </td><td> $second_type </td><td> $home_region </td></tr>";
      }
      echo "</table>";
    }
  }
}

?>

&ensp;
<a href="./RobinIndex.php">Back to Index Page</a>