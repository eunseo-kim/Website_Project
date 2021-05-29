<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Daily</title>
    <!-- favicon 사용 -->
    <link rel="icon" href="./img/favicon.png"/>

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Pattaya&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet" />
    <!-- 기본 font : Gothic A1 -->
    <link href="https://fonts.googleapis.com/css2?family=Gothic+A1:wght@300&display=swap" rel="stylesheet" />

    <script src="https://kit.fontawesome.com/f1def33959.js" crossorigin="anonymous"></script>
    <!-- reset css -->
    <link rel="stylesheet" href="./css/reset.css" />
    <!-- 메뉴바 css-->
    <link rel="stylesheet" href="./css/navbar.css" />
    <!-- 메세지 보기 css -->
    <link rel="stylesheet" href="./css/message_view.css" />
    <script src="./js/main.js" defer></script>
  </head>
  <body>
    <!-- header.php 실행 -->
    <header>
      <?php include "./php/header.php";?>
    </header>

    <!-- 메세지 확인하기 부분 -->
    <section>
      <div id="message_box">
        <h3 class="title">
          <?php
              $mode = $_GET["mode"];
              $num  = $_GET["num"];

              $con = mysqli_connect("localhost", "eunseo", "1205", "diary");
              $sql = "select * from message where num=$num";
              $result = mysqli_query($con, $sql);

              $row = mysqli_fetch_array($result);
              $send_id    = $row["send_id"];
              $rv_id      = $row["rv_id"];
              $regist_day = $row["regist_day"];
              $subject    = $row["subject"];
              $content    = $row["content"];

              $content = str_replace(" ", "&nbsp;", $content);
              $content = str_replace("\n", "<br>", $content);

              if ($mode=="send")
                  $result2 = mysqli_query($con, "select name from members where id='$rv_id'");
              else
                  $result2 = mysqli_query($con, "select name from members where id='$send_id'");

              $record = mysqli_fetch_array($result2);
              $msg_name = $record["name"];

              if ($mode=="send")	    	
                  echo "📩 보낸 쪽지함";
              else
                  echo "📨 받은 쪽지함";
          ?>
        </h3>
        <ul id="view_content">
          <li>
            <span class="col1">제목 : <?=$subject?></span>
            <span class="col2"><?=$msg_name?> / <?=$regist_day?></span>
          </li>
          <li>
            <?=$content?>
          </li>		
        </ul>
        <ul class="buttons">
          <li><button class="deleteBtn" onclick="location.href='message_delete.php?num=<?=$num?>&mode=<?=$mode?>'">삭제하기</button></li>
          <li><button onclick="location.href='message_response_form.php?num=<?=$num?>'">답장하기</button></li>
          <li><button onclick="location.href='message_box_screen.php?mode=rv'">받은 쪽지함</button></li>
          <li><button onclick="location.href='message_box_screen.php?mode=send'">보낸 쪽지함</button></li>
        </ul>
      </div> <!-- message_box -->
    </section> 
</body>
</html>
