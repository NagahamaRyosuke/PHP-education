
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.css">
    <link rel="stylesheet" href="css/common.css">
    <script type="text/javascript" src="jquery/jquery-3.3.1.min.js"></script>
    <title>つぶやき</title>
  </head>
  <body>

    <div class="container">
      <div class="jumbotron">
        <a href="http://localhost/education/sql-001/index.php"><h1>つぶやき</h1></a>
      </div>
      <div class="contents row">
        <div class="col-sm-8">
          <div class="row">
            <div class="drag-and-drop text-center" id="move-box">
              <p class="text-center">名前とコメント入れてつぶやこう</p>
            </div>
            <br><br>
            <form method="post" action="http://localhost/education/sql-001/DB/upload.php" id="test_form" class="form-horizontal" name="send" onsubmit="return check()">
              <div class="form-group">
                <label class="col-sm-2 control-label" for="n"> 名前</label>
                  <div class="col-sm-10">
                    <input type="text" name="name" id="n" class="input" maxlength="8"/>
                  </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="c"> コメント</label>
                  <div class="col-sm-10">
                    <textarea name="comment" id="c" class="input"></textarea>
                  </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-default">送信</button>
                </div>
              </div>
            </form>
            <hr>
  <?php
          session_start();
          // echo $_SESSION["UserID"];
          // echo $_SESSION["photo"];

          if(isset($_REQUEST["search"])){
            $_SESSION["search"] = $_REQUEST["search"];
          }
          require_once "code.php";
  ?>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="clock" id="clock_date"></div>
          <div class="clock" id="clock_time"></div>
          <div>プロフィール画像</div>
          <a href="http://localhost/education/sql-001/mydata.php">
            <img src="<?php echo $_SESSION["photo"] ?>" width="150" height="150" class="icon">
          </a>
          <div>名前検索</div>
            <form method="post" action="index.php" class="form-inline">
              <input type="text" name="search"/>
              <button type="submit" class="btn btn-default btn-sm">送信</button>
            </form>
            <div class="advertisement">
              <a href="http://ed.mynt.site/" title="ED-MYNT" target="_blank">
                <img src="photo/ed-mynt.jpg" width="200" height="200">
              </a>
              <a href="https://www.dreamcareer.co.jp/" title="DreamCareer" target="_blank">
                <img src="photo/logo-dc.png" width="200" height="200">
              </a>
            </div>
        </div>
        <div class="well row col-sm-12" id="footer">
          <p>footer</p>
          <p><a href="http://localhost/education/sql-001/new_user.php">新規登録</a></p>
          <p><a href="http://localhost/education/sql-001/login.php">ログイン</a></p>
          <p><a href="http://localhost/education/sql-001/home.php">homeTop</a></p>

        </div>
      </div>
    <div id="page-top" class="page-top" title="topへ">
      <p><a id="move-page-top" class="move-page-top">▲</a></p>
    </div>
    <form method='post' action='http://localhost/education/sql-001/DB/delete.php' onsubmit='return delete_btn()'>
      <input type='hidden' name='initialization' value='1'>
      <button type='submit' class="btn btn-default btn-xs">初期化</button>
    </form>
    <script type="text/javascript" src="javascript/javasc.js"></script>
  </body>
</html>
