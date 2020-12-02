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


</body>
</html>