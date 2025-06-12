<?php
include 'connectDB.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $attendance = (int)$_POST['attendance'];
    $quiz = (int)$_POST['quiz'];
    $midterm = (int)$_POST['midterm'];
    $final = (int)$_POST['final'];

    $total = $attendance + $quiz + $midterm + $final;

    if ($total >= 90) {
        $grade = "A";
    } elseif ($total >= 80) {
        $grade = "B";
    } elseif ($total >= 70) {
        $grade = "C";
    } elseif ($total >= 60) {
        $grade = "D";
    } else {
        $grade = "F";
    }
    error_log("Form submitted: $name,$attendance ,$quiz,$midterm,$final");
    $stmt = $conn->prepare("INSERT INTO students (name, attendance, quiz, midterm, final, total, grade) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("siiiiis", $name, $attendance, $quiz, $midterm, $final, $total, $grade);

    if ($stmt->execute()) {
        header("Location: detia.php");
        exit();
    } else {
        echo "Insert failed: " . $conn->error;
    }
    $stmt->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Student</title>
    <link rel="stylesheet" href="style.css">

</head>
    <body class="flex items-center justify-center min-h-screen p-4">
    <div class="container">
        <!-- Header Section -->
        <div  class="header-section">
            <a href="detia.php" class="back-button">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </a>
            <h1 class="main-title">Student Grading</h1>
        </div>

        <form id="gradingForm" class="grading-form" action="add.php" method="POST">
            <div>
                <label for="studentName" class="form-label">Student name</label>
                <input type="text" name="name" 
                       placeholder="Enter student's full name"
                       class="form-input" required>
            </div>

            <div>
                <label for="attendance" class="form-label">Attendance (0-10)</label>
                <input  type="number" name="attendance" placeholder="Attendance (0–10)" min="0" max="10"
                       class="form-input" required>
            </div>

            <div>
                <label for="midterm" class="form-label">quiz (0-15)</label>
                <input type="number" placeholder="Quiz (0–15)" name="quiz" min="0" max="15"
                       class="form-input" required>
            </div>
                        <div>
                <label for="midterm" class="form-label">Midterm (0-15)</label>
                <input type="number" placeholder="Midterm (0–15)" name="midterm" min="0" max="15" 
                       class="form-input" required>
            </div>

            <div>
                <label for="finalExam" class="form-label">Final Exam (0-60)</label>
                <input ttype="number" name="final" min="0" max="60" placeholder="Final (0–60)"
                       class="form-input" required>
            </div>
    <br>
            <button type="submit" class="submit-button">
                Add
            </button>
        </form>
    </div>
</body>
</html>
