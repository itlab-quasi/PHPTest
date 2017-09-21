<doctype html!>
  <html>
<?php
  try{
    $db = new PDO('mysql:host=localhost;dbname=wpdb', 'wpadmin','password');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $res = $db->query("Select * from test;");
    $q = $res->fetchAll();

    foreach($q as $qu){
      $page = file_get_contents($qu['file']);
      print $page;
    }
  }catch(PDOException $e){
    print "Couldn't connect: " . $e->getMessage();
  }
?>
</html>
