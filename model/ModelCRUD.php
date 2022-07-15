<?php

abstract class CRUD extends PDO{
    public function __construct(){
        // parent::__construct("mysql:host=localhost;dbname=1_TP1_db_blog;charset=utf8", "root", ""); // Windows
        parent::__construct("mysql:host=localhost;dbname=1_TP1_db_blog;charset=utf8", "root", "root"); // Mac
    }

    public function select($champOrdre = null, $ordre = null){
        if($champOrdre == null){
            $sql= "SELECT * FROM $this->table";
        }else{
            $sql = "SELECT * FROM $this->table ORDER BY $champOrdre $ordre";
        }
        $query = $this->query($sql);
        return $query->fetchAll();
    }

    public function selectId($id){
        $sql = "SELECT * FROM $this->table WHERE $this->primaryKey = :$this->primaryKey";
        $query = $this->prepare($sql);
        $query->bindValue(":$this->primaryKey", $id);
        $query->execute();
        return $query->fetch();
    }

    public function insert($data){
        
        $data_keys = array_fill_keys($this->fillable, '');
        $data_map = array_intersect_key($data, $data_keys);

        $nomChamp = implode(", ",array_keys($data_map));
        $valeurChamp = ":".implode(", :", array_keys($data_map));

        $sql ="INSERT INTO $this->table ($nomChamp) VALUES ($valeurChamp)";
        
        $query = $this->prepare($sql);
        foreach($data_map as $key=>$value){
            $query->bindValue(":$key", $value);
        }
        if(!$query->execute()){
            return $query->errorInfo();
        }else{
            return $this->lastInsertId();
        }
    }

    public function update($data){
        $id = $data[$this->primaryKey];
        $data_keys = array_fill_keys($this->fillable, '');
        $data = array_intersect_key($data, $data_keys);
   
        $champRequete = null;
        foreach($data as $key=>$value){
            $champRequete .=$key."=:".$key.", ";
        }
        $champRequete = rtrim($champRequete, ", ");
        $sql = "UPDATE $this->table SET $champRequete WHERE $this->primaryKey = :$this->primaryKey";

        $data[$this->primaryKey] = $id;

        $query= $this->prepare($sql);
        foreach($data as $key=>$value){
            $query->bindValue(":$key", $value);
        }
        if(!$query->execute()){
            print_r($query->errorInfo());
        }else{
            return $id;
        }
    }

  public function delete($data){
        $sql = "DELETE FROM $this->table WHERE $this->primaryKey = :$this->primaryKey";
        $query = $this->prepare($sql);
        $query->bindValue(":$this->primaryKey", $data[$this->primaryKey]);
        if(!$query->execute()){
            print_r($query->errorInfo());
        }else{
            return true;
        }
    }
}