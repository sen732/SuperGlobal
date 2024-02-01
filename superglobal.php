<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<?php
$students = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["addStudent"])) {
        $newStudent = array(
            "First Name" => $_POST["firstName"],
            "Middle Name" => $_POST["middleName"],
            "Last Name" => $_POST["lastName"],
            "Age" => $_POST["age"],
            "Course and Year" => $_POST["courseYear"],
            "Enrolled" => $_POST["enrolled"],
            "Subjects" => array($_POST["subject"] => $_POST["grade"])
        );

        $students[] = $newStudent;
    }
}
?>

<table>
    <thead>
        <tr>
            <?php
            foreach (array_keys($students[0]) as $key) {
                echo "<th>$key</th>";
            }
            ?>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($students as $student) {
            echo "<tr>";
            foreach ($student as $key => $value) {
                if (is_array($value)) {
                    echo "<td>";
                    foreach ($value as $subject => $grade) {
                        echo "$subject: $grade<br>";
                    }
                    echo "</td>";
                } else {
                    echo "<td>$value</td>";
                }
            }
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

<h2>Add Student</h2>
<form method="post" action="">
    <ol>
        <li><label for="firstName">First Name:</label>
            <input type="text" name="firstName" required></li>

        <li><label for="middleName">Middle Name:</label>
            <input type="text" name="middleName" required></li>

        <li><label for="lastName">Last Name:</label>
            <input type="text" name="lastName" required></li>

        <li><label for="age">Age:</label>
            <input type="number" name="age" required></li>

        <li><label for="courseYear">Course and Year:</label>
            <input type="text" name="courseYear" required></li>

        <li><label>Enrolled:</label>
            <label><input type="radio" name="enrolled" value="Yes" required> Yes</label>
            <label><input type="radio" name="enrolled" value="No" required> No</label></li>

        <li><label for="subject">Subject:</label>
            <input type="text" name="subject" required></li>

        <li><label for="grade">Grade:</label>
            <input type="number" step="0.1" name="grade" required></li>
    </ol>

    <input type="submit" name="addStudent" value="Add Student">
</form>

</body>
</html>
