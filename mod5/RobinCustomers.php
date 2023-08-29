<!--
Robin Pindel
440 mod5 Programming Assignment
8/28/2023

PHP program displaying and working with customer array data.
-->

<head>
  <title>Pindel Mod5 PHP Assignment</title>
  <link href="./RobinCustomers.css" type="text/css" rel="stylesheet">
</head>

<?php

$c1 = array(
  "fname" => "Alpha", 
  "lname" => "Alpha", 
  "age" => "11", 
  "phone" => "111-111-1111"
);

$c2 = array(
  "fname" => "Beta", 
  "lname" => "Beta", 
  "age" => "12", 
  "phone" => "222-222-2222"
);

$c3 = array(
  "fname" => "Charlie", 
  "lname" => "Charlie", 
  "age" => "13", 
  "phone" => "333-333-3333"
);

$c4 = array(
  "fname" => "Delta", 
  "lname" => "Delta", 
  "age" => "14", 
  "phone" => "444-444-4444"
);

$c5 = array(
  "fname" => "Echo", 
  "lname" => "Echo", 
  "age" => "15", 
  "phone" => "555-555-5555"
);

$c6 = array(
  "fname" => "Foxtrot", 
  "lname" => "Foxtrot", 
  "age" => "16", 
  "phone" => "666-666-6666"
);

$c7 = array(
  "fname" => "Golf", 
  "lname" => "Golf", 
  "age" => "17", 
  "phone" => "777-777-7777"
);

$c8 = array(
  "fname" => "Hotel", 
  "lname" => "Hotel", 
  "age" => "18", 
  "phone" => "888-888-8888"
);

$c9 = array(
  "fname" => "India", 
  "lname" => "India", 
  "age" => "19", 
  "phone" => "999-999-9999"
);

$c10 = array(
  "fname" => "Juliett", 
  "lname" => "Juliett", 
  "age" => "20", 
  "phone" => "202-202-2020"
);



$customers = array(
  $c1, 
  $c2, 
  $c3, 
  $c4,
  $c5,
  $c6,
  $c7,
  $c8,
  $c9,
  $c10 
);

echo "<table border=\"1\">";
echo "<tr><th>First Name</th><th>Last Name</th><th>Age</th><th>Telephone</th>";
foreach ($customers as $customer) {
  echo "<tr>";
  foreach ($customer as $value) {
    echo "<td> $value </td>";
  }
  echo "</tr>";
}
echo "</table>";

?>