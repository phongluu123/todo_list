<?php
class WorkController {

    private $connection;
    private $connect;

    /**
     * WorkController constructor.
     * @throws Exception
     */
    public function __construct() {
		require_once  __DIR__ . "/../core/Connection.php";
        require_once  __DIR__ . "/../model/Work.php";
        
        $this->connection = new Connection();
        $this->connect = $this->connection->connect();
    }

    /**
     * Execute the corresponding action
     * @param string $accion
     */
    public function run($accion){
        switch($accion)
        { 
            case "index" :
                $this->index();
                break;
            case "create-view" :
                $this->createView();
                break;
            case "create" :
                $this->create();
                break;
            case "detail" :
                $this->detail();
                break;
            case "update" :
                $this->update();
                break;
            case "delete" :
                $this->delete();
                break;
            case "show-calendar" :
                $this->showCalendar();
                break;
            case "load-calendar" :
                $this->loadCalendar();
                break;
            default:
                $this->index();
                break;
        }
    }

    /**
     * Get all work
     */
    public function index()
    {
        $work = new Work($this->connect);
        $works = $work->getAll();
       
        $this->view("index", [
            "works" => $works,
            "title" => "WORKS"
        ]);
    }

    /**
     * Show detail this work
     */
    public function detail()
    {
        $work= new Work($this->connect);
        $work = $work->getById($_GET["id"]);

        $this->view("detailWork", [
            "work" => $work,
            "title" => "Detail work"
        ]);
    }

    /**
     * Show view create work
     */
    public function createView()
    {
        $this->view("createWork", ["title" => "Create work"]);
    }

    /**
     * Create work
     */
    public function create()
    {
        if(isset($_POST["create"]))
        {
            $work = new Work($this->connect);
            $work->setName($_POST["name"]);
            $work->setStartingDate($_POST["startingDate"]);
            $work->setEndingDate($_POST["endingDate"]);
            $work->setStatus($_POST["status"]);
            $work->save();
        }

        header("Location: index.php?controller=work&action=index");
    }

    /**
     * Delete work by id
     */
    public function delete()
    {
        $work = new Work($this->connect);

         if(isset($_GET["id"]))
         {
             $work->deleteById($_GET["id"]);
         }

        header("Location: index.php?controller=work&action=index");
    }

    /**
     * Update work by id
     */
    public function update()
    {
        if(isset($_POST["id"]))
        {
            $work = new Work($this->connect);
            $work->setId($_POST["id"]);
            $work->setName($_POST["name"]);
            $work->setStartingDate($_POST["startingDate"]);
            $work->setEndingDate($_POST["endingDate"]);
            $work->setStatus($_POST["status"]);
            $work->update();
        }

        header("Location: index.php?controller=work&action=detail&id=" . $_POST["id"]);
    }

    /**
     * Show calendar
     */
    public function showCalendar()
    {
        $this->view("calendar", [
            "title" => "Calendar"
        ]);
    }

    /**
     * Load calendar
     */
    public function loadCalendar()
    {
        $work = new Work($this->connect);
        $works = $work->getAll();

        foreach ($works as $item) {
            $data[] = array(
                'id'   => $item['id'],
                'title'   => $item["name"],
                'start'   => $item["starting_date"],
                'end'   => $item["ending_date"]
            );
        }

        echo json_encode($data);
    }
    /**
     * Create view redirect
     * @param string $view
     * @param array data
     */
    public function view($view, $data)
    {
        $data = $data;
        require_once  __DIR__ . "/../view/" . $view . "View.php";
    }
}
?>
