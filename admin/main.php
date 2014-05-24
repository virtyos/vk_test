<?php
  require_once('../modules/AppModule.php');
  require_once('../modules/AuthModule.php');
  
  require_once('../libs/Templater.php');
  $renderParams = array();
  
  require_once('../models/SiteModel.php');
  require_once('../models/UserModel.php');
  
  $renderParams['sites'] = SiteModel\select(array('limit' => 15, 'order' => 'id DESC'));
  $renderParams['users'] = UserModel\select(array('limit' => 15, 'order' => 'id DESC'));
  
  
  tplRender('main', $renderParams);