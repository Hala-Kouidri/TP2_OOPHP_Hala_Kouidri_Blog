<?php
require_once "class/Crud.php";

$crud = new Crud;

$insert = $crud->insert("Article", $_POST);

header("Location: index.php");


?>