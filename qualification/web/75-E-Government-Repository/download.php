<?php

  include('config.php');

  if (isset($_GET['file']) && isset($_GET['token']) && isset($_GET['cat'])) {
    $file = $_GET['file'];
    $token = $_GET['token'];
    $cat = $_GET['cat'];
    if ($token == base64_encode($file)) {
      $file_path = PATH . "/" . $cat . "/" . $file;
      if (file_exists($file_path)) {
          header('Content-Description: File Transfer');
          header('Content-Type: application/pdf');
          header('Content-Disposition: attachment; filename="'.basename($file).'"');
          header('Expires: 0');
          header('Cache-Control: must-revalidate');
          header('Pragma: public');
          header('Content-Length: ' . filesize($file_path));
          readfile($file_path);
          exit;
        }
    }
  }
?>
