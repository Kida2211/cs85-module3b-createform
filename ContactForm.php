<?php
// Full Name: Nathan Kida
// GitHub Repo: https://github.com/Kida2211/cs85-module3b-createform

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $fullName = $_POST["fullName"];
  $email = $_POST["email"];
  $topic = $_POST["topic"];
  $message = $_POST["message"];

  echo "<p>Thank you, $fullName!</p>";
  echo "<p>We received your message about: \"$topic\"</p>";
  echo "<p>We'll get back to you at $email.</p>";
  exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Contact Form</title>
</head>
<body>
  <form method="POST">
    <label>Full Name:</label><br>
    <input type="text" name="fullName" required><br><br>

    <label>Email Address:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Topic of Message:</label><br>
    <input type="text" name="topic" required><br><br>

    <label>Message:</label><br>
    <textarea name="message" rows="6" cols="50" required></textarea><br><br>

    <input type="submit" value="Send Message">
  </form>
</body>
</html>
