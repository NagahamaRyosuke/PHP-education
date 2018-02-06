
// alert("javascript-test");
$(function(){
  //トップへスクロールの表示
  $(window).scroll(function(){
    var now = $(window).scrollTop();
    if(now > 200){
      $('#page-top').fadeIn('slow');
    }else{
      $('#page-top').fadeOut('slow');
    }
  })

  $('#move-page-top').click(function(){
    $('html,body').animate({scrollTop:0}, 'slow');
  });
});

  //名前の正規表現
  var element_n = document.querySelector("#n");
  element_n.style.setProperty("background-color","#FEE","");
  element_n.onkeyup = function(event){
    var element = event.target;
    if(element.value === ""){
      element.style.setProperty("background-color","#FEE","");
    } else {
      element.style.setProperty("background-color","#FFF","");
    }
  }

  //コメントの正規表現
  var element_c = document.querySelector("#c");
  element_c.style.setProperty("background-color","#FEE","");
  element_c.onkeyup = function(event){
    var element = event.target;
    if(element.value === ""){
      element.style.setProperty("background-color","#FEE","");
    } else {
      element.style.setProperty("background-color","#FFF","");
    }
  }

  // 未入力チェック
  function check(){
    var flag = 0;
    var name = document.send.name.value;
    var comment = document.send.comment.value;

    if(name.length === 0){
      flag = 1;
    } else if(comment.length === 0){
      flag = 1;
    }
    if(flag){
      window.alert('未入力があります。');
      return false;
    } else {
      return true;
    }
  }

  //削除の確認ホップアップ
  function delete_btn(){
    var result = window.confirm("本当に削除しますか？");
    if(result){
      return true;
    } else {
      return false;
    }
  }

  //編集ホップアップ
  function edit_btn(i){
    var comment = document.getElementById('main-comment'+i).textContent;
    var result = window.prompt("編集内容を記入してください。", comment);
    if(result){
       // alert("javascript-test");
      var form = document.createElement("form");
      form.action = "upload.php";
      form.method = "get";

      var send_comment = document.createElement("textarea");
      send_comment.value = result;
      send_comment.name = "comment";

      var send_id = document.createElement("input");
      send_id.value = document.getElementById("send_userID"+i).value;
      send_id.name = "ID";

      form.appendChild(send_id);
      form.appendChild(send_comment);
      document.body.appendChild(form);

      form.submit();
    } else {
      return false;
    }
  }

  function clock()
  {
    // 数字が 1ケタのとき、「0」を加えて 2ケタにする
    var twoDigit =function(num){
      　     var digit
           if( num < 10 )
            { digit = "0" + num; }
           else { digit = num; }
           return digit;
     }
    // 曜日を表す各文字列の配列
    var weeks = new Array("Sun","Mon","Thu","Wed","Thr","Fri","Sat");

   // 現在日時を表すインスタンスを取得
    var now = new Date();

      var year = now.getFullYear();
      var month = twoDigit(now.getMonth() + 1)
      var day = twoDigit(now.getDate());
      var week = weeks[now.getDay()];
      var hour = twoDigit(now.getHours());
      var minute = twoDigit(now.getMinutes());
      var second = twoDigit(now.getSeconds());
   //　HTML: <div id="clock_date">(ココの日付文字列を書き換え)</div>
  document.getElementById("clock_date").textContent =  year + "/" + month + "/" + day + " (" + week + ")";

  //　HTML: <div id="clock_time">(ココの時刻文字列を書き換え)</div>
  document.getElementById("clock_time").textContent = hour + ":" + minute + ":" + second;

  }
  setTimeout(clock, 0);
  // 上記のclock関数を1000ミリ秒ごと(毎秒)に実行
  setInterval(clock, 1000);

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

    //要素の取得
    var elements = document.getElementsByClassName("drag-and-drop");

    //要素内のクリックされた位置を取得するグローバル（のような）変数
    var x;
    var y;

    //マウスが要素内で押されたとき、又はタッチされたとき発火
    for(var i = 0; i < elements.length; i++) {
        elements[i].addEventListener("mousedown", mdown, false);
        elements[i].addEventListener("touchstart", mdown, false);
    }

    //マウスが押された際の関数
    function mdown(e) {
        //クラス名に .drag を追加
        this.classList.add("drag");

        //タッチデイベントとマウスのイベントの差異を吸収
        if(e.type === "mousedown") {
            var event = e;
        } else {
            var event = e.changedTouches[0];
        }

        //要素内の相対座標を取得
        x = event.pageX - this.offsetLeft;
        y = event.pageY - this.offsetTop;

        //ムーブイベントにコールバック
        document.body.addEventListener("mousemove", mmove, false);
        document.body.addEventListener("touchmove", mmove, false);
    }

    //マウスカーソルが動いたときに発火
    function mmove(e) {
        //ドラッグしている要素を取得
        var drag = document.getElementsByClassName("drag")[0];

        //同様にマウスとタッチの差異を吸収
        if(e.type === "mousemove") {
            var event = e;
        } else {
            var event = e.changedTouches[0];
        }

        //フリックしたときに画面を動かさないようにデフォルト動作を抑制
        e.preventDefault();

        //マウスが動いた場所に要素を動かす
        drag.style.top = event.pageY - y + "px";
        drag.style.left = event.pageX - x + "px";

        //マウスボタンが離されたとき、またはカーソルが外れたとき発火
        drag.addEventListener("mouseup", mup, false);
        document.body.addEventListener("mouseleave", mup, false);
        drag.addEventListener("touchend", mup, false);
        document.body.addEventListener("touchleave", mup, false);

    }

    //マウスボタンが上がったら発火
    function mup(e) {
        var drag = document.getElementsByClassName("drag")[0];

        //ムーブベントハンドラの消去
        document.body.removeEventListener("mousemove", mmove, false);
        drag.removeEventListener("mouseup", mup, false);
        document.body.removeEventListener("touchmove", mmove, false);
        drag.removeEventListener("touchend", mup, false);

        //クラス名 .drag も消す
        drag.classList.remove("drag");
    }
