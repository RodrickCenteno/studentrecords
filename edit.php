<?php
include 'config.php'; // Include database connection

// Get the student ID from the URL (edit.php?id=xxx)
$id = $_GET['id'];

// Fetch the student's data from the database based on the ID
$result = $conn->query("SELECT * FROM students WHERE id=$id");
$student = $result->fetch_assoc();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the updated data from the form
    $id = $_POST['id']; // Capture the ID from the form
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Update the student's data in the database
    $conn->query("UPDATE students SET first_name='$first_name', last_name='$last_name', email='$email', phone='$phone' WHERE id=$id");

    // Redirect to the index page after updating
    header("Location: index.php");
    exit(); // Ensure no further code is executed after the redirect
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Edit Student</title>
</head>
<body>
    <h2>Edit Student Record</h2>

    <!-- Edit Form -->
    <form method="POST" action="">
        <!-- Hidden ID field -->
        <input type="hidden" name="id" value="<?php echo $student['id']; ?>">

        <label for="first_name">First Name</label>
        <input type="text" name="first_name" value="<?php echo $student['first_name']; ?>" required><br><br>

        <label for="last_name">Last Name</label>
        <input type="text" name="last_name" value="<?php echo $student['last_name']; ?>" required><br><br>

        <label for="email">Email</label>
        <input type="email" name="email" value="<?php echo $student['email']; ?>" required><br><br>

        <label for="phone">Phone</label>
        <input type="text" name="phone" value="<?php echo $student['phone']; ?>" required><br><br>

        <button type="submit">Update Student</button>
    </form>
    
    <br>
    <a href="index.php">Back to Student Records</a>
</body>
</html>