<!--
Robin Pindel
440 mod2 Assignment
8/17/2023

HTML table via nested PHP loops mod2 programming assignment.  Code generates
a random number of rows and columns for the table between 1 and 10 and then 
inserts a random integer from 1 to 100 into each table cell.
-->

<!DOCTYPE html>
<html lang="en-us">
<head>
  <title>Pindel Mod2 PHP Assignment</title>
  <link href="./RobinTable2.css" type="text/css" rel="stylesheet">
</head>
<body>

<div id="page-container">
  <div id="label-container">
    <h1>Random Integers 1 - 100</h1>
  </div>

  <div id="table-container">

  <?PHP 
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
      echo(rand(1, 100));
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