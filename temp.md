```sql
CREATE TABLE movies (
  movie_id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255),
  main_genre VARCHAR(255),
  secondary_genre VARCHAR(255)
);

CREATE TABLE people (
  person_id INT PRIMARY KEY AUTO_INCREMENT,
  person_first_name VARCHAR(100),
  person_last_name VARCHAR(100),
  person_role VARCHAR(255),
  movie_id INT,
  FOREIGN KEY (movie_id) REFERENCES movies(movie_id)
);

CREATE TABLE ratings (
  rating_id INT PRIMARY KEY AUTO_INCREMENT,
  person_id INT,
  movie_id INT,
  rating INT,
  FOREIGN KEY (person_id) REFERENCES people(person_id),
  FOREIGN KEY (movie_id) REFERENCES movies(movie_id)
);
```


```sql
INSERT INTO movies (title, main_genre, secondary_genre) VALUES
('Babylon', 'Comedy', 'Drama, History'),
('Bullet Train', 'Action', 'Comedy, Thriller'),
('Amsterdam', 'Comedy', 'Drama, History');

INSERT INTO people (person_first_name, person_last_name, person_role, movie_id) VALUES
('Brad', 'Pitt', 'actor', 1),
('Margot', 'Robbie', 'actor', 1),
('Joey', 'King', 'actor', 2),
('Christian', 'Bale', 'actor', 3),
('Damien', 'Chezelle', 'director', 1),
('David', 'Leitch', 'director', 2),
('David', 'O Russell', 'director', 3),
('Drinen', NULL, 'reviewer', 1),
('Carl', NULL, 'reviewer', 1),
('Siskel', NULL, 'reviewer', 2),
('Ebert', NULL, 'reviewer', 3);

INSERT INTO ratings (person_id, movie_id, rating) VALUES
(9, 1, 3),
(8, 1, 4),
(8, 2, 2),
(11, 2, 5),
(10, 3, 3),
(9, 3, 2),
(8, 3, 3);

```

select concat(s1.student_id, " and ", s2.student_id), concat(s1.college, " and ", s2.college)
from zz_fake_college_students as s1,
     zz_fake_college_students as s2 
where
     s1.dob = s2.dob and
     s1.college != s2.college and
     s1.student_id != s2.student_id


