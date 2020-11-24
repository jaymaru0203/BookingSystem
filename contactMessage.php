<?php
require('includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="./contact.css">
</head>
<body>
<?php

      $name = $_POST["name"];
      $email = $_POST["email"];
      $message = $_POST["message"];
  ?>

<div class="contact-container">
    <div class="left-col">
        <a href="homepage.php">
      <img class="logo" src="./images/logo.png"/>
    </a>
    </div>
    <div class="right-col">
      <div class="theme-switch-wrapper">
      
  </div>
      
      <h1>Your Message</h1>
      <p>This is what we have received from you.</p>
      
      <form id="contact-form-result" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
        <label for="name">Full name</label>
    <input disabled type="text" id="name" name="name" value="<?php echo $name ?>" required>
        <label for="email">Email Address</label>
    <input disabled type="email" id="email" name="email" value="<?php echo $email ?>" required>
        <label for="message">Message</label>
    <input type="text" disabled value="<?php echo $message ?>" id="message" name="message" required>
        <a class="anchorBtn" href="homepage.php">Back to Home</a >
    
  </form>
    </div>
  </div>
  <?php
  $sql = "INSERT INTO contact (fullName, emailAddress, message) VALUES ('$name', '$email', '$message')";
if($conn->query($sql) === TRUE){
    alert("Message sent successfully.");
} else{
    alert("ERROR: Could not send message. ");
} ?>
</body>
</html>