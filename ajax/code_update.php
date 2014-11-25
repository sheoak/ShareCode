<?php

// If the slug is not set or contains non-alphanumeric characters (which is not safe)
if (!isset($_POST['slug']) || !ctype_alnum($_POST['slug']))
{
  // We respond by a 403 HTTP status code and we exit PHP execution
  header('HTTP/1.1 403 Forbidden');
  exit();
}

$filePath = "../codes/" . $_POST['slug'] . ".txt";

// If the file matching the slug does not exists
if (!file_exists($filePath))
{
  // We respond by a 404 HTTP status code and we exit PHP execution
  header('HTTP/1.1 404 Not Found');
  exit();
}

$handle = fopen($filePath, "w+");
fwrite($handle, $_POST['code']);
fclose($handle);
