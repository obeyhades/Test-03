<?php
require_once 'db.php';

function getTasks($conn, $category=null) {
    if ($category) {
        $sql = "SELECT * FROM Task WHERE category = '$category'";
    } else {
        $sql = "SELECT * FROM Task";
    }
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function addTask($taskDescription, $category="Daily") {
    global $conn;
    if (!$category){
        $category = "Daily";
    }
    $sql = "INSERT INTO Task (description, status, created_at, updated_at, category) 
            VALUES (:description, 0, NOW(), NOW(), '$category')";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':description', $taskDescription);
    $stmt->execute();
}


?>



