-- insert record in database

INSERT INTO artists(name) VALUES("Rivermaya");
INSERT INTO artists(name) VALUES("Psy");

INSERT INTO songs(title, length, genre, album_id) VALUES("Gangnam Style", 253, "k-pop", 1);




INSERT INTO albums(name, year, artist_id)
VALUES("Psy 6", 2012, 3), ("Trip", 1996, 2);

INSERT INTO songs(length, album_id, title, genre)
VALUES(253, 3, "Gangnam Style", "k-pop"),
(234, 4, "Kundiman", "OPM"),
(279, 4, "Kisapmata", "OPM");


-- ALTER TABLE <table_name> ADD <col_name><datatype>

ALTER TABLE songs ADD `like` varchar(255) NOT NULL;


-- DROP COLUMN

ALTER TABLE songs DROP COLUMN `like`;


-- select syntax
SELECT<columns>FROM table WHERE<condition>



-- CRUD

-- SELECT/ RETRIEVE DATA
SELECT title, genre FROM songs;


-- SELECTING ALL COLUMNS
SELECT * FROM `songs`;

-- SELECTING Title
SELECT title FROM songs WHERE genre = "OPM";

SELECT title,length FROM songs WHERE length >240 AND genre = "OPM"


-- updating. Give the update for. to update data/record
 UPDATE <table_name> SET <col_name> WHERE <condition>

UPDATE songs SET length = 240 WHERE title = "kundiman";


-- SQL DELETE syntax
DELETE FROM table WHERE column = value

DELETE FROM songs WHERE genre = "OPM" AND length > 240;