<?php
  function tplRender($templateName, $params = array()) {
    require_once('views/sharedBlocks/header.php');
    tplRenderPartial($templateName, $params);
    require_once('views/sharedBlocks/footer.php');
  }
  
  function tplRenderPartial($templateName, $params = array()) {
    if (!empty($params)) {
      foreach ($params as $k => $v) {
        $$k = $v;
      }
    }
    require_once('views/'.$templateName.'.php');
  }