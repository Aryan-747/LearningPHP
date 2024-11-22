<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "todolist";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Add task
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['task_name'])) {
    $task_name = $_POST['task_name'];
    $sql = "INSERT INTO tasks (task_name) VALUES ('$task_name')";
    if ($conn->query($sql) === TRUE) {
        echo "New task added successfully.<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Delete task
if (isset($_GET['delete_task_id'])) {
    $task_id = $_GET['delete_task_id'];
    $sql = "DELETE FROM tasks WHERE task_id = $task_id";
    if ($conn->query($sql) === TRUE) {
        echo "Task deleted successfully.<br>";
    } else {
        echo "Error deleting task: " . $conn->error;
    }
}

// Fetch tasks
$sql = "SELECT * FROM tasks ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple To-Do List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
        }
        .todo-list {
            margin-top: 20px;
        }
        .todo-list ul {
            list-style-type: none;
            padding: 0;
        }
        .todo-list li {
            background-color: #f4f4f4;
            margin: 5px 0;
            padding: 10px;
            border-radius: 5px;
        }
        .todo-list button {
            background-color: red;
            color: white;
            border: none;
            padding: 5px;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>My To-Do List</h1>

    <!-- Form to Add a Task -->
    <form action="index.php" method="post">
        <input type="text" name="task_name" placeholder="Enter task" required>
        <button type="submit">Add Task</button>
    </form>

    <div class="todo-list">
        <h3>Tasks</h3>
        <ul>
            <?php
            // Display tasks
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<li>" . htmlspecialchars($row['task_name']) . " 
                          <a href='index.php?delete_task_id=" . $row['task_id'] . "'><button>Delete</button></a></li>";
                }
            } else {
                echo "<li>No tasks found</li>";
            }
            ?>
        </ul>
    </div>

    <?php $conn->close(); ?>
</body>
</html>
