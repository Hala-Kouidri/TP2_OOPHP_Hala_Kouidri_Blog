<?php

class Crud extends PDO
{

    public function __construct()
    {
        //connexion Mac
        // parent::__construct("mysql:host=localhost;dbname=1_TP1_db_blog", "root", "root");
        //Connexion Windows
        parent::__construct("mysql:host=localhost;dbname=1_TP1_db_blog", "root", "");
    }
    public function insert($table, $data)
    {

        $nomChamp = implode(", ", array_keys($data));
        $valeurChamp = ":" . implode(", :", array_keys($data));

        $sql = "INSERT INTO $table ($nomChamp) VALUES ($valeurChamp)";

        $query = $this->prepare($sql);
        foreach ($data as $key => $value) {
            $query->bindValue(":$key", $value);
        }
        if (!$query->execute()) {
            return $query->errorInfo();
        } else {
            return $this->lastInsertId();
        }
    }

    public function select($table, $champOrdre = null, $ordre = null)
    {

        if ($champOrdre == null) {
            $sql = "SELECT * FROM $table";
        } else {
            $sql = "SELECT * FROM $table ORDER BY $champOrdre $ordre";
        }

        $query = $this->query($sql);
        if ($query !== false) {

            return $query->fetchAll();
        }

        return [];
    }

    public function selectId($table, $champ, $id)
    {
        $sql = "SELECT * FROM $table WHERE $champ = :$champ";
        $query = $this->prepare($sql);
        $query->bindValue(":$champ", $id);
        $query->execute();

        if ($query !== false) {

            return $query->fetch();
        }

        return [];
    }

    public function update($table, $data, $champ, $id)
    {
        $champRequete = null;
        foreach ($data as $key => $value) {
            $champRequete .= $key . "=:" . $key . ", ";
        }
        $champRequete = rtrim($champRequete, ", ");
        $sql = "UPDATE $table SET $champRequete WHERE $champ = :$champ";

        $query = $this->prepare($sql);
        foreach ($data as $key => $value) {
            $query->bindValue(":$key", $value);
        }
        if (!$query->execute()) {
            print_r($query->errorInfo());
        } else {
            return $id;
        }
    }

    public function delete($table, $champs, $id, $url)
    {
        $sql = "DELETE FROM $table WHERE $champs = :$champs";
        $query = $this->prepare($sql);
        $query->bindValue(":$champs", $id);
        if (!$query->execute()) {
            print_r($query->errorInfo());
        } else {
            header("Location: $url");
        }
    }


    public function __destruct()
    {
        // Selon les ressources externe que j'ai trouvé sur google, le destruct se fait automatiquement et dans le cas de ce TP je ne trouve pas de destruct à mettre.
    }
}
