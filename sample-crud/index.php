<?php
include "db.php";

$result = $conn->query("SELECT * FROM students");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student CRUD</title>
</head>

<body>

<h1>Student Records</h1>

<a href="create.php">Add New Student</a>

<br><br>

<table border="1" cellpadding="10">

    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Course</th>
        <th>Actions</th>
    </tr>

    <?php while ($row = $result->fetch_assoc()): ?>

    <tr>
        <td><?php echo $row['id']; ?></td>

        <td>
            <?php echo htmlspecialchars($row['name']); ?>
        </td>

        <td>
            <?php echo htmlspecialchars($row['email']); ?>
        </td>

        <td>
            <?php echo htmlspecialchars($row['course']); ?>
        </td>

        <td>
            <a href="edit.php?id=<?php echo $row['id']; ?>">
                Edit
            </a>

            |

            <a href="delete.php?id=<?php echo $row['id']; ?>"
               onclick="return confirm('Are you sure you want to delete this student?');">
                Delete
            </a>
        </td>
    </tr>

    <?php endwhile; ?>

</table>

</body>
</html>