<?php
    require_once "DB/db_setting.php";
    $_SESSION['url'] = $_SERVER["REQUEST_URI"];
    $num = 0;
    $data = array();
    //現在のページを取得
    if(isset($_GET["p"]) && is_numeric($_GET["p"])){
      $page = $_GET["p"];
    } else {
      $page = 0;
    }
    try {
      //名前検索
      $dbh = new PDO('mysql:host='.$host.';dbname='.$database, $user, $pass);
      if(isset($_SESSION["search"])){
        foreach($dbh->query('SELECT * from '.$table.' where name = "'.$_REQUEST["search"].'"') as $row) {
          $data[$num]["UserID"] = $row["UserID"];
          $data[$num]["name"] = $row["name"];
          $data[$num]["comment"] = $row["comment"];
          $data[$num]["date"] = $row["date"];
          $data[$num]["photo"] = $row["photo"];
          $num++;
        }
        unset($_SESSION['search']);
      } else {
        // データベース読み込み
        foreach($dbh->query('SELECT * from '.$table) as $row) {
          $data[$num]["UserID"] = $row["UserID"];
          $data[$num]["name"] = $row["name"];
          $data[$num]["comment"] = $row["comment"];
          $data[$num]["date"] = $row["date"];
          $data[$num]["photo"] = $row["photo"];
          $num++;
        }
      }
      $dbh = null;
    } catch (PDOException $e) {
      print "エラー!: " . $e->getMessage() . "<br/>";
      die();
    }
    //1ページに表示するデータ数を読み込む
    $page_length = 10;
    //全ページ数を求める処理
    $maxpage = $num / $page_length;
    //0から使用するため
    $maxpage--;
    //現在のページ数からデータ開始と終わりを求める
    $start = $page * $page_length;
    $end = ($page * $page_length) + $page_length;
    //データを格納する配列(表示するデータ)
    for($i=$start; $i<$end; $i++){
      if($i >= $num){break;}
      echo "<ul class='list-group sentence'>";
      echo "<li class='list-group-item'>";
      echo "<div class='col-sm-2'>";
      echo "<img src=".$data[$i]["photo"]." width='70' height='70'>";
      echo "</div>";
      //headの情報
      echo "<span class='name'><b>".$data[$i]["name"]."</b></span> : ";
      echo "<span class='id'>@".$data[$i]["UserID"]."</span> : ";
      echo "<span>".$data[$i]["date"]."</span>";
      //コメントの表示
      echo "<p class='comment' id='main-comment".$i."'>".$data[$i]["comment"]."</p>";
      //ボタンの処理
      echo "<div class='del-btn form_conf'>";
      echo "<form method='post' action='http://localhost/education/sql-001/DB/delete.php' onsubmit='return delete_btn()'>";
      echo "<input type='hidden' name='UserID' id='send_userID".$i."' value='".$data[$i]["UserID"]."'>";
      echo "<button type='submit' class='btn btn-default btn-xs' id='delete'>削除</button>";
      echo "</form>";
      echo "<button type='submit' class='btn btn-default btn-xs' onclick='edit_btn(".$i.")'>編集</button>";
      echo "</div>";
      echo "</li>";
      echo "</ul>";
    }
    $page_check = array();
    //次ページチェック
    if($maxpage > $page){
        $page_check["next"] = $page + 1;
    }else{
      $page_check["next"] = false;
    }
    //前ページチェック
    if($page - 1 >= 0){
      $page_check["previous"] = $page - 1;
    }
    echo "<ul class='pager  text-center'>";
    if(isset($page_check["previous"])){
      echo "<li><a href=\"./index.php?p={$page_check["previous"]}\" id='previous'> <<前ページ </a></li>";
    }
    if($page_check["next"]){
      echo "<li><a href=\"./index.php?p={$page_check["next"]}\" id='next'> 次ページ>> </a></li>";
    }
    echo "</ul>";
