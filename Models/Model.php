<?php


class Model
{

    private $connection = NULL; // Ce champ la servira pour savoir si nous avons pu se connecter sur la base de données ou pas...
    private $DSN = "mysql:host=localhost;dbname=leboncoin";
    private $USER = "root";
    private $PWD = "";
    // By default
    private $OPTIONS = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"
    );

    // Connexion vers la base de données... cette fonction devrai figurée dans toutes les fonctions qui vont suivre...
    private function connectToBDD()
    {
        try {
            // On tente d'ouvrire une connexion vers la base de données MYSQL...
            $this->connection = new PDO($this->DSN, $this->USER, $this->PWD, $this->OPTIONS);
            if ($this->connection != NULL && $this->connection != FALSE) {
                // echo "Connexion avec succès !";
                return true;
            } else {
                // echo "Echec de connexion !";
                return false;
            }
        } catch (PDOException $e) {
            // echo "Echec de connexion !";
            return false;
        }
    }

    // Connection sur L'application
    public function userLogiIn($email, $pwd)
    {
        // J'ouvre la connexion vers ma base de données...
        $this->connectToBDD();
        if ($this->connection != NULL) {
            // Connexion vers la base de données OK !
            $queryString = "SELECT * FROM useraccount WHERE Email=:email AND Password=:pwd";
            $queryPrepared = $this->connection->prepare($queryString, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $queryPrepared->execute(array("email" => $email, "pwd" => $pwd));
            $resultSet = $queryPrepared->fetch(PDO::FETCH_ASSOC);
            if (!empty($resultSet)) {
                return $resultSet;
            }
            return NULL;
        }
    }

    public function addUser($user, $email, $tel, $password)
    {
        $this->connectToBDD();
        if ($this->connection != null) {
            $queryString = "INSERT INTO `useraccount` ( `userName`, `Tel`, `Email`, `Password` ) VALUES (:user,:tel,:email,:password );";
            $queryPrepared = $this->connection->prepare($queryString, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $status = $queryPrepared->execute(array('email' => $email, 'user' => $user, 'tel' => $tel, 'password' => $password));
            if ($status) {
                return true;
            }
            return false;
        }
    }
}
