<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
require('includes/config.php');

?>
    <title>Theatres</title>
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

    .containerMain{
        width: 80%;
        margin: 0 auto;
        background-color: #efefef;
        padding: 4%;
    }
    .description{
      color: #777;
    }
    .button1{
      border: 0;
        outline: none;
        border-radius: 0;
        padding: 10px 0;
        font-size: 18px;
        font-weight: 300;
        text-transform: uppercase;
        letter-spacing: 2px;
        border: 3px solid #e73137;
        border-radius: 7px;
        color: #e73137;
        cursor: pointer;
        -moz-transition: all 0.4s ease-in-out;
        -o-transition: all 0.4s ease-in-out;
        -webkit-transition: all 0.4s ease-in-out;
        transition: all 0.4s ease-in-out;
        width: 25%;
        margin: auto auto;
        zoom: 0.7;
        font-weight: 600;
      }
      .button1:hover, .button1:focus { background: #e73137; color: #fff; }

.button2{
  border: 0;
        outline: none;
        border-radius: 0;
        padding: 5px 5px;
        font-size: 14px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 2px;
        border: 2px solid #2255a4;
        border-radius: 7px;
        color: #2255a4;
        cursor: pointer;
        -moz-transition: all 0.4s ease-in-out;
        -o-transition: all 0.4s ease-in-out;
        -webkit-transition: all 0.4s ease-in-out;
        transition: all 0.4s ease-in-out;
        margin: auto 10px;
}
.button2:hover, .button2:focus { background: #2255a4; color: #fff; }


form label {
    display: inline-block;
    margin-right: 15px;
    border: 0;
    outline: none;
    border-radius: 0;
    padding: 5px 5px;
    font-size: 14px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 2px;
    border: 2px solid #2255a4;
    border-radius: 7px;
    color: #2255a4;
    cursor: pointer;
    -moz-transition: all 0.4s ease-in-out;
    -o-transition: all 0.4s ease-in-out;
    -webkit-transition: all 0.4s ease-in-out;
    transition: all 0.4s ease-in-out;
    margin: auto 10px;
    text-align: center;
}
label:hover{background: #2255a4; color: #fff;}

input[type="radio"] {
    display: none;
}
label {
    cursor: pointer;
}
input:checked+label{
  background: #2255a4 !important; color: #fff !important;}

  footer{
            background-color: #1a1919;
            color:white;
            padding: 2vw;
            text-align: center;
            font-size: 1.2vw;
        }


</style>
</head>

<body>
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
            <a class="nav-link" href="homepage.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="events.php">Events</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="movies.php">Movies <span class="sr-only">(current)</span></a>
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
    <?php
                
    ?>
    <center><br>
    <h3>Movie Title in Center</h3>
    <h5 class="description">Language | Genre - 2020</h5><br></center>
    <div class="containerMain">
      <h4 style="text-align:center; margin: 10px;">Choose a Theatre and Show Time</h4>



            <form action="checkout.php" method="POST" enctype="multipart/form-data">
            <br><br><br>
              <h5>PVR Phoenix Marketcity, Kurla</h5>
                <input type="radio" class="button2" name="show" value="12:30" onclick="number1()"id="a1">
                <label for="a1">12:30</label>

                <input type="radio" class="button2" name="show" value="15:45" onclick="number1()"id="a2">
                <label for="a2">15:45</label>

                <input type="radio" class="button2" name="show" value="17:00" onclick="number1()"id="a3">
                <label for="a3">17:00</label>

                <input type="radio" class="button2" name="show" value="20:15" onclick="number1()"id="a4">
                <label for="a4">20:15</label>
                <br><br>
              <div id="1" style="display: none;">
              <h6>Price: Rs. 150<br>
                Number of Tickets: 
                <input type="number" name="number" min="1" max="10" style="background-color: #fff; margin:5px 20px;"></h6>
                <input type="hidden" name="theatre" value="PVR Phoenix Marketcity, Kurla">
                <input type="hidden" name="price" value="150">
                <button type="submit" class="button1">Checkout</button>
              </div><br>
            </form>




              <form action="checkout.php" method="POST" enctype="multipart/form-data">
              <h5>Big Cinemas R-City, Ghatkopar</h5>
              <input type="radio" class="button2" name="show" value="09:30" onclick="number2()" id="b1">
              <label for="b1">09:30</label>
              <input type="radio" class="button2" name="show" value="12:45" onclick="number2()" id="b2">
              <label for="b2">12:45</label>
              <input type="radio" class="button2" name="show" value="14:00" onclick="number2()" id="b3">
              <label for="b3">14:00</label>
              <input type="radio" class="button2" name="show" value="17:15" onclick="number2()" id="b4">
              <label for="b4">17:15</label>
              <input type="radio" class="button2" name="show" value="19:50" onclick="number2()" id="b5">
              <label for="b5">19:50</label>
              <input type="radio" class="button2" name="show" value="22:00" onclick="number2()" id="b6">
              <label for="b6">22:00</label>
              <input type="radio" class="button2" name="show" value="23:20" onclick="number2()" id="b7">
              <label for="b7">23:20</label>
              <br><br>
              <div id="2" style="display: none;">
              <h6>Price: Rs. 220<br>Number of Tickets: 
              <input type="number" name="number" min="1" max="10" style="background-color: #fff; margin:5px 20px;"></h6>
              <input type="hidden" name="theatre" value="Big Cinemas R-City, Ghatkopar">
              <input type="hidden" name="price" value="220">
              <button type="submit" class="button1">Checkout</button>
              </div><br>
            </form>

            <form action="checkout.php" method="POST" enctype="multipart/form-data">
              <h5>Fun Cinemas, Chembur</h5>
              <input type="radio" class="button2" name="show" value="13:30" onclick="number3()" id="c1">
              <label for="c1">13:30</label>
              <input type="radio" class="button2" name="show" value="16:45" onclick="number3()" id="c2">
              <label for="c2">16:45</label>
              <input type="radio" class="button2" name="show" value="19:00" onclick="number3()" id="c3">
              <label for="c3">19:00</label>
              <input type="radio" class="button2" name="show" value="20:15" onclick="number3()" id="c4">
              <label for="c4">20:15</label>
              <input type="radio" class="button2" name="show" value="22:40" onclick="number3()" id="c5">
              <label for="c5">22:40</label><br><br>
              <div id="3" style="display: none;">
              <h6>Price: Rs. 180<br>Number of Tickets:
              <input type="number" name="number" min="1" max="10" style="background-color: #fff; margin:5px 20px;"></h6>
              <input type="hidden" name="theatre" value="Fun Cinemas, Chembur">
              <input type="hidden" name="price" value="180">
              <button type="submit" class="button1">Checkout</button>
              </div><br></form>

              <form action="checkout.php" method="POST" enctype="multipart/form-data">
              <h5>Plaza, Dadar</h5>
              <input type="radio" class="button2" name="show" value="09:00" onclick="number4()" id="d1">
              <label for="d1">09:00</label>
              <input type="radio" class="button2" name="show" value="12:00" onclick="number4()" id="d2">
              <label for="d2">12:00</label>
              <input type="radio" class="button2" name="show" value="15:00" onclick="number4()" id="d3">
              <label for="d3">15:00</label>
              <input type="radio" class="button2" name="show" value="18:00" onclick="number4()" id="d4">
              <label for="d4">18:00</label>
              <input type="radio" class="button2" name="show" value="21:00" onclick="number4()" id="d5">
              <label for="d5">21:00</label><br><br>
              <div id="4" style="display: none;">
              <h6>Price: Rs. 90<br>Number of Tickets: 
              <input type="number" name="number" min="1" max="10" style="background-color: #fff; margin:5px 20px;"></h6>
              <input type="hidden" name="theatre" value="Plaza Dadar">
              <input type="hidden" name="price" value="90">
              <button type="submit" class="button1">Checkout</button>
              </div><br></form>

              <form action="checkout.php" method="POST" enctype="multipart/form-data">
              <h5>PVR Gold - High Street Phoenix Lower Parel</h5>
              <input type="radio" class="button2" name="show" value="11:40" onclick="number5()" id="e1">
              <label for="e1">11:40</label>
              <input type="radio" class="button2" name="show" value="13:45" onclick="number5()" id="e2">
              <label for="e2">13:45</label>
              <input type="radio" class="button2" name="show" value="19:00" onclick="number5()" id="e3">
              <label for="e3">19:00</label><br><br>
              <div id="5" style="display: none;">
              <h6>Price: Rs. 320<br>Number of Tickets:
              <input type="number" name="number" min="1" max="10" style="background-color: #fff; margin:5px 20px;"></h6>
              <input type="hidden" name="theatre" value="PVR Gold - High Street Phoenix Lower Parel">
              <input type="hidden" name="price" value="320">
              <button type="submit" class="button1">Checkout</button>
              </div><br></form>

            </div><br><br>
            <footer style="bottom: 0;">
            Copyright @2020 Tickit.com. All Rights Reserved
        </footer>
  </body>
  <script>
    function number1(){
      document.getElementById("1").style.display="block";

      return false;
    }
    function number2(){
      document.getElementById("2").style.display="block";
      return false;
    }
    function number3(){
      document.getElementById("3").style.display="block";
      return false;
    }
    function number4(){
      document.getElementById("4").style.display="block";
      return false;
    }
    function number5(){
      document.getElementById("5").style.display="block";
      return false;
    }
  </script>
</html>