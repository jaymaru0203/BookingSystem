<?php
require('includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
    ></script>
</head>
<style>
  :root {
  --primary-color: #010712;
  --secondary-color: #818386;
  --bg-color: #fcfdfd;
  --button-color: #1f1f1f;
  --h1-color: #3f444c;
}

  * {
    margin: 0;
    box-sizing: border-box;
    transition: all 0.3s ease-in-out;
  }

  .contact-container {
    display: flex;
    height: 100vh;
    background: var(--bg-color);
  }

  .left-col {
    width: 45vw;
    height: 100%;
    background-image: url("https://4.bp.blogspot.com/-90XgI4KteiE/UiTF2n6_cFI/AAAAAAAAA18/q0-aSaZLRBA/s1600/asd.jpg");
    background-size: cover;
    background-repeat: no-repeat;
  }

  .logo {
    width: 10rem;
    padding: 1.5rem;
  }

  .right-col {
    background: var(--bg-color);
    width: 50vw;
    height: 100vh;
    padding: 5rem 3.5rem;
  }

  h1,
  label,
  button,
  .description,
  .anchorBtn {
    font-family: "Jost", sans-serif;
    font-weight: 400;
    letter-spacing: 0.1rem;
  }

  h1 {
    color: var(--h1-color);
    text-transform: uppercase;
    font-size: 2.5rem;
    letter-spacing: 0.5rem;
    font-weight: 300;
  }

  p {
    color: var(--secondary-color);
    font-size: 0.9rem;
    letter-spacing: 0.01rem;
    width: 40vw;
    margin: 0.25rem 0;
  }

  label,
  .description {
    color: var(--primary-color);
    text-transform: uppercase;
    font-size: 0.625rem;
  }

  .forms {
    width: 31.25rem;
    position: relative;
    margin-top: 2rem;
    padding: 1rem 0;
  }

  input,
  textarea,
  label {
    width: 40vw;
    display: block;
  }

  p,
  placeholder,
  input,
  textarea {
    font-family: "Helvetica Neue", sans-serif;
  }

  input::placeholder,
  textarea::placeholder {
    color: var(--secondary-color);
  }

  input,
  textarea {
    color: var(--primary-color);
    font-weight: 500;
    background: var(--bg-color);
    border: none;
    border-bottom: 1px solid var(--secondary-color);
    padding: 0.5rem 0;
    margin-bottom: 1rem;
    outline: none;
  }

  textarea {
    resize: none;
  }

  .anchorBtn {
    text-decoration: none;
    padding: 1.5% 3%;
    margin-top: 5%;
    font-size: 0.8rem;
  }

  button,
  .anchorBtn {
    text-transform: uppercase;
    font-weight: 300;
    background: var(--button-color);
    color: var(--bg-color);
    width: 10rem;
    height: 2.25rem;
    border: none;
    border-radius: 2px;
    outline: none;
    cursor: pointer;
  }

  input:hover,
  textarea:hover,
  button:hover,
  .anchorBtn:hover {
    opacity: 0.5;
    text-decoration: none;
    color: white;
  }

  button:active,
  .anchorBtn:active {
    opacity: 0.8;
  }

  .theme-switch-wrapper {
    display: flex;
    align-items: center;
    text-align: center;
    width: 160px;
    position: absolute;
    top: 0.5rem;
    right: 0;
  }

  .description {
    margin-left: 1.25rem;
  }

  @media only screen and (max-width: 950px) {
    .logo {
      width: 8rem;
    }
    h1 {
      font-size: 1.75rem;
    }
    p {
      font-size: 0.7rem;
    }
    input,
    textarea,
    button,
    .anchorBtn {
      font-size: 0.65rem;
    }
    .description {
      font-size: 0.3rem;
      margin-left: 0.4rem;
    }
    button,
    .anchorBtn {
      width: 7rem;
    }
    .theme-switch-wrapper {
      width: 120px;
    }
  }
      /* Navbar */
      .bg-dark {
      background-color: #1f1f1f !important;
    }
    .btn-outline-success {
      color: #e73137;
      border-color: #e73137;
    }
    .btn-outline-success:hover {
      background-color: #e73137;
      border-color: #e73137;
    }
    #logo {
      height: 3vw;
      margin-left: 1vw;
    }
    .navbar {
      padding: 0 1rem;
    }
    p {
      margin-bottom: 5%;
    }
    .success {
      color: #818386;
    }
    .failure {
      color: red;
    }
    label {
      font-size: 0.9rem;
    }
    input[type="text"], input[type="email"] {
      font-size: 1.1rem;
      font-style: italic;
    }
</style>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarTogglerDemo01"
        aria-controls="navbarTogglerDemo01"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a class="navbar-brand" href="homepage.php">
          <img
            id="logo"
            src="images/logo.png"
            id="logo"
            style="zoom: 0.6; margin: 12px auto;"
          />
        </a>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="homepage.php"
              >Home </a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link" href="events.php">Events</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="movies.php">Movies</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.html">About</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="contact.php">Contact</a>
          </li>
          <?php if (isset($_SESSION['email']))
          { ?>
            <li class="nav-item">
              <a class="nav-link" href="profilepage.html">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Logout</a>
            </li>
          <?php } else { ?>
          <li class="nav-item">
            <a class="nav-link" href="index.php">Login/Signup</a>
          </li>
          <?php } ?>
        </ul>
      </div>
    </nav>
<?php

      $name = $_POST["name"];
      $email = $_POST["email"];
      $message = $_POST["message"];

      $sql = "INSERT INTO contact (fullName, emailAddress, message) VALUES ('$name', '$email', '$message')";
      if($conn->query($sql) === TRUE){
          $msg = "This is what we have received from you.";
          $class = "success";
      } else{
          $msg = "We could not send your message due to an error";
          $class = "failure";
      }
  ?>

<div class="contact-container">
    <div class="left-col">
        <a href="homepage.php">
      
    </a>
    </div>
    <div class="right-col right-col-result">
      <div class="theme-switch-wrapper">

  </div>

      <h1>Your Message</h1>
      <p class="<?php echo $class ?>"><?php echo $msg ?></p>

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
</body>
</html> 