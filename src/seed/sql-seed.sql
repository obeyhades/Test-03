CREATE TABLE List (
    list_id INT AUTO_INCREMENT PRIMARY KEY,          
    name VARCHAR(30) NOT NULL
);

CREATE TABLE Task (
    id INT AUTO_INCREMENT PRIMARY KEY,
    description VARCHAR(255) NOT NULL,
    status BIT(1) NOT NULL DEFAULT 0,
    deadline DATE,
    category VARCHAR(25),
    created_at DATETIME,
    updated_at DATETIME,
    list_id INT,
    FOREIGN KEY (list_id) REFERENCES List(list_id)
);
