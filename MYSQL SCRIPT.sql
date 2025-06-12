#MYSQL CODE
CREATE DATABASE student_grading;

USE student_grading;

CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    attendance INT,
    quiz INT,
    midterm INT,
    final INT,
    total INT,
    grade VARCHAR(2)
);
