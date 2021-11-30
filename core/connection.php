<?php
class Connection {
    private $driver;
    private $host, $user, $pass, $database, $charset;
  
    public function __construct() {
        $db_config = require_once 'config/database.php';
        $this->driver=DB_DRIVER;
        $this->host=DB_HOST;
        $this->user=DB_USER;
        $this->pass=DB_PASS;
        $this->database=DB_DATABASE;
        $this->charset=DB_CHARSET;
    }

    /**
     * Create conncet database
     * @return PDO
     * @throws Exception
     */
    public function connect() {
        $dblib = $this->driver .':host='. $this->host .  ';dbname=' . $this->database . ';charset=' . $this->charset;

        try {
            $connection = new PDO($dblib, $this->user, $this->pass);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connection;
        } catch (PDOException $e) {
            throw new Exception('Problem connection.');
        }
    }
}
?>
