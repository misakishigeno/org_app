CREATE TABLE IF NOT EXISTS users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(255) NOT NULL UNIQUE KEY,
    name VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    stat DATE NOT NULL,
    birthday DATE NOT NULL,
    age CHAR NOT NULL,
    sex TINYINT NOT NULL,
    event VARCHAR(255) NOT NULL,
    team VARCHAR(255) NOT NULL,
    goal VARCHAR(255) NOT NULL,
    image VARCHAR(255) NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
