<?php
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $db_name = "to_do_list";

    try {
      $conn = new PDO("mysql:host=$serverName;dbname=$db_name",
                      $userName, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
      echo "Connection failed : " . $e->getMessage();
    }
?>