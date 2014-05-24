<?php  require_once('../modules/AppModule.php');  require_once('../modules/AuthModule.php');    require_once('../libs/Templater.php');  $renderParams = array();    require_once('../models/SiteModel.php');  require_once('../models/StatSiteModel.php');    $siteId = getGetParam('site');  $site = null;  if ($siteId) {    $site = \SiteModel\select(array('conditions' => 'id = :id', 'params' => array(':id' => $siteId)));  }  //if it's no such site  if (!$site) {    throw new Exception('no such site');    die();  }  $site = $site[0];    $renderParams['site'] = $site;    $siteStats = \StatSiteModel\select(array(    'conditions' => 'id_site = :id_site  AND (date_visit BETWEEN :start_date AND DATE_ADD(:end_date, INTERVAL 1 DAY))',    'params' => array(      ':id_site' => $site['id'],      ':start_date' => date('Y-m-d', (time() - 7*24*3600)),      ':end_date' => date('Y-m-d'),    )  ));    $renderParams['siteStats'] = $siteStats;    tplRender('sitePage', $renderParams);  