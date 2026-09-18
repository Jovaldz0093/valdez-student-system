<?php
include "db.php";

$id = $_GET["id"];

$stmt = $conn->prepare("SELECT * FROM students WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();
$student = $result->fetch_assoc();

if (!$student) {
    die("Student not found.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $course = $_POST["course"];

    $stmt = $conn->prepare(
        "UPDATE students SET name = ?, email = ?, course = ? WHERE id = ?"
    );

    $stmt->bind_param("sssi", $name, $email, $course, $id);

    $stmt->execute();

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
</head>

<body>

<h1>Edit Student</h1>

<form method="POST">

    <label>Name:</label><br>
    <input type="text"
           name="name"
           value="<?php echo htmlspecialchars($student['name']); ?>"
           required>

    <br><br>

    <label>Email:</label><br>
    <input type="email"
           name="email"
           value="<?php echo htmlspecialchars($student['email']); ?>"
           required>

    <br><br>

    <label>Course:</label><br>
    <input type="text"
           name="course"
           value="<?php echo htmlspecialchars($student['course']); ?>"
           required>

    <br><br>

    <button type="submit">Update Student</button>

</form>

<br>

<a href="index.php">Back to Student Records</a>

</body>
</html>