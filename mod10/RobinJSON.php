<!--
  Robin Pindel
  440 mod10 Programming Assignment
  9/25/2023
  
This program takes user input, makes it into JSON format, and then exports the JSON for display to the user.
-->

<head>
<link href="./RobinMod10.css" type="text/css" rel="stylesheet">
</head>


<?PHP if ($_SERVER['REQUEST_METHOD'] === 'GET') { ?>

<!-- Request input from user on their custom Pokemon -->
<form name="custom-pokemon-order" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
  <fieldset>
    <legend>Request your Pokemon!</legend>
    <div><p>Fill out the form below to request your custom Pokemon.</p>
    <div class="form-element">
      <label>Pokemon Name&ensp;</label>
      <input type="text" name="name" required>
    </div>
    <div class="form-element">
      <label>First Type&ensp;</label>
        <select name="first-type" required>
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
      <label>Second Type&ensp;</label>
        <select name="second-type" required>
          <option value=""></option>
          <option value="None">None</option>
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
      <label>Level (1 - 100)&ensp;</label>
      <input type="number" name="level" min="1" max="100" required>
    </div>
    <div class="form-element">
      <label>Nature&ensp;</label>
      <input type="text" name="nature" required>
    </div>
    <div class="form-element">
      <label>Ability&ensp;</label>
      <input type="text" name="ability" required>
    </div>
    <div class="form-element">
      <label>Shiny&ensp;</label>
      <select name="shiny" required>
        <option></option>
        <option>Yes</option>
        <option>No</option>
      </select>
    </div>
    <div class="form-element">
      <label>Move Slot 1&ensp;</label>
      <input type="text" name="move-1" required>
    </div>
    <div class="form-element">
      <label>Move Slot 2&ensp;</label>
      <input type="text" name="move-2" required>
    </div>
    <div class="form-element">
      <label>Move Slot 3&ensp;</label>
      <input type="text" name="move-3" required>
    </div>
    <div class="form-element">
      <label>Move Slot 4&ensp;</label>
      <input type="text" name="move-4" required>
    </div>
    <div class="form-element">
      <button type="submit">Order now!</button>
    </div>
  </fieldset>
</form>

<?PHP }

elseif ($_SERVER['REQUEST_METHOD'] === 'POST') { ?>

<div id="container">
  <div id="raw">

  <?PHP

  // Logic to check for values that cannot be the same: type 1 and type 2 and all moves
  if ($_POST["first-type"] === $_POST["second-type"]) {
    echo "<br />";
    echo "The first type and second type must be different.  Please go back and adjust accordingly.";
    echo "<br /><br />";
    echo "<a href=\".\RobinJSON.php\">Back to Form</a>";
  }
  elseif (($_POST["move-1"] === $_POST["move-2"]) || ($_POST["move-1"] === $_POST["move-3"]) || ($_POST["move-1"] === $_POST["move-4"])) {
    echo "<br />";
    echo "All moves must be different.  Please go back and adjust accordingly.";
    echo "<br /><br />";
    echo "<a href=\".\RobinJSON.php\">Back to Form</a>";
  }
  elseif (($_POST["move-2"] === $_POST["move-1"]) || ($_POST["move-2"] === $_POST["move-3"]) || ($_POST["move-2"] === $_POST["move-4"])) {
    echo "<br />";
    echo "All moves must be different.  Please go back and adjust accordingly.";
    echo "<br /><br />";
    echo "<a href=\".\RobinJSON.php\">Back to Form</a>";
  }
  elseif (($_POST["move-3"] === $_POST["move-1"]) || ($_POST["move-3"] === $_POST["move-2"]) || ($_POST["move-3"] === $_POST["move-4"])) {
    echo "<br />";
    echo "All moves must be different.  Please go back and adjust accordingly.";
    echo "<br /><br />";
    echo "<a href=\".\RobinJSON.php\">Back to Form</a>";
  }
  else {
  
    # echo "Form posted!";
    # echo "<br /><br /></br >";
    
    // Output to display the PHP $_POST array of user input
    echo "<br /><b>Raw PHP \$_POST Array: </b><br /><br />";
    print_r($_POST);
    echo "<br /><br /><br />";

    // Output to display the JSON object of the PHP $_POST array after of user input
    echo "<b>Encoded JSON Object: </b><br /><br />";
    echo json_encode($_POST);
    echo "<br /><br /><br />";

    // Output to display the JSON object of the PHP $_POST array after of user input but using Pretty Print modifier
    echo "<b>Encoded JSON Object with Pretty Print: </b><br />";
    $_postPretty = json_encode($_POST, JSON_PRETTY_PRINT);
    echo "<pre>" . $_postPretty . "</pre>";
    
  ?>

  </div>

  <div id="table">

  <?PHP

    // Decode JSON object back to PHP associative array and output to table display 
    echo "<br /><b>Decoded JSON to PHP Associative Array: </b><br />";
    $_jsonToPHPArray = json_decode($_postPretty, true);

  ?>

    <table border="1"><br />
      <tr>
        <td class="title">Name</td><td><?PHP echo htmlspecialchars($_jsonToPHPArray["name"]); ?></td>
      </tr>
      <tr>
        <td class="title">Type #1</td><td><?PHP echo htmlspecialchars($_jsonToPHPArray["first-type"]); ?></td>
      </tr>
      <tr>
        <td class="title">Type #2</td><td><?PHP echo htmlspecialchars($_jsonToPHPArray["second-type"]); ?></td>
      </tr>
      <tr>
        <td class="title">Level</td><td><?PHP echo htmlspecialchars($_jsonToPHPArray["level"]); ?></td>
      </tr>
      <tr>
        <td class="title">Nature</td><td><?PHP echo htmlspecialchars($_jsonToPHPArray["nature"]); ?></td>
      </tr>
      <tr>
        <td class="title">Ability</td><td><?PHP echo htmlspecialchars($_jsonToPHPArray["ability"]); ?></td>
      </tr>
      <tr>
        <td class="title">Shiny</td><td><?PHP echo htmlspecialchars($_jsonToPHPArray["shiny"]); ?></td>
      </tr>
      <tr>
        <td class="title">Move #1</td><td><?PHP echo htmlspecialchars($_jsonToPHPArray["move-1"]); ?></td>
      </tr>
      <tr>
        <td class="title">Move #2</td><td><?PHP echo htmlspecialchars($_jsonToPHPArray["move-2"]); ?></td>
      </tr>
      <tr>
        <td class="title">Move #3</td><td><?PHP echo htmlspecialchars($_jsonToPHPArray["move-3"]); ?></td>
      </tr>
      <tr>
        <td class="title">Move #4</td><td><?PHP echo htmlspecialchars($_jsonToPHPArray["move-4"]); ?></td>
      </tr>
    </table>
  
  <br /><br />
  <a href="./RobinJSON.php">Go Back and Request a New Pokemon</a>  
  </div>

</div>

<?PHP }} ?>