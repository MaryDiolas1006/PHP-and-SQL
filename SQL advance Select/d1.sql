--  Join query
SELECT name, title 
FROM albums JOIN songs 
ON(albums.id = songs.album_id);

-- Alias
SELECT art.name as artist_name,
 alb.name as album_name,
 art.id artist_id
FROM artists as art
JOIN albums as alb
ON(art.id = alb.artist_id)
WHERE art.id = 3;


-- display artist name and songs belong 
-- to him.
SELECT art.name as artist_name,
s.title as song_title
FROM artists as art 
JOIN albums 
ON(art.id = albums.artist_id)
JOIN songs as s ON(albums.id = s.album_id)
WHERE art.id = 5;

-- without alias
SELECT artists.name, songs.title
FROM artists
JOIN albums ON(artists.id = albums.artist_id)
JOIN songs ON(albums.id = songs.album_id)
WHERE artists.id = 5;
-- JOIN <reference_table> ON(<ref_table.id> = <foreign_table.ref_id>)


-- display all songs by artists id = 7;
-- column needed:
-- title as title
-- songs id is will be song_id
-- artist name will be name

SELECT artists.name as name , songs.title as title, songs.id as  song_id
FROM artists
JOIN albums ON(artists.id = albums.artist_id)
JOIN songs ON(albums.id = songs.album_id)
WHERE artists.id = 7;



-- Like used to find specific pattern
-- %
SELECT name FROM albums WHERE name LIKE '%LLC%';
SELECT name FROM albums WHERE name LIKE 'bo%';

--  _

-- the underscore you inputed is counting the characters
SELECT name FROM albums WHERE name LIKE 'T___';
SELECT name FROM albums WHERE name LIKE '_rip';
SELECT name FROM albums WHERE name LIKE BINARY '%LL_';


-- OrDER BY
-- ASC / ascending
-- DESC / decending
SELECT * FROM artists ORDER BY name;
SELECT * FROM artists ORDER BY name ASC;
SELECT * FROM artists ORDER BY name DESC;

SELECT * FROM songs WHERE id < 11 ORDER BY genre ASC, id DESC; 


-- DISTINCT is to removes duplicate
SELECT DISTINCT genre FROM songs;


-- IN and ALL keyword
SELECT * FROM songs WHERE album_id = 2 || album_id = 3 || album_id = 4;
SELECT * FROM songs WHERE album_id IN (2,3,4);


-- ANY keyword syntax
-- sample: value with sub query
SELECT * FROM songs WHERE length < ANY (SELECT length FROM songs WHERE id = 4);

-- ALL syntax
SELECT * FROM songs WHERE id = ALL (
	SELECT album_id FROM songs WHERE id = 2
	);


-- LIMIT return of data 
SELECT * FROM songs LIMIT 20;

-- with offset 20
SELECT * FROM songs LIMIT 20 OFFSET 20;

-- Agreegate functions
-- COUNT() - use in inventory and audit
  -- How many songs are less than 300 secs
  SELECT COUNT(*) FROM songs WHERE length < 300;

-- SUM()
   SELECT SUM(length) as total_length FROM songs;

-- MIN()
 SELECT MIN(length) as total_length FROM songs;

-- MAX()
SELECT MAX(length) as total_length FROM songs;

-- AVG()
SELECT AVG(length) as total_length FROM songs;







