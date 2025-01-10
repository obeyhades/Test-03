<?php

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    taskdone();
}

// Handle deletion of a task
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["delete"]) && isset($_POST["delete_id"])) {
        deleteTask($conn, $_POST["delete_id"]);
    } elseif (isset($_POST["status"]) && isset($_POST["id"])) {
        taskdone();
    }
}

// Handle adding a new task
if (isset($_POST["task"])) {
    $taskDescription = htmlspecialchars($_POST["task"]);
    addTask($taskDescription, $category);
}
if (isset($_POST["status"])) {
    taskdone("status");
}


// Handle edit task
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["save_edit"]) && isset($_POST["edit_id"]) && isset($_POST["edittask"])) {
        $id = $_POST["edit_id"];
        $newDescription = $_POST["edittask"];
        editTask($conn, $id, $newDescription);
    } elseif (isset($_POST["edit"]) && isset($_POST["edit_id"])) {
    }
}


$tasks = getTasks($conn, $category);

$url_params = $_SERVER["QUERY_STRING"];
