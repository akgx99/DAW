<?php


namespace app\src\core;

use app\libraries\DotEnv;

abstract class Model
{
    private string $host;
    private string $username;
    private string $password;

    protected \PDO $connection;

    public string $table;
    
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        (new DotEnv('.env'))->load();

        $this->host = getenv('database_dns');
        $this->username = getenv('database_user');
        $this->password = getenv('database_password');

        /*$this->host = 'mysql:host=localhost;dbname=daw';
        $this->username = 'root';
        $this->password = 'root';*/
    }
    
    public function hydrate(array $data)
    {
        foreach ($data as $key => $value)
        {
            $method = 'set'.ucfirst($key); 
            if (method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
    }

    /**
     * Permet de se connecter à la BDD
     *
     * @return void
     */
    public function connection() : void
    {
        try {
            $this->connection = new \PDO($this->host, $this->username, $this->password);
            $this->connection->exec("SET NAMES utf8");
        }catch (\PDOException $e){
            echo "Error : " . $e->getMessage();
        }
    }

    /**
     * Permet d'avoir une occurence d'une table grâce à son id
     *
     * @param  mixed $id 
     * @return mixed
     */
    public function getOne($id)
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE id=".$id;
        $query = $this->connection->query($sql);
        return $query->fetch();
    }
  
    /**
     * Permet d'avoir toutes les occurences d'une table
     *
     * @return mixed
     */
    public function getAll()
    {
        $sql = "SELECT * FROM " . $this->table;
        $query = $this->connection->query($sql);
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Permet d'avoir le nombre d'occurence d'une table
     *
     * @return int
     */
    public function count() : array
    {
        $sql = "SELECT COUNT(*) FROM " . $this->table;
        $query = $this->connection->query($sql);
        return $query->fetch();
    }
    
    /**
     * Permet d'avoir l'occurence d'une table par rapport à son slug
     *
     * @param  mixed $slug
     * @return mixed
     */
    public function findBySlug(string $slug)
    {
        $sql = "SELECT * FROM ".$this->table." WHERE `slug`='".$slug."'";
        $query = $this->connection->query($sql);
        return $query->fetch(\PDO::FETCH_ASSOC);
    }

}