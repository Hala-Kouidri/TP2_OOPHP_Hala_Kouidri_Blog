<?php
RequirePage::requireModel('CRUD');
RequirePage::requireModel('Article');
RequirePage::requireModel('Categorie');
RequirePage::requireLibrary('Validation');



class ControllerArticle {

    public function index(){

      return Twig::render('home-index.php');

    }

    public function liste(){
        $article = new ModelArticle;
        $categorie = new ModelCategorie;

        $select = $article->select('id', 'DESC');
        $selectCategorie = $categorie->select();

        return Twig::render('Article-liste.php', ['Articles' => $select, 'categories' => $selectCategorie]);
        
    }


    public function create(){
      $categories = new ModelCategorie;
      $categories = $categories->select('nom');
      return Twig::render('Article-insert.php', ['categories'=> $categories]);
    }
    
    public function store(){
      $validation = new Validation;
    
      extract($_POST);
      $validation->name('titre')->value($titre)->pattern('text')->required();
      $validation->name('text')->value($text)->pattern('text')->required();
      $validation->name('idCategorie')->value($idCategorie)->pattern('int')->required();
      $validation->name('idAuteur')->value($idAuteur)->pattern('alphanum')->required();
      $validation->name('date')->value($date)->required();
      
      if($validation->isSuccess()){
        $article = new ModelArticle;
        $insert = $article->insert($_POST);
        RequirePage::redirect('Article/liste');   
      }else{
      
        $errors =  $validation->displayErrors();
        $categories = new ModelCategorie;
        $categories = $categories->select('nom');
        return Twig::render('Article-insert.php', ['errors' => $errors, 'categories'=> $categories, 'Article' => $_POST]);
      }
    }

    public function edit($value){
      $article = new ModelArticle;
      $selectId = $article->selectId($value);

      $categorie = new ModelCategorie;
      $categories = $categorie->select('nom');

      return Twig::render('Article-edit.php', ['Article' => $selectId, 'categories' => $categories]);

    }

    public function update(){

      $validation = new Validation;
      extract($_POST);
      
      $validation->name('titre')->value($titre)->pattern('text')->required();
      $validation->name('text')->value($text)->pattern('text')->required();
      $validation->name('idCategorie')->value($idCategorie)->pattern('int')->required();
      $validation->name('idAuteur')->value($idAuteur)->pattern('alphanum')->required();

      if($validation->isSuccess()){
        $article = new ModelArticle;
        $update = $article->update($_POST);
        RequirePage::redirect('Article/liste'); 

      }else{

        $errors =  $validation->displayErrors();
        $categories = new ModelCategorie;
        $categories = $categories->select('nom');
        return Twig::render('Article-edit.php', ['errors' => $errors, 'categories'=> $categories, 'Article' => $_POST]);
      }
    }

    public function delete(){
        $article = new ModelArticle;
        $delete = $article->delete($_POST);
        RequirePage::redirect('Article/liste'); 
    }
}




