<?php
  $UserID    = $_REQUEST["UserID"];
  $name      = $_REQUEST["name"];
  $password  = $_REQUEST["password"];
  $mail      = $_REQUEST["mail"];

  require_once "db_setting.php";
  $dbh = new PDO('mysql:host='.$host.';dbname='.$database, $user, $pass);
  //新規登録
  $stmt = $dbh -> prepare("INSERT INTO ".$table_user." (ID,name,password,mail_address) VALUES (:ID, :name, :password, :mail_address)");
  $stmt->bindValue(':ID', $UserID, PDO::PARAM_INT);
  $stmt->bindParam(':name', $name, PDO::PARAM_STR);
  $stmt->bindParam(':password', $password, PDO::PARAM_STR);
  $stmt->bindParam(':mail_address', $mail, PDO::PARAM_STR);
  $stmt->execute();

  // index.phpにリダイレクト
  header("Location: index.php");
