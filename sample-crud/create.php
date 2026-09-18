<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $course = $_POST["course"];

    $stmt = $conn->prepare(
        "INSERT INTO students (name, email, course) VALUES (?, ?, ?)"
    );

    $stmt->bind_param("sss", $name, $email, $course);

    $stmt->execute();

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
</head>

<body>

<h1>Add New Student</h1>

<form method="POST">

    <label>Name:</label><br>
    <input type="text" name="name" required>

    <br><br>

    <label>Email:</label><br>
    <input type="email" name="email" required>

    <br><br>

    <label>Course:</label><br>
    <input type="text" name="course" required>

    <br><br>

    <button type="submit">Add Student</button>

</form>

<br>

<a href="index.php">Back to Student Records</a>

</body>
</html>