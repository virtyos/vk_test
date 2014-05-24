<?php
  namespace baseModel;
  
  require_once(dirname(__FILE__).'/../libs/Mysql.php');
  
  $modelError = null;
  
  function init() {
    sqlConnect();
  }
  
  /*
    the queryParams list can include
    columns - string "id, name", default is "*"
    conditions - WHERE statement
    params - binded params
    limit - int number
    order - "id DESC"
  */
  function select($table, $queryParams = array()) {
    $columns = '*';
    $conditions = '';
    $params = array();
    $limit = '';
    $order = '';
    if (!empty($queryParams['columns'])) {
      $columns = $queryParams['columns'];
    }
    if (!empty($queryParams['conditions'])) {
      $conditions = ' WHERE ' . $queryParams['conditions'];
    }
    if (!empty($queryParams['limit'])) {
      $limit = ' LIMIT ' . $queryParams['limit'];
    }
    if (!empty($queryParams['order'])) {
      $order = ' ORDER BY ' . $queryParams['order'];
    }
    if (!empty($queryParams['params'])) {
      $params = $queryParams['params'];
    }
    $sql = 'SELECT '.$columns.' FROM '.$table.' '.$conditions.' '.$order.' '.$limit.'; ';
    $result = sqlExecute($sql, $params, true);
    return $result;
  }
  
  function update($table, $columns, $conditions='', $params=array()) {
    if (!empty($conditions)) {
      $conditions = ' WHERE ' . $conditions;
    }
    $editParamsList = array();
    $editBinded = array();
    foreach ($columns as $k => $v) {
      // char # in the begining of a param key does mean that
      // we want to update via some mysql function or we wish to use the table column name
      if ($k[0] !== '#') {
        $kBind = ':edit_'.$k;
        $editBinded[$kBind] = $v;
        $editParamsList[] = $k . ' = ' . $kBind ;
      } else {
        $k = ltrim($k, '#');
        $editParamsList[] = $k . ' = ' . $v ;
      }      
    }
    $editParamsStr = implode(',' , $editParamsList);
    if (!empty($editBinded)) {
      $params = array_merge($params, $editBinded);
    }
    $sql = 'UPDATE '.$table.' SET '.$editParamsStr.' '.$conditions.' ';
    $result = sqlExecute($sql, $params);
    return $result;
  }
  
  function insert($table, $columns) {
    $columnKeys = array_keys($columns);
    $keys = implode(',', $columnKeys);
    $bindedKeys = array_map(function($item){return ':' . $item;}, $columnKeys);
    $bindedKeysStr = implode(',', $bindedKeys);
    $values = array_values($columns);
    $sql = 'INSERT INTO '.$table.' ('.$keys.') VALUES ('.$bindedKeysStr.');';
    $result = sqlExecute($sql, array_combine($bindedKeys, $values));
    return $result;
  }
  
  function delete($table, $conditions='', $params=array()) {
    if (!empty($conditions)) {
      $conditions = ' WHERE ' . $conditions;
    }
    $sql = 'DELETE FROM '.$table. ' '.$conditions.' ';
    $result = sqlExecute($sql, $params);
    return $result;    
  }