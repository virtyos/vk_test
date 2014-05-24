<?php
  namespace UserModel;
  
  require_once('BaseModel.php');
  \baseModel\init();
  
  function  getTableName() {
    return 'pixel_user';
  }
 
  function select($queryParams = array()) {
    $table = \UserModel\getTableName();
    $result = \baseModel\select($table, $queryParams);
    return $result;
  }
  
  function update($columns, $conditions='', $params=array()) {
    $table = \UserModel\getTableName();
    $result = \baseModel\update($table, $columns, $conditions, $params);
    return $result;
  }
  
  function insert($columns) {
    $table = \UserModel\getTableName();
    $result = \baseModel\insert($table, $columns);
    return $result;
  }
  
  function delete($conditions='', $params=array()) {
    $table = \UserModel\getTableName();
    $result = \baseModel\delete($table, $conditions, $params);
    return $result;  
  }
  