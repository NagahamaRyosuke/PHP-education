<?php
  session_start();

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
    $stmt = $dbh -> prepare("INSERT INTO ".$table." (UserID,name,comment,date,photo) VALUES (:UserID, :name, :comment, :date, :photo)");
    $stmt->bindValue(':UserID', $UserID, PDO::PARAM_INT);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
    $stmt->bindParam(':date', $date, PDO::PARAM_STR);
    $stmt->bindParam(':photo', $_SESSION["photo"], PDO::PARAM_STR);
    $stmt->execute();
  }
  // index.phpにリダイレクト
  header("Location: ".$_SESSION['url']);
