<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
require('includes/config.php');

?>
    <title>Home</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="homepage.css" />

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
    body {
      margin: 0;
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

    /* Carousel */
    .carousel-inner img {
      height: 24em;
    }

    /* Event Cards Container */
    .event-container {
      margin-top: 2em;
    }
    .btn-red {
      color: #fff;
      background-color: #e73137;
      border: none;
    }
    .btn-blue {
      color: #fff;
      background-color: #0059a2;
      border: none;
    }
    .btn-red:hover, .btn-blue:hover  {
      color: #fff;
      background-color: black;
      border: none;
    }
    .event-category {
      text-align: left;
    }
    .card {
      margin-bottom: 5%;
    }
    /* .price {
      color: grey;
      font-weight: bold;
    } */
    .poster {
      height: 180px;
    }
    footer {
      background-color: #1f1f1f;
      color: white;
      padding: 4%;
    }
    footer p {
      margin: 0;
    }
    .height {
      height: 30px;
      padding: 0 10px;
    }
    </style>
  <body>
  <?php
    $search = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(!empty($_POST["search"])) {
        $search = $_POST["search"];
    }
  } ?>

    <!-- Navbar -->

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
          <li class="nav-item active">
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
          <li class="nav-item">
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
        <form class="form-inline my-2 my-lg-0 " action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
          <input
            class="form-control mr-sm-2 height"
            type="search"
            name="search"
            placeholder="Search"
            aria-label="Search"
            autocomplete="off"
          />
          <button class="btn btn-outline-success my-2 my-sm-0 height text-center" type="submit">
            Search
          </button>
        </form>
      </div>
    </nav>

    <!-- Carousel -->

    <div class="bd-example">
      <div
        id="carouselExampleCaptions"
        class="carousel slide"
        data-ride="carousel"
      >
        <ol class="carousel-indicators">
          <li
            data-target="#carouselExampleCaptions"
            data-slide-to="0"
            class="active"
          ></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="./images/concert2.jpg" class="d-block w-100" alt="..." />
            <div class="carousel-caption d-none d-md-block">
              <h5>Beatnik Summer Festival</h5>
              <p>Music event in Fox Island, WA by Fox Island Yacht Club.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="./images/concert4.jpg" class="d-block w-100" alt="..." />
            <div class="carousel-caption d-none d-md-block">
              <h5>Acapella Events</h5>
              <p>From red carpet galas and sangeets to college fests and corporate events.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="./images/concert5.jpg" class="d-block w-100" alt="..." />
            <div class="carousel-caption d-none d-md-block">
              <h5>Sound Spirit Fest</h5>
              <p>
              Spirit Fest is an international collective of musicians spread across Germany, Japan, and England.
              </p>
            </div>
          </div>
        </div>
        <a
          class="carousel-control-prev"
          href="#carouselExampleCaptions"
          role="button"
          data-slide="prev"
        >
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a
          class="carousel-control-next"
          href="#carouselExampleCaptions"
          role="button"
          data-slide="next"
        >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>

    <!-- Event Cards -->

    <div class="container text-center event-container">
      <h3 id="events" class="event-category">Events</h3>
      <br />
      <div class="row flex-container">
      <?php

    if($search != "") {
      $word = "'%" . $search . "%'";
      $sql = "SELECT * FROM events WHERE eventName LIKE $word";
    } else {
        $sql = "SELECT * FROM events";
    }
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {

    ?>
    <div class="col-sm-4">
          <div class="card" style="width: 350px">
            <img
              class="card-img-top poster"
              src="./uploads/<?php echo $row['eventPoster']; ?>"
              alt="Card image"
              style="width: 100%"
            />
            <div class="card-body">
              <h4 class="card-title"><?php echo $row['eventName']; ?></h4>
              <p class="card-text"><?php echo $row['eventVenue']; ?> | <span class="price"> ₹<?php echo $row['eventPrice']; ?></span></p>
              <a href="eventpage.html?id=<?php echo $row['id']; ?>" class="btn btn-red">Book Now</a>

            </div>
          </div>
    </div>
 
<?php }
} else {
  echo "<tr><td colspan='7' style='text-align: center;'>No Events Have Been Added Yet</td></tr>";
}
  ?>
      </div>
    </div>
    
    <!-- Movie Cards -->

    <div class="container text-center event-container">
      <h3 id="movies" class="event-category">Movies</h3>
      <br />
      <div class="row">
      <?php

if($search != "") {
  $word = "'%" . $search . "%'";
  $sql = "SELECT * FROM movies WHERE movieName LIKE $word";
} else {
    $sql = "SELECT * FROM movies";
}
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {

    ?>
    <div class="col-sm-4">
          <div class="card" style="width: 350px">
          <img
              class="card-img-top poster"
              src="./uploads/<?php echo $row['moviePoster']; ?>"
              alt="Card image"
              style="width: 100%"
            />
            <div class="card-body">
              <h4 class="card-title"><?php echo $row['movieName']; ?></h4>
              <p class="card-text"><?php echo $row['movieGenre']; ?> | <span class="price"> <?php echo $row['movieLanguage']; ?></span></p>
              <a href="theatres.php?id=<?php echo $row['id']; ?>" class="btn btn-red">Book Now</a>
              <a href="moviepage.html?id=<?php echo $row['id']; ?>" class="btn btn-blue">Know More</a>

            </div>
          </div>
    </div>
 
<?php }
} else {
  echo "<tr><td colspan='7' style='text-align: center;'>No Movies Have Been Added Yet</td></tr>";
}
  ?>  
                
      </div>
    </div>
    <br />

    <!-- Footer -->

    <footer class="container-fluid text-center">
      <p>Copyright © <?php echo date("Y") ?> TickIt. All rights reserved</p>
    </footer>
  </body>
</html>
