CREATE TABLE authors
(
    id         INT AUTO_INCREMENT PRIMARY KEY,
    name       VARCHAR(255) NOT NULL,
    bio VARCHAR(255) NOT NULL

);
CREATE TABLE books
(
    id         INT AUTO_INCREMENT PRIMARY KEY,
    title      VARCHAR(255) NOT NULL,
    author_id  INT          NOT NULL,
    FOREIGN KEY (author_id) REFERENCES authors (id) ON DELETE CASCADE
);
