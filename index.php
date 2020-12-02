<?php require "server-info.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learning PHP</title>
</head>
<body>
    <!-- Docs -->
    <!-- https://www.php.net/manual/en/ -->

    <!-- Include/Requrie -->
    <?php 
        // include "layout/header.php"; // Forgiving if file does not exist
        require "layout/header.php"; // Not forgiving if file does not exist     
    ?>


    <!-- Variables -->
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

    <br>
    <br>


    <!-- Arrays -->
    <?php 
        $people = array("Jim","Hudini","Voni");
        echo count($people);

        echo "</br>";

        $newPeople = ["Toni","Louis","Ryan"];
        echo print_r($newPeople);

        echo "</br>";

        $objects = array(
            "name"=>"John",
            "age"=>15,
            "isMale"=>true,
            "family"=>array(
                "mother"=>"Sharol",
                "father"=>"Jim",
                "siblings"=> array(
                    array(
                        "name"=>"Jack",
                        "isMale"=>true,
                        "age"=>21
                    )
                )
            )
        );
        echo  $objects["name"] . " mothers name is " . $objects["family"]["mother"];
        echo "</br>";
        echo count($objects["family"]["siblings"]);
        echo "</br>";
        echo var_dump($objects);

    ?>

    <br>
    <br>

    <!-- Loops -->
    <?php 
        for ($i=0; $i < 10; $i++) { 
           echo $i;
           echo "<br>";
        };

        echo "<br>";

        $j = 5;
        while($j>0){
            echo $j;
            echo "<br>";
            $j--;
        }

        echo "<br>";

        $peopleArray = array("John","Kim","Sharol");
        foreach ($peopleArray as $preson) {
            echo $preson;
            echo "<br>"; 
        }

        echo "<br>";

        $peopleObject = array(
            "Bill"=>12,
            "Kays"=>65,
            "Jill"=>45
        );
        foreach ($peopleObject as $person => $age) {
            echo "$person is $age";
            echo "<br>"; 
        }

    ?>

    <br>
    <br>

    <!-- Functions -->
    <?php 
        function simpleFun(){
            echo "Inside Function";
        };

        simpleFun();
    ?>

    <br>
    <br>

    <!-- Conditionals -->
    <?php 
        $num3 = 5;
        if ($num3 > 6) {
            echo "$num3 is greater than 6";
            echo "<br>";
            if ($num3 === 10) {
                echo "$num3 is the same as 10";
                echo "<br>";
            };
        }else {
            echo "$num3 is smaller than 6";
            echo "<br>";
        }

        echo "<br>";

        echo $num3 > 8 ?  "$num3 is greater than 8": "$num3 is smaller than 8";

        echo "<br>";

        $color = "red";
        switch ($color) {
            case 'red':
                echo "red is our favourite color";
                break;
            case 'blue':
                echo "blue is our favourite color";
                break;
            case 'yellow':
                echo "yellow is our favourite color";
                break;
            
            default:
                echo "somthing else is our favourite color";
                break;
        }
    ?>

    <br>
    <br>

    <!-- Date -->
    <?php 
        echo date("d");  // d-day, m-month, Y-year, h-hours, i-minutes, s-seconds, a-AM/PM
        echo "<br>";
        echo date("d/m/Y h:i:sa");
    ?>


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

    <br>
    <br>

    <!-- GET/POST -->
    <form action="index.php" method="get">
        <input type="text" placeholder="Name" name="name">
        <input type="text" placeholder="Email" name="email">
        <button type="submit">Go</button>
    </form>
    <?php 
        if (isset($_GET["name"]) || isset($_GET["email"])) {
            echo "User Name: ". $_GET["name"] . "<br> Email Address: ". $_GET["email"];
        };
    ?>

    <br>

    <form action="index.php" method="post">
        <input type="text" placeholder="Name" name="name">
        <input type="text" placeholder="Email" name="email">
        <button type="submit">Go</button>
    </form>
    <?php 
        if (isset($_POST["name"]) || isset($_POST["email"])) {
            echo "User Name: ". $_POST["name"] . "<br> Email Address: ". $_POST["email"] . "<br>";
        };
    ?>

    <!-- Filter/Validation -->
    <?php 
        if (filter_has_var(INPUT_POST,"name") && filter_has_var(INPUT_POST,"email")) {
           echo "Your name is ".$_POST["name"]. "and your email is ". $_POST["email"];

           echo "<br>";

           // or filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)    
           if (filter_input(INPUT_POST,"email",FILTER_VALIDATE_EMAIL)) {
               echo "Good Email <br>";
           } else {
               echo "Bad Email: ";
               echo filter_var($_POST["email"],FILTER_SANITIZE_EMAIL);
           }
        }
    ?>

    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        <input type="text" placeholder="Name" name="name">
        <input type="text" placeholder="Email" name="email">
        <input type="submit" value="Go">
    </form>

    <?php 
        $inputs = array(
            "name"=>"John Doe",
            "email"=>"johndoe@example.com",
            "age"=>65
        );

        $filters = array(
            "name"=>array(
                "filter"=>FILTER_CALLBACK,
                "options"=>"ucwords"
            ),
            "email"=>FILTER_SANITIZE_EMAIL,
            "age"=>array(
                "filter"=>FILTER_VALIDATE_INT,
                "options"=>array(
                    "min_range"=>5,
                    "max_range"=>100
                )
            )
        );

        print_r(filter_var_array($inputs,$filters));
    ?>


</body>
</html>