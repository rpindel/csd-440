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

  $formComplete = True;
  $firstname = $_POST["firstname"];
  $lastname = $_POST["lastname"];
  $age = $_POST["age"];
  if (array_key_exists("radioButton", $_POST)) {
    $alive = $_POST["radioButton"]; 
  }
  else {
    $alive = NULL;
  }
  $morning = $_POST["textarea"];
  $coffee = $_POST["coffee"];

  if (!$firstname) {
    $formComplete = False;
    $firstnameError = "You did not provide your first name.";
  }

  if (!$lastname) {
    $formComplete = False;
    $lastnameError = "You did not provide your last name.";
  }

  if (!$age) {
    $formComplete = False;
    $ageError = "You did not provide your age.";
  }

  if (!$alive) {
    $formComplete = False;
    $aliveError = "You did not indicate if you were alive.  I think you may be dead...";
  }

  if (!$morning) {
    $formComplete = False;
    $morningError = "You did not provide your opinion on being a morning person.";
  }

  if (!$coffee) {
    $formComplete = False;
    $coffeeError = "You did not indicate if you liked coffee.";
  }

  if ($formComplete) {
    echo "<div id=\"page-container\">"; 
    echo "<div id=\"label-container\">";
    echo "<h3>Who are you?</h3>";
    echo "</div>";
    echo "<table border=\"1\">";
    echo "<div id=\"table-container\">";
      echo "<tr>";
        echo "<td class=\"lbl\">First Name</td><td>$firstname</td>";
      echo "</tr>";
      echo "<tr>";
        echo "<td class=\"lbl\">Last Name</td><td>$lastname</td>";
      echo "</tr>";
      echo "<tr>";
        echo "<td class=\"lbl\">Age</td><td>$age</td>";
      echo "</tr>";
      echo "<tr>";
        echo "<td class=\"lbl\">Alive</td><td>$alive</td>";
      echo "</tr>";
      echo "<tr>";
        echo "<td class=\"lbl\">Liked Animals</td><td>";

        if (!empty($_POST["checkbox"])) {
          foreach($_POST["checkbox"] as $animal) {
            echo "$animal <br />";
          }
        }
        else {
          echo "You did not like any of the presented animal options.";
        }

        echo "</td>";
      echo "</tr>";
      echo "<tr>";
        echo "<td class=\"lbl\">Morning Person?</td><td>$morning</td>";
      echo "</tr>";
      echo "<tr>";
        echo "<td class=\"lbl\">Coffee!?</td><td>$coffee</td>";
      echo "</tr>";
    echo "</table>";
    echo "</div>";
    echo "</div>";
    echo "<br/><br />";
    echo "<a href=\".\\RobinForm.php\">Try Again</a>";
  }
  else {
    echo "<br />";

    $errors = array();
    if (!$firstname) {
      array_push($errors, $firstnameError);
    }
    if (!$lastname) {
      array_push($errors, $lastnameError);
    }
    if (!$age) {
      array_push($errors, $ageError);
    }
    if (!$alive) {
      array_push($errors, $aliveError);
    }
    if (!$morning) {
      array_push($errors, $morningError);
    }
    if (!$firstname) {
      array_push($errors, $coffeeError);
    }

    foreach($errors as $error) {
      echo "$error <br />";
    }

    echo "<br/><br />";
    echo "<a href=\".\\RobinForm.php\">Try Again</a>";
  }

?>

