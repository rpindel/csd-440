<!--
  Robin Pindel
  440 mod9 Programming Assignment
  2023-09-18

  This program leverages forms to search or add records to a database.

  References
  https://stackoverflow.com/questions/5826784/how-do-i-make-a-php-form-that-submits-to-self
-->

<?PHP if ($_SERVER['REQUEST_METHOD'] === 'GET') { ?>


<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
  <fieldset>
    <legend>Find your Pokemon!</legend>
      <div class="form-element">
        <label>Pokemon name?</label>
        <input type="text" name="pokemon-name">
      </div>
      <div class="form-element">
        <label>Pokedex number?</label>
        <input type="text" name="pokedex-number">
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
    echo "<br ?><br ?>";
    print_r($_POST);
    echo "<br ?><br ?>";
    echo "<a href=\"./RobinQuery.php\">Go Back</a>";

    $dbHost = "localhost";
    $dbName = "baseball_01";
    $username = "student1";
    $password = "pass";
    
    try { 
      $dbConn= new PDO("mysql:host=$dbHost;dbname=$dbName", $username, $password);  
      echo "<br ?><br ?>";
      echo "Successfully connected with $dbName database";  
    } 
    catch(Exception $e) {  
      echo "Connection failed" . $e -> getMessage();  
    }  
  }
}

?>

&ensp;
<a href="./RobinIndex.php">Back to Index Page</a>