-- Create the database
--CREATE DATABASE IF NOT EXISTS exam;

-- Use 'exam' database
USE myDatabase;

-- Create 'movies' table if it does not exist
DROP TABLE IF EXISTS movies;

-- Create table 'movies' if it does not exist
CREATE TABLE IF NOT EXISTS movies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(128) NOT NULL,
    director VARCHAR(64) NOT NULL,
    year INT NOT NULL,
    duration_minutes INT NOT NULL,
    genre VARCHAR(32) NOT NULL
);

-- Insert the items in the table
INSERT INTO movies (title, director, year, duration_minutes, genre) VALUES
('Avatar - La via dell acqua', 'James Cameron', 2022, 192, 'Fantascienza'),
('Joker', 'Todd Phillips', 2019, 122, 'Dramma'),
('La grande bellezza', 'Paolo Sorrentino', 2013, 141, 'Dramma'),
('Chiamami col tuo nome', 'Luca Guadagnino', 2017, 132, 'Romantico'),
('Il capitale umano', 'Paolo Virzi', 2013, 111, 'Dramma'),
('Quo vado?', 'Gennaro Nunziante', 2016, 86, 'Commedia'),
('Avengers: Endgame', 'Anthony Russo, Joe Russo', 2019, 181, 'Azione'),
('La vita è bella', 'Roberto Benigni', 1997, 116, 'Dramma'),
('Frozen II - Il segreto di Arendelle', 'Jennifer Lee, Chris Buck', 2019, 103, 'Animazione'),
('La famiglia Bélier', 'Èric Lartigau', 2014, 105, 'Commedia');

-- mariadb -uuser -ppassword exam < movies.sql