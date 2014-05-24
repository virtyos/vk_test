<?php
  define('AUTH_ERROR_INVALID_LOGIN_DATA', 1);
  define('AUTH_ERROR_NO_ERROR', 0);
  
  $authError = AUTH_ERROR_NO_ERROR;
  
  function login($login, $password) {
    global $appConfig, $authError;
    if ($login === $appConfig['auth']['login'] && $password === $appConfig['auth']['password']) {
      $_SESSION['authorized'] = true;
    } else {
      $authError = AUTH_ERROR_INVALID_LOGIN_DATA;
      return false;
    }
    return true;
  }
  
  function authErrorToText($errorName) {
    $text = '';
    switch ($errorName) {
      case AUTH_ERROR_INVALID_LOGIN_DATA:
        $text = 'Неверный логин или пароль';
        break;
    }
    return $text;
  }
  
  function logout() {
    unset($_SESSION['authorized']);
  }