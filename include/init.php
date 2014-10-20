<?php

function generateRandomString($length = 10)
{
  $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
  
  $randomString = '';
  for ($i=0; $i<$length; $i++) {
      $randomString .= $characters[rand(0, strlen($characters) - 1)];
  }
  
  return $randomString;
}

$slug = substr($_SERVER['REQUEST_URI'], strripos($_SERVER['REQUEST_URI'], "/")+1);

if ($slug == '' || strlen($slug) < 3 || !ctype_alnum($slug))
{
  $baseRequestURI = substr($_SERVER['REQUEST_URI'], 0, strripos($_SERVER['REQUEST_URI'], "/")+1);

  $slug = generateRandomString(3);
  while (file_exists("codes/" . $slug . ".txt"))
  {
    $slug = generateRandomString(3);
  }
  
  header('Location: ' . $baseRequestURI . generateRandomString(3));

  exit();
}
