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

CREATE TABLE IF NOT EXISTS conditions (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    name VARCHAR(50) NOT NULL,
    goal VARCHAR(255) NOT NULL,
    weight VARCHAR(255) NOT NULL,
    temperature VARCHAR(255) NOT NULL,
    defecation VARCHAR(255) NOT NULL,
    schedule VARCHAR(255) NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT fk_user_id
    FOREIGN KEY (user_id)
        REFERENCES users(id)
        ON DELETE RESTRICT ON UPDATE RESTRICT
);

CREATE TABLE IF NOT EXISTS training (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    team VARCHAR(255) NOT NULL,
    goal VARCHAR(255) NOT NULL,
    image VARCHAR(255) NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

