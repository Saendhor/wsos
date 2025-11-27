<!DOCTYPE html>
<html>
<head>
    <title>Static Properties</title>
</head>
<body>
    <h3>Proprietà statiche</h3>
    <?php   

    require("../Private/credentials.php");

    class Database // singleton
    {
        private static $instance = null; // unica istanza condivisa
        public $conn;

        private function __construct()
        {
            $this->conn = null;
        }

        public static function getInstance()
        {
            if (self::$instance === null)
            {
                self::$instance = new Database();
            }

            return self::$instance;
        }

        function connect($debug = false)
        {
            global $servername, $username, $password, $dbname;

            try
            {
                $this->conn = new mysqli($servername, $username, $password, $dbname);
                
                if ($this->conn->connect_errno) //numero dell’errore
                {
                    die ($debug ? "Connessione fallita: " . $this->conn->connect_error : "");
                }
                else
                {   
                    if($debug)
                        echo "Connessione effettuata.<br>";
                }
            }
            catch (Exception $e)
            {
                die ($debug ? "Errore durante la connessione: " . $e->getMessage() : "" );
            }

            return $this->conn;
        }
    }

    // uso Database::getInstance()
    $conn = Database::getInstance()->connect(true);



    $sql = "SELECT NOW() AS server_time";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0)
    {
        $row = $result->fetch_assoc();
        echo "MySQL TIME: <b>{$row['server_time']}</b><br>";
    }
    else
    {
        echo "Query fallita<br>";
    }
?>
</body>
</html>
