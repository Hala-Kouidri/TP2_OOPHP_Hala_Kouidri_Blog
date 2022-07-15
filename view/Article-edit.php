<html>
    <head>
        <meta charset='utf-8'>
        <title>Article list</title>
        <link rel="stylesheet" href="{{path}}styles/style.css">
    </head>
    <body>
    <header class="header">
        <div class="header__logo">
            <a class="logo" href="index.php">Prog & Lifestyle</a>
        </div>
    </header>

    <main>

<h1>Modification d'article</h1>

<!-- ajouter le si errors is defined -->

<form class="form-article" method="POST" action="{{path}}Article/update">

    {% if errors is defined %}
        <span class="error">{{ errors|raw }}</span>
    {% endif %}
        
    <input type="text" name="titre" placeholder="Titre" value="{{ Article.titre }}"/><br>
    <select name="idCategorie" id="idCategorie">
        {% for Categorie in categories %}
            <option value="{{ Categorie.id }}" {% if Categorie.id==Article.idCategorie %} selected {% endif %}>{{ Categorie.nom }}</option>
        {% endfor %}
    </select>
    <textarea type="text" name="text" placeholder="Contenu">{{ Article.text }}</textarea><br>
    <input type="hidden" name="date" value="{{ Article.date }}"/>
    <input type="hidden" name="idAuteur" value="{{ Article.idAuteur }}"/>
    <input type="hidden" name="id" value="{{ Article.id }}"/>
    <input type="submit" value="Sauvegarder"/>
</form>



</main>
    <footer>
        <a class="btn" href="index.php">Retourner à l'accueil</a>
    </footer>
    </body>
</html>    