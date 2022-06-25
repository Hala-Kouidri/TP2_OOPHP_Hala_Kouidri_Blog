<?php
    require_once "class/Crud.php";
    $crud = new Crud;
    $categorie = $crud->select("Categorie");
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
        <h1>Nouvel Article</h1>
        <form class="form-article" method="POST" action="Article-post.php">
            <input type="text" id="titre" name="titre" placeholder="Titre"/><br>
            <select name="idCategorie" id="idCategorie">
                <?php foreach($categorie as $row){ ?>
                    <option value="<?= $row["id"];?>"><?= $row["nom"];?></option>
                <?php }?>

            </select>
            <textarea type="text" id="text" name="text" placeholder="Contenu"></textarea><br>
            <input type="date" id="date" name="date"/>
            <input type="text" id="idAuteur" name="idAuteur" placeholder="NomUtilisateur"/>
            <input type="submit" value="Publier"/><br>
            
        </form>
    
    </main>
    <footer>
        <a class="btn" href="index.php">Retourner à l'accueil</a>
    </footer>
    </body>
</html>    