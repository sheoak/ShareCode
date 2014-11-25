<?php

// If the slug is not set or contains non-alphanumeric characters (which is not safe)
if (!isset($_GET['slug']) || !ctype_alnum($_GET['slug']))
{
  // We respond by a 403 HTTP status code and we exit PHP execution
  header('HTTP/1.1 403 Forbidden');
  exit();
}

header('Content-Type: application/json; charset=utf-8');

$filePath = "../codes/" . $_GET['slug'] . ".txt";

// If the file matching the slug does not exists
if (!file_exists($filePath))
{
  // We create the file
  $handle = fopen($filePath, "c+");
  fclose($handle);

  // We send a 201 HTTP status code to tell that this user should be the admin (reading & writing rights)
  header('HTTP/1.1 201 Created');
}

// We show the last file modification timestamp and the file size
$data = [
  'timestamp' => filemtime($filePath),
  'size' => filesize($filePath)
];
echo json_encode($data);
