<?php
  class Database {
    private static $instance = NULL;
    private $db = NULL;

    private function __construct() {
      $this->db = new PDO('sqlite:../database/hoaloha.db');
      $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
      $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->db->query('PRAGMA foreign_keys = ON');
      if (NULL == $this->db) 
        throw new Exception("Failed to open database");
    }

    public function db() {
      return $this->db;
    }

    static function instance() {
      if (NULL == self::$instance) {
        self::$instance = new Database();
      }
      return self::$instance;
    }


    public function insertDoc($mimeType, $pathToFile) {
      if (!file_exists($pathToFile))
          throw new \Exception("File %s not found.");

      $sql = "INSERT INTO Photos(mime_type,doc) "
              . "VALUES(:mime_type,:doc)";

      // read data from the file
      $fh = fopen($pathToFile, 'rb');
      $fs = $fh;

      $stmt = $this->db->prepare($sql);

      $stmt->bindParam(':mime_type', $mimeType);
      $stmt->bindParam(':doc', $fh, \PDO::PARAM_LOB);
      $stmt->execute();
      fclose($fs);

      return $this->db->lastInsertId();
    }

    public function readDoc($Id) {
        $sql = "SELECT mime_type, doc "
                . "FROM Photos "
                . "WHERE id = :id";
    
        // initialize the params
        $mimeType = null;
        $doc = null;
        
        $stmt = $this->db->prepare($sql);
        if ($stmt->execute([":id" => $Id])) {
          
            $stmt->bindColumn(1, $mimeType);
            $stmt->bindColumn(2, $doc, \PDO::PARAM_LOB);
    
            return $stmt->fetch(\PDO::FETCH_BOUND) ?
                    ["id" => $Id,
                    "mime_type" => $mimeType,
                    "doc" => $doc] : null;
        } else {
            return null;
        }
    }


  public function updateDoc($Id, $mimeType, $pathToFile) {

      if (!file_exists($pathToFile))
          throw new \Exception("File %s not found.");
      
      $fh = fopen($pathToFile, 'rb');
      $aux = $fh;

      $sql = "UPDATE Photos
              SET mime_type = :mime_type,
                  doc = :doc
              WHERE id = :id";


      $stmt = $this->db->prepare($sql);

      $stmt->bindParam(':mime_type', $mimeType);
      $stmt->bindParam(':doc', $aux, \PDO::PARAM_LOB);
      $stmt->bindParam(':id', $Id);
      $stmt->execute();

      fclose($fh);

      return ;
  }

}

?>