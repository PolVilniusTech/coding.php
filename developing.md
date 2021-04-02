## List of Contents
* The Arrays
* The Comments
* The Control Statements
* The Errors
* The Interpretation of the Code
* The Text
TODO.

### The Arrays

#### About the Arrays.
2 to N dimensional data — key and value pairs where specific key represents it's value(s). 

#### Follow the Syntax.
If the key and value are defined of our Array:
```
$arrayName = array(
   'first' => 'value of the first key',
   'second' => 'value of the second key',
   ...
);  
```
#### Notes of the Arrays.
Padding the code depending by previous padding or after the control operators (i.e. various functions like loops).


### The Comments

#### About the Comments.
Leaving some information, which would be reasonably useful for understanding the code.

#### Follow the Syntax.
```
#Single line of the Comment
//Single line of the Comment
/*Multiple lines of the Comments*/
```
#### Notes of the Comments.
Code Documentator would help to automate the explanation of the Code.


### The Control Statements

#### About the Control Statements.
These Statements controls the flow of the code.

#### Follow the Syntax.
If the situation requires to write in one line up to 80 characters:
```
$conditionYes = 'YES, all the conditions are met.';
$conditionNo = 'NO, not all the conditions are met.';

$alice = ($conditionOne && $conditionTwo);
$alice = ($conditionOne && $conditionTwo) ? $conditionYes : $conditionNo;

if ($conditionOne && $conditionTwo) {
   //Operations containing various calls and variables (only if both conditions are met).
   //All the code should be indented by one tab to the right.
} elseif ($conditionOne) {
   //Operations containing various calls and variables (only if first condition is met).
   //All the code should be indented by one tab to the right.
} elseif ($conditionTwo) {
   //Operations containing various calls and variables (only if second condition is met).
   //All the code should be indented by one tab to the right.
} else {
   //Operations containing various calls and variables (if no conditions were met.)
   //All the code should be indented by one tab to the right.
}
```
If the situation requires to split the code into more than one line:
```
$conditionYes = 'YES, all the conditions are met.';
$conditionNo = 'NO, not all the conditions are met.';

if (
      $conditionOne 
   && $conditionTwo
) {
   $bob = $conditionYes;
}
else {
   $bob = $conditionNo;
}

```
#### Notes of the Control Statements.
After control statements it is neccessary to use indentation.


### The Errors

#### About the Errors.
Handling the errors are essential for fluent conversation of the code.

#### Follow the Syntax.
If there is defined how those Errors are thrown:
```
throw new Error('Message about the Error.', 101);
```
Then there is a way how to try and catch (specific) Errors:  
```
try { 
   //looking for errors in the code
} catch (Error $e) {
   //catching (specific) errors
} finally {
   //code, if there is no catch
}
```
Other (in-build) possibilities:
```
ArithmeticError
   DivisionByZeroError
AssertionError
ParseError
TypeError
   ArgumentCountError
```

#### Sample.
```
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
```
#### Notes of the Errors.
There exists pre-defined errors and user-defined errors.
If application would get the Error or Exception, then it would be returned the same (or similar) information about it.
Logging errors and (or) using syslog is good way for keeping data about errors for later use.
Error logging is essential for getting hang on what happened with the environment.


### The Interpretation of the Code

#### About the Interpretation of the Code.
Programming language parses the files, so there are places where interpretation starts and where ends.

#### Follow the Syntax.
If default parsing is defined:
```
This code will be shown without interpretation <?php This code will be interpreted ?>
```
If short_open_tag is enabled in php.ini and (or) by configuration:
```
This code will be shown without interpretation <?= This code will be interpreted ?>
```
#### Notes of the Interpretation of the Code.
If file has single opening and closing tag, then first one is good enough for code to work.


### The Text

#### About the Text.
String — 256 byte character-set, without Unicode support. Character the same as a byte.
Configuration with the UTF-8 should be possible.

#### Follow the Syntax.
If the single quotes is used:
```
$simpleText = 'This is our text';
$simpleText = 'Additional single quote shown in our text: \'';
$simpleText = 'Additional single backslash shown in our text: \\';
```
If the double quotes is used:
```
$advancedText = "This is our text";
$advancedText = "Additional ASCII 92th value — Backslash \\";
$advancedText = "Additional ASCII 13th value — Carriage Return \r";
$advancedText = "Additional ASCII 36th value — Dollar Sign \$";
$advancedText = "Additional ASCII 34th value — Double Quote \"";
$advancedText = "Additional ASCII 27th value — Escape \e";
$advancedText = "Additional ASCII 12th value — Form Feed \f";
$advancedText = "Additional ASCII 9th value — Horizontal Tab \t";
$advancedText = "Additional ASCII 10th value — LineFeed \n";
$advancedText = "Additional ASCII 11th value — Vertical Tab \v";
$advancedText = "Additional text containing the value of the variable $var";
$advancedText = "Additional text containing the value of the variable strictly named as {$var}";
```
If the Heredoc syntax is used:
```
$regularText = <<<EOT
This is our first line.
This is our second line.
This is our third line.
EOT;
```
```
$advancedText = <<<EOT
This is our first line containing additional data from variable $var or {$var}.
This is our second line containing additional data from variable in the object {$obj->var}.
This is our third line containing additional data from array in the object {$obj->arr[0]}.
EOT;
```
#### Notes of the Text.
If You have to define the String, then use single quote.
If You have to extend the String containing additional functionality, then use double quote.
Heredoc dislikes paddings.
  
