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

elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
  echo "Form posted!";
  echo "<br /><br />";
  print_r($_POST);

} ?>