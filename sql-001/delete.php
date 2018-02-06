<?php
require_once "db_setting.php";
session_start();
if(isset($_REQUEST["UserID"])){
  $dbh = new PDO('mysql:host='.$host.';dbname='.$database, $user, $pass);
  $stmt = $dbh -> prepare('DELETE FROM '.$table.' WHERE UserID = :UserID');
  $stmt -> bindParam(':UserID', $_REQUEST["UserID"], PDO::PARAM_INT);
  $stmt -> execute();
}
if(isset($_REQUEST["initialization"])){
  $dbh = new PDO('mysql:host='.$host.';dbname='.$database, $user, $pass);
  $stmt = $dbh -> prepare('DELETE FROM '.$table);
  $stmt -> execute();
}
// index.phpにリダイレクト
header("Location: ".$_SESSION['url']);
