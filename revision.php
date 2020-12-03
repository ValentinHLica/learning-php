<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Revision</title>
    <style>
        .error {
            background-color: tomato;
            color: white;
        }

        .success {
            background-color:green;
            color:white
        }
    </style>
</head>
<body>
    <!-- Include/Require -->
    <?php 
        // include "server-info.php" // more forgiving if the file is available;
        require "server-info.php" // not forgiving if the file is available;
    ?>

    <br><br>

    <!-- Variables -->
    <?php 
        $str1 = "Hello";
        $str2 = "World";

        echo $str1 . " ". $str2 . "<br>";

        $num1 = 4;
        $num2 = 3;

        echo $num1 + $num2;
        echo "<br>";

        define("CONSTANT","This is Constant");
        echo CONSTANT . "<br>"
    ?>

    <br><br>

    <!-- Arrays -->
    <?php 
        $people = array("Tom","John","Smith");
        $person = ["Ryan","Conner","Kevin"];

        $objects = array(
            "name"=>"Kevin",
            "info"=>array(
                "age"=>15
            )
        )
    ?>

    <br><br>

    <!-- Loops -->
    <?php 
        for ($i=0; $i < 5; $i++) { 
            echo "Count: $i <br>";
        }
        
        echo "<br>";

        $j = 5;
        while ($j > 0) {
            echo "Count: $j <br>";
            $j--;
        }

        echo "<br>";

        foreach ($people as $preson ) {
            echo "Count: $preson <br>";
        }
    ?>

    <br><br>

    <!-- Functions -->
    <?php 
        function printer($string){
            echo "$string  <br>";
        }

        printer("Hello World")
    ?>

    <br><br>

    <!-- Conditionals -->
    <?php 
        if (5<6) {
            echo "5 is smaller than 6 <br>";
            echo (9>10) ? "10 is smaller than 10 <br>" :  "9 is smaller than 10 <br>";
        } else {
            echo "6 is smaller than 5 <br>";
        }


        $color = "blue";

        switch ($color) {
            case 'blue':
                echo "Blue is your favourite color<br>";
                break;
            case 'red':
                echo "Red is your favourite color<br>";
                break;
            
            default:
                echo "I dont know what your favourite color is<br>";
                break;
        }

    ?>

    <br><br>

    <!-- Date -->
    <?php 
        echo date("d/m/Y s:i:h") // d-day, m-month, Y-year  s-seconds, i-minutes, h-hours, a-AM/PM
    ?>

    <br><br>

    <!-- SuperGlobals -->
    <?php if ($server): ?>
        <ul>
            <?php foreach ($server as $key => $value): ?>
                <li><?php echo $key . ": " . $value ?></li>
            <?php endforeach ?>
        </ul>
    <?php endif ?>

    <?php if ($user): ?>
        <ul>
            <?php foreach ($user as $key => $value): ?>
                <li><?php echo $key . ": " . $value ?></li>
            <?php endforeach ?>
        </ul>
    <?php endif ?>

    <br><br>

    <!-- GET/POST -->
    <?php 
        $alertMessage = "";
        $alertType = "";

        if (filter_has_var(INPUT_POST,"submit")) {
            $userName = $_POST["userName"];
            $userEmail = $_POST["userEmail"];

            if (!empty($userName) && !empty($userEmail)) {
                $userEmail = filter_var($userEmail,FILTER_SANITIZE_EMAIL);

                if (filter_var($userEmail,FILTER_VALIDATE_EMAIL)) {
                    $alertMessage = "Success";
                    $alertType = "success"; 
                } else {
                    $alertMessage = "Please provide a valid email address";
                    $alertType = "error";  
                }

            } else {
                $alertMessage = "Please provide all fields";
                $alertType = "error";        
            }

        };
    ?>

    <?php if (!empty($alertMessage)): ?>
        <div class="<?php echo $alertType ?>">
            <?php echo $alertMessage ?>
        </div>
    <?php endif ?>

    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
        <input type="text" placeholder="User Name" name="userName" value="<?php echo isset($_POST["userName"]) ? $userName : "" ?>">
        <input type="text" placeholder="User Email" name="userEmail" value="<?php echo isset($_POST["userEmail"]) ? $userEmail : "" ?>">
        <input type="submit" value="Send" name="submit">
    </form>

</body>
</html>