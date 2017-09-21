<doctype html!>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  <html>
<?php
if('POST' == $_SERVER['REQUEST_METHOD']){
  try{
    $db = new PDO('mysql:host=localhost;dbname=wpdb', 'root','root');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $newtitle = str_replace($_POST['my_name'],'.txt');
    file_put_contents($newtitle, $_POST['text_field']);
    $res = $db->prepare('insert into test values(?,?)');
    $res->execute($_POST['my_name'],$newtitle);
    print 'added';
  }catch(PDOException $e){
    print "Couldn't connect: " . $e->getMessage();
  }
}else{
  print<<<_HTML_
  <form method="post" action="$_SERVER[PHP_SELF]">
  <div class="form-group">
  Your name: <input type="text" class="form-control" id="formGroupExampleInput" name="my_name" >
  </div>
  <br>
  <div class="form-group">
  Text: <textarea name="text_field" class="form-control" id="exampleFormControlTextarea1" rows="4" cols="50"></textarea>
  <br>
  </div>
  <input type="submit" value="Say Hello">
  </form>
_HTML_;
}
?>
</html>
