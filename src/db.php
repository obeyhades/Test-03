<?php
    $servername = "mariadb";
    $username = "root";
    $password = "mariadb";
    $dbname = "todolist";

        try{
            $conn = new PDO ("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo "Connected";
        }

        catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
?>

