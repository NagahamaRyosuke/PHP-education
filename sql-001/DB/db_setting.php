<?php
date_default_timezone_set('Asia/Tokyo');

$host     = "localhost";
$user     = "php";
$pass     = "hogehoge";
$database = "BBS1";
$table    = "test1";
$table_user = "test1_user";

$UserID = $_SESSION["UserID"];
$date = date("Y/m/d G:i");

if(isset($_REQUEST["UserID"])){
  $UserID    = $_REQUEST["UserID"];
}
if(isset($_REQUEST["name"])){
  $name    = $_REQUEST["name"];
}
if(isset($_REQUEST["comment"])){
  $comment    = $_REQUEST["comment"];
}
if(isset($_REQUEST["password"])){
  $password = $_REQUEST["password"];
}
if(isset($_REQUEST["mail"])){
  $mail = $_REQUEST["mail"];
}
if(isset($_REQUEST["photo"])){
  $photo = $_REQUEST["photo"];
}
