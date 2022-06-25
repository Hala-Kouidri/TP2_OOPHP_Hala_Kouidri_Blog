<?php
require_once "class/Crud.php";


$crud = new Crud;

$delete = $crud->delete("Article", "id", $_GET["id"], "index.php")


?>