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

[TheErrorHandling](https://github.com/PolVilniusTech/coding.php/tree/main/samples/TheErrorHandling.php)

#### Notes of the Errors.
There exists pre-defined errors and user-defined errors.

If application would get the Error or Exception, then it would be returned the same (or similar) information about it.

Logging errors and (or) using syslog is good way for keeping data about errors for later use.

Error logging is essential for getting hang on what happened with the environment.


### The Interpretation of the Code

#### About the Interpretation of the Code.
The Code between opening and closing tags will be parsed by the Interpreter.

#### Follow the Syntax.
If default parsing is defined:
```
This code will be shown without interpretation <?php This code will be interpreted ?> This code will be shown without interpretation
```
If short_open_tag is enabled in php.ini and (or) by configuration:
```
This code will be shown without interpretation <?= This code will be interpreted ?> This code will be shown without interpretation
```

#### Notes of the Interpretation of the Code.
If file has single pair of the opening and closing tags, then first one is good enough for code to work.


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
  
