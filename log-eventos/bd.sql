CREATE TABLE logs (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    ip VARCHAR(20),
    data_action DATETIME,
    log_action TEXT
); 