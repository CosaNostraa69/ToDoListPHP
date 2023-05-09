<?php
require('./ManagerTasks.php');

$managerTasks = new ManagerTasks();
$tasks = $managerTasks->getAllTasks();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['action']) && $_POST['action'] == 'Ajouter') {
    $newTask = new Tasks(); 
    $newTask->setTitle($_POST['title']);
    $newTask->setDescription($_POST['description']);
    $newTask->setImportant(isset($_POST['important']) ? 1 : 0);
    $managerTasks->create($newTask);
  } elseif (isset($_POST['action']) && $_POST['action'] == 'delete') {
    $managerTasks->remove($_POST['task_id']);
  }
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Simple To-Do List</title>
  <!-- Importer les CSS de Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="./styles/style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">

</head>
<header>
  <h1>My To do List</h1>
</header>

<body class="container">
  <div class="form_container">
<div>
<h2 class="my-4 text-center">Ajouter une tâche</h2>
  <form method="POST" class="mb-4">
    <div class="form-group">
      <label for="title">Titre :</label>
      <input type="text" class="form-control" name="title" id="title" placeholder="Titre de la tâche" required>
    </div>
    <div class="form-group">
      <label for="description">Description :</label>
      <textarea class="form-control" name="description" id="description" placeholder="Description " required></textarea>
    </div>
    <div class="form-check">
    <label for="important">Important :</label>
        <input type="checkbox" name="important" id="important">
    </div>
<div class="button_add" >
<button type="submit" class="btn btn-primary" name="action" value="Ajouter">Ajouter</button>
</div>
  
  </form>
</div>
 <div class="task_list" >
 <h2>Liste des tâches</h2>
  
 <ul class="list-group">
    <?php foreach ($tasks as $task) : ?>
      <li class="list-group-item">
        <div class="task-container">
          <div class="task-header d-flex justify-content-between">
            <h5 class="task-title"><?= $task->getTitle() ?></h5>
            <span class="task-important <?= $task->isImportant() ? 'badge badge-danger' : 'badge badge-primary' ?>">
              <?= $task->isImportant() ? 'Important' : 'Pas important' ?>
            </span>
          </div>
          <p class="task-description"><?= $task->getDescription() ?></p>
          <form method="post" action="index.php" class="delete-form">
            <input type="hidden" name="action" value="delete">
            <input type="hidden" name="task_id" value="<?= $task->getId() ?>">
            <button type="submit" class="btn btn-danger delete-button">
              <i class="fas fa-trash"></i> 
            </button>
          </form>
        </div>
      </li>
  

      <?php endforeach; ?>
  </ul>
 </div>

  </div>

  <!-- Importer les scripts de Bootstrap -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
