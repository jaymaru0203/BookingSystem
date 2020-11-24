<?php

if(isset($_POST['login'])){
  require('includes/config.php');

  if (empty($_POST['email']) && empty($_POST['password']) ) {
    $error[] = "Please fill out all fields";
  }
  else{
  $email = $_POST['email'];
   if (!filter_var($email,FILTER_VALIDATE_EMAIL) === false){
          if (empty($_POST['password'])){
            $error[] = 'A password must be entered';
          }
          else{
            $password = md5($_POST['password']);

            $admin = "SELECT * FROM admin WHERE email='$email' AND password='$password'";

            $result1 = $conn-> query($admin);

            if($result1 -> num_rows > 0){

            $_SESSION['email'] = $email;
            header('Location:admin.php');
            exit;

            }

            else{
            $a = "SELECT * FROM signup WHERE email='$email' AND password='$password'";

            $result = $conn-> query($a);

            if($result -> num_rows > 0){

              $msg = "Logged in";
            $_SESSION['email'] = $email;
            header('Location:homepage.html');
            exit;
            

            }
            else {
                $error[] = 'Wrong username or password or your account has not been activated.';
                 }
              }
          }
        }
        else {$error[] = "Enter a valid email address";}
      }
    }
  elseif (isset($_POST['signup'])) {

      require('includes/config.php');
       $err = array();
      $fullname = trim($_POST['fullName']);
      $email = $_POST['email'];
      $gender = $_POST['gender'];
      $contactNumber = $_POST['contactNumber'];
      $state = $_POST['state'];
      $password = $_POST['password'];
      $confirmPassword = $_POST['confirmPassword'];

      $e = "SELECT * FROM signup WHERE email='$email'";

      $result_email = $conn-> query($e);

      if (empty($_POST['fullName']) || empty($_POST['email']) || empty($_POST['contactNumber']) ||(isset($_POST['gender']) && $_POST['gender'] == '-1') || 
        (isset($_POST['state']) && $_POST['state'] == '-1') || empty($_POST['password']) || empty($_POST['confirmPassword']) ){
          array_push($err, 'Please fill all required fields!');
      }
      elseif (!preg_match('/^[a-zA-Z\s]+$/',$fullname)){
          array_push($err, 'Name should contain only letters and spaces');
      }
      elseif (!preg_match('/^[0-9]{10}$/',$contactNumber)){
          array_push($err, 'Phone No should be 10 digits');
      }

      elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        array_push($err, 'Email Id is invalid');
      }
      elseif (!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@*#$%]{8,12}$/', $password)){
        array_push($err, 'Password should contain atleast 1 letter ,1 number , special character and should be min 8 length');

      }
      elseif ($password !== $confirmPassword) {
         array_push($err, 'Password and Confirm password should match!');   
      }
      else if ($result_email-> num_rows > 0){
        array_push($err, 'Email already exists');
      }
      else{

       $encrypt = md5($password);

       $email = filter_var($email,FILTER_SANITIZE_EMAIL);


          $sql = "INSERT INTO signup (fullname, email, gender, contactNumber, state, password,confirmPassword)
          VALUES ( '$fullname', '$email' , '$gender' , '$contactNumber' , '$state' ,'$encrypt' ,'$encrypt')";

          if ($conn->query($sql) === TRUE) {
              $_SESSION['email'] = $email;
                  header('Location: homepage.html');
                  exit;
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
        } 
       



      $conn->close();



      }



?>




<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Tickit</title>
      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
      <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
      <style>
        body {
          margin: 0px;
          padding: 0px;
          font-family: 'Raleway', sans-serif;
          font-weight:500;
          scroll-behavior: smooth;
          
        }
            
        #top{
            width: 2.5vw;
            display: none;
            position: fixed;
            bottom: 1vw;
            right: 1vw;
            z-index: 200;
            cursor: pointer;
            opacity: 0.7;
        }

        .topnav {
            overflow: hidden;
            background-color: white;
            position: sticky;
            top: 0;
            padding: 0;
            z-index: 5;
            zoom:80%;
            transition: box-shadow 0.2s linear;
        }
            
        .topnav a {
            float: right;
            display: block;
            color: #1a1919;
            text-align: center;
            padding: 1vw 1.5vw 0.8vw 1.5vw;
            text-decoration: none;
            font-size: 1.5vw;
            font-weight: 1000;
        }
        
        .topnav a:hover {
            color:#1a1919;
            border-bottom: #1a1919 0.2vw solid;
            transform: scale(1.03);
            transition: transform 0.2s linear;
        }
        
        .topnav a.active {
            border-bottom: #ee5e11 0.2vw solid;
        }
        
        .topnav .icon {
            display: none;
        }
        
        #logo{
            height: 3vw;
            margin-top: 0.45vw;
            margin-left: 1vw;
        }

        footer{
            background-color: #1a1919;
            color:white;
            padding: 2vw;
            text-align: center;
            font-size: 1.2vw;
        }

        @media screen and (max-width: 700px) {
            
            #top{
                width: 7vw;
            }

            .topnav a {display: none;}
            .topnav a.icon {
                float: right;
                display: block;
            }
            .topnav.responsive {position: sticky;}
            .topnav.responsive .icon {
                position: absolute;
                right: 0;
                top: 0;
            }
            .topnav.responsive a {
                float: none;
                display: block;
                text-align: center;
                font-size: 3vw;
            }
            .topnav.responsive a:hover {
                background-color: lightgrey;
                border-bottom: none;
            }
            
            #logo{
                height: 5vw !important;
                width: 15vw !important;
            }
            .topnav a.active {
                border: none;
            }

            footer{
                font-size: 2.5vw !important;
            }
        }


        @media screen and (max-width: 550px) {
            .topnav.responsive a {
              float: none;
              display: block;
              text-align: center;
              font-size: 3.5vw;
            }
            #logo{
              height: 30px !important;
              width: 100px !important;
            }
            #menu{
              font-size: 30px !important;
            }
          }

       </style>

        <script>
            function myFunction() {
                var x = document.getElementById("myTopnav");
                if (x.className === "topnav") {
                x.className += " responsive";
                } else {
                x.className = "topnav";
                }
            }
        </script>

        <script>
              window.onscroll = function() {scrollFunction()};
              
              function scrollFunction() {
                if (document.body.scrollTop > 30 || document.documentElement.scrollTop > 30) {
                  document.getElementById("myTopnav").style.opacity = "0.8";
                  document.getElementById("myTopnav").style.boxShadow = "#1a1919 0px 0.5px 2px";
                  document.getElementById("top").style.display = "block";

                } else {
                  document.getElementById("myTopnav").style.opacity = "1";
                  document.getElementById("myTopnav").style.boxShadow = "0px 0px 0px";
                  document.getElementById("top").style.display = "none";
                }
              }
        </script>

        <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
<script type="text/javascript">
$(document).ready(function(){
	  $('.tab a').on('click', function (e) {
	  e.preventDefault();
	  
	  $(this).parent().addClass('active');
	  $(this).parent().siblings().removeClass('active');
	  
	  var href = $(this).attr('href');
	  $('.forms > form').hide();
	  $(href).fadeIn(500);
	});
});


$(document).ready(function(){
  $('#tosignup').on('click', function (e) {
  e.preventDefault();
  
  $('#signupbutton').addClass('active');
  $('#loginbutton').removeClass('active');
  
  var href = $(this).attr('href');
  $('.forms > form').hide();
  $(href).fadeIn(500);
});
});

$(document).ready(function(){
  $('#tologin').on('click', function (e) {
  e.preventDefault();
  
  $('#loginbutton').addClass('active');
  $('#signupbutton').removeClass('active');
  
  var href = $(this).attr('href');
  $('.forms > form').hide();
  $(href).fadeIn(500);
});
});
</script>

<style>
    * {
      -webkit-box-sizing: border-box;
      -moz-box-sizing: border-box;
      box-sizing: border-box;
    }
    .forms {
      background: #fff;
      box-shadow: 0 0 7px #000;
      margin: 30px;
      overflow: hidden;
      position: relative;

      padding: 0;
      float: left;
      width: 35%;
      min-height: 60vh;
      zoom: 0.9;
      border-radius: 10px;
    }
    .forms h1 {
      font-size: 24px;
      color: #666;
      font-weight:bold;
      text-align: center;
    }
    .forms form { padding: 30px; }
    #signup { display: none; }
    .forms .tab-group {
      list-style: none;
      padding: 0;
      margin: 0;
    }
    .forms .tab-group:after {
      content: "";
      display: table;
      clear: both;
    }
    .forms .tab-group li a {
      display: block;
      text-decoration: none;
      padding: 10px;
      background: #eee;
      color: #888;
      font-size: 20px;
      float: left;
      width: 50%;
      text-align: center;
      border-top: 3px solid transparent;
      -moz-transition: all 0.4s ease-in-out;
      -o-transition: all 0.4s ease-in-out;
      -webkit-transition: all 0.4s ease-in-out;
      transition: all 0.4s ease-in-out;
    }
    .forms .tab-group li a:hover {
      background: #dedfdf;
      color: #666;
    }
    .forms .tab-group .active a {
      background: #fff;
      color: #444;
      border-top: 3px solid #ee5e11;
    }
    .forms input {
      font-size: 16px;
      display: block;
      width: 100%;
      padding: 10px;
      border: none;
      border-bottom: 1px solid #aaa;
      color: #666;
      border-radius: 0px;
      margin-bottom: 40px;
      -moz-transition: all 0.4s ease-in-out;
      -o-transition: all 0.4s ease-in-out;
      -webkit-transition: all 0.4s ease-in-out;
      transition: all 0.4s ease-in-out;
      background-color: #fff;
    }
    .forms input:focus {
      outline: 0;
      border-color: #ee5e11;
    }
    .forms label {
      font-size: 18px;
      font-weight: bold;
      color: #666;
      margin-bottom: 10px;
      display: block;
    }
    .forms .button {
      border: 0;
      outline: none;
      border-radius: 0;
      padding: 10px 0;
      font-size: 18px;
      font-weight: 300;
      text-transform: uppercase;
      letter-spacing: 2px;
      border: 3px solid #ee5e11;
      border-radius: 7px;
      color: #ee5e11;
      cursor: pointer;
      -moz-transition: all 0.4s ease-in-out;
      -o-transition: all 0.4s ease-in-out;
      -webkit-transition: all 0.4s ease-in-out;
      transition: all 0.4s ease-in-out;
    }
    .forms .button:hover, .button:focus { background: #ee5e11; color: white; }
    .text-p { text-align: center; }
    .text-p a { color: #1383ea; }
  
    ::placeholder{
      opacity: 0.7;
    }
    hr{
      border-top: 0.1px solid #ee5e11;
      width: 60%;
      margin-bottom: 50px;
    }
    .grid-container{
      display: grid;
      grid-gap: 20px;
      grid-template-columns: 1fr 1fr;
      grid-template-rows: 1fr 1fr;
      margin-bottom: 30px;
    }
    select{
      color: #666;
      border: 1px solid #aaa;
    }
    .warning{
      color: red;
      font-weight: bold;
      text-align: center;
      font-size: 18px;
      margin: 20px;
      opacity: 0.8;
    }
  
    #loginpage{
      border-bottom: #ee5e11 0.2vw solid;
    }
  
    @media screen and (max-width: 992px){
      .forms{
        zoom: 0.8;
        width: 50%;
      }
    }
    @media screen and (max-width: 700px){
      .forms{
        float: none;
        margin: 30px auto;
        width: 70%;
      }
    }
    @media screen and (max-width: 500px){
      .forms{
        zoom: 0.7;
        width: 80%;
      }
      .forms h1 {
        font-size: 22px;
        color: #666;
      }
    }
    .muted-text{
      color: #aaa;
      font-size: 14px;
    }
  
  </style>

    </head>

    <body>
        <a href="#myTopnav"><img src="https://www.iconfinder.com/data/icons/arrows-part-3-3/32/arrow-top-1-512.png" id="top"></a>

        <div class="topnav" id="myTopnav" >
            <a href="homepage.html" style="all: unset; cursor:pointer;">
              <img src="images/logo.png" id="logo" style="zoom: 0.8;">
            </a>

            <a href="login.html" id="loginpage"> Login/Signup</a>
            <a href="#about" id="aboutpage"> About Us</a>
            <a href="#liveshows" id="liveshows"> Live Shows</a>
            <a href="#movies" id="movies"> Movies</a>

            <a  class="icon" onclick="myFunction()">
                <i class="material-icons" style="font-size: 4vw; color:#ee5e11" id="menu">menu</i>
                </a>
        </div>

        <div style="min-height: 95vh; background-image:url(images/Movie_Night.png); background-repeat:no-repeat; display:flex; background-size: 50vw; background-position: right top; background-attachment: fixed;">
  
            <div class="forms">
                <ul class="tab-group">
                    <li class="tab active" id="loginbutton"><a href="#login">Log In</a></li>
                    <li class="tab" id="signupbutton"><a href="#signup" >Sign Up</a></li>
              </ul>
              
              <!-- LOGIN FORM -->
            
                <form id="login"  name="login" method="POST">
                  <h1>Login to Tickit.com</h1><hr>
                  <div id="loginwarning" class="warning">
                    <!-- INSERT LOGIN WARNINGS HERE -->
                  </div>
                   <?php if (isset($error)){
                         foreach ($error as $error){
                           echo '<p style="color: red">'.$error.'</p>';
                           }
                         }
                          if(isset($msg)){
                           echo '<p style="color: red">'.$msg.'</p>';
                          
                          }?>
                  <div class="input-field">
                    <label for="email">Email</label>
                    <input type="text" name="email" placeholder="john@example.com"/>
                    <label for="password">Password</label> 
                    <input type="password" name="password" placeholder="******"/>
                    <input type="submit" value="Login"  name="login"  class="button"/>
                    
                    <p class="text-p"> Not Yet Registered? <a href="#signup" id="tosignup">Sign Up</a> </p>
                  </div>
              </form>
                
              <!-- SIGNUP FORM -->
            
                <form id="signup" name="signup" method="POST">
                  <h1>Sign Up on Tickit.com</h1><hr>
                  <div id="signupwarning" class="warning">
                    <!-- INSERT SIGNUP WARNINGS HERE -->
                  </div>
                  <?php if (isset($err) && (count($err) > 0)){
                         foreach ($err as $err){
                           echo '<p style="color: red">'.$err.'</p>';
                           }

                           echo "
                                <script>
                                    $(document).ready(function(){
                                  
                                    
                                    $('#signupbutton').addClass('active');
                                    $('#loginbutton').removeClass('active');
                                    
                                    var href = $('#tosignup').attr('href');
                                    $('.forms > form').hide();
                                    $(href).fadeIn(500);
                                  }); 

                                </script>
                                ";
                              } 
                          ?>
                  <div class="input-field">
                    <label for="fullName">Name</label> 
                    <input type="text" name="fullName" placeholder="John Doe" />
                    <label for="email">Email</label> 
                    <input type="text" name="email" placeholder="john@example.com"/>
                    <label for="contactNumber">Mobile Number</label>
                    <input type="number" name="contactNumber" placeholder="9876543210"/>
                    <div class="grid-container">
                    <label for="gender" class="grid-item">Gender</label>
                    <label for="state" class="grid-item">Age Group</label>
                    <select id="gender" name="gender" class="grid-item">
                      <option value="-1">Select Gender</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                      <option value="Others">Others</option>
                    </select>
                    <select id="age" name="state" class="grid-item">
                      <option value="-1">Select Age Group</option>
                      <option value="0-18">0-18</option>
                      <option value="19-35">19-35</option>
                      <option value="36-50">36-50</option>
                      <option value="50+">50+</option>
                    </select>
                    </div>
                    <label for="password">Password</label> <p class="muted-text">(Password Must be Atleast 8 Characters Long)</p>
                    <input type="password" name="password" placeholder="******"/>
                    <label for="confirmPassword">Confirm Password</label> <p class="muted-text">(Password and Confirm Password Fields Must Match)</p>
                    <input type="password" name="confirmPassword" placeholder="******"/>
                    <input type="submit" value="Sign up" name="signup" class="button" />
                    <p class="text-p">Already Registered? <a href="#login" id="tologin">Login</a> </p>
                  </div>
                  </form>

            </div>
            </div>
        <footer style="bottom: 0;">
            Copyright @2020 Tickit.com
        </footer>
    </body>
</html>

