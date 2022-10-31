<?php

class PersistenceSingleton
{
    /**
     *
     * @var Singleton
     */
    private static $persistence;

    private function __construct()
    {
        //$this->drive = new DriveManager();
    }

    public static function getInstance()
    {
        if (is_null(self::$persistence)) {
            self::$persistence = new PersistenceManager();
        }
        return self::$persistence;
    }
}

class PersistenceManager
{
    private $pdo;   
    private static string $dbname = "frases";
    private static string $user = "admin";
    private static string $password = "daw2pass";

    function __construct()
    {
        try {
            $dsn = "mysql:host=localhost;dbname=".PersistenceManager::$dbname.";charset=utf8";
            $this->pdo = new PDO($dsn, PersistenceManager::$user, PersistenceManager::$password);
        } catch (PDOException $e){
            echo $e->getMessage();
        }
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
    }

    public function stdQuery($sql)
    {
        $stm = $this->pdo->prepare($sql);
        $stm->execute();
        $stm->close();
    }

    public function quickQuery($sql)
    {
        $stm = $this->pdo->prepare($sql);
        $stm->execute();
        $stm->bind_result($res);
        $stm->fetch();
        $stm->free_result();
        return $res;
    }

    public function getFrase($id = 0)
    {
        if(!is_numeric($id) || $id === 0){
            $id = rand(1, 7);
        }    
        $query = "SELECT * FROM frases WHERE id_frase = :id_frase";
        $stm = $this->pdo->prepare($query);
        $stm->bindValue('id_frase', $id, PDO::PARAM_INT);
        $stm->execute();        
        if ($u = $stm->fetch(PDO::FETCH_ASSOC)) {            
            return $u['frase'];
        } else return null;
    }    
        
}
