<?php

    class ModelArticle extends CRUD {
        protected $table = 'Article';
        protected $primaryKey = 'id';

        protected $fillable = ['titre', 'text', 'date', 'idCategorie', 'idAuteur'];
    } 

?>