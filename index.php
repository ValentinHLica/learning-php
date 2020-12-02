<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learning PHP</title>
</head>
<body>
    <?php 
        $string1 = "Hello";
        $string2 = "World";
        echo "$string1 $string2 </br>";
        echo $string1 . " " . $string2 . "</br>";

        $num1 = 5;
        $num2 = 6;
        echo $num1 + $num2;
        echo "</br>";

        define("STRING","Hello World i am learning php");
        echo STRING
    ?>
</body>
</html>