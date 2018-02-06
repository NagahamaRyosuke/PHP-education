<?php
  date_default_timezone_set('Asia/Tokyo');
  session_start();
  $UserID      = time();
  $date    = date("Y/m/d G:i");

  if(isset($_REQUEST["UserID"])){
    $UserID    = $_REQUEST["UserID"];
  }
  if(isset($_REQUEST["name"])){
    $name    = $_REQUEST["name"];
  }
  if(isset($_REQUEST["comment"])){
    $comment    = $_REQUEST["comment"];
  }

  require_once "db_setting.php";
  $dbh = new PDO('mysql:host='.$host.';dbname='.$database, $user, $pass);
  //編集の操作
  if(isset($_REQUEST["ID"]) && isset($_REQUEST["comment"])){
    $ID = $_REQUEST["ID"];
    $stmt = $dbh -> prepare("UPDATE ".$table." SET comment = :comment where UserID = :UserID");
    $stmt->bindParam(':comment', $comment,PDO::PARAM_STR);
    $stmt->bindValue(':UserID', $ID, PDO::PARAM_INT);
    $stmt->execute();
  } else {
    // データベース書き込み
    $stmt = $dbh -> prepare("INSERT INTO ".$table." (UserID,name,comment,date) VALUES (:UserID, :name, :comment, :date)");
    $stmt->bindValue(':UserID', $UserID, PDO::PARAM_INT);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
    $stmt->bindParam(':date', $date, PDO::PARAM_STR);
    $stmt->execute();
  }
  // index.phpにリダイレクト
  header("Location: ".$_SESSION['url']);
