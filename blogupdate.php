<?php
if ( isset($_POST['preview_blog']) ){
  print $_POST['BlogTitle'];
  print $_POST['BlogFileTitle'];
  print $_POST['BlogContent'];
    exit;
}elseif ( isset($_POST['submit_blog']) ){
  try{
    $db = new PDO('mysql:host=localhost;dbname=wpdb', 'root','root');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "Insert into blog (title, filename) values ('".$_POST["BlogTitle"] ."', '".$_POST["BlogFileTitle"] ."');" ;
    $res = $db->exec($query);
    file_put_contents($_POST["BlogFileTitle"], $_POST["BlogContent"]);
  } catch(PDOException $e){
      print "Couldn't connect: " . $e->getMessage();
  } catch(Exception $e){
      print "Exception: " . $e->getMessage();
    }
    exit;
}

?>
