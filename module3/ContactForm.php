<?php
// Full Name: Nathan Kida
// GitHub Repo: https://github.com/Kida2211/cs85-module3b-createform

$errors = [];
$submitted = false;
$fullName = $email = $topic = $message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $fullName = htmlspecialchars(trim($_POST["fullName"]));
  $email = htmlspecialchars(trim($_POST["email"]));
  $topic = htmlspecialchars(trim($_POST["topic"]));
  $message = htmlspecialchars(trim($_POST["message"]));

  if (empty($fullName)) $errors[] = "Full name is required.";
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Valid email is required.";
  if (empty($topic)) $errors[] = "Topic is required.";
  if (str_word_count($message) < 1 || str_word_count($message) > 500)
    $errors[] = "Message must be between 1 and 500 words.";

  if (empty($errors)) $submitted = true;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Contact Form</title>
</head>
<body>

<?php if ($submitted): ?>
  <p>Thank you, <?= $fullName ?>! We received your message about: "<?= $topic ?>"</p>
  <p>We'll get back to you at <?= $email ?>.</p>

<?php else: ?>
  <?php foreach ($errors as $error): ?>
    <p style="color:red;"><?= $error ?></p>
  <?php endforeach; ?>

  <form method="POST">
    <label>Full Name:</label><br>
    <input type="text" name="fullName" value="<?= $fullName ?>" required><br><br>

    <label>Email Address:</label><br>
    <input type="email" name="email" value="<?= $email ?>" required><br><br>

    <label>Topic of Message:</label><br>
    <input type="text" name="topic" value="<?= $topic ?>" required><br><br>

    <label>Message:</label><br>
    <textarea name="message" rows="6" cols="50" required><?= $message ?></textarea><br><br>

    <input type="submit" value="Send Message">
  </form>
<?php endif; ?>

</body>
</html>

<!--
Output Predictions:
- If everything is valid, it shows a thank-you message.
- If any field is missing or message is too long, errors are shown.

Post-Test Reflections:
- htmlspecialchars() prevents XSS.
- str_word_count() helped validate word limits.
- Seeing error messages helps users correct mistakes clearly.
-->
