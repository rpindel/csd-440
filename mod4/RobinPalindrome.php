<!--
Robin Pindel
440 mod4 Assignment
8/21/2023

Program to check if a string is a palindrome.
-->

<!DOCTYPE html>
<html lang="en-us">
<head>
  <title>Pindel Mod4 PHP Assignment</title>
  <link href="./Palindrome.css" type="text/css" rel="stylesheet">
</head>
<body>

<?PHP

function Palindrome($string) {
  # Print string
  echo ("Step 1 - Print string: ");
  echo ($string);
  echo ("<br />");
  
  # Force string to lowercase
  echo ("Step 2 - Change string to lowercase: ");
  $string = strtolower($string);
  echo ($string);
  echo ("<br />");

  # Strip spaces from string
  $string = str_replace(' ', '', $string);
  echo ("Step 3 - Strip spaces: ");
  echo ($string);
  echo ("<br />");

  # Reverse string and assign to temp variable
  $stringRev = strrev($string);
  echo ("Step 4 - Reverse string: ");
  echo ($stringRev);
  echo ("<br />");

  # Compare orignal and reverse equalities ==
  echo ("Step 5 - Is the string a palindrome (Step 3 == Step 4)?: ");
  if ($string == $stringRev) {
    echo ("The string IS a palindrome!");
  }
  else {
    echo ("The string is NOT a palindrome.");
  }
  echo ("<br />");
  echo ("<br />");
}

?>

<div id="container">
<div id="palindrome">
<h2>String: Race Car</h2>

<?PHP
Palindrome("Race Car");
?>

<h2>String: Girafarig</h2>

<?PHP
Palindrome("Girafarig");
?>

<h2>String: t A c O c A t</h2>

<?PHP
Palindrome("t A c O c A t");
?>
</div>

<div id="not-palindrome">
<h2>String: Thomas</h2>

<?PHP
Palindrome("Thomas");
?>

<h2>String: pal in drome</h2>

<?PHP
Palindrome("pal in drome");
?>

<h2>String: i Phone</h2>

<?PHP
Palindrome("i Phone");
?>
</div>
</div>

</body>
</html>