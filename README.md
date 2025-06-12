🎓 Student Grading System
A simple PHP web application for managing student records with grade calculation. This system allows you to Add, Update, Delete, and View students' scores and grades. It uses PHP, MySQL, and basic HTML/CSS.

📁 Project Structure
student-grading/
│
├── connectDB.php   # Centralized database connection script

├── add.php         # Adding students
├── delete.php      # Deleting students
├── edit.php        # Updating students
├── detia.php       # Displays all student records in a table format. Main interface for adding, updating, deleting students
├── style.css       # Styles for the application
├── README.md       # Project documentation and setup guide
└── MYSQL SCRIPT.sql  # SQL script to create the database and table

🛠️ Setup Instructions
1. Place Project in Server Directory
Copy or clone the folder into your local web server directory:

XAMPP: htdocs/

LAMP: /var/www/html/

Example:

sudo cp -r student_score /var/www/html/

2. Create the MySQL Database
Open a MySQL client (e.g., mysql in terminal or phpMyAdmin), and run:

CREATE DATABASE student_score;

USE student_score;

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

Or simply run the SQL from MYSQL SCRIPT.sql.

3. Edit DB Connection (if needed)
Edit connectDB.php to match your MySQL settings:

<?php
$host = "localhost";
$user = "root";   // or your MySQL username
$pass = "";       // or your MySQL password
$db   = "student_score";
?>

🚀 Usage
Start Apache and MySQL from your local server manager.

Then open your browser and go to:

http://localhost/student_score/detia.php

🎯 Grade Calculation
Total Score

Grade

90–100

A

80–89

B

70–79

C

60–69

D

< 60

F

👤 Developed By
Vanna Vanny
ACLEDA University

📦 Want this as a downloadable .zip or GitHub repo? Just say the word!