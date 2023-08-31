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
      <input type="radio" name="radioButton" value="Yes" checked="checked" />
    </label>
    <label>No
      <input type="radio" name="radioButton" value="No" />
    </label>
  </div>  
  <div class="form-element">
    <label>Which animals do you like?</label> <!-- checkbox -->
    <label>Cat
      <input name=checkbox[] type=checkbox value="animal1" />
    </label>
    <label>Dog
      <input name=checkbox[] type=checkbox value="animal2" />
    </label>
    <label>Lizard
      <input name=checkbox[] type=checkbox value="animal3" />
    </label>
    <label>Parrot
      <input name=checkbox[] type=checkbox value="animal4" />
    </label>
  </div>  
  <div class="form-element">
    <label>What are your thoughts on being a morning person?</label> <!-- textarea -->
    <textarea name=textarea rows=3 cols=20></textarea>
  </div>  
  <div class="form-element">
    <label>Do you like coffee?</label> <!-- select dropdown -->
    <select name=coffee>
      <option value="yes">Yes</option>
      <option value="yeess">Yeess</option>
      <option value="OMG YES">OMG YES</option>
      <option value="...no...">...no...</option>>
    </select>
  </div>
  <div>
    <input type="submit" value="Submit" />
  </div>
</form>
