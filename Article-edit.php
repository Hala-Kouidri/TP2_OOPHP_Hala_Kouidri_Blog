<?php
require_once "class/Crud.php";

$crud = new Crud;
$article = $crud->selectId("Article", "id", $_GET["id"]);

$categorie = $crud->select("Categorie");

foreach($article as $key=>$value){
    $$key = $value;
}
?>

<html>
    <head>
        <meta charset='utf-8'>
        <title>Article list</title>
        <link rel="stylesheet" href="./styles/style.css">
    </head>
    <body>
    <header class="header">
        <div class="header__logo">
            <a class="logo" href="index.php">Prog & Lifestyle</a>
        </div>
    </header>

    <main>

<h1>Modification d'article</h1>
<form class="form-article" method="POST" action="Article-edit-post.php">
    <input type="text" name="titre" placeholder="Titre" value="<?= $titre; ?>"/><br>
    <!-- <input type="text" name="idCategorie" placeholder="idCategorie" value="<?= $idCategorie; ?>"/><br> -->
    <select name="idCategorie" id="idCategorie">
        <?php foreach($categorie as $row){ ?>
            <option value="<?= $row["id"];?>"><?= $row["nom"];?></option>
        <?php }?>
    </select>
    <textarea type="text" name="text" placeholder="Contenu"><?= $text; ?></textarea><br>
    <input type="hidden" name="date" value="<?= $date; ?>"/>
    <input type="hidden" name="idAuteur" value="<?= $idAuteur; ?>"/>
    <input type="hidden" name="id" value="<?= $id; ?>"/>
    <input type="submit" value="Sauvegarder"/>
</form>



</main>
    <footer>
        <a class="btn" href="index.php">Retourner à l'accueil</a>
    </footer>
    </body>
</html>    