<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show all Student</title>
    <style>
        /* General Body Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            box-sizing: border-box;
        }

        /* Container for the entire UI */
        .crud-container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 100%;
            max-width: 800px; /* Adjust max-width as needed */
            box-sizing: border-box;
        }

        /* Header Styling */
        .crud-header {
            text-align: center;
            margin-bottom: 25px;
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

        /* Add Button Container */
        .add-button-container {

            display: flex;
            justify-content: flex-end; /* Aligns to the right */
            margin-bottom: 15px;
        }

        /* Add Button Styling */
        .add-button {
            text-decoration: none;
            background-color: #28a745; /* Green color */
            color: white;
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }
        .add-button:hover {
            opacity: 0.8; /* Slightly transparent on hover */
        }

        /* Table Styling */
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        .data-table th, .data-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        .data-table th {
            background-color: #f2f2f2;
            font-weight: bold;
            color: #555;
            text-transform: uppercase;
            font-size: 14px;
        }

        .data-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .data-table tr:hover {
            background-color: #f1f1f1;
        }

        /* Action Buttons in Table */
        .action-button {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 13px;
            transition: background-color 0.3s ease;
            color: white; /* Default text color */
        }

        .edit-button {
            background-color: #007bff; /* Blue */
            color: #ffffff;
            border: 1px solid #007bff; /* Red border */
            border-radius: 4px;
            text-decoration: none;
            padding: 6px 12px;
      
        }
        .edit-button:hover {
       opacity: 0.8; /* Slightly transparent on hover */
        }

        .delete-button {
            color: #ffffff;
            border: 1px solid #ff0019; /* Red border */
            border-radius: 4px;
            text-decoration: none;
            padding: 6px 12px;
            background-color: #ff0019;
        }
        .delete-button:hover {
            opacity: 0.8; /* Slightly transparent on hover */
        }

        /* Responsive adjustments */
        @media (max-width: 600px) {
            .data-table th, .data-table td {
                padding: 8px;
                font-size: 12px;
            }
            .action-button {
                padding: 5px 10px;
                font-size: 11px;
            }
            .crud-header {
                font-size: 20px;
            }
            .add-button {
                padding: 6px 12px;
                font-size: 12px;
            }
        }
    </style>
</head>
<body>

    <div class="crud-container">

        <div class="crud-header">
            <p>Manage your students' data efficiently</p>
        </div>

        <div class="add-button-container">
            <a href="add.php" class="add-button">Add New Student</a>
        </div>

        <table class="data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Attendance</th>
                    <th>Quiz</th>
                    <th>Midterm</th>
                    <th>Final</th>
                    <th>Total</th>
                    <th>Grade</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php

                include 'connectDB.php';
                $sql = "SELECT id, name, attendance, quiz, midterm, final, total, grade FROM students ORDER BY id DESC";
                if ($stmt = $conn->prepare($sql)) {
                    if ($stmt->execute()) {
                        $result = $stmt->get_result();
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['attendance']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['quiz']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['midterm']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['final']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['total']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['grade']) . "</td>";
                            echo "<td><a class='edit-button' href='edit.php?id=" . htmlspecialchars($row['id']) . "'>Edit</a>  </td>";
                            echo "<td><a class='delete-button' href='delete.php?id=" . htmlspecialchars($row['id']) . "' onclick=\"return confirm('Are you sure you want to delete this student?');\">Delete</a> </td>";

                            echo "</tr>";
                        }
                        $result->free();
                    } else {
                        echo "<tr><td colspan='8'>Error executing query: " . htmlspecialchars($stmt->error) . "</td></tr>";
                    }
                    $stmt->close();
                } else {
                    echo "<tr><td colspan='8'>Error preparing query: " . htmlspecialchars($conn->error) . "</td></tr>";
                }
                $conn->close();
                ?>
               
            </tbody>
        </table>
    </div>
            <?php if (isset($_GET['message'])): ?>
    <p class="message" style="color: green; width: 400px; background-color: #e0ffe0; padding: 10px; border: 1px solid green; border-radius: 5px;">
        <?= htmlspecialchars($_GET['message']) ?>
    </p>
    <script>
        setTimeout(function() {
            const msg = document.querySelector('.message');
            if (msg) {
                msg.style.display = 'none';
            }
        }, 3000); 
    </script>
<?php endif; ?>
</body>
</html>
