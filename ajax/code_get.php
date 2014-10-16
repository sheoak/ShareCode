<?php

header('Content-Type: application/json; charset=utf-8');

$data = array();
$filePath = "../codes/" . $_GET['slug'] . ".txt";

if (!file_exists($filePath))
{
  $data = [
    'admin' => true,
    'code' => ''
  ];

  $handle = fopen($filePath, "c+");
  fclose($handle);
}
else
{
  $handle = fopen($filePath, "r");

  $data['admin'] = false;
  
  if (filesize($filePath) === 0)
  {
    $data['code'] = '';
  }
  else
  {
    $data['code'] = fread($handle, filesize($filePath));
  }

  fclose($handle);
}

echo json_encode($data);
