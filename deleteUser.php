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

$email = $_GET['email'];
$sql = "DELETE FROM signup WHERE email = '$email'";
if ($conn->query($sql) === TRUE) {
  echo "User Deleted Successfully";
} else {
  echo "Error Deleting User: " . $conn->error;
}
$conn->close();

echo "<br>Go Back to Admin Page : <a href='admin.php'><button type='submit' class='button' value='Admin'>ADMIN</button></a></div></body></html>";

?>