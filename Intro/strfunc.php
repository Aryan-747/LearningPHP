<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php

        $stringo = "Hello Wassgud!";

        echo strtolower($stringo); // Converts Uppercase to Lowercase
        echo "<br>";
        echo strtoupper($stringo); // Converts Lowercase to Uppercase
        echo "<br>";
        echo ucfirst($stringo); // Converts First Letter to Uppercase
        echo "<br>";
        echo ucwords($stringo); // Converts First Letter of Each Word to Uppercase
        echo "<br>";
        echo strlen($stringo); // Prints the length of the string
        echo "<br>";



        $stirfry = "BobMarley";

        $stirfry[0] = 'J';

        echo "$stirfry <br>"; // Prints modified String;
        echo str_replace("Job","GOATBob",$stirfry); // replaces given substring
        echo "<br>";

     ?>
    
</body>
</html>