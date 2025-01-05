<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/reset.css">
    <title>Document</title>
</head>

<body>


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <input type="number" name="num01" placeholder="1st Number">
        <select name="operator" >
            <option value="add">+</option>
            <option value="subtract">-</option>
            <option value="multiply">*</option>
            <option value="divide">/</option>
        </select>
        <input type="number" name="num02" placeholder="2nd Number">
        <button>Calculate</button>
    </form>

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            //Grab data from input
            $num01 = filter_input(INPUT_POST, "num01", FILTER_SANITIZE_NUMBER_FLOAT);
            $num02 = filter_input(INPUT_POST, "num02", FILTER_SANITIZE_NUMBER_FLOAT);
            $operator = htmlspecialchars($_POST["operator"]);

            //Error Handlers
            $errors = false;

        if(empty($num01) || empty($num02) || empty($operator)) {
            echo "<p> Fill in all the fileds! </p>";
            $errors = true;
            }

        if(!is_numeric($num01) || !is_numeric($num02)){
            echo "<p> Only write numbers! </p>";
            $errors = true;
            }

            //Calculate the numbers if no errors
            if(!$errors){ 
                
                switch($operator){
                    case "add":
                        $value = $num01 + $num02;
                        break;
                    case "subtract":
                        $value = $num01 - $num02;
                        break;
                    case "multiply":
                        $value = $num01 * $num02;
                        break;
                    case "divide":
                        $value = $num01 / $num02;
                        break;
                    default:
                        echo "<p> Something is wrong. </p>";
                }
                echo $value; 
            }
        }

    ?>

</body>

</html>