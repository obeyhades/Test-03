CREATE TABLE List (
    list_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(30) NOT NULL,            
    name VARCHAR(30)
);

CREATE TABLE Task (
    id  INT AUTO_INCREMENT PRIMARY KEY,
    description  VARCHAR(255) NOT NULL,
    status BIT(1), 
    deadline DATE,
    category VARCHAR(25),
    created_at DATETIME,
    updated_at DATETIME,
    list_id INT,
    FOREIGN KEY (list_id) REFERENCES List(list_id)
);
