<!--
Robin Pindel
440 mod3 Assignment
8/19/2023

Function-enhanced HTML table via nested PHP loops mod3 programming assignment.  
Code generates a random number of rows and columns for the table between 1 and 10 and then 
calls an external function to insert a random integer sum into each table cell.
-->

<!DOCTYPE html>
<html lang="en-us">
<head>
  <title>Pindel Mod3 PHP Assignment</title>
  <link href="./zRobinTable3.css" type="text/css" rel="stylesheet">
</head>
<body>

<div id="page-container">
  <div class="label-container">
    <h1>Random Integers 1 - 100 v2</h1>
  </div>
  <div class="label-container">
    <h2>Now with function power!</h2>
  </div>

  <div id="table-container">

  <?PHP
  require_once('PindelNumberFunction.php');

  $rows = rand(1, 10); #Generate random number of rows for table
  $cols = rand(1, 10); #Generate random number of columns for table
  ?>

  <table>
  
  <?PHP
  for ($i = 1; $i <= $rows; ++$i) {
    ?>
  
    <tr>
  
    <?PHP
    for ($j = 1; $j <= $cols; ++$j) {
      ?>

      <td>
    
      <?PHP 
      $num1 = rand(1, 100); #Generate random number 1
      $num2 = rand(1, 100); #Generate random number 2
      echo(NumSum($num1, $num2)); #Pass random numbers 1 and 2 to function for summation and value return
      ?>

      </td>

      <?PHP
    }
    ?>

    </tr>

    <?PHP
  }
  ?>  

  </table>

  </div>
</div>

</body>
</html>