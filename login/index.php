<!DOCTYPE html>
<html>
  <?php
    @ob_start();
    session_start();
  ?>
  <head>
    <meta charset="utf-8">
    <title>fsociety login</title>
    <meta name="theme-color" content="#071339">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style-common.css">
    <link rel="stylesheet" href="style.css">
    <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Ubuntu&subset=cyrillic,latin'>
    <link href="../images/fsociety.png" rel="icon" type="image/png" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://use.fontawesome.com/035468853e.js"></script>
    <script src="script.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>

  <body>
    <div class="jumbotron wrapper">
      <!--titlebar start -->
      <div class="navbar-fixed-top titlebar">
        <div class="col-sm-6">
          <a href="../" title="Home"><span class="toplink"><b>fsociety</b> by DebarredBots</span></a>
        </div>
        <div class="col-sm-1">
          <img src="../images/fsociety.gif" class="image img-circle" title="Fear Me">
        </div>
        <div class="col-sm-3"></div>
        <div class="col-sm-1 menuside">
          <div class="dropdown">
            <button class="btn dropdown-toggle menu" title="Menu" type="button" data-toggle="dropdown"><span class="toplink">MENU<span class="glyphicon glyphicon-align-justify"></span></span></button>
            <ul class="dropdown-menu">
              <li><a href="login/">Ask-a-bot</a></li>
              <li><a href="index.php">Universal Database</a></li>
              <li><a href="settled/">lucifer's blog</a></li>
              <li><a href="history/">RaggedyMan's blog</a></li>
            </ul>
          </div>
        </div>
        <div class="col-sm-1"></div>
      </div>
      <!--titlebar end -->
      <br/><br/><br/><br/>
      <!--mainbody start-->
      <div class="container">
        <center>
          <h1> fsociety Bot-Camp </h1>
          <div class="row">
            <div class="col-sm-3 side"></div>
            <div class="col-sm-6 main">
              <fieldset class="field">
                <center>
                  <form action="../login/" method="POST" class="form-group form" id="form1">
                    <h2> Login </h2><br/>
                    <p id="error"></p>
                    <input type="text" name="lusrname" class="input input-sm" placeholder="Username" required/><br/><br/>
                    <input type="password" name="lpasswd" class="input input-sm" placeholder="Password" required/><br/><br/>
                    <center>
                      <input type="submit" name="login" value="login" class="submit input-sm"/> &nbsp or &nbsp
                      <button type="button" name="signup" onclick="change1()" class="submit input-sm">signup</button>
                    </center>
                  </form>
                  <form id='logout' action='../logout/'>
                    <button class='submit input-sm'>logout</button><br/><br/>
                  </form>
                  <form action="../login/" method="POST" class="form-group form" id="form2">
                    <h2> Signup </h2><br/>
                    <p id="error"></p>
                    <input type="text" name="usrname" class="input input-sm" placeholder="Username" maxlength="12" required/><br/><br/>
                    <input type="password" name="passwd" class="input input-sm" placeholder="Password" required/><br/><br/>
                    <input type="text" name="firstname" class="input input-sm" placeholder="First name" maxlength="15" required/><br/><br/>
                    <input type="text" name="lastname" class="input input-sm" placeholder="Last name" maxlength="16" required/><br/><br/>
                    <input type="email" name="email" class="input input-sm" placeholder="Valid Email" maxlength="35" required/><br/><br/>
                    <input type="text" name="mobileno" class="input input-sm" placeholder="Mobile no. " maxlength="10" required/><br/><br/>
                    <center>
                      <input type="submit" name="signup" value="signup" class="submit input-sm"/> &nbsp or &nbsp
                      <button type="button" name="login" onclick="change2()" class="submit input-sm">login</button>
                    </center>
                  </form>
                </center>
              </fieldset>
            </div>
            <div class="col-sm-3 side"></div>
          </div>
        </center>
      </div>
      <!--mainbody end -->

      <script type="text/javascript">
        document.getElementById('form2').style.display = 'none';
        document.getElementById('form1').style.display = 'block';
        document.getElementById('logout').style.display = 'none';
      </script>
    </div>

    <?php
      //already logged in validation
      if(isset($_SESSION['logged'])){
        $name = $_SESSION['usrname'];
        echo "<script type='text/javascript'>document.getElementById('form1').innerHTML = '<br/><br/>You are already logged in as <b>$name</b> <br/> Logout to login from different account. <br/>';</script>";
        echo "<script type='text/javascript'>document.getElementById('form2').style.display = 'none';</script>";
        echo "<script type='text/javascript'>document.getElementById('logout').style.display = 'block';</script>";
      }
    ?>
    <!--footer start -->
    <footer class="container footer">
          <a href="#"><i class="fa fa-facebook fa-3x fafont" aria-hidden="true"></i></a>&nbsp&nbsp&nbsp&nbsp
          <a href="#"><i class="fa fa-twitter fa-3x fafont" aria-hidden="true"></i></a>&nbsp&nbsp&nbsp&nbsp
          <a href="#"><i class="fa fa-instagram fa-3x fafont" aria-hidden="true"></i></a>&nbsp&nbsp&nbsp&nbsp
          <a href="#"><i class="fa fa-github fa-3x fafont" aria-hidden="true"></i></a><br/><br/>
          &copy; DebarredBots 2018
    </footer>
    <!--footer end -->
  </body>
  <?php

    //login
    if(isset($_POST['lusrname']) && isset($_POST['lpasswd'])){
      $usrname = $_POST['lusrname'];
      $passwd = md5($_POST['lpasswd']);
      $db = mysqli_connect('localhost','root','','Wasooli') or die("connection failed");
      if($_SERVER["REQUEST_METHOD"]=="POST"){
        $query = "SELECT usrname FROM users WHERE `usrname` = '$usrname' and `passwd`='$passwd';";
        $result = mysqli_query($db, $query) or die("Error");
        $count = mysqli_num_rows($result);
        if($count!=1){
          //$errorDes="Wrong Username \n or Password";
          //echo $errorDes;
          echo "<script type='text/javascript'>document.getElementById('error').innerHTML='Wrong Username or Password';</script>";
        }
        else{
          $_SESSION['usrname'] = $usrname;
          $_SESSION['logged'] = 'in';
          header("location:../");
        }
      }
    }

    //signup
    if(isset($_POST['usrname']) && isset($_POST['passwd']) && isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['mobileno'])){
      date_default_timezone_set('Asia/Calcutta');
      $error = 0;
      $errorDes="";
      $usrname = $_POST['usrname'];
      $passwd = md5($_POST['passwd']);
      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $email = $_POST['email'];
      $mobileno = $_POST['mobileno'];
      $time = date("d-m-Y h:i:sa");
      $db=mysqli_connect('localhost','root','','Wasooli') or die("connection failed");
      if($_SERVER["REQUEST_METHOD"]=="POST"){
        $query="SELECT count(*) as num FROM users where `usrname` = '$usrname';";
        $result=mysqli_query($db,$query) or die("Humse na hopaya");
        $result=mysqli_fetch_assoc($result);
        if($result['num']>=1){
          $errorDes=$errorDes."Username";
          $error = $error + 1;
        }
        $query="SELECT count(*) as num FROM users where `email` = '$email';";
        $result=mysqli_query($db,$query);
        $result=mysqli_fetch_assoc($result);
        if($result['num']>=1){
          if($errorDes == ""){
              $errorDes=$errorDes."Email ID";
          }
          else{
              $errorDes=$errorDes.", Email ID";
          }
          $error = $error + 1;
        }
        $query="SELECT count(*) as num FROM users where `mobileno` = '$mobileno';";
        $result=mysqli_query($db,$query);
        $result=mysqli_fetch_assoc($result);
        if($result['num']>=1){
          if($errorDes == ""){
              $errorDes=$errorDes."Mobile no.";
          }
          else{
              $errorDes=$errorDes." & Mobile no.";
          }
          $error = $error + 1;
        }
        $errorDes=$errorDes." already exists";
        //echo $error;
        //echo "<script type='text/javascript'>document.getElementById('error').innerHTML=$error;</script>";
        if($error == 0){
          $query="insert into users (usrname, first_name, last_name, passwd, email, mobileno, time) values ('$usrname','$firstname','$lastname','$passwd','$email','$mobileno','$time');";
          $result=mysqli_query($db,$query);
          //header("location:../login/");
          echo "<script type='text/javascript'>document.getElementById('error').innerHTML='Signup Successful! Login to continue.';</script>";
        }
        else{
          //echo $errorDes;
          //header("location:../login/");
          echo "<script type='text/javascript'>document.getElementById('error').innerHTML='$errorDes';</script>";
        }


      }
      mysqli_close($db);
    }
    if(isset($_SESSION['errorDes'])){
      $e = $_SESSION['errorDes'];
      unset($_SESSION['errorDes']);
      echo "<script type='text/javascript'>document.getElementById('error').innerHTML='$e';</script>";
    }
  ?>

</html>
