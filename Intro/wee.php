<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get input values
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $operation = $_POST['operation'];
    
    // Perform calculation based on the selected operation
    switch ($operation) {
        case 'add':
            $result = $num1 + $num2;
            break;
        case 'subtract':
            $result = $num1 - $num2;
            break;
        case 'multiply':
            $result = $num1 * $num2;
            break;
        case 'divide':
            if ($num2 == 0) {
                $result = "Cannot divide by zero!";
            } else {
                $result = $num1 / $num2;
            }
            break;
        default:
            $result = "Invalid operation!";
    }
} else {
    $result = "";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple PHP Calculator</title>
</head>
<body>
    <h2>Simple PHP Calculator</h2>
    
    <form method="POST">
        <label for="num1">Number 1:</label>
        <input type="number" name="num1" required><br><br>
        
        <label for="num2">Number 2:</label>
        <input type="number" name="num2" required><br><br>
        
        <label for="operation">Operation:</label>
        <select name="operation" required>
            <option value="add">Add</option>
            <option value="subtract">Subtract</option>
            <option value="multiply">Multiply</option>
            <option value="divide">Divide</option>
        </select><br><br>
        
        <input type="submit" value="Calculate">
    </form>
    
    <?php if ($result !== ""): ?>
        <h3>Result: <?php echo $result; ?></h3>
    <?php endif; ?>
</body>
</html>
