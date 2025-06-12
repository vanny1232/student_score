<?php
include 'connectDB.php';

if (!isset($_GET['id'])) {
  header("Location: detia.php?message=" . urlencode("ID not specified."));
    exit();
}

$id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM students WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    if ($stmt->affected_rows > 0) {
      header("Location: detia.php?message=" . urlencode("Student deleted successfully!"));
    } else {
        header("Location: detia.php?message=" . urlencode("No student found with that ID."));
    }
} else {
  header("Location: detia.php?message=" . urlencode("Error deleting student."));
}

$stmt->close();
$conn->close();
?>