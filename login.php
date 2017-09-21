<?php
session_start();

if('POST' == $_SERVER['REQUEST_METHOD']){
  try{
    $db = new PDO('mysql:host=localhost;dbname=wpdb', 'root','root');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "Select * from users where username= '".$_POST['username']."' and password = '".$_POST['password']."'";
    $res = $db->query($query);
    $q = $res->fetchAll();
    if(count($q) > 0){
      $_SESSION["USERNAME"] = $_POST['username'];
      header('Location: ./Main.php');
      exit();
    }else{
      header('Location: ./error.html');
      exit();
    }
  }catch(PDOException $e){
    print "Couldn't connect: " . $e->getMessage();
  }
}
?>

<doctype html!>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<html>
<div class="container">

      <form class="form-signin" action="login2.php" method="post">
        <h2 class="form-signin-heading">Sign in</h2>
        <label for="inputEmail" class="sr-only">Admin Name</label>
        <input type="text" id="validationDefault01" class="form-control" placeholder="Admin Name" name="username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

    </div> <!-- /container -->
</html>
