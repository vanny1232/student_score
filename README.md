🎓 Student Grade Management SystemThis document delineates the operational parameters and structural composition of a rudimentary PHP-based web application engineered for the methodical administration of student academic records, inclusive of grade computation. The system facilitates the addition, modification, expurgation, and retrieval of student scores and corresponding grade designations. Its foundational technologies comprise PHP, MySQL, and fundamental HTML/CSS constructs.📁 Project ArchitectureThe student-grading/ directory, serving as the repository for this project, encompasses the following constituent files and their respective functionalities:student-grading/
│
├── connectDB.php   # Script dedicated to establishing and maintaining the centralized database connection.
├── add.php         # Module for the systematic incorporation of new student entries.
├── delete.php      # Module for the systematic removal of extant student records.
├── edit.php        # Module for the systematic modification of extant student records.
├── detia.php       # The primary interface, designed for the tabular presentation of all student records and providing access to the functionalities for addition, modification, and expurgation of student data.
├── style.css       # Cascading Style Sheet file, providing aesthetic attributes for the application's user interface.
├── README.md       # Comprehensive project documentation and installation directives.
└── MYSQL SCRIPT.sql  # SQL script designed for the instantiation of the requisite database schema and table structures.
🛠️ Implementation Protocols1. Deployment within Server EnvironmentThe project directory is to be replicated or cloned into the designated root directory of the local web server.XAMPP: Located within the htdocs/ directory.LAMP: Located within the /var/www/html/ directory.An illustrative command for this procedure is provided below:sudo cp -r student_score /var/www/html/
2. MySQL Database InstantiationAccess to a MySQL client (e.g., the command-line interface mysql or phpMyAdmin) is prerequisite for the execution of the following SQL statements, thereby establishing the necessary database and table:CREATE DATABASE student_score;

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
Alternatively, the entire SQL script contained within MYSQL SCRIPT.sql may be executed.3. Database Connection Configuration (As Required)The connectDB.php file necessitates modification to conform to the specific MySQL server settings. The configurable parameters are as follows:<?php
$host = "localhost";
$user = "root";   // May be substituted with the designated MySQL username.
$pass = "";       // May be substituted with the designated MySQL password.
$db   = "student_score";
?>
🚀 Operational DirectivesTo initiate system functionality, the Apache and MySQL services within the local server management environment must be activated.Subsequent to service activation, access to the application interface may be attained by navigating a web browser to the following Universal Resource Locator:http://localhost/student_score/detia.php
🎯 Grade Determination MethodologyThe assignment of academic grades is predicated upon the cumulative score achieved, as delineated in the following tabular representation:Total ScoreGrade90–100A80–89B70–79C60–69D< 60F👤 Development ProvenanceThis system was conceived and engineered by:Vanna VannyACLEDA University📦 Distribution InquiryInquiries regarding the provision of this software as a downloadable compressed archive (.zip file) or its integration into a GitHub repository are hereby invited.