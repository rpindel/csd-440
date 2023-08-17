<!--
Robin Pindel
440 mod1 Assignment
8/17/2023

HTML table via nestedt PHP loops mod2 programming assignment.  Code generates
a random number of rows and columns for the table between 1 and 10 and then 
inserts a random integer from 1 to 100 into each cell.
-->

<!DOCTYPE html>
<html lang="en-us">
<head>
  <title>Pindel Mod2 PHP Assignment</title>
  <link href="./RobinTable2.css" type="text/css" rel="stylesheet">
</head>
<body>

<div id="table-container">

<?PHP 
$rows = rand(1, 10);
$cols = rand(1, 10);
?>

<table>
  <caption>Random Integers 1 - 100</caption>
<?PHP
for ($i = 1; $i <= $rows; ++$i) {
  ?>
  
  <tr>
  
  <?PHP
  for ($j = 1; $j <= $cols; ++$j) {
    ?>

    <td>
    
    <?PHP 
    echo(rand(1,100));
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

</body>
</html>