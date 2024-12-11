<?php
require_once 'db.php';

function getTasks($conn) {
    $sql = "SELECT * FROM Task";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function addTask($taskDescription) {
    global $conn;
    $sql = "INSERT INTO Task (description, status, created_at, updated_at) 
            VALUES (:description, 0, NOW(), NOW())";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':description', $taskDescription);
    if ($stmt->execute()) {
    } else {
    }
}
?>



