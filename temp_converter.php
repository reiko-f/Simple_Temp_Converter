<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
            body {
                background: lightyellow;
                font-family: 'Roboto';
                color: gray;
            }

            input {
                width: 150px;
                height: 50px;
                border-radius: 15px;                    
            }
            select, button {
                height: 50px;
                background-color: lightsalmon;
                border-radius: 15px;
            }

            div {
                font-size: 2em;
            }
            
        </style> 
        <title>Temperature Converter</title>
    </head>
    <body>
        <h1>Convert a temperature</h1>
        <p>Enter an temperature and choose its unit, and then press the Convert button</p><br>
        
        <form action="temp_converter.php" method="GET">
        <input type="text" name="num" placeholder="Enter a temperature">
            <!-- <label for="unit">Select an unit</label> -->
            <select name="unit">
                <option value="C">C</option>
                <option value="F">F</option>
            </select>
            <button type="submit">Convert</button>
        </form><br>
               
        <?php
             function tempConverter($num, $unit) {
                $temp = 0;
                switch ($unit) {
                    case "C":
                        $temp = ($num * 9/5) + 32;
                        break;
                    case "F":
                        $temp = ($num - 32) * 5/9;                        
                        break;                   
                    default:
                        $temp = "Something is wrong.";
                        break;
                }
                return round($temp, 2);
            }

            if(isset($_GET['num']) && isset($_GET['unit'])):
                $num = $_GET["num"];
                $unit = $_GET["unit"];
                
                if ($unit == "C") {                
                    echo "<div>"."Temperature is:   " . tempConverter($num, $unit) . " F"."</div>";
                } else {
                    echo "<div>"."Temperature is:   " . tempConverter($num, $unit) . " C"."</div>";                    
                }                
            endif;
        ?>
    </body>
</html>