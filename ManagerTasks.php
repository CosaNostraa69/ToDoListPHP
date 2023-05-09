<?php

require( './DBManager.php');
require('./Tasks.php');

class ManagerTasks extends DBManager
{
    public function getAllTasks()
    {
        $tasks = [];

        $results = $this->getConnexion()->query('SELECT * FROM tasks');

        foreach ($results as $taskData) {
            $task = new Tasks;
            $task->setId($taskData['id']);
            $task->setTitle($taskData['title']);
            $task->setDescription($taskData['description']);
            $task->setImportant($taskData['important']);

            $tasks[] = $task;
        }

        return $tasks;
    }

    public function create($task)
    {
        $request = 'INSERT INTO tasks (title, description, important) VALUES (?, ?, ?);';
        $query = $this->getConnexion()->prepare($request);
        $query->execute([$task->getTitle(), $task->getDescription(), $task->isImportant()]);

        header('refresh:0');
        return true;
    }

    public function remove($id)
    {
        $request = 'DELETE FROM tasks WHERE id = ?';
        $query = $this->getConnexion()->prepare($request);
        $query->execute([$id]);
        header('Refresh:0');
        return true;
    }
}
?>
