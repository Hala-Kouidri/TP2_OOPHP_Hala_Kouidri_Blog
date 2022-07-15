<html>
    <head>
        <meta charset='utf-8'>
        <meta name="author" content="Hala Kouidri - 1353390" >
        <title>Article list</title>
        <link rel="stylesheet" href="{{path}}styles/style.css">
    </head>
    <body>
    <header class="header">
        <div class="header__logo">
            <a class="logo" href="{{path}}Article/liste">Prog & Lifestyle</a>
        </div>

        <!-- Le bouton dans l'entête : ajout article -->
        <div class="header__btns">
        
            <a class='btn' href="{{path}}Article/create">Ajouter un Article</a>
            <p> HalaKo </p>
            <a class='btn-log' href='#'>Logout</a>
        
        </div>
    </header>

    <main>

    <h2>Articles</h2>
    <div class="flex">  

        
        <div class='container__article'>
            {% for Article in Articles %}
                <div class='article__titre'>{{ Article.titre }}</div>
                <div class='article__texte'>{{ Article.text }}</div>
                <div class='article__auteur' 
                {% for Categorie in categories %} 
                    {% if Categorie.id==Article.idCategorie %}>
                        Catégorie : {{ Categorie.nom }}
                    {% endif %}
                {% endfor %}</div>
                <div class='article__auteur'>Auteur : {{ Article.idAuteur }}</div>
                <div class='article__auteur'>{{ Article.date }}</div>

                <!-- Boutons Modification et suppression d'articles -->
                <div class='Modif-supprime'>
                    <a class='btn' href='{{path}}Article/edit/{{Article.id}}'> Modifier</a>
                    <!-- <a class='btn' href='{{path}}Article/delete/{{Article.id}}'>Supprimer </a> -->
                    
                    <form class="form-delete" action="{{path}}Article/delete" method="post">
                    <input type="hidden" name="id" value="{{ Article.id }}"> 
                    <input class='btn' type="submit" value="Supprimer">  
                    </form>

                </div>
            {% endfor %}    
        </div>
        
    </div>
    </main>
    <footer>
        <a class="btn" href="{{path}}Article/liste">Retourner à l'accueil</a>
    </footer>
    </body>
</html>    