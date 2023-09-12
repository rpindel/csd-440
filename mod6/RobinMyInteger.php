<!--
Robin Pindel
440 mod6 Programming Assignment
8/29/2023

PHP program creating and working with a user-defined class.
-->
<!DOCTYPE HTML>
<head>
  <title>Robin Pindel mod6 PHP Assignment</title>
  <style>
    p {font-weight: bold;}
    #destroy {color: red;}
  </style>
</head>


<?PHP

// Create new instance of RobinMyInteger and set value via parameter
$test = new RobinMyInteger(1);
echo "<p>Testing with \" " . $test->getValue() . " \"</p>";
$test->isEven();
echo "<br />";
$test->isOdd();
echo "<br />";
$test->isPrime();
echo "<br />";
echo "<br />";

// Use same instance of RobinMyInteger and change value via set method
$test->setValue(2);
echo "<p>Testing with \" " . $test->getValue() . " \"</p>";
$test->isEven();
echo "<br />";
$test->isOdd();
echo "<br />";
$test->isPrime();
echo "<br />";
echo "<br />";

// Use same instance of RobinMyInteger and change value via set method
$test->setValue(3);
echo "<p>Testing with \" " . $test->getValue() . " \"</p>";
$test->isEven();
echo "<br />";
$test->isOdd();
echo "<br />";
$test->isPrime();

// Create new instance of RobinMyInteger and set value via parameter
$test2 = new RobinMyInteger(973);
echo "<p>Testing with \" " . $test2->getValue() . " \"</p>";
$test2->isEven();
echo "<br />";
$test2->isOdd();
echo "<br />";
$test2->isPrime();


class RobinMyInteger {
  public $int;

  function __construct(int $int) {
    $this->int = $int;
  }  

  function __destruct() {
    echo "<p id=\"destroy\">" . "<br />Bye bye my integer << {$this->getValue()} >>! (Destroyed)" . "</p>";
  }

  function isEven() {
    if ($this->int % 2 == 0) {
      echo "I am even!";
    }
    else {
      echo "I am not even.";
    }
  }

  function isOdd() {
    if ($this->int % 2 != 0) {
      echo "I am odd!";
    }
    else {
      echo "I am not odd.";
    }
  }

  function isPrime() {
    if ($this->int == 1) {
      echo "I am 1, I am not prime.";
    }
    else {
      for ($i = 2; $i < $this->int; $i++) {
        if ($this->int % $i == 0) {
          echo "I am not prime.";
          return;
        }
      }
      echo "I am prime.";
    }
  }

  function getValue() {
    return $this->int;
  }

  function setValue(int $int) {
    $this->int = $int;
  }
}

?>