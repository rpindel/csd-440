<!--
  Robin Pindel
  440 mod9 Programming Assignment
  2023-09-18

  This program leverages forms to search or add records to a database.
-->


<head>
<link href="./RobinMod9.css" type="text/css" rel="stylesheet">
</head>


<?PHP if ($_SERVER['REQUEST_METHOD'] === 'GET') { ?>


  <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
  <fieldset>
    <legend>Add your Pokemon!</legend>
      <div class="form-element">
        <label>Pokedex number? * </label>
        <input type="text" name="pokedex-number" required>
      </div>
      <div class="form-element">
        <label>Pokemon name? * </label>
        <input type="text" name="pokemon-name" required>
      </div>
      <div class="form-element">
        <label>Pokemon's first type? * </label>
        <input type="text" name="first-type" required>
      </div>
      <div class="form-element">
        <label>Pokemon's second type?</label>
        <input type="text" name="second-type">
      </div>
      <div class="form-element">
        <label>Home region? * </label>
        <input type="text" name="home-region" required>
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

  try { 
    $dbConnection = new PDO("mysql:host=$dbHost;dbname=$dbName", $username, $password);  
    /*echo "<br ?><br ?>";*/
    echo "Successfully connected with $dbName database";  
  } 
  catch(Exception $e) {  
    echo "Connection failed" . $e -> getMessage();  
  }

  // Setup query variables
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
  //$sql = "INSERT INTO pokemon VALUES (pokedex=:pokedex, name=:name, type_1=:type_1, type_2=:type_2, home_region=:home_region)";
  $sql = "INSERT INTO pokemon VALUES (:pokedex, :name, :type_1, :type_2, :home_region)";
  $query = $dbConnection -> prepare($sql);
  $query -> bindParam("pokedex", $pokedex_number, PDO::PARAM_INT);
  $query -> bindParam("name", $pokemon_name, PDO::PARAM_STR);
  $query -> bindParam("type_1", $first_type, PDO::PARAM_STR);
  $query -> bindParam("type_2", $second_type, PDO::PARAM_STR);
  $query -> bindParam("home_region", $home_region, PDO::PARAM_STR);
  try {
    $query -> execute();
    echo "<br /><br ?>";
    echo "Data insert succeeded!";
    echo "<br /><br ?>";
    ?> <a href="./RobinForm.php">Go Back</a>
    &ensp;
    <a href="./RobinIndex.php">Back to Index Page</a> <?PHP
  }
  catch(Exception $e) {
    echo "<br /><br />";
    echo "Data insert failed" . $e -> getMessage();
    echo "<br /><br />";
    ?> <a href="./RobinForm.php">Go Back</a>
    &ensp;
    <a href="./RobinIndex.php">Back to Index Page</a> <?PHP
  }

}


?>


<!--<br />
<a href="./RobinForm.php">Go Back</a>
&ensp;
<a href="./RobinIndex.php">Back to Index Page</a>-->