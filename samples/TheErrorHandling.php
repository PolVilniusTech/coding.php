#!/usr/bin/php

<?php

class checklist {

  protected $globe = array();
  public $args = array();
  public $total = 0;

  public function __construct(&$lg) {
    $this->prepare($lg);
  }

  private function prepare($lg) {
    foreach($lg as $key => $value) {
      $this->globe[(string)$key] = $value;
    }

    echo 'Total Arguments:' . (int)$this->globe['GLOBALS']['argc'] . "\n\r";
    echo "\n\r";    

    if ((int)$this->globe['GLOBALS']['argc'] > 1) {
      foreach($this->globe['GLOBALS']['argv'] as $key => $value) {
        if ($key === 0) { 
          echo "Script Argument Values:\n\r"; 
          continue; 
        }
        $this->args[] = $value;
        echo $value . "\n\r";    
      }
      $this->total = count($this->args);
      echo "\n\r";
    }
  }

  public function isDefinedScriptArguments() {
    if (empty($this->args)) {
      throw new Error('Please pass the arguments into the script. I.e. php main.php first_argument second_argument third_argument', 0);
    }
  }

  public function isInteger($x) {
    if (is_int($x) === false) {
      throw new Error('This is not an integer. The Answer is Please type the integer.', 1);
    }
  }

  public function isFloat($x) {
    if (is_float($x) === false) {
      throw new Error('This is not a float number. The Answer is Please type the float number.', 2);
    }
  }

  public function divide($x, $y) {
    if ($y == 0) {
      throw new Error('Division by zero. The Answer is Undefined.', 3);
    }
  }

  public function squareRoot($x) {
    if ($x < 0) {
      throw new Error('Square root of negative number a. The Answer is Imaginary unit i multiply by square root of positive number a.', 4);
    }
  }
}

$chk = new checklist($GLOBALS);

$i = 0;


echo "Testing: Does additional arguments have been provided to the Script?";
echo "\n\r";

try {
  $chk->isDefinedScriptArguments();
} catch(Error $e) {
  $i = $i + 1;
  $j = 0;
  echo "{$i}.{$j}. The Error message: " . $e->getMessage() . "\n\r";
  $j = $j + 1;
  echo "{$i}.{$j}. The Error code is: " . $e->getCode() . "\n\r";
  $j = $j + 1;
  echo "{$i}.{$j}. The Error happened in the file: " . $e->getFile() . "\n\r";
  $j = $j + 1;
  echo "{$i}.{$j}. The Error throw line is: " . $e->getLine() . "\n\r";
  $j = $j + 1;
  echo "{$i}.{$j}. The Stack trace is:\n\r" . var_export($e->getTrace(), true) . "\n\r";
  echo "\n\r";
  exit;
} finally {
  echo "OK\n\r";
  echo "\n\r";
}


echo "Testing: Does all provided arguments are integers?";
echo "\n\r";

foreach ($chk->args as $key => $value) {
  try {
    $chk->isInteger($value);
  } catch(Error $e) {
    $i = $i + 1;
    $j = 0;
    echo "{$i}.{$j}. The Error message: " . $e->getMessage() . "\n\r";
    $j = $j + 1;
    echo "{$i}.{$j}. The Error code is: " . $e->getCode() . "\n\r";
    $j = $j + 1;
    echo "{$i}.{$j}. The Error happened in the file: " . $e->getFile() . "\n\r";
    $j = $j + 1;
    echo "{$i}.{$j}. The Error throw line is: " . $e->getLine() . "\n\r";
    $j = $j + 1;
    echo "{$i}.{$j}. The Stack trace is:\n\r" . var_export($e->getTrace(), true) . "\n\r";
    echo "\n\r";
    continue;
  } finally {
    echo "\n\r";
    echo $key + 1 . " out of {$chk->total} "; echo gettype($chk->args[$key]); echo " .\n\r";

    echo "Testing: Square root from the value {$chk->args[$key]}?";
    echo "\n\r";

    try {
      $chk->squareRoot($chk->args[$key]);
    } catch(Error $e) {
      $i = $i + 1;
      $j = 0;
      echo "{$i}.{$j}. The Error message: " . $e->getMessage() . "\n\r";
      $j = $j + 1;
      echo "{$i}.{$j}. The Error code is: " . $e->getCode() . "\n\r";
      $j = $j + 1;
      echo "{$i}.{$j}. The Error happened in the file: " . $e->getFile() . "\n\r";
      $j = $j + 1;
      echo "{$i}.{$j}. The Error throw line is: " . $e->getLine() . "\n\r";
      $j = $j + 1;
      echo "{$i}.{$j}. The Stack trace is:\n\r" . var_export($e->getTrace(), true) . "\n\r";
      echo "\n\r";
      exit;
    } finally {
      echo "Results: sqrt( {$chk->args[$key]} ) = ";
      echo sqrt($chk->args[$key]);
      echo "\n\r";
    }


    if ($key >= 1) {
      echo "Testing: Does {$chk->args[$key-1]} can be divided by {$chk->args[$key]}?";
      echo "\n\r";

      try {
        $chk->divide($chk->args[$key-1], $chk->args[$key]);
      } catch(Error $e) {
        $i = $i + 1;
        $j = 0;
        echo "{$i}.{$j}. The Error message: " . $e->getMessage() . "\n\r";
        $j = $j + 1;
        echo "{$i}.{$j}. The Error code is: " . $e->getCode() . "\n\r";
        $j = $j + 1;
        echo "{$i}.{$j}. The Error happened in the file: " . $e->getFile() . "\n\r";
        $j = $j + 1;
        echo "{$i}.{$j}. The Error throw line is: " . $e->getLine() . "\n\r";
        $j = $j + 1;
        echo "{$i}.{$j}. The Stack trace is:\n\r" . var_export($e->getTrace(), true) . "\n\r";
        echo "\n\r";
        exit;
     } finally {
      echo "Results: {$chk->args[$key-1]} / {$chk->args[$key]} = ";
      echo (int)$chk->args[$key-1] / (int)$chk->args[$key];
      echo "\n\r";
     }
    }
    echo "\n\r";
  }
}


echo "Testing: Does all provided arguments are floats?";
echo "\n\r";

foreach ($chk->args as $key => $value) {
  try {
    $chk->isFloat($value);
  } catch(Error $e) {
    $i = $i + 1;
    $j = 0;
    echo "{$i}.{$j}. The Error message: " . $e->getMessage() . "\n\r";
    $j = $j + 1;
    echo "{$i}.{$j}. The Error code is: " . $e->getCode() . "\n\r";
    $j = $j + 1;
    echo "{$i}.{$j}. The Error happened in the file: " . $e->getFile() . "\n\r";
    $j = $j + 1;
    echo "{$i}.{$j}. The Error throw line is: " . $e->getLine() . "\n\r";
    $j = $j + 1;
    echo "{$i}.{$j}. The Stack trace is:\n\r" . var_export($e->getTrace(), true) . "\n\r";
    echo "\n\r";
    continue;
  } finally {
    echo "\n\r";
    echo $key + 1 . " out of {$chk->total} is "; echo gettype($chk->args[$key]); echo " .\n\r";

    echo "Testing: Square root from the value {$chk->args[$key]}?";
    echo "\n\r";

    try {
      $chk->squareRoot($chk->args[$key]);
    } catch(Error $e) {
      $i = $i + 1;
      $j = 0;
      echo "{$i}.{$j}. The Error message: " . $e->getMessage() . "\n\r";
      $j = $j + 1;
      echo "{$i}.{$j}. The Error code is: " . $e->getCode() . "\n\r";
      $j = $j + 1;
      echo "{$i}.{$j}. The Error happened in the file: " . $e->getFile() . "\n\r";
      $j = $j + 1;
      echo "{$i}.{$j}. The Error throw line is: " . $e->getLine() . "\n\r";
      $j = $j + 1;
      echo "{$i}.{$j}. The Stack trace is:\n\r" . var_export($e->getTrace(), true) . "\n\r";
      echo "\n\r";
      exit;
    } finally {
      echo "Results: sqrt( {$chk->args[$key]} ) = ";
      echo sqrt($chk->args[$key]);
      echo "\n\r";
    }


    if ($key >= 1) {
      echo "Testing: Does {$chk->args[$key-1]} can be divided by {$chk->args[$key]}?";
      echo "\n\r";

      try {
        $chk->divide($chk->args[$key-1], $chk->args[$key]);
      } catch(Error $e) {
        $i = $i + 1;
        $j = 0;
        echo "{$i}.{$j}. The Error message: " . $e->getMessage() . "\n\r";
        $j = $j + 1;
        echo "{$i}.{$j}. The Error code is: " . $e->getCode() . "\n\r";
        $j = $j + 1;
        echo "{$i}.{$j}. The Error happened in the file: " . $e->getFile() . "\n\r";
        $j = $j + 1;
        echo "{$i}.{$j}. The Error throw line is: " . $e->getLine() . "\n\r";
        $j = $j + 1;
        echo "{$i}.{$j}. The Stack trace is:\n\r" . var_export($e->getTrace(), true) . "\n\r";
        echo "\n\r";
        exit;
     } finally {
      echo "Results: {$chk->args[$key-1]} / {$chk->args[$key]} = ";
      echo (float)$chk->args[$key-1] / (float)$chk->args[$key];
      echo "\n\r";
     }
    }
  }
}

?>
