<?php
  session_start();

  require_once "db_setting.php";
  $dbh = new PDO('mysql:host='.$host.';dbname='.$database, $user, $pass);

  if(isset($_REQUEST["UserID"])){
    //新規登録
    $stmt = $dbh -> prepare("INSERT INTO ".$table_user." (ID,name,password,mail_address,photo) VALUES (:ID, :name, :password, :mail_address, :photo)");
    $stmt->bindValue(':ID', $UserID, PDO::PARAM_INT);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    $stmt->bindParam(':mail_address', $mail, PDO::PARAM_STR);
    $stmt->bindParam(':photo', $photo, PDO::PARAM_STR);
    $stmt->execute();
  } else if (isset($_REQUEST["login"])){
    //ログイン
    $stmt = $dbh -> prepare("SELECT * FROM ".$table_user." WHERE name= :name and password= :password");
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    $stmt->execute();
    $rows = $stmt->fetchAll();
    if(empty($rows)){
      header("Location: http://localhost/education/sql-001/login.php");
      exit;
    }
    $_SESSION["UserID"] = $rows[0]["ID"];
    $_SESSION["photo"] = $rows[0]["photo"];
  }

  // index.phpにリダイレクト
  header("Location: http://localhost/education/sql-001/index.php");
