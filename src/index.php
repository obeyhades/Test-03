<<<<<<< HEAD
<?php
require_once "functions.php";
require "sidebar.php";

$category = null;
if (isset($_GET["category"])) {
    $category = $_GET["category"];
}
?>
=======
<?php 
        require_once 'functions.php';
        require "sidebar.php";
        
        $category = null;
        if (isset($_GET['category'])) {
            $category = $_GET['category'];
        }
    ?>
>>>>>>> e4e3b0ffd1d056348938a80ba81123d448ba1be1

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todolist</title>
    <link rel="stylesheet" href="./style.css" />
</head>

<body>
<<<<<<< HEAD
    <h1 class="h1">
        <?php
        echo $category;
        ?>
    </h1>
    <?php require "todo.php"; ?>
=======
    <h1>
        <?php
            echo $category;
        ?>
    </h1>
   <?php require "todo.php";?>
>>>>>>> e4e3b0ffd1d056348938a80ba81123d448ba1be1
</body>

</html>