## Create database and data tables

### Open integrated terminal

    docker exec -it primeme-db bash

### Run mysql as a root

    mysql -u root -p

password: `root`

### Create database

    CREATE DATABASE primeme;

### Use newly created database

    USE primeme;

### Create tables

- create `users` table

```sql
CREATE TABLE users (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    username VARCHAR(255) UNIQUE,
    email VARCHAR(255) UNIQUE,
    password VARCHAR(255),
    avatar VARCHAR(255)
);
```

- create `categories` table

```sql
CREATE TABLE categories (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) UNIQUE
);
```

- create `memes` table

```sql
CREATE TABLE memes (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    user_id INT,
    category_id INT,
    caption VARCHAR(255),
    image_path VARCHAR(255),
    votes INT DEFAULT 0,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (category_id) REFERENCES categories(id)
);
```
