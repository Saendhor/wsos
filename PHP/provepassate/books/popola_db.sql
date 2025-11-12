-- Creazione del database exam se non esiste
CREATE DATABASE IF NOT EXISTS exam;

-- Utilizzo del database exam
USE exam;

-- Creazione della tabella books (se non esiste)

DROP TABLE IF EXISTS books;

-- Creazione del database exam se non esiste
CREATE DATABASE IF NOT EXISTS exam;

-- Utilizzo del database exam
USE exam;

-- Creazione della tabella books solo se non esiste
CREATE TABLE IF NOT EXISTS books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    isbn VARCHAR(15) UNIQUE NOT NULL,
    title VARCHAR(128) NOT NULL,
    author VARCHAR(64),
    publisher VARCHAR(64),
    ranking INT,
    year INT,
    price FLOAT
);

-- Inserimento di 30 record nella tabella books
INSERT INTO books (isbn, title, author, publisher, ranking, year, price) VALUES
('9781408855652', 'Harry Potter and the Philosopher''s Stone', 'J.K. Rowling', 'Bloomsbury', 6, 1997, 12.75),
('9780553386790', 'The Road', 'Cormac McCarthy', 'Vintage', 7, 2006, 16.00),
('9780062315007', 'The Alchemist', 'Paulo Coelho', 'HarperOne', 18, 1988, 10.50),
('9781400032716', 'Beloved', 'Toni Morrison', 'Vintage', 19, 1987, 12.50),
('9780307474278', 'A Thousand Splendid Suns', 'Khaled Hosseini', 'Riverhead Books', 20, 2007, 15.99),
('9780439139601', 'Harry Potter and the Goblet of Fire', 'J.K. Rowling', 'Scholastic', 2, 2000, 20.50),
('9781982137274', 'Where the Crawdads Sing', 'Delia Owens', 'G.P. Putnam''s Sons', 3, 2018, 15.75),
('9780451524935', '1984', 'George Orwell', 'Signet Classics', 4, 1949, 9.99),
('9780061120084', 'To Kill a Mockingbird', 'Harper Lee', 'Harper Perennial', 5, 1960, 14.99),
('9780307277671', 'The Kite Runner', 'Khaled Hosseini', 'Riverhead Books', 8, 2003, 13.50),
('9780743273565', 'Of Mice and Men', 'John Steinbeck', 'Penguin Classics', 9, 1937, 8.99),
('9780525555376', 'Becoming', 'Michelle Obama', 'Crown Publishing', 10, 2018, 18.99),
('9780385472579', 'Things Fall Apart', 'Chinua Achebe', 'Anchor', 11, 1958, 9.50),
('9780439023528', 'The Hunger Games', 'Suzanne Collins', 'Scholastic', 12, 2008, 14.99),
('9780316769488', 'The Catcher in the Rye', 'J.D. Salinger', 'Little, Brown', 13, 1951, 10.99),
('9780140177398', 'Of Human Bondage', 'W. Somerset Maugham', 'Penguin Classics', 21, 1915, 8.99),
('9780143127741', 'The Great Gatsby', 'F. Scott Fitzgerald', 'Penguin Books', 1, 1925, 10.99),
('9780142437339', 'Moby-Dick', 'Herman Melville', 'Penguin Classics', 26, 1851, 11.99),
('9781593080005', 'The Scarlet Letter', 'Nathaniel Hawthorne', 'Barnes & Noble Classics', 27, 1850, 8.50),
('9780060935467', 'Brave New World', 'Aldous Huxley', 'Harper Perennial', 28, 1932, 9.99),
('9780446310789', 'To Kill a Mockingbird', 'Harper Lee', 'Grand Central Publishing', 22, 1960, 14.99),
('9780380730403', 'Invisible Man', 'Ralph Ellison', 'Vintage', 23, 1952, 12.99),
('9780380002450', 'The Old Man and the Sea', 'Ernest Hemingway', 'Scribner', 24, 1952, 10.99),
('9780553213119', 'Dracula', 'Bram Stoker', 'Bantam Classics', 25, 1897, 7.50),
('9780747532743', 'Harry Potter and the Chamber of Secrets', 'J.K. Rowling', 'Bloomsbury', 14, 1998, 12.75),
('9780679783268', 'Pride and Prejudice', 'Jane Austen', 'Vintage Classics', 15, 1813, 9.50),
('9780316015844', 'Twilight', 'Stephenie Meyer', 'Little, Brown', 16, 2005, 13.99),
('9780156012195', 'Life of Pi', 'Yann Martel', 'Houghton Mifflin Harcourt', 17, 2001, 11.99),
('9780307743657', 'The Sun Also Rises', 'Ernest Hemingway', 'Scribner', 29, 1926, 12.99),
('9780679785897', 'Emma', 'Jane Austen', 'Modern Library', 30, 1815, 9.99)
ON DUPLICATE KEY UPDATE
title=VALUES(title), author=VALUES(author), publisher=VALUES(publisher),
ranking=VALUES(ranking), year=VALUES(year), price=VALUES(price);
