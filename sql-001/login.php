
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
        <a href="http://localhost/education/sql-001/home.php"><h1>つぶやき</h1></a>
      </div>
      <div class="contents row">
            <div class="text-center" id="move-box">
              <p class="text-center">ログイン</p>
            </div>
            <br><br>
            <form method="post" action="http://localhost/education/sql-001/DB/new_user_upload.php" id="test_form" class="form-horizontal" name="send" onsubmit="return check()">
              <div class="form-group">
                <label class="col-sm-2 control-label" for="n"> 名前</label>
                  <div class="col-sm-10">
                    <input type="text" name="name" id="n" class="input" maxlength="8"/><sub>*最大8文字</sub>
                  </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="p"> パスワード</label>
                  <div class="col-sm-10">
                    <input type="text" name="password" id="p" class="input"/><sub>*半角英数字</sub>
                  </div>
              </div>
              <input type="hidden" name="login" id="on" class="input"/>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-default">送信</button>
                </div>
              </div>
            </form>
      </div>
    <script type="text/javascript">
    // 未入力チェック
    function check(){
      var flag = 0;
      var name = document.send.name.value;
      var password = document.send.password.value;

      //未入力の時
      if(name.length === 0){
        flag = 1;
      } else if(password.length === 0){
        flag = 1;
      }

      //全角の時
      if(password.match(/^[^\x01-\x7E\xA1-\xDF]+$/)){
        flag = 2;
      }

      if(flag){
        if(flag === 2){
          window.alert('未入力があります。または、入力条件を満たしていません。');
        } else {
          window.alert('未入力があります。');
        }
        return false;
      } else {
        return true;
      }
    }

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
