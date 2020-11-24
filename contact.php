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

<div class="contact-container">
    <div class="left-col">
        <a href="homepage.php">
      <img class="logo" src="./images/logo.png"/>
    </a>
    </div>
    <div class="right-col">
      <div class="theme-switch-wrapper">
      
  </div>
      
      <h1>Contact us</h1>
      <p>Planning to attend an event soon? Get insider tips on where to go, things to do and find best deals for your next booking.</p>
      
      <form id="contact-form" action="contactMessage.php" method="POST">
        <label for="name">Full name</label>
    <input type="text" id="name" name="name" placeholder="Your Full Name" required>
        <label for="email">Email Address</label>
    <input type="email" id="email" name="email" placeholder="Your Email Address" required>
        <label for="message">Message</label>
    <textarea rows="6" placeholder="Your Message" id="message" name="message" required></textarea>
        <button type="submit" id="submit" name="submit">Send</button><!--</a>-->
    
  </form>
    </div>
  </div>

</body>
</html>