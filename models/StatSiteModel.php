<?php
  namespace StatSiteModel;
  
  require_once('BaseModel.php');  
  \baseModel\init();
  
  function  getTableName() {
    return 'pixel_stat_site';
  }
 
  function select($queryParams = array()) {
    $table = \StatSiteModel\getTableName();
    $result = \baseModel\select($table, $queryParams);
    return $result;
  }
  
  function update($columns, $conditions='', $params=array()) {
    $table = \StatSiteModel\getTableName();
    $result = \baseModel\update($table, $columns, $conditions, $params);
    return $result;
  }
  
  function insert($columns) {
    $table = \StatSiteModel\getTableName();
    $result = \baseModel\insert($table, $columns);
    return $result;
  }
  
  function delete($conditions='', $params=array()) {
    $table = \StatSiteModel\getTableName();
    $result = \baseModel\delete($table, $conditions, $params);
    return $result;  
  }