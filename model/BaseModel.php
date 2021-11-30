<?php
class BaseModel {
	protected $table = "";
    protected $connection;
    protected $id;

    /**
     * BaseModel constructor.
     * @param $connection
     */
    public function __construct($connection) {
		$this->connection = $connection;
    }

    /**
     * Get id
     * @return id
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set id
     * @param int $id
     */
    public function setId($id) {
        $this->id = $id;
    }

    /**
     * Get all form table
     * @return mixed
     */
    public function getAll(){
        $query = $this->connection->prepare("SELECT * FROM " . $this->table);
        $query->execute();
        $results = $query->fetchAll();
        $this->connection = null;
        return $results;
    }

    /**
     * Get data by id this table
     * @param int $id
     * @return mixed
     */
    public function getById($id){
        $query = $this->connection->prepare("SELECT * FROM " . $this->table . "  WHERE id = :id");
        $query->execute([ "id" => $id]);
        $results = $query->fetchObject();
        $this->connection = null;
        return $results;
    }

    /**
     * Get date by column
     * @param string $column
     * @param mixed $value
     * @return mixed
     */
    public function getByColumn($column,$value){
        $query = $this->connection->prepare("SELECT * FROM " . $this->table . " WHERE " . $column . " = :value");
        $query->execute(["value" => $value]);
        $results = $query->fetchAll();
        $this->connection = null;
        return $results;
    }

    /**
     * Delete data by id
     * @param int $id
     * @return int
     */
    public function deleteById($id)
    {
        try {
            $query = $this->connection->prepare("DELETE FROM " . $this->table . " WHERE id = :id");
            $query->execute([ "id" => $id]);
            $connection = null;
        } catch (Exception $e) {
            echo 'Fail DELETE by: ' . $e->getMessage();
            return -1;
        }
    }
}
?>