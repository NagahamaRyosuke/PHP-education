
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

      <?php
            session_start();
            require_once "DB/db_setting.php";
            $dbh = new PDO('mysql:host='.$host.';dbname='.$database, $user, $pass);
            $stmt = $dbh -> prepare("SELECT * FROM ".$table_user." WHERE ID= :UserID");
            $stmt->bindValue(':UserID', $_SESSION["UserID"], PDO::PARAM_INT);
            $stmt->execute();
            $rows = $stmt->fetchAll();
       ?>
            <table class="table table-striped ">
              <tr>
                <th>UserID</th>
                <td><?php echo $rows[0]["ID"] ?></td>
              </tr>
              <tr>
                <th>名前</th>
                <td><?php echo $rows[0]["name"] ?></td>
              </tr>
              <tr>
                <th>パスワード</th>
                <td><?php echo $rows[0]["password"] ?></td>
              </tr>
              <tr>
                <th>メールアドレス</th>
                <td><?php echo $rows[0]["mail_address"] ?></td>
              </tr>
              <tr>
                <th>プロフィール画像</th>
                <td><?php echo $rows[0]["photo"] ?></td>
              </tr>
            </table>
            <p><a href="http://localhost/education/sql-001/index.php"><h4>homeへ</h4></a></p>
            <p><a href="http://localhost/education/sql-001/home.php"><h4>ログアウト</h4></a></p>
          </div>
        </div>
      </div>
    <script type="text/javascript">
    //colorfulBalloon 関数として宣言
    function colorfulBalloon(n, max, min) {
        var balloon = document.createElement("div");
        balloon.className = "balloon";
        balloon.style.borderRadius = "50%";
        balloon.style.position = "fixed";
        balloon.style.zIndex = "-1";

        for (var i = 0; i < n; i++) {
            var balloonClone = balloon.cloneNode();

            //HSLA 色で色を決定
            balloonClone.style.backgroundColor = "hsla(" + Math.random() * 360 + ", 50%, 50%, .2)";

            //最大値、最小値を考慮したバルーンサイズにする
            var size = Math.random() * (max - min) + min;

            //位置をランダムに
            balloonClone.style.top = "calc(" + -1 * size * Math.random() + "px + " + Math.random() * 100 + "%)";
            balloonClone.style.left = "calc(" + -1 * size * Math.random() + "px + " + Math.random() * 100 + "%)";
            balloonClone.style.width = size + "px";
            balloonClone.style.height = size + "px";
            document.body.appendChild(balloonClone);
        };
      }
      //バルーンの個数を10個、バルーンの最大値550px、最小値50px
      colorfulBalloon(10, 550, 50);
    </script>
  </body>
</html>
