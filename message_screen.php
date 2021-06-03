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
<link rel="stylesheet" href="./css/footer.css" />
    <!-- 메세지 css -->
    <link rel="stylesheet" href="./css/message.css" />

    <script src="./js/main.js" defer></script>
    <!-- 메세지 js -->
    <script src="./js/message.js" defer></script>
    
  </head>
  <body>
    <!-- header.php 실행 -->
    <header>
      <?php include "./php/header.php";?>
    </header>
    <section>
      <?php
        if (!$userid )
        {
          echo("<script>
              alert('로그인 후 이용해주세요!');
              history.go(-1);
              </script>
            ");
          exit;
        }
      ?>
      <div id="message_box">
          <div class="login_title__icon"><i class="fab fa-ethereum"></i></div>
          <h3 id="write_title">
                  Send a Message
          </h3>
          <!-- 실제로 입력 하는 부분 -->
          <div id="message_box__input_box">
              <ul class="top_buttons">
                  <li><span><a href="message_box_screen.php?mode=rv" class="top_buttons__rv">받은 쪽지함 </a></span></li>
                  <li><span><a href="message_box_screen.php?mode=send" class="top_buttons__send">보낸 쪽지함</a></span></li>
              </ul>
              <!-- 입력하면 message_insert.php에 전송 -->
              <form  name="message_form" method="post" action="./php/message_insert.php?send_id=<?=$userid?>">
                  <div id="write_msg">
                      <ul>
                      <li>
                          <span class="col1">보낸 사람</span>
                          <span class="col2"><?=$userid?></span>
                      </li>	
                      <li>
                          <span class="col1">받는 사람</span>
                          <span class="col2"><input name="rv_id" type="text"></span>
                      </li>	
                      <li>
                          <span class="col1">제목</span>
                          <span class="col2"><input name="subject" type="text"></span>
                      </li>	    	
                      <li id="text_area">	
                          <span class="col1"><span class="col1_textarea">내용</span></span>
                          <span class="col2">
                              <textarea name="content" style = "resize: none"></textarea>
                          </span>
                      </li>
                      </ul>
                  </div>	    	
              </form>
              
          </div>
          <button type="button" onclick="check_input()">보내기</button>
      </div> <!-- message_box -->
    </section>
  </body>
</html>
