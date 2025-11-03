<?php
enum ValidationType: string
{
    case MIN_LENGTH = 'min_length'; // lunghezza minima
    case MAX_LENGTH = 'max_length'; // lunghezza massima
    case RANGE = 'range'; // valore numerico in un intervallo
    case NUMERIC = 'numeric'; // deve essere un numero
    case INTEGER = 'integer'; // deve essere un intero
    case FLOAT = 'float'; // deve essere un numero decimale
    case EMAIL = 'email'; // formato email
    case URL = 'url'; // formato URL
    case ALPHA = 'alpha'; // solo lettere
    case ALPHANUMERIC = 'alphanumeric'; // solo lettere e numeri
    case CUSTOM_SET = 'custom'; // solo determinati caratteri
    case MATCHES = 'matches'; // deve corrispondere a un altro valore (es. password)
    case DATE = 'date'; // data valida (formato Y-m-d)
}

function read_input($data)
{
    return trim($_POST[$data] ?? "");
}

function validate_input(string $data, ValidationType $type, mixed $requirement, &$error): bool
{
    switch ($type)
    {
        case ValidationType::MIN_LENGTH:
            if (strlen($data) < $requirement)
            {
                $error = "Lunghezza minima per <i>$data</i> di $requirement non rispettata";
                return false;
            }
            break;

        case ValidationType::MAX_LENGTH:
            if (strlen($data) > $requirement)
            {
                $error = "Lunghezza massima per <i>$data</i> di $requirement non rispettata";
                return false;
            }
            break;

        case ValidationType::RANGE:
            [$min, $max] = $requirement;
            if (!is_numeric($data) || $data < $min || $data > $max)
            {
                $error = "Il valore <i>$data</i> deve essere compreso tra $min e $max";
                return false;
            }
            break;

        case ValidationType::NUMERIC:
            if (!is_numeric($data))
            {
                $error = "Il valore <i>$data</i> deve essere numerico";
                return false;
            }
            break;

        case ValidationType::INTEGER:
            if ((int) $data != $data)
            {
                $error = "Il valore <i>$data</i> deve essere un intero";
                return false;
            }
            /*
            alternativa:
                controllare filter_var($data, FILTER_VALIDATE_INT) === false
                filter_var è una funzione progettata apposta per verificare se una stringa rappresenta un intero valido
               gestendo spazi, segni e limiti, overflow, ecc
            */
            break;

        case ValidationType::FLOAT:
            // deve contenere un punto e almeno una cifra dopo
            if ((float) $data != $data)
            {
                $error = "Il valore <i>$data</i> deve essere un decimale";
                return false;
            }
            /*
            alternativa:
                filter_var($data, FILTER_VALIDATE_FLOAT) === false
                if (!preg_match('/^[+-]?\d+\.\d+$/', $data))
            */
            break;
            
        case ValidationType::EMAIL:
            /*
                ^                    inizio della stringa
                [a-zA-Z0-9._-]+      uno o più caratteri ammessi nella parte local
                @                    deve seguire '@'
                [a-zA-Z0-9.-]+       uno o più caratteri ammessi nel dominio
                \.                   deve seguire '.'
                [a-zA-Z]{2,}         almeno due lettere per il top level domain
                $                    fine della stringa
            */
            $pattern = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/"; //semplifica rispetto allo standard RFC 5322
            if (!preg_match($pattern, $data))
            {
                $error = "<i>$data</i> non ha un formato email valido";
                return false;
            }
            /*
            alternativa:
                !filter_var($data, FILTER_VALIDATE_EMAIL)
            */
            break;

        case ValidationType::URL:
            /*
            ^                       inizio della stringa
            http                    deve iniziare con 'http'
            s?                      può esserci un'eventuale 's'
            :\/\/                   deve seguire '://'
            (?:[a-zA-Z0-9-]+\.)+    uno o più gruppi composti da lettere, numeri o trattini seguiti da un punto
            [a-zA-Z]{2,}            top-level domain composto da almeno due lettere
            (?::\d+)?               parte opzionale della porta, due punti seguiti da uno o più numeri
            (?:\/[^\s]*)?           parte opzionale del percorso: '/' seguito da caratteri non spazi
            $                       fine della stringa
            i                       flag case-insensitive (HTTP o http entrambi validi)
            */

            if (!preg_match('/^https?:\/\/(?:[a-zA-Z0-9-]+\.)+[a-zA-Z]{2,}(?::\d+)?(?:\/[^\s]*)?$/i', $data)) //accetta solo http:// e https://
                                                                                                              // per ftp, ftps, file si deve ampliare il pattern.
            {
                $error = "<i>$data</i> non ha un formato URL valido";
                return false;
            }
            /*
            alternativa:
                !filter_var($data, FILTER_VALIDATE_URL)
                verifica schema, dominio, porta, percorso, query, caratteri ammessi, ecc.
            */
            break;

        case ValidationType::ALPHA:
            $allowed = range('a', 'z');
            $allowed = array_merge($allowed, range('A', 'Z'));

            foreach (str_split($data) as $char)
            {
                if (!in_array($char, $allowed))
                {
                    $error = "<i>$data</i> deve contenere solo lettere";
                    return false;
                }
            }
            /*
            alternativa:
                !ctype_alpha($data)
            */
            break;

        case ValidationType::ALPHANUMERIC:
            $allowed = range('a', 'z');
            $allowed = array_merge($allowed, range('A', 'Z'));
            $allowed = array_merge($allowed, range('0', '9'));

            foreach (str_split($data) as $char)
            {
                if (!in_array($char, $allowed))
                {
                    $error = "<i>$data</i> deve contenere solo lettere e numeri";
                    return false;
                }
            }
            /*
            alternativa:
                !ctype_alnum($data)
            */

            break;

        
        case ValidationType::CUSTOM_SET:
            // $requirement deve essere una stringa di caratteri ammessi
            if ($data === "")
            {
                $error = "Il valore non può essere vuoto";
                return false;
            }

            $allowed = str_split($requirement);

            foreach (str_split($data) as $char)
            {
                if (!in_array($char, $allowed))
                {
                    $error = "<i>$data</i> deve contenere solo i caratteri: <i>$requirement</i>";
                    return false;
                }
            }
            break;

        case ValidationType::MATCHES:
            if ($data !== $requirement)
            {
                $error = "<i>$data</i> deve coincidere con <i>$requirement</i>";
                return false;
            }
            break;

        case ValidationType::DATE:
            $d = DateTime::createFromFormat('Y-m-d', $data); // formato YYYY-MM-DD si possono scegleire altri formati
            if (!$d || $d->format('Y-m-d') !== $data)
            {
                $error = "<i>$data</i> non è una data valida";
                return false;
            }
            break;
    }
    return true; // nessun errore
}
?>