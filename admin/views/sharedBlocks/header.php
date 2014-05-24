<!doctype html>
<html >
<head>
  <meta charset="utf-8">
  <title>Pixel</title>
  <link rel="stylesheet" type="text/css" href="/admin/css/main.css" />
  <script type="text/javascript" src="/admin/js/jquery.js"></script>
  <script type="text/javascript" src="/admin/js/main.js"></script>
</head>
<body  >
<div class="layout">
<?php
  global $isAuthorized;
  if ($isAuthorized):
?>
<a href="/admin">На главную</a>
<br><br>
<?php endif; ?>