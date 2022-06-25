<?php
require_once "class/Crud.php";
$crud = new Crud;
$select = $crud->select("Article", "id", "DESC");
?>

<html>
    <head>
        <meta charset='utf-8'>
        <meta name="author" content="Hala Kouidri - 1353390" >
        <title>Article list</title>
        <link rel="stylesheet" href="./styles/style.css">
    </head>
    <body>
    <header class="header">
        <div class="header__logo">
            <a class="logo" href="index.php">Prog & Lifestyle</a>
        </div>

        <!-- Le bouton dans l'entête : ajout article -->
        <div class="header__btns">
        
            <a class='btn' href="Article.php">Ajouter un Article</a>
        
        </div>
    </header>

    <main>

    <h2>Articles</h2>
    <div class="flex">  

        <div class='container__article'>
            <?php
                foreach($select as $row){
            ?>
                <div class='article__titre'><?php echo $row["titre"]; ?></div>
                <div class='article__texte'><?php echo $row["text"]; ?></div>
                <div class='article__auteur'>Catégorie : <?php echo $crud->selectId("Categorie", "id", $row["idCategorie"])["nom"]; ?></div>
                <div class='article__auteur'>Auteur : <?php echo $row["idAuteur"] ?></div>
                <div class='article__auteur'><?php echo $row["date"]; ?></div>

                <!-- Boutons Modification et suppression d'articles -->
                <div class='Modif-supprime'>
                    <a class='btn' href="Article-edit.php?id=<?php echo $row["id"];?>"> Modifier</a>
                    <a class='btn' href="Article-delete.php?id=<?php echo $row["id"];?>"> Supprimer </a>
                </div>
            <?php
                }
            ?> 

            
        </div>
        
    </div>
    </main>
    <footer>
        <a class="btn" href="index.php">Retourner à l'accueil</a>
    </footer>
    </body>
</html>    