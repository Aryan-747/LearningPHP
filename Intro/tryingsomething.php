<?php
$filename = 'tasks.txt';
$tasks = file_exists($filename) ? file($filename, FILE_IGNORE_NEW_LINES) : [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['task'])) {
    $task = $_POST['task'];
    file_put_contents($filename, $task . PHP_EOL, FILE_APPEND);
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        h1 { text-align: center; }
        form { text-align: center; margin-bottom: 20px; }
        input[type="text"] { padding: 10px; width: 200px; }
        input[type="submit"] { padding: 10px; background-color: #4CAF50; color: white; border: none; cursor: pointer; }
        table { width: 100%; margin-top: 20px; }
        table, th, td { border: 1px solid black; border-collapse: collapse; }
        th, td { padding: 10px; text-align: left; }
        .delete-btn { color: red; cursor: pointer; }
    </style>
</head>
<body>
    <h1>My To-Do List</h1>

    <form method="POST" action="index.php">
        <input type="text" name="task" placeholder="Add a new task" required>
        <input type="submit" value="Add Task">
    </form>

    <table>
        <thead>
            <tr>
                <th>Task</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tasks as $index => $task): ?>
                <tr>
                    <td><?php echo htmlspecialchars($task); ?></td>
                    <td><a href="delete_task.php?index=<?php echo $index; ?>" class="delete-btn">Delete</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
