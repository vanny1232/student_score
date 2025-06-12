<?php
include 'connectDB.php';

if (!isset($_GET['id'])) {
    die("ID not specified.");
}

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM students WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows !== 1) {
    die("Student not found.");
}

$row = $result->fetch_assoc();
$stmt->close();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $attendance = $_POST['attendance'];
    $quiz = $_POST['quiz'];
    $midterm = $_POST['midterm'];
    $final = $_POST['final'];
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
    $update = $conn->prepare("UPDATE students SET name=?, attendance=?, quiz=?, midterm=?, final=?, total=?, grade=? WHERE id=?");
    $update->bind_param("siiiissi", $name, $attendance, $quiz, $midterm, $final, $total, $grade, $id);
    if ($update->execute()) {
        header("Location: detia.php");
        exit();
    } else {
        echo "Update failed: " . $conn->error;
    }
    $update->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    </div>
        <body class="flex items-center justify-center min-h-screen p-4">
    <div class="container">
        <!-- Header Section -->
        <div class="header-section">
            <a href="detia.php" class="back-button">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </a>
            <h1 class="main-title">Student Grading</h1>
        </div>

        <form id="gradingForm" class="grading-form" action="edit.php?id=<?= $id ?>" method="POST">
            <div>
                <label for="studentName" class="form-label">Student name</label>
                <input type="text" name="name" 
                       placeholder="Enter student's full name" value="<?= htmlspecialchars($row['name']) ?>"
                       class="form-input" required>
            </div>

            <div>
                <label for="attendance" class="form-label">Attendance (0-10)</label>
                <input  type="number" name="attendance" placeholder="Attendance (0–10)" min="0" max="10" value="<?= $row['attendance'] ?>"
                       class="form-input" required>
            </div>

            <div>
                <label for="midterm" class="form-label">Quiz (0-15)</label>
                <input type="number" placeholder="Quiz (0–15)" name="quiz" min="0" max="15" value="<?= $row['quiz'] ?>"
                       class="form-input" required>
            </div>
                        <div>
                <label for="midterm" class="form-label">Midterm (0-15)</label>
                <input type="number" placeholder="Midterm (0–15)" name="midterm" min="0" max="15"  value="<?= $row['midterm'] ?>"
                       class="form-input" required>
            </div>

            <div>
                <label for="finalExam" class="form-label">Final Exam (0-60)</label>
                <input ttype="number" name="final" min="0" max="60" placeholder="Final (0–60)"  value="<?= $row['final'] ?>"
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