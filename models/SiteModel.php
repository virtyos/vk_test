<?php
  namespace SiteModel;
  
  define('Site_ERROR_EMPTY_FIELD',1);
  define('Site_ERROR_URL_EXISTS',2);
  define('Site_ERROR_URL_INVALID_FORMAT',3);
  define('Site_ERROR_NO_ERROR',0);
  
  require_once('BaseModel.php');  
  \baseModel\init();
 
  function  getTableName() {
    return 'pixel_site';
  }
 
  function select($queryParams = array()) {
    $table = \SiteModel\getTableName();
    $result = \baseModel\select($table, $queryParams);
    return $result;
  }
  
  function update($columns, $conditions='', $params=array()) {
    $table = \SiteModel\getTableName();
    $result = \baseModel\update($table, $columns, $conditions, $params);
    return $result;
  }
  
  function insert($columns) {
    $table = \SiteModel\getTableName();
    $result = \baseModel\insert($table, $columns);
    return $result;
  }
  
  function delete($conditions='', $params=array()) {
    $table = \SiteModel\getTableName();
    $result = \baseModel\delete($table, $conditions, $params);
    return $result;  
  }
  
  function validate($columns) {
    global $modelError;
    
    if (empty($columns['url'])) {
      $modelError = array('status' => Site_ERROR_EMPTY_FIELD, 'field' => 'url');
      return false;
    } else if(!filter_var($columns['url'], FILTER_VALIDATE_URL)){
      $modelError = array('status' => Site_ERROR_URL_INVALID_FORMAT, 'field' => 'url');
      return false;
    } else {
      $site = \SiteModel\select(array('conditions' => 'url = :url', 'params' => array(':url' => $columns['url'])));
      if ($site) {
        $modelError = array('status' => Site_ERROR_URL_EXISTS, 'field' => 'url');
        return false;
      }
    }
    return true;
  }
  
  
  function  modelErrorToText($modelError) {
    $text = '';
    switch ($modelError['status']) {
      case Site_ERROR_EMPTY_FIELD:
        $text = 'Поле '.$modelError['field'].' не должно быть пустым!';
        break;
      case Site_ERROR_URL_EXISTS:
        $text = 'Такой url уже добавлен';
        break;
      case Site_ERROR_URL_INVALID_FORMAT:
        $text = 'Неверный формат url';
        break;
    }
    return $text;
  }