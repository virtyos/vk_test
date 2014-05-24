<?php 
  $sqlConnection = null;
  
  function sqlConnect() {
    global $sqlConnection;
    global $appConfig;
    if ($sqlConnection) {
      return true;
    }
    try {
      $sqlConnection = new PDO("mysql:host=".$appConfig['mysql']['host'].";dbname=".$appConfig['mysql']['db'], $appConfig['mysql']['login'], $appConfig['mysql']['password']); 
      $sqlConnection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );  
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
    return true;
  }
  
  function sqlExecute($query, $params = array(), $query_select = false) {
    global  $sqlConnection;
    try {
      $queryResult = $sqlConnection->prepare($query);
      if (!empty($params)) {
        foreach ($params as $key => $value) {
          $queryResult->bindValue($key, $value);
        }
      }
      $queryResult->execute(); 
      if ($query_select) {
        $result = $queryResult->fetchAll();
      } else {
        $result = $queryResult->rowCount();
      }
      return $result;
    } catch (PDOException $e) {
      echo $e->getMessage();
      var_dump($query);
    }
    return null;
  }