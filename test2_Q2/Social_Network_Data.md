## Creating user_info tables:

```sql
CREATE TABLE USER_INFO (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_name VARCHAR(255),
    user_hobby VARCHAR(255)
);
```

## Creating friendships table:

```sql
CREATE TABLE FRIENDSHIP (
    user1_id INT,
    user2_id INT,
    PRIMARY KEY (user1_id, user2_id),
    FOREIGN KEY (user1_id) REFERENCES USER_INFO(id),
    FOREIGN KEY (user2_id) REFERENCES USER_INFO(id)
);
```

## Creating block_data:

```sql
CREATE TABLE BLOCK_DATA (
    block_id INT PRIMARY KEY AUTO_INCREMENT,
    blocker_id INT,
    blocked_id INT,
    UNIQUE (blocker_id, blocked_id),
    FOREIGN KEY (blocker_id) REFERENCES USER_INFO(id),
    FOREIGN KEY (blocked_id) REFERENCES USER_INFO(id)
);
```
## Inserting data into USER_INFO table

```sql
INSERT INTO USER_INFO (user_name, user_hobby)
VALUES ('John', 'Reading'),
       ('Mary', 'Traveling'),
       ('Bob', 'Playing video games'),
       ('Alice', 'Hiking'),
       ('Tom', 'Watching movies'),
       ('Donna', 'Dancing'),
       ('Charlie', 'Cooking'),
       ('Emily', 'Photography'),
       ('David', 'Running'),
       ('Rachel', 'Painting');
```

## Inserting data into FRIENDSHIP table
```sql
INSERT INTO FRIENDSHIP (user1_id, user2_id)
VALUES (1, 2),
       (1, 3),
       (2, 3),
       (3, 4),
       (4, 5),
       (5, 6),
       (6, 7),
       (7, 8),
       (8, 9),
       (9, 10);
```

## Inserting data into BLOCK_DATA table

```sql
INSERT INTO BLOCK_DATA (blocker_id, blocked_id)
VALUES (1, 4),
       (2, 5),
       (3, 1),
       (4, 2),
       (5, 3),
       (6, 1),
       (7, 2),
       (8, 3),
       (9, 4),
       (10, 5);
```