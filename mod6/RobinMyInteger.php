<!--
Robin Pindel
440 mod6 Programming Assignment
8/29/2023

PHP program creating and working with a user-defined class.
-->
<head>
  <style>
    p {font-weight: bold;}
    #destroy {color: red;}
  </style>
</head>


<?PHP

$test = new RobinMyInteger(1);
echo "<p>Testing with \" " . $test->getValue() . " \"</p>";
$test->isEven();
echo "<br />";
$test->isOdd();
echo "<br />";
$test->isPrime();
echo "<br />";
echo "<br />";

$test->setValue(2);
echo "<p>Testing with \" " . $test->getValue() . " \"</p>";
$test->isEven();
echo "<br />";
$test->isOdd();
echo "<br />";
$test->isPrime();
echo "<br />";
echo "<br />";

$test->setValue(3);
echo "<p>Testing with \" " . $test->getValue() . " \"</p>";
$test->isEven();
echo "<br />";
$test->isOdd();
echo "<br />";
$test->isPrime();

$test->setValue(973);
echo "<p>Testing with \" " . $test->getValue() . " \"</p>";
$test->isEven();
echo "<br />";
$test->isOdd();
echo "<br />";
$test->isPrime();


class RobinMyInteger {
  public $int;

  function __construct(int $int) {
    $this->int = $int;
  }  

  function __destruct() {
    echo "<p id=\"destroy\">" . "<br />Bye bye my integer! (Destroyed)" . "</p>";
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