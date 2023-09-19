<?PHP

//This will succeed because find and replace cases match
echo str_replace("choice", "Mew", "Line 1 - My favorite Pokemon is choice.");
echo "<br />";

//This will fail becauses find and replace cases do not match
echo str_replace("choice", "Mew", "Line 2 - My favorite Pokemon is CHOICE.");
echo "<br />";

//This will succeed because find and replace cases are not an issue for str_ireplace()
echo str_ireplace("cHoIcE", "Mew", "Line 3 - My favorite Pokemon is ChOiCe.");

?>