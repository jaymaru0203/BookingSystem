<?php
require('includes/config.php');

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Tickit</title>
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
             box-sizing: border-box;
        }
        body{
            background-color: #fff;
            color: #222;
            font-family: 'Raleway', sans-serif;
        }
        .topnav{
            height: 6vh;
            width: 100vw;
            background-color: #eee;
            position: fixed;
            box-shadow: 0px 0.2px 5px #444;
        }
        #logo{
            height: 4vh;
            margin: 1vh 1vw;
        }
        #profile{
            float: right;
            margin: 2vh 3vw;
            font-size: 2vh;
            font-weight: 600;
        }
        /* Style the tab */
        .tab {
          float: left;
          background-color: #eee;
          width: 20%;
          height: 94vh;
          padding-top: 5vh;
          position: fixed;
          top: 6vh;
        }
        h3, h2{
            text-align: center;
            margin: 0.5vh auto 2vh auto;
            color: #0059a2;
        }
        hr{
            width: 75%;
            border: 0.5px solid #888;
            margin: 1vh auto 3vh auto;
        }
        
        /* Style the buttons inside the tab */
        .tab button {
          display: block;
          background-color: inherit;
          color: #333;
          padding: 12px 16px;
          width: 100%;
          border: none;
          outline: none;
          text-align: left;
          cursor: pointer;
          transition: 0.3s;
          font-size: 18px;
        }
        /*#defaultOpen{}*/
        
        /* Change background color of buttons on hover */
        .tab button:hover {
          background-color: #fff;
        }
        
        /* Create an active/current "tab button" class */
        .tab button.active {
          background-color: #fff;
          color: #e73137;
        }
        
        /* Style the tab content */
        .tabcontent {
          float: right;

          width: 73%;
          min-height: 80vh;
          background-color: #fff;
          margin: 3vw;
          margin-top: 6vw;
          overflow: auto;
        }

        form{
            padding: 3vw;
            margin: 0 0 3vw;
            background-color: #eee;
        }
        input{
            font-size: 16px;
            width: 100%;
            padding: 10px;
            border: none;
            border-bottom: 1px solid #888;
            color: #444;
            border-radius: 0px;
            margin-bottom: 40px;
            margin-top: 10px;
            -moz-transition: all 0.4s ease-in-out;
            -o-transition: all 0.4s ease-in-out;
            -webkit-transition: all 0.4s ease-in-out;
            transition: all 0.4s ease-in-out;
            background-color: #eee;
        }

        input:focus {
            outline: 0;
            border-color: #0059a2;
          }
          select{
            outline: 0;
            background-color: #eee;
            color: #444;
            font-size: 16px;
          }
          select:focus{
            border-color: #888;
            outline:none;
        }
        label {
            font-size: 18px;
            font-weight: bold;
            color: #444;
            margin-bottom: 15px;
          }
          .button {
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
            width: 45%;
            margin: 10px 1.25%;
          }
          .button:hover, .button:focus { background: #e73137; color: #fff; }
          ::placeholder{
            opacity: 0.7;
          }
          .grid-container{
            display: grid;
            grid-gap: 10px;
            grid-template-columns: 1fr 1fr;
            margin-bottom: 15px;
            column-gap: 30px;
          }
          .grid-item{
              margin-right: 3vw;
          }
          .muted-text{
            color: #aaa;
            font-size: 14px;
            margin: 2vw 1vw;
            display: inline;
          }
          .showAll{
            width: 100%;
            min-height: 20vh;
            background-color: #eee;
            padding: 2vw;
            overflow: auto;
          }
          table{
            width: 95%;
            margin: 2vw auto;
            overflow: auto;
            white-space: nowrap;
          }
          table, td, th{
            border-collapse: collapse;
            border: 0.2px solid #666;
            padding: 10px;
          }
          tr:nth-child(odd){
            background-color: #fff;
          }

        </style>
</head>
<body>
<div class="topnav">
    <img src="images/logo.png" id="logo">
    <div id="profile"><?php  echo $_SESSION['email'] ?></div>
</div>
<div class="tab">
    <h3>Admin Page</h3>
  <button class="tablinks" onclick="openCity(event, 'home')" id="defaultOpen">Home</button>
  <button class="tablinks" onclick="openCity(event, 'movies')">Movies</button>
  <button class="tablinks" onclick="openCity(event, 'events')">Events</button>
  <button class="tablinks" onclick="openCity(event, 'users')">Users</button>
</div>

<div id="home" class="tabcontent">

    STATS WILL BE DISPLAYED HERE IN TILES ABOUT NUMBER OF MOVIES, EVENTS AND USERS

</div>

<div id="movies" class="tabcontent">
  <form action="addMovie.php" method="POST"  enctype="multipart/form-data">
  <h2>Add a Movie</h2>

    <label for="movieName">Movie Name</label>
    <input type="text" name="movieName" id="movieName" placeholder="Movie Name"><br>

    <label for="movieDescription">Movie Description</label>
    <input type="text" name="movieDescription" id="movieDescription" placeholder="Movie Description"><br>

    <div class="grid-container">
    <label for="movieLanguage">Movie Language</label>

    <label for="movieGenre">Movie Genre</label>

    <select id="movieLanguage" name="movieLanguage" class="grid-item">
        <option value="-1">Select Language</option>
        <option value="English">English</option>
        <option value="Hindi">Hindi</option>
        <option value="Marathi">Marathi</option>
        <option value="Gujarati">Gujarati</option>
    </select>

    <select id="movieGenre" name="movieGenre" class="grid-item">
        <option value="-1">Select Genre</option>
        <option value="Action">Action</option>
        <option value="Comedy">Comedy</option>
        <option value="Drama">Drama</option>
        <option value="Horror">Horror</option>
        <option value="Romance">Romance</option>
        <option value="Sci-fi">Sci-fi</option>
      </select><br>
    </div>
   
    <label for="movieTrailer">Movie Trailer Link <p class="muted-text">(Kindly enter Youtube Video Link of the Trailer)</p></label>
    <input type="text" name="movieTrailer" id="movieTrailer" placeholder="Movie Trailer Link"><br>

    <label for="moviePoster">Movie Poster <p class="muted-text">(Kindly Upload an Image file of less than 5000kb Size)</p></label>
    <input type="file" name="moviePoster" id="moviePoster"><br>
<center>
    <input type="submit" value="Add Movie" name="Add Movie" class="button" />
</center>  
</form> 

<div class="showAll">
<h2>All Movies</h2>
<table>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Description</th>
    <th>Language</th>
    <th>Genre</th>
    <th>Poster Name</th>
    <th>Action</th>
  </tr>
  <?php

$sql = "SELECT * FROM movies";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {

    ?>
<tr>
    <td><?php echo $row['id']; ?></td>   
    <td><?php echo $row['movieName']; ?></td>   
    <td><?php echo $row['movieDescription']; ?></td>   
    <td><?php echo $row['movieLanguage']; ?></td>   
    <td><?php echo $row['movieGenre']; ?></td>   
    <td><?php echo $row['moviePoster']; ?></td>   
    <td><a href="deleteMovie.php?id=<?php echo $row['id']; ?>"><button style="padding: 5px;">Delete</button></a></td>
  </tr>	
  
<?php }
} else {
  echo "<tr><td colspan='7' style='text-align: center;'>No Movies Have Been Added Yet</td></tr>";
}
  ?>
</table>

</div>
</div>

<div id="events" class="tabcontent">
  <form action="addEvent.php" method="POST" enctype="multipart/form-data">
  <h2>Add an Event</h2>
  
      <label for="eventName">Event Name</label>
      <input type="text" name="eventName" id="eventName" placeholder="Event Name"><br>

      <label for="eventDescription">Event Description</label>
      <input type="text" name="eventDescription" id="eventDescription" placeholder="Event Description"><br>

      <div class="grid-container">

      <label for="eventLanguage">Event Language</label>

      <label for="eventType">Type of Event</label>

      <select id="eventLanguage" name="eventLanguage" class="grid-item">
          <option value="-1">Select Language</option>
          <option value="English">English</option>
          <option value="Hindi">Hindi</option>
          <option value="Marathi">Marathi</option>
          <option value="Gujarati">Gujarati</option>
          <option value="Others/NA">Others/NA</option>
      </select>
  
      <select id="eventType" name="eventType" class="grid-item">
          <option value="-1">Select Event Type</option>
          <option value="StandUp Comedy">StandUp Comedy</option>
          <option value="Concert">Concert</option>
          <option value="Stage Drama">Stage Drama</option>
          <option value="Orchestra">Orchestra</option>
          <option value="Adventure/Sport">Adventure/Sport</option>
          <option value="Others">Others</option>
        </select><br>

      </div>
     
      <label for="eventVenue">Event Venue <p class="muted-text">(Kindly enter Venue Name and Address)</p></label>
      <input type="text" name="eventVenue" id="eventVenue" placeholder="Event Venue Address"><br>
  
      <label for="eventPoster">Event Poster <p class="muted-text">(Kindly Upload an Image file of less than 5000 kb Size)</p></label>
      <input type="file" name="eventPoster" id="eventPoster"><br>


      <div class="grid-container">

      <label for="eventPrice" style="margin: 0; height: 22px;">Event Price</label>

      <label for="eventDateTime" style="margin: 0; height: 22px;">Event Date and Time</label>

      <input type="number" name="eventPrice" id="eventPrice" placeholder="Event Price in INR">

      <input type="datetime-local" name="eventDateTime" id="eventDateTime">

      </div>


  <center>
      <input type="submit" value="Add Event" name="Add Event" class="button" />
  </center>  
  </form> 

  <div class="showAll">
<h2>All Events</h2>
<table>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Description</th>
    <th>Language</th>
    <th>Type</th>
    <th>Venue</th>
    <th>Price</th>
    <th>Date/Time</th>
    <th>Poster Name</th>
    <th>Action</th>
  </tr>
  <?php

$sql = "SELECT * FROM events";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {

    ?>
<tr>
    <td><?php echo $row['id']; ?></td>   
    <td><?php echo $row['eventName']; ?></td>   
    <td><?php echo $row['eventDescription']; ?></td>   
    <td><?php echo $row['eventLanguage']; ?></td>   
    <td><?php echo $row['eventType']; ?></td>   
    <td><?php echo $row['eventVenue']; ?></td>   
    <td><?php echo $row['eventPrice']; ?></td>   
    <td><?php echo $row['eventDateTime']; ?></td>   
    <td><?php echo $row['eventPoster']; ?></td>   
    <td><a href="deleteEvent.php?id=<?php echo $row['id']; ?>"><button style="padding: 5px;">Delete</button></a></td>
  </tr>	
  
<?php }
} else {
  echo "<tr><td colspan='10' style='text-align: center;'>No Events Have Been Added Yet</td></tr>";
}
  ?>
</table>

</div>


</div>

<div id="users" class="tabcontent">
  <h3>users</h3>
  <p>users is the capital of Japan.</p>
</div>

<script>
    function openCity(evt, cityName) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(cityName).style.display = "block";
      evt.currentTarget.className += " active";
    }
    
    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
    </script>
    
</body>
</html>