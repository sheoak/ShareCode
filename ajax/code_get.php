<?php

// If the slug is not set or contains non-alphanumeric characters (which is not safe)
if (!isset($_GET['slug']) || !ctype_alnum($_GET['slug']))
{
  // We respond by a 403 HTTP status code and we exit PHP execution
  header('HTTP/1.1 403 Forbidden');
  exit();
}

$filePath = "../codes/" . $_GET['slug'] . ".txt";

if (!file_exists($filePath))
{
  // We respond by a 404 HTTP status code and we exit PHP execution
  header('HTTP/1.1 404 Not Found');
  exit();
}

header('Content-Type: application/json; charset=utf-8');

if (filesize($filePath) === 0)
{
  $data = [
    'code' => ''
  ];
}
else
{
  $handle = fopen($filePath, "r");
  $data = [
    'code' => fread($handle, filesize($filePath))
  ];
  fclose($handle);
}

echo json_encode($data);
