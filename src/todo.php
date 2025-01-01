<?php
require_once "functions.php";
require "If_function.php"
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="todo.css">

<div class="heading">
            
        <!-- add task-->
    <form method="post" action="<?php echo ($url_params == "") ? "index.php?category=Daily" : "index.php?{$url_params}" ?>" class="input_form">
        <input type="text" name="task" placeholder="Add a new task" class="task_input" required>
        <button class="btn"><i class="fa fa-plus"></i></button>
    </form>

    <ul id="list">
        <?php foreach ($tasks as $task): ?>
            <li>
                <span><?php echo htmlspecialchars($task["description"]); ?></span>
                <div class="buttonz">

                    <!--do & undo task-->
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
                        <input type="hidden" name="id" value="<?= $task["id"] ?>">
                        <button title="Toggle" name="status" value="<?= $task["status"] == 1 ? 0 : 1 ?>">
                            <i class="fa <?= $task["status"] == 1 ? "fa-undo" : "fa-check" ?>"></i>
                        </button>
                    </form>

                    <!-- Remove-->
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <input type="hidden" name="delete_id" value="<?= $task["id"] ?>">
                        <button title="delete" name="delete" value="true">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>

                    <!--Edit-->
                    <?php if (isset($_POST["edit"]) && $_POST["edit_id"] == $task["id"]): ?>
                        
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <input type="hidden" name="edit_id" value="<?= $task["id"] ?>">
                            <input type="text" name="edittask" placeholder="Ny beskrivning" required>
                            <button type="submit" name="save_edit" value="true">Spara</button>
                        </form>

                    <?php else: ?>
                       
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <input type="hidden" name="edit_id" value="<?= $task["id"] ?>">
                            <button title="edit" name="edit" value="true">
                                <i class="fa fa-edit"></i>
                            </button>
                        </form>
                    <?php endif; ?>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</div>