<?php
// Function to convert URLs into clickable links
function convertUrlsToLinks($text) {
    // Regular expression to match URLs
    $pattern = '/(https?:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?)/';

    // Replace URLs with anchor tags
    $replacement = '<a href="$1" target="_blank">$1</a>';
    
    // Convert the text and return it
    return preg_replace($pattern, $replacement, $text);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['text'])) {
    $text = $_POST['text'];
    $convertedText = convertUrlsToLinks($text);
} else {
    $convertedText = ' ';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple URL Converter</title>
</head>
<body>
    <h2>Simple URL Converter</h2>
    
    <form method="POST">
        <label for="text">Enter Text (URLs will be converted to links):</label><br>
        <textarea name="text" rows="6" cols="50" required><?php echo isset($text) ? $text : ''; ?></textarea><br><br>
        <input type="submit" value="Convert">
    </form>

    <h3>Converted Text:</h3>
    <div>
        <?php
        if ($convertedText) {
            echo $convertedText;
        }
        ?>
    </div>
</body>
</html>
