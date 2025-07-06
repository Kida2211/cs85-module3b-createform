<?php
// Full Name: Nathan Kida
// GitHub Repo: https://github.com/Kida2211/cs85-module3b-createform

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $fullName = $_POST["fullName"];
  $email = $_POST["email"];
  $topic = $_POST["topic"];
  $message = $_POST["message"];

  if (empty($fullName)) $errors[] = "Full name is required.";
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Valid email is required.";
  if (empty($topic)) $errors[] = "Topic is required.";
  if (str_word_count($message) < 50 || str_word_count($message) > 150)
    $errors[] = "Message must be between 50 and 150 words.";

  if (empty($errors)) $submitted = true;
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
