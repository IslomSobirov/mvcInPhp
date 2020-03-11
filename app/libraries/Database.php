<?php
require_once '../app/config/config.php'; 
class Database{
    private $host = DB_HOST;
    private $pass = DB_PASSWORD;
    private $user = DB_USER;
    private $dbname = DB_NAME;
    private $dbHandler;
    private $dbError;
    private $stmt;

    public function __construct()
    {
        $dsn = 'mysql:host=' . $this->host .';dbname=' . $this->dbname;
        
        try{
            $this->dbHandler = new PDO($dsn, $this->user, $this->pass, [
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);
        }catch(PDOExeption $e){
            $this->error = $e->getMessage();
            print_r($e);
        }
    }


    // Prepare statement with query
    public function query($sql){
        $this->stmt = $this->dbHandler->prepare($sql);
    }
  
      // Bind values
    public function bind($param, $value, $type = null)
    {
        if(is_null($type)){
          switch(true){
            case is_int($value):
              $type = PDO::PARAM_INT;
              break;
            case is_bool($value):
              $type = PDO::PARAM_BOOL;
              break;
            case is_null($value):
              $type = PDO::PARAM_NULL;
              break;
            default:
              $type = PDO::PARAM_STR;
          }
        }
  
        $this->stmt->bindValue($param, $value, $type);
      }
  
      // Execute the prepared statement
      public function execute()
      {
        return $this->stmt->execute();
      }
  
      // Get result set as array of objects
      public function resultSet()
      {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
      }
  
      // Get single record as object
      public function single()
      {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
      }
  
      // Get row count
      public function rowCount(){
        return $this->stmt->rowCount();
      }

    

}