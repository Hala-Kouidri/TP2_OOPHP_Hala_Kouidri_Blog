<?php
require_once "class/Crud.php";

$crud = new Crud;

$update = $crud->update("Article", $_POST, "id", $_POST["id"]);

header("Location: index.php");

?>