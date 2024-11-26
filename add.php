<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id']; // Get ID from the form input
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
  
    // Insert the student with the provided ID
    $conn->query("INSERT INTO students (id, first_name, last_name, email, phone) VALUES ('$id', '$first_name', '$last_name', '$email', '$phone')");
    header("Location: index.php");
}
?>

<form method="post" action="add.php">
    <input type="number" name="id" placeholder="ID" required>
    <input type="text" name="first_name" placeholder="First Name" required>
    <input type="text" name="last_name" placeholder="Last Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="text" name="phone" placeholder="Phone" required>
    <button type="submit">Add Student</button>
</form>

