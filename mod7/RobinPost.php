<!--
Robin Pindel
440 mod7 Programming Assignment
8/31/2023

PHP program creating and working with a form.
-->


<!DOCTYPE html>

<head>
  <title>Pindel mod7 PHP Return</title>
  <link href="./RobinForm.css" type="text/css" rel="stylesheet">
</head>

<?PHP

  $firstname = $_POST["firstname"];
  $lastname = $_POST["lastname"];
  $age = $_POST["age"];
  $alive = $_POST["radioButton"];
  $morning = $_POST["textarea"];
  $coffee = $_POST["coffee"];

  echo "Your name is $firstname $lastname.<br />You are $age years old.<br />Are you alive? $alive.<br />Your thoughts on the morning are that \"{$morning}\" and when asked if you like coffee you responded \"{$coffee}\"."

?>

