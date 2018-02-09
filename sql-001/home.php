<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.css">
    <link rel="stylesheet" href="css/common.css">
    <style>
      .sizuku {
        animation: sizuku 1s linear 0s; /*1s はアニメーションにかかる時間*/
        border-radius: 50%;
        border: 4px solid #6EB2E0; /*ボーダーの幅と色*/
        position: absolute;
        z-index: 1000;
      }

      @keyframes sizuku {
          0% {
              height: 0;
              opacity: 1;
              transform: translate(0, 0);
              width: 0;
          }
          100% {
              height: 500px; /*円の高さ幅の最大値*/
              opacity: 0;
              transform: translate(-250px, -250px); /*高さの半分の値にする*/
              width: 500px; /*基本高さと合わせる*/
          }
      }
    </style>
    <script type="text/javascript" src="jquery/jquery-3.3.1.min.js"></script>
    <title>つぶやき</title>
  </head>
  <body>

    <div class="container">
      <div class="jumbotron">
        <a href="http://localhost/education/sql-001/home.php"><h1>つぶやき</h1></a>
      </div>
      <div class="contents row">
        <p><a href="http://localhost/education/sql-001/new_user.php">新規登録</a></p>
        <p><a href="http://localhost/education/sql-001/login.php">ログイン</a></p>
      </div>
    <script type="text/javascript">
    //click イベントで発火
    document.body.addEventListener("click", drop, false);
    function drop(e) {
        //座標の取得
        var x = e.pageX;
        var y = e.pageY;

        //しずくになるdivの生成、座標の設定
        var sizuku = document.createElement("div");
        for(var i=0; i<3; i++){
          sizuku.style.top = (Math.random() *y) +(y/2) + "px";
          sizuku.style.left = (Math.random() *x) +(x/2) + "px";
          document.body.appendChild(sizuku);
        }
        //アニメーションをする className を付ける
        sizuku.className = "sizuku";

        //アニメーションが終わった事を感知してしずくを remove する
        sizuku.addEventListener("animationend", function() {
            this.parentNode.removeChild(this);
        }, false);
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
