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
  "firstname" => "Alpha", 
  "lastname" => "Smith", 
  "age" => "37", 
  "phone" => "111-111-1111"
);

$c2 = array(
  "firstname" => "Beta", 
  "lastname" => "Jones", 
  "age" => "23", 
  "phone" => "222-222-2222"
);

$c3 = array(
  "firstname" => "Charlie", 
  "lastname" => "Smith", 
  "age" => "25", 
  "phone" => "333-333-3333"
);

$c4 = array(
  "firstname" => "Delta", 
  "lastname" => "Jones", 
  "age" => "14", 
  "phone" => "444-444-4444"
);

$c5 = array(
  "firstname" => "Echo", 
  "lastname" => "Greyson", 
  "age" => "17", 
  "phone" => "555-555-5555"
);

$c6 = array(
  "firstname" => "Foxtrot", 
  "lastname" => "Smith", 
  "age" => "27", 
  "phone" => "666-666-6666"
);

$c7 = array(
  "firstname" => "Golf", 
  "lastname" => "Greyson", 
  "age" => "46", 
  "phone" => "777-777-7777"
);

$c8 = array(
  "firstname" => "Hotel", 
  "lastname" => "Greyson", 
  "age" => "53", 
  "phone" => "888-888-8888"
);

$c9 = array(
  "firstname" => "India", 
  "lastname" => "Greyson", 
  "age" => "19", 
  "phone" => "999-999-9999"
);

$c10 = array(
  "firstname" => "Juliett", 
  "lastname" => "Smith", 
  "age" => "13", 
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

?>

<div id="container">
<div id="table">

<?PHP
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

</div>
<div id="results">

<?PHP

/*
$key = array_column($customers, "age");
array_multisort($key, SORT_DESC, $customers);
*/

$whoage = array_filter($customers,
  function ($customer) {
      return $customer['age'] === '37';
  }
);

echo "<p>The customer details for those who are 37 years old:</p>";
foreach($whoage as $who) {
  foreach($who as $what => $details) {
    echo "{$what} : {$details}";
    echo "<br />";
  }
}

####

$whoname = array_filter($customers,
  function ($customer) {
      return $customer['lastname'] === 'Smith';
  }
);

echo "<p>The customer details for those whose last name is Smith:</p>";
foreach($whoname as $who) {
  foreach($who as $what => $details) {
    echo "{$what} : {$details}";
    echo "<br />";
  }
  echo "<br />";
}
echo "<br />";

####

$age37 = $whoage[0]["firstname"];
echo "$age37 is 37 years old.";

?>

</div>
</div>