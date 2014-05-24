<?php
  session_start();
  $isAuthorized = false;
  if (isset($_SESSION['authorized']) && $_SESSION['authorized']) {
    $isAuthorized = true;
  }