<?php
  require_once('../modules/AppModule.php');
  require_once('../modules/AuthModule.php');
  require_once('../libs/Common.php');
  
  if (!$isAuthorized) {
    redirect('login.php');
  } else {
    redirect('main.php');
  }