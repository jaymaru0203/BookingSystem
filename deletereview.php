<?php

require('includes/config.php');
echo "<!DOCTYPE html>
<html>
  <head>
    <style>
      body{
        background-color: #eee;
        margin: 0;
        overflow: hidden;
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

$id = $_GET['id'];
$sql = "DELETE FROM reviews WHERE id = $id";
if ($conn->query($sql) === TRUE) {
  echo "Review Deleted Successfully";
} else {
  echo "Error Deleting Review: " . $conn->error;
}
$conn->close();

echo "<br>Go Back to Profile Page : <a href='profilepage.html'><button type='submit' class='button' value='Profile'>Profile</button></a></div></body></html>";

?>