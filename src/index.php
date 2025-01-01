<?php
require_once "functions.php";
require "sidebar.php";

$category = null;
if (isset($_GET["category"])) {
    $category = $_GET["category"];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todolist</title>
    <link rel="stylesheet" href="./style.css" />
</head>

<body>
    <h1 class="h1">
        <?php
        echo $category;
        ?>
    </h1>
    <?php require "todo.php"; ?>
</body>

</html>