<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
require('includes/config.php');

?>
    <title>Events</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/aeaca870f5.js" crossorigin="anonymous"></script>

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
    h3 {
        display: inline-block;
    }
    #events {
        text-align: left !important;

    }
    .sort-div {
        text-align: right;
    }
    #sort {
        max-width: 80% !important;
    }
    .btn-custom {
        background-color: #1f1f1f;
        color: white;
    }
    .btn-custom:hover {
        background-color: grey;
        color: white;

    }
    .jumbotron {
        width: 72rem !important;
        padding: 1rem !important;
        margin-top: 1%;
    }
    #sortForm label {
        font-size: 1.2rem;
    }

    </style>
  <body>
  <?php
    $sort = $filter = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(!empty($_POST["sort"])) {
            $sort = $_POST["sort"];
        } else if(!empty($_POST["filter"])) {
            $filter = $_POST["filter"];
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
        <a class="navbar-brand" href="#">
          <img
            id="logo"
            src="images/logo.png"
            id="logo"
            style="zoom: 0.6; margin: 12px auto;"
          />
        </a>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="#"
              >Home </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="events.php">Events<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="movies.php">Movies</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact</a>
          </li>
          <?php if (isset($_SESSION['email']))
          { ?>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Logout</a>
            </li>
          <?php } else { ?>
          <li class="nav-item">
            <a class="nav-link" href="index.php">Login/Signup</a>
          </li>
          <?php } ?>
        </ul>
        <form class="form-inline my-2 my-lg-0 ">
          <input
            class="form-control mr-sm-2 height"
            type="search"
            placeholder="Search"
            aria-label="Search"
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
            <img src="./images/sale2.jpg" class="d-block w-100" alt="..." />
          </div>
          <div class="carousel-item">
            <img src="./images/sale4.jpg" class="d-block w-100" alt="..." />
          </div>
          <div class="carousel-item">
            <img src="./images/sale5.jpg" class="d-block w-100" alt="..." />
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
        <div id="events">
        <div class="row">
        <div class="col-2">
      <h3  class="event-category">Events</h3>
      </div>


  <div id="filter" class="col-10 sort-div">
  <a class="btn btn-custom btn-md" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1"><i class="fas fa-sort-amount-down"></i> Sort By</a>

  <button class="btn btn-custom btn-md" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2"><i class="fas fa-filter"></i> Filter By</button>
  </div>
  </div>
<div class="row">
    <div class="collapse" id="multiCollapseExample1">
    <div class="jumbotron">

    <form id="sortForm" name="sort" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">

    <div class="row">
    <div class="col-2">
    <label>
    <input type="checkbox" name="sort" value="eventPriceLow"> Price <i class="fas fa-sort-numeric-down"></i>
    </label>
    </div>
    <div class="col-2">
    <label>
    <input type="checkbox" name="sort" value="eventPriceHigh"> Price <i class="fas fa-sort-numeric-up-alt"></i></i>
    </label>
    </div>
    <div class="col-2">
    <label>
    <input type="checkbox" name="sort" value="eventDateTimeLow"> Date <i class="fas fa-sort-numeric-down"></i>
    </label>
    </div>
    <div class="col-2">
    <label>
    <input type="checkbox" name="sort" value="eventDateTimeHigh"> Date <i class="fas fa-sort-numeric-up-alt"></i>
    </label>
    </div>
    <div class="col-2">
    <label>
    <input type="checkbox" name="sort" value="eventNameLow"> Title <i class="fas fa-sort-alpha-down"></i>
    </label>
    </div>
    <div class="col-2">
    <button type="submit" class="btn btn-danger">Sort Events</button>
    </div>
    </div>

</form>
</div>
  </div>
    <div class="collapse" id="multiCollapseExample2">
    <div class="jumbotron">

    <form id="filterForm" name="filter" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
    <h5>Location</h5>
    <div class="row">

    <div class="col-2">
    <label>
    <input type="checkbox" name="filter" value="Mumbai"> Mumbai
    </label>
    </div>
    <div class="col-2">
    <label>
    <input type="checkbox" name="filter" value="Delhi"> Delhi
    </label>
    </div>
    <div class="col-2">
    <label>
    <input type="checkbox" name="filter" value="KJSCE"> KJSCE
    </label>
    </div>
    <div class="col-2">
    <label>
    <input type="checkbox" name="filter" value="India"> India
    </label>
    </div>
    <div class="col-2">
    <label>
    <input type="checkbox" name="filter" value="Phoenix"> Phoenix
    </label>
    </div>
    <div class="col-2">
    <button type="submit" class="btn btn-danger">Filter Events</button>
    </div>
    </div>

    </form>
    </div>
  </div>
      </div>
      </div>
      <br />
      <div class="row flex-container">
      <?php

if($sort != "") {
    if($sort == "eventPriceLow")
    {
        $sql = "SELECT * FROM events ORDER BY eventPrice ASC";
    } else if($sort == "eventPriceHigh") {
        $sql = "SELECT * FROM events ORDER BY eventPrice DESC";
    } else if($sort == "eventDateTimeLow") {
        $sql = "SELECT * FROM events ORDER BY eventDateTime ASC";
    } else if($sort == "eventDateTimeHigh") {
        $sql = "SELECT * FROM events ORDER BY eventDateTime DESC";
    } else {
        $sql = "SELECT * FROM events ORDER BY eventName ASC";
    }
    
} else if($filter != "") {
    $loc = "'%" . $filter . "%'";
    $sql = "SELECT * FROM events WHERE eventVenue LIKE $loc";
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
              <a href="#" class="btn btn-red">Book Now</a>
              <a href="#" class="btn btn-blue">Know More</a>

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
