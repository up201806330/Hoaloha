<?php
  function generate_random_token(){
    return bin2hex(openssl_random_pseudo_bytes(32));
  }

  if (session_status() == PHP_SESSION_NONE) session_start();
  if (!isset($_SESSION['csrf'])) $_SESSION['csrf'] = generate_random_token();
?>