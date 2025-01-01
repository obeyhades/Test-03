<?php
require_once "db.php";
    
// Function to fetch tasks from the database
function getTasks($conn, $category=null) {
    //create an SQL query to fetch tasks with that category
    if ($category) {
        $sql = "SELECT * FROM Task WHERE category = '$category'";
    } else {
        // Otherwise, fetch all tasks from the 'Task' table

        $sql = "SELECT * FROM Task";
    }
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Function to add a new task to the database
function addTask($taskDescription, $category="Daily") {
    global $conn;
    if (!$category){
        $category = "Daily";
    }
    $sql = "INSERT INTO Task (description, status, created_at, updated_at, category) 
            VALUES (:description, 0, NOW(), NOW(),'$category')";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":description", $taskDescription);
    $stmt->execute();
}

// Function to handle marking a task as done or updating its status
function taskdone() {
     // Access the global database connection
    global $conn;
    if (isset($_POST["id"]) && isset($_POST["status"])) {
        $id = $_POST["id"];
        $status = $_POST["status"];  

        updateTaskStatus($conn, $id, $status);
    }
}

// Function to update the status of a task in the database
function updateTaskStatus($conn, $id, $status) {
    try {
        $stmt = $conn->prepare("UPDATE Task SET status = :status WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":status", $status, PDO::PARAM_INT);
        $stmt->execute();
    } catch (Exception $e) {
        echo "Error updating task status: " . $e->getMessage();
    }
}

// Function to delete the status of a task in the database
function deleteTask($conn, $id) {
    try {
        $stmt = $conn->prepare("DELETE FROM Task WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
    } catch (Exception $e) {
        echo "Error deleting task: " . $e->getMessage();
    }
}
// Function to edit the status of a task in the database
function editTask($conn, $id, $newDescription) {
    try {
        $stmt = $conn->prepare("UPDATE Task SET description = :description, updated_at = NOW() WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->bindParam(":description", $newDescription, PDO::PARAM_STR);
        $stmt->execute();
    } catch (Exception $e) {
        echo "Error editing task: " . $e->getMessage();
    }
}



?>

