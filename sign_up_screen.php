<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Daily</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Pattaya&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Gothic+A1:wght@300&display=swap" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/f1def33959.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet" />
    <!-- reset css -->
    <link rel="stylesheet" href="./css/reset.css" />
    <!-- 메뉴바 css-->
    <link rel="stylesheet" href="./css/navbar.css" />
    <!-- 회원가입 css -->
    <link rel="stylesheet" href="./css/sign_up.css" />
    <script src="./js/main.js" defer></script>
    <script src="./js/sign_up.js" defer></script>
  </head>
  <body>
    <!-- header.php 실행 -->
    <header>
      <?php include "./php/header.php";?>
    </header>

    <!--  회원가입 -->
    <section>
      <div id="main_content">
        <div id="join_box">
          <!-- member_insert.php 연결 -->
          <form name="member_form" method="post" action="./php/member_insert.php">
            <h2>Create your account</h2>
            <div class="form id">
              <div class="col1">아이디</div>
              <div class="col2">
                <input type="text" name="id" />
              </div>
              <div class="col3">
                <span class="check_id">중복확인</span>
                <!-- <a href="#"><img src="./img/check_id.gif" onclick="check_id()" /></a> -->
              </div>
            </div>
            <div class="clear"></div>

            <div class="form">
              <div class="col1">비밀번호</div>
              <div class="col2">
                <input type="password" name="pass" />
              </div>
            </div>
            <div class="clear"></div>
            <div class="form">
              <div class="col1">비밀번호 확인</div>
              <div class="col2">
                <input type="password" name="pass_confirm" />
              </div>
            </div>
            <div class="clear"></div>
            <div class="form">
              <div class="col1">이름</div>
              <div class="col2">
                <input type="text" name="name" />
              </div>
            </div>
            <div class="clear"></div>
            <div class="form email">
              <div class="col1">이메일</div>
              <!-- <div class="col2"><input type="text" name="email" /></div> -->
              <div class="col2"><input type="text" name="email1" />&nbsp;@&nbsp;<input type="text" name="email2" /></div>
            </div>
            <div class="clear"></div>
            <div class="bottom_line"></div>
            <div class="buttons">
              <span class="saveBtn">저장하기</span>
              <span class="resetBtn">취소하기</span>
              <!-- <img style="cursor: pointer" src="./img/button_save.gif" onclick="check_input()" />&nbsp;
              <img id="reset_button" style="cursor: pointer" src="./img/button_reset.gif" onclick="reset_form()" /> -->
            </div>
          </form>
        </div>
        <!-- join_box -->
      </div>
      <!-- main_content -->
    </section>
  </body>
</html>
