## List of Contents
* The Arrays
* The Comments
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
Padding the code depending by previous padding or after the functions, loops.


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
  
