CREATE TABLE IF NOT EXISTS users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(255) NOT NULL UNIQUE KEY,
    name VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    start_date DATE NOT NULL,
    birthday DATE NOT NULL,
    age CHAR NOT NULL,
    sex TINYINT NOT NULL,
    sports_event VARCHAR(255) NOT NULL,
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

CREATE TABLE IF NOT EXISTS trainings (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    date CHAR NOT NULL,
    ampm BOOLEAN NOT NULL,
    jump VARCHAR(255) NOT NULL,
    category VARCHAR(255) NOT NULL,
    menu VARCHAR(255) NOT NULL,
    rap VARCHAR(255) NOT NULL,
    sets VARCHAR(255) NOT NULL,
    fraction VARCHAR(255) NOT NULL,
    km VARCHAR(255) NOT NULL,
    memo VARCHAR(255) NOT NULL,
    training_time TIME NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT fk_trainings_user_id
    FOREIGN KEY (user_id)
        REFERENCES users(id)
        ON DELETE RESTRICT ON UPDATE RESTRICT
);


CREATE TABLE IF NOT EXISTS  coaches(
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    image VARCHAR(255) NOT NULL,
    my_comment VARCHAR(255) NOT NULL,
    coach_comment VARCHAR(255) NOT NULL,
    coach_name VARCHAR(50) NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS  trining_trainers(
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    image VARCHAR(255) NOT NULL,
    my_comment VARCHAR(255) NOT NULL,
    trining_trainers_comment VARCHAR(255) NOT NULL,
    trining_trainers_name VARCHAR(50) NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS  nutrition_trainers(
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    image VARCHAR(255) NOT NULL,
    my_comment VARCHAR(255) NOT NULL,
    nutrition_trainers_comment VARCHAR(255) NOT NULL,
    nutrition_trainers_name VARCHAR(50) NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS  mental_trainers(
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    image VARCHAR(255) NOT NULL,
    my_comment VARCHAR(255) NOT NULL,
    mental_trainers_comment VARCHAR(255) NOT NULL,
    mental_trainers_name VARCHAR(50) NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS  sponsers(
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    image VARCHAR(255) NOT NULL,
    my_comment VARCHAR(255) NOT NULL,
    sponsers_comment VARCHAR(255) NOT NULL,
    sponsers_name VARCHAR(50) NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS photos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    image VARCHAR(255) NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT fk_photos_user_id
    FOREIGN KEY (user_id)
        REFERENCES users(id)
        ON DELETE RESTRICT ON UPDATE RESTRICT
);
