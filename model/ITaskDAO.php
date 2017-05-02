<?php

interface ITaskDAO {

    public function createTask(Task $task);
    public function deleteTask($taskId);
}

?>