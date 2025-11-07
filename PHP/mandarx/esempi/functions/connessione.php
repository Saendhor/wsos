<?php
    function connect($servername, $username, $password, $dbname, $debug = false)
    {
        try
        {
            $conn = @new mysqli($servername, $username, $password, $dbname);
            
            if ($conn->connect_errno) //numero dell’errore
            {
                die ($debug ? "Connessione fallita: " . $conn->connect_error : "");
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

        return $conn;
    }
?>