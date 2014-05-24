<?php
  
  function getRequestParam($paramName) { 
    if (isset($_REQUEST[$paramName])) {
      return $_REQUEST[$paramName];
    }
    return null;
  }
  
  function getPostParam($paramName) { 
    if (isset($_POST[$paramName])) {
      return $_POST[$paramName];
    }
    return null;
  }
  
  function getGetParam($paramName) { 
    if (isset($_GET[$paramName])) {
      return $_GET[$paramName];
    }
    return null;
  }