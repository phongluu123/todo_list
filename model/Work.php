<?php
require_once  __DIR__ . "/BaseModel.php";

class Work extends BaseModel {
    private $name;
    private $startingDate;
    private $endingDate;
    private $status;

    /**
     * Work constructor.
     * @param $connection
     */
    public function __construct($connection) {
		parent::__construct($connection);
        $this->table = TABLE_WORKS;
    }

    /**
     * Get name
     * @return name
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Set name
     * @param $name
     */
    public function setName($name) {
        $this->name = $name;
    }

    /**
     * Get starting date
     * @return startingDate
     */
    public function getStartingDate() {
        return $this->startingDate;
    }

    /**
     * Get starting date
     * @param $startingDate
     */
    public function setStartingDate($startingDate) {
        $this->startingDate = $startingDate;
    }

    /**
     * Get ending date
     * @return startingDate
     */
    public function getEndingDate() {
        return $this->startingDate;
    }

    /**
     * Set ending date
     * @param $endingDate
     */
    public function setEndingDate($endingDate) {
        $this->endingDate = $endingDate;
    }

    /**
     * Get status
     * @return status
     */
    public function getStatus() {
        return $this->status;
    }

    /**
     * Set status
     * @param $status
     */
    public function setStatus($status) {
        $this->status = $status;
    }

    /**
     * Save data
     * @return mixed
     */
    public function save(){
        $query = $this->connection->prepare("INSERT INTO " . $this->table . " (name, starting_date, ending_date, status)
                                        VALUES (:name, :starting_date, :ending_date, :status)");
        $result = $query->execute([
            "name" => $this->name,
            "starting_date" => $this->startingDate,
            "ending_date" => $this->endingDate,
            "status" => $this->status
        ]);
        $this->connection = null;

        return $result;
    }

    /**
     * Update data
     * @return mixed
     */
    public function update(){

        $query = $this->connection->prepare("
            UPDATE " . $this->table . "  
            SET 
                name = :name,  
                starting_date = :starting_date,  
                ending_date = :ending_date, 
                status = :status
            WHERE id = :id 
        ");

        $result = $query->execute([
            "name" => $this->name,
            "starting_date" => $this->startingDate,
            "ending_date" => $this->endingDate,
            "status" => $this->status,
            "id" => $this->id
        ]);

        $this->connection = null;

        return $result;
    }
}
?>
