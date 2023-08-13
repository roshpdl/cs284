Here are the SQL commands that I used to create the tables:


```sql
CREATE TABLE musicians (
    id INT,
    musician_name VARCHAR(200),
    year_of_birth YEAR,
    nationality VARCHAR(200),
    PRIMARY KEY (id)
);

CREATE TABLE bands (
    id INT,
    band_name VARCHAR(200),
    year_of_formation YEAR,
    genre VARCHAR(300),
    PRIMARY KEY(id)
);

CREATE TABLE albums (
    id INT,
    album_name VARCHAR(255),
    year_of_release YEAR,
    genre VARCHAR(300),
    PRIMARY KEY (id)
);

CREATE TABLE songs (
    id INT,
    song_name VARCHAR(200),
    album_id INT,
    length TIME,
    track_number INT,
    PRIMARY KEY(id),
    FOREIGN KEY(album_id) REFERENCES albums(id)
);

INSERT INTO musicians (id, musician_name, year_of_birth, nationality)
VALUES (1, 'Freddie Mercury', 1946, 'British'),
       (2, 'Amrit Gurung', 1978, 'Nepal');

INSERT INTO bands (id, band_name, year_of_formation, genre)
VALUES (1, 'Queen', 1970, 'Rock'),
       (2, 'Nepathya', 1990, 'Nepali Pop');

INSERT INTO albums (id, album_name, year_of_release, genre)
VALUES (1, 'A Night at the Opera', 1975, 'Rock'),
       (2, 'Bheda Ko Oon Jasto', 1995, 'Nepali Pop');

INSERT INTO songs (id, song_name, album_id, length, track_number)
VALUES (1, 'Bohemian Rhapsody', 1, '00:05:55', 1),
       (2, 'Resham Firiri', 2, '00:05:21', 1);
```


AND here are the specifications:

```sql

DESCRIBE musicians;
+---------------+--------------+------+-----+---------+-------+
| Field         | Type         | Null | Key | Default | Extra |
+---------------+--------------+------+-----+---------+-------+
| id            | int(11)      | NO   | PRI | NULL    |       |
| musician_name | varchar(200) | YES  |     | NULL    |       |
| year_of_birth | year(4)      | YES  |     | NULL    |       |
| nationality   | varchar(200) | YES  |     | NULL    |       |
+---------------+--------------+------+-----+---------+-------+

SELECT * FROM musicians;
+----+-----------------+---------------+-------------+
| id | musician_name   | year_of_birth | nationality |
+----+-----------------+---------------+-------------+
|  1 | Freddie Mercury |          1946 | British     |
|  2 | Amrit Gurung    |          1978 | Nepal       |
+----+-----------------+---------------+-------------+

DESCRIBE bands;
+-------------------+--------------+------+-----+---------+-------+
| Field             | Type         | Null | Key | Default | Extra |
+-------------------+--------------+------+-----+---------+-------+
| id                | int(11)      | NO   | PRI | NULL    |       |
| band_name         | varchar(200) | YES  |     | NULL    |       |
| year_of_formation | year(4)      | YES  |     | NULL    |       |
| genre             | varchar(300) | YES  |     | NULL    |       |
+-------------------+--------------+------+-----+---------+-------+

SELECT * FROM bands;
+----+-----------+-------------------+------------+
| id | band_name | year_of_formation | genre      |
+----+-----------+-------------------+------------+
|  1 | Queen     |              1970 | Rock       |
|  2 | Nepathya  |              1990 | Nepali Pop |
+----+-----------+-------------------+------------+

DESCRIBE albums;
+-----------------+--------------+------+-----+---------+-------+
| Field           | Type         | Null | Key | Default | Extra |
+-----------------+--------------+------+-----+---------+-------+
| id              | int(11)      | NO   | PRI | NULL    |       |
| album_name      | varchar(255) | YES  |     | NULL    |       |
| year_of_release | year(4)      | YES  |     | NULL    |       |
| genre           | varchar(300) | YES  |     | NULL    |       |
+-----------------+--------------+------+-----+---------+-------+

SELECT * FROM albums;
+----+----------------------+-----------------+------------+
| id | album_name           | year_of_release | genre      |
+----+----------------------+-----------------+------------+
|  1 | A Night at the Opera |            1975 | Rock       |
|  2 | Bheda Ko Oon Jasto   |            1995 | Nepali Pop |
+----+----------------------+-----------------+------------+

DESCRIBE songs;
+--------------+--------------+------+-----+---------+-------+
| Field        | Type         | Null | Key | Default | Extra |
+--------------+--------------+------+-----+---------+-------+
| id           | int(11)      | NO   | PRI | NULL    |       |
| song_name    | varchar(200) | YES  |     | NULL    |       |
| album_id     | int(11)      | YES  | MUL | NULL    |       |
| length       | time         | YES  |     | NULL    |       |
| track_number | int(11)      | YES  |     | NULL    |       |
+--------------+--------------+------+-----+---------+-------+

SELECT * FROM songs;
+----+-------------------+----------+----------+--------------+
| id | song_name         | album_id | length   | track_number |
+----+-------------------+----------+----------+--------------+
|  1 | Bohemian Rhapsody |        1 | 00:05:55 |            1 |
|  2 | Resham Firiri     |        2 | 00:05:21 |            1 |
+----+-------------------+----------+----------+--------------+
```