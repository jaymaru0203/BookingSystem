<?php

require('includes/config.php');
echo "<!DOCTYPE html>
<html>
  <head>
    <style>
      body{
        background-color: #eee;
        margin: 0;
        
      }
      div{
        background-color: #fff;
        width: 75%;
        height: 75%;
        margin: 10% auto;
        text-align: center;
        line-height: 3.5vw;
        font-size: 2.5vw;
        color: #333;
        padding: 7%;
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
        width: 25%;
        margin: auto auto;
        zoom: 0.7;
      }
      .button:hover, .button:focus { background: #e73137; color: #fff; }
    </style>
  </head>
<body>
<div>";

if (empty($_POST['eventName']) || empty($_POST['eventDescription']) || ($_POST['eventLanguage'] == -1) || ($_POST['eventType'] == -1) || empty($_POST['eventVenue']) || empty($_POST['eventPrice']) || empty($_POST['eventDateTime']) ) {
    echo "Please fill out all fields<br>";
}
else{ 
    // poster code
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["eventPoster"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["eventPoster"]["tmp_name"]);
    if($check !== false) {
      $uploadOk = 1;
    } else {
      echo "Event Poster is not an image.<br>";
      $uploadOk = 0;
    }

    if (file_exists($target_file)) {
      echo "Poster with the same name already exists.<br>";
      $uploadOk = 0;
    }

    if ($_FILES["eventPoster"]["size"] > 5242880) {
      echo "Event Poster cannot be more than 5 MB.<br>";
      $uploadOk = 0;
    }

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
      echo "Only JPG, JPEG, PNG & GIF files are allowed.<br>";
      $uploadOk = 0;
    }

    if ($uploadOk == 0) {
      echo "Event Poster was not Uploaded.<br>";
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["eventPoster"]["tmp_name"], $target_file)) {
        
      } else {
        echo "Event Poster was not Uploaded.<br>";
      }
    }

    $imageadd = htmlspecialchars( basename( $_FILES["eventPoster"]["name"]));

    // poster code ends
    if($uploadOk!=0){
    $eName = $_POST['eventName'];
    $eDescription = $_POST['eventDescription'];
    $eLanguage = $_POST['eventLanguage'];
    $eType = $_POST['eventType'];
    $eVenue = $_POST['eventVenue'];
    $ePrice = $_POST['eventPrice'];
    $eDateTime = $_POST['eventDateTime'];
    $ePoster = $imageadd;

    $sql = "INSERT INTO events (eventName, eventDescription, eventLanguage, eventType, eventVenue, eventPoster, eventPrice, eventDateTime) VALUES ( '$eName', '$eDescription' , '$eLanguage' , '$eType' , '$eVenue' ,'$ePoster', '$ePrice', '$eDateTime')";

    if ($conn->query($sql) === TRUE) {
            echo "Event Added Successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
  else{
      echo "***Event was not Added***";
  }
}
  echo "<br>Go Back to Admin Page : <a href='admin.php'><button type='submit' class='button' value='Admin'>ADMIN</button></a></div></body></html>";

?>