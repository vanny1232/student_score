
# 🎓 Student Grade Management System

This document delineates the operational parameters and structural composition of a rudimentary PHP-based web application engineered for the methodical administration of student academic records, inclusive of grade computation.

The system facilitates the **addition, modification, expurgation, and retrieval** of student scores and corresponding grade designations.  
Its foundational technologies comprise **PHP, MySQL**, and fundamental **HTML/CSS** constructs.

---

## 📁 Project Architecture

The `student-grading/` directory, serving as the repository for this project, encompasses the following constituent files and their respective functionalities:

```
student-grading/
│
├── connectDB.php        # Script dedicated to establishing and maintaining the centralized database connection.
├── add.php              # Module for the systematic incorporation of new student entries.
├── delete.php           # Module for the systematic removal of extant student records.
├── edit.php             # Module for the systematic modification of extant student records.
├── detia.php            # The primary interface for tabular presentation and CRUD operations on student data.
├── style.css            # CSS file providing visual styling for the application UI.
├── README.md            # Project documentation and installation guide.
└── MYSQL SCRIPT.sql     # SQL script to create the necessary database schema and tables.
```

---

## 🛠️ Implementation Protocols

### 1. Deployment within Server Environment

The project directory should be placed in your web server's root directory:

- **XAMPP**: `htdocs/`
- **LAMP**: `/var/www/html/`

**Example command for LAMP:**

```bash
sudo cp -r student_score /var/www/html/
```

---

### 2. MySQL Database Instantiation

Access a MySQL client (CLI or phpMyAdmin) and execute:

```sql
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
```

Alternatively, execute the full script in `MYSQL SCRIPT.sql`.

---

### 3. Database Connection Configuration

Modify `connectDB.php` to match your MySQL settings:

```php
<?php
$host = "localhost";
$user = "root";   // Your MySQL username
$pass = "";       // Your MySQL password
$db   = "student_score";
?>
```

---

## 🚀 Operational Directives

1. Start **Apache** and **MySQL** services using your local server manager (e.g., XAMPP Control Panel).
2. Open your web browser and navigate to:

```
http://localhost/student_score/detia.php
```

---

## 🎯 Grade Determination Methodology

| Total Score | Grade |
|-------------|-------|
| 90–100      | A     |
| 80–89       | B     |
| 70–79       | C     |
| 60–69       | D     |
| < 60        | F     |

---

## 👤 Development Provenance

**Developed by:**

**Vanna Vanny**  
*ACLEDA University*

---

## 📦 Distribution Inquiry

If you are interested in downloading this system as a `.zip` file or viewing it on GitHub, please reach out for access or collaboration.