<?php
  define('DB_SERVER', 'localhost');
  define('DB_USERNAME', 'changethisuserlater!');
  define('DB_PASSWORD', 'changethispasswordlater!');
  define('DB_DATABASE', 'company');
  define('FLAG', 'GEMASTIK{just_another_admin_who_dont_care_about_s3cur1ty}');
  $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>