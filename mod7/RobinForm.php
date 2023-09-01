<!--
Robin Pindel
440 mod7 Programming Assignment
8/31/2023

PHP program creating and working with a form.
-->

<!DOCTYPE html>
<html lang="en-us">
<head>
  <title>Robin Pindel mod7 PHP Assignment</title>
  <link href="./RobinForm.css" type="text/css" rel="stylesheet">
</head>

<form action="RobinPost.php" method="post">
  <fieldset>
  <legend>Who are you?</legend>
  <div class="form-element">
    <label>First Name</label> <!-- text -->
    <input type=text name=firstname />
  </div>  
  <div class="form-element">
    <label>Last Name</label> <!-- text -->
    <input type=text name=lastname />
  </div>
  <div class="form-element">
    <label>Age</label> <!-- number -->
    <input type=text name=age />
  </div>  
  <div class="form-element">
    <label>Are you alive?</label> <!-- radio -->
    <label>Yes
      <input type="radio" name="radioButton" value="Yes" />
    </label>
    <label>No
      <input type="radio" name="radioButton" value="No" />
    </label>
  </div>  
  <div class="form-element">
    <label>Which animals do you like?</label> <!-- checkbox -->
    <label>Cat
      <input name="checkbox[]" type="checkbox" value="Cat" />
    </label>
    <label>Dog
      <input name="checkbox[]" type="checkbox" value="Dog" />
    </label>
    <label>Lizard
      <input name="checkbox[]" type="checkbox" value="Lizard" />
    </label>
    <label>Parrot
      <input name="checkbox[]" type="checkbox" value="Parrot" />
    </label>
  </div>  
  <div class="form-element">
    <label>What are your thoughts on being a morning person?</label> <!-- textarea -->
    <textarea name=textarea rows=3 cols=20></textarea>
  </div>  
  <div class="form-element">
    <label>Do you like coffee?</label> <!-- select dropdown -->
    <select name=coffee>
      <option value=""></option>
      <option value="Yes">Yes</option>
      <option value="Yeess">Yeess</option>
      <option value="OMG YES">OMG YES</option>
      <option value="...No...">...no...</option>>
    </select>
  </div>
  <div>
    <input type="submit" value="Submit" />
  </div>
  </fieldset>
</form>
