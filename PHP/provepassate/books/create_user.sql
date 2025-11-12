-- Elimina l'utente se esiste già
DROP USER IF EXISTS 'username'@'localhost';

-- Crea un nuovo utente con una password
CREATE USER 'username'@'localhost' IDENTIFIED BY 'password';

-- Concedi tutti i privilegi al nuovo utente
GRANT ALL PRIVILEGES ON *.* TO 'username'@'localhost' WITH GRANT OPTION;

-- Applica le modifiche
FLUSH PRIVILEGES;
