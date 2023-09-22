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
<form id="add-form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
  <fieldset>
    <legend>Add your Pokemon!</legend>
      <div class="form-element">
        <label>Pokedex number? * </label>
        <input type="text" name="pokedex-number" placeholder="Up to four digits, i.e. 0000" required>
      </div>
      <div class="form-element">
        <label>Pokemon name? * </label>
        <input type="text" name="pokemon-name" required>
      </div>
      <div class="form-element">
        <label>Pokemon's first type? * </label>
        <!-- <input type="text" name="first-type" required> -->
        <select name="first-type">
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
        <label>Pokemon's second type?</label>
        <!-- <input type="text" name="second-type" placeholder="Blank will result in NULL"> -->
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
        <label>Home region? * </label>
        <select name="home-region" required>
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
        <label id="required">* Required</label>
      </div>
      <div class="form-element">
        <button type="submit">Add 'em all!</button>
      </div>
  </fieldset>
</form>
  
<a href="./RobinIndex.php">Back to Index Page</a>


<?PHP

}

elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {

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
  $pokedex_number = (int)$_POST['pokedex-number'];
  $pokemon_name = $_POST['pokemon-name'];
  $first_type = $_POST['first-type'];
  if(empty($_POST['second-type'])) {
    $second_type = NULL;
  }
  else {
    $second_type = $_POST['second-type'];
  }
  $home_region = $_POST['home-region'];

  // Setup database insert
  $query = "INSERT INTO pokemon VALUES (?, ?, ?, ?, ?)";
  $stmt = $dbConnection -> prepare($query);
  $stmt -> bind_param("issss", $pokedex_number, $pokemon_name, $first_type, $second_type, $home_region);

  if ($stmt -> execute() === TRUE) {;
    echo "<br /><br ?>";
    echo "Data insert succeeded!";
    echo "<br /><br ?>";
    ?> <a href="./RobinForm.php">Go Back</a>
    &ensp;
    <a href="./RobinIndex.php">Back to Index Page</a> <?PHP
  }
  else {
    echo "<br /><br />";
    echo "Data insert failed" . $dbConnection -> error;
    echo "<br /><br />";
    ?> <a href="./RobinForm.php">Go Back</a>
    &ensp;
    <a href="./RobinIndex.php">Back to Index Page</a> <?PHP
  }

}


?>