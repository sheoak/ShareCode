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

$URI = new URI();

if (!$URI->getSegment(3))
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
else
{
  $slug = $URI->getSegment(3);
}