<?php
require_once 'functions.php';


if (isset($_POST['task'])) {
    $taskDescription = $_POST['task'];
    addTask($taskDescription, $category);
}


$tasks = getTasks($conn, $category);

$url_params = $_SERVER['QUERY_STRING'];
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="todo.css">

<div class="heading">
    <form method="post" action="<?php echo ($url_params == "") ? "index.php?category=Daily" : "index.php?{$url_params}" ?>" class="input_form">
        <input type="text" name="task" placeholder="Add a new task" class="task_input">
        <button class="btn"><i class="fa fa-plus"></i></button>
    </form>

    <ul id="list">
        <?php foreach ($tasks as $task): ?>
            <li>
                <span><?php echo htmlspecialchars($task['description']); ?></span>
                <div class="buttonz">
                    <button title="done"><i class="fa fa-check"></i></button>
                    <button title="delete"><i class="fa fa-trash"></i></button>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>

</div>
