<!--
  Robin Pindel
  440 mod9 Programming Assignment
  2023-09-18

  This program leverages forms to search or add records to a database.

  References
  https://stackoverflow.com/questions/5826784/how-do-i-make-a-php-form-that-submits-to-self
  https://stackoverflow.com/questions/15794179/create-a-dynamic-mysql-query-using-php-variables
  https://phpdelusions.net/pdo_examples/dynamical_where
  https://phpdelusions.net/mysqli_examples/search_filter
-->


<head>
<link href="./RobinMod9.css" type="text/css" rel="stylesheet">
</head>


<?PHP if ($_SERVER['REQUEST_METHOD'] === 'GET') { ?>

<!-- Form to generate database query from user defined values -->
<form id="query-form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
  <fieldset>
    <legend>Find your Pokemon!</legend>
      <div class="form-element">
        <label>Pokedex number? </label>
        <input type="text" name="pokedex-number" placeholder="Up to four digits, i.e. 0000">
      </div>
      <div class="form-element">
        <label>Pokemon name? </label>
        <input type="text" name="pokemon-name" placeholder="Enter name">
      </div>
      <div class="form-element">
        <label>Pokemon's first type? </label>
        <!-- input type="text" name="first-type" placeholder="Enter first type"> -->
        <select name="first-type" placeholder="Enter first type">
          <option value=""></option>
          <option value="Normal">Normal</option>
          <option value="Fire">Fire</option>
          <option value="Water">Water</option>
          <option value="Grass">Grass</option>
          <option value="Flying">Flying</option>
          <option value="Fighting">Fighting</option>
          <option value="Poison">Poison</option>
          <option value="Electric">Electric</option>
          <option value="Ground">Ground</option>
          <option value="Rock">Rock</option>
          <option value="Psychic">Psychic</option>
          <option value="Ice">Ice</option>
          <option value="Bug">Bug</option>
          <option value="Ghost">Ghost</option>
          <option value="Dragon">Dragon</option>
          <option value="Dark">Dark</option>
          <option value="Steel">Steel</option>
          <option value="Fairy">Fairy</option>
        </select>
      </div>
      <div class="form-element">
        <label>Pokemon's second type? (If any)</label>
        <!-- <input type="text" name="second-type" placeholder="Enter second type (if any)"> -->
        <select name="second-type">
          <option value=""></option>
          <option value="Normal">Normal</option>
          <option value="Fire">Fire</option>
          <option value="Water">Water</option>
          <option value="Grass">Grass</option>
          <option value="Flying">Flying</option>
          <option value="Fighting">Fighting</option>
          <option value="Poison">Poison</option>
          <option value="Electric">Electric</option>
          <option value="Ground">Ground</option>
          <option value="Rock">Rock</option>
          <option value="Psychic">Psychic</option>
          <option value="Ice">Ice</option>
          <option value="Bug">Bug</option>  
          <option value="Ghost">Ghost</option>
          <option value="Dragon">Dragon</option>
          <option value="Dark">Dark</option>
          <option value="Steel">Steel</option>
          <option value="Fairy">Fairy</option>
        </select>
      </div>
      <div class="form-element">
        <label>Home region? </label>
        <select name="home-region">
          <option value=""></option>
          <option value="Kanto">Kanto</option>
          <option value="Johto">Johto</option>
          <option value="Hoenn">Hoenn</option>
          <option value="Sinnoh">Sinnoh</option>
          <option value="Hisui">Hisui</option>
          <option value="Unova">Unova</option>
          <option value="Kalos">Kalos</option>
          <option value="Alola">Alola</option>
          <option value="Galar">Galar</option>
          <option value="Paldea">Paldea</option>
          <option value="Kitakami">Kitakami</option>
        </select>
      </div>
      <div class="form-element">
        <button type="submit">Find 'em all!</button>
      </div>
  </fieldset>
</form>

<a href="./RobinIndex.php">Back to Index Page</a>


<?PHP

}

elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {

  if (!($_POST['pokemon-name']) && !($_POST['pokedex-number']) && !($_POST['first-type']) && !($_POST['second-type']) && !($_POST['home-region'])) {
    echo "Please fill in at least one value to search the database.";
    echo "<br ?><br ?>";
    echo "<a href=\"./RobinQueryUserDefined.php\">Go Back</a>";
    ?>  &ensp;  <a href="./RobinIndex.php">Back to Index Page</a> <?PHP
  }
  else {
    // Setup database connection
    $dbHost = "localhost";
    $dbName = "baseball_01";
    $username = "student1";
    $password = "pass";

    $dbConnection = new mysqli($dbHost, $username, $password, $dbName);

    if ($dbConnection -> connect_error) {
      die("Database server connection failed: " . $dbConnection -> connect_error);
    }
    echo "Database server connection successful.";

    // Setup database query variables
    $pokedex_number;
    $pokemon_name;
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

    //Setup database query itself
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

    // Prepare and execute database query
    $stmt = $dbConnection -> prepare($query);
    $stmt -> bind_param(str_repeat("s", count($values)), ...$values);
    $stmt -> execute();
    $result = $stmt -> get_result();
    $result -> fetch_all(MYSQLI_ASSOC);
    $rowCount = mysqli_num_rows($result);
    
    // Output database query results to table layout
    if ($rowCount > 0) {
      echo "<br /><br />";
      echo "<table>";
      echo "<caption id=\"results\">Query Results</caption>";
      echo "<tr><th>Pokedex</th><th>Name</th><th>Type 1</th><th>Type 2</th><th>Home Region</th></tr>";
      foreach ($result as $row) {
        $pokedex_number = $row['Pokedex'];
        $pokemon_name = $row['Name'];
        $first_type = $row['Type_1'];
        $second_type = $row['Type_2'];
        $home_region = $row["Home_Region"];
        echo "<tr><td> $pokedex_number </td><td> $pokemon_name </td><td> $first_type </td><td> $second_type </td><td> $home_region </td></tr>";
      }
      echo "</table>";
      echo "<br />";
      echo "<a href=\"./RobinQueryUserDefined.php\">Go Back</a>";
      ?>  &ensp;  <a href="./RobinIndex.php">Back to Index Page</a> <?PHP
    }
    else {
      echo "<br /><br />";
      echo "I am sorry but nothing matches those query parameters.";
      echo "<br ?><br ?>";
      echo "<a href=\"./RobinQueryUserDefined.php\">Go Back</a>";
      ?>  &ensp;  <a href="./RobinIndex.php">Back to Index Page</a> <?PHP
    }
  }
}

?>