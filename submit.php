<?php 
  $pdo = new PDO('mysql:host=localhost;dbname=sitepoint', 'root', '*****');
  $select = 'SELECT *';
  $from = ' FROM mobile_phones';
  $where = ' WHERE ';
  $opts = $_POST['filterOpts'];
 
  if (empty($opts)){
    // 0 checkboxes checked
    $where .= 'TRUE';
  } else {
    if(count($opts) == 1){
      // 1 checkbox checked
      $where .= $opts[0] . ' = 1';
    } else {
      // 2+ checkboxes checked
      $where .= implode(' = 1 OR ', $opts) . ' = 1';
    }
  }
 
  $sql = $select . $from . $where;
  $statement = $pdo->prepare($sql);
  $statement->execute();
  $results = $statement->fetchAll(PDO::FETCH_ASSOC);
  $json = json_encode($results);
  echo($json);
?>
